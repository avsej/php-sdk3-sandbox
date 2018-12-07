<?php
// vim: et ts=4 sw=4 sts=4

spl_autoload_register();

/*
 * Prepare
 *
 * 1) connect to a cluster
 * 2) open a collection
 *
 */

use \Couchbase\Cluster;
use \Couchbase\Options;

$cluster = new Cluster("couchbase://localhost");
$cluster->authenticateAs("Administrator", "password");
$cluster->configure(
    [
        // the value will get stringified for lcb_cntl_string
        "config_poll_interval" => 1.5
    ]
);

$collection = $cluster->bucket("travel-sample")
                      ->scope("public")
                      ->collection("landmarks");

/*
 * Scenario A
 * ----------
 *
 * 1) fetch a full document that is a JSON document
 * 2) make a modification to the content
 * 3) replace the document on the server
 *
 */

$readResult = $collection->get(
    "key1",
    Options::getOptions()
           ->timeout(0.9) // timeout in seconds
);

$person = $readResult->content();
$person['age'] = 45;
$person['arms'] = 1;

$mutateResult = $collection->replace(
    $readResult->id(),
    $person,
    Options::replaceOptions()
        ->timeout(1.0) // timeout in seconds
);
$mutateResult->cas();

/*
 * Scenario B
 * ----------
 *
 * 1) fetch a document fragment, which is a JSON array with elements
 * 2) make modifications to the content
 * 3) replace the fragment in the original document
 *
 */
use \Couchbase\LookupSpec;

$readResult = $collection->lookupIn(
    "key1",
    (new LookupSpec())->get("legs"),
    Options::lookupOptions()
        ->timeout(1.0) // timeout in seconds
);

// $items = $readResult->content()["legs"];
$items = $readResult->contentEntry("legs");
if ($items != null) {
    array_push($items, 13);
    array_push($items, 42);
}

use \Couchbase\MutateSpec;

$mutateResult = $collection->mutateIn(
    "key1",
    (new MutateSpec())->replace("legs", $items),
    Options::mutateOptions()
        ->createPath(true)
);
$mutateResult->cas();

/*
 * Scenario C
 * ----------
 *
 * 1) remove a document with Durability Requirements, both variants, thinking
 *    about error handling
 *
 */

$collection->remove(
    "key1",
    Options::removeOptions()
        ->persistTo(Options::PERSIST_TO_ONE)
        ->replicateTo(Options::REPLICATE_TO_TWO)
);

$collection->remove(
    "key1",
    Options::removeOptions()
        ->durability(Options::DURABILITY_LEVEL_MAJORITY, 3.0)
);

/*
 * Scenario D
 * ----------
 *
 * 1) do the same thing as A, but handle the "CAS mismatch retry loop"
 *
 */

$attempts = 5;
while ($attempts > 0) {
    $attempts--;
    try {
        $readResult = $collection->get(
            "key1",
            Options::getOptions()
                ->timeout(0.9) // timeout in seconds
        );

        $person = $readResult->content();
        $person['age'] = 45;
        $person['arms'] = 1;

        $mutateResult = $collection->replace(
            $readResult->id(),
            $person,
            Options::replaceOptions()->cas($readResult->cas())->timeout(1.0) // timeout in seconds
        );
    } catch (CasMismatchException $ex) {
        if ($attempts == 0) {
            throw $ex;
        }
    }
}

/*
 * Scenario E (if applicable)
 * --------------------------
 *
 * 1) fetch a full document and marshal it into language entity rathen than a
 *    generic JSON type
 * 2) modify the entity
 * 3) store it back on the server with a replace
 *
 */


/*
 * Scenario F (if applicable)
 * --------------------------
 *
 * 1) fetch a document fragment and marshal it into a language entity rather
 *    than a generic JSON type
 * 2) modify the entity
 * 3) store it back on the setrver with a replace
 *
 */
