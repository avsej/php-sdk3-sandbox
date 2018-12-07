<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class Collection
{
    /* @var string */
    private $name;
    /* @var Bucket */
    private $scope;

    public function __construct(string $name, Scope $scope)
    {
        $this->name = $name;
        $this->scope = $scope;
    }

    public function get(string $id, GetOptions $options = null): ReadResult
    {
        $value = "{\"val\":42}";
        $cas = "776t3gAAAAA=";
        $expiration = 0;
        return new ReadResult($id, $value, $cas, $expiration);
    }

    public function replace(string $id, $content, ReplaceOptions $options = null): MutateResult
    {
        $cas = "776t3gAAAAA=";
        return new MutateResult($id, $cas);
    }

    public function lookupIn(string $id, LookupSpec $spec, LookupOptions $options = null): MultiReadResult
    {
        $value = ["legs" => "{\"val\":42}"];
        $cas = "776t3gAAAAA=";
        $expiration = 0;
        return new MultiReadResult($id, $value, $cas, $expiration);
    }

    public function mutateIn(string $id, MutateSpec $spec, MutateOptions $options = null): MultiMutateResult
    {
        $cas = "776t3gAAAAA=";
        return new MultiMutateResult($id, $cas);
    }

    public function remove(string $id, RemoveOptions $options = null): MutateResult
    {
        $cas = "776t3gAAAAA=";
        return new MutateResult($id, $cas);
    }
}
