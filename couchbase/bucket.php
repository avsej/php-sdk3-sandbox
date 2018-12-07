<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class Bucket
{
    /* @var string */
    private $name;
    /* @var Cluster */
    private $cluster;

    public function __construct(string $name, Cluster $cluster)
    {
        $this->name = $name;
        $this->cluster = $cluster;
    }

    public function scope(string $name): Scope
    {
        return new Scope($name, $this);
    }
}
