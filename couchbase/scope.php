<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class Scope
{
    /* @var string */
    private $name;
    /* @var Bucket */
    private $bucket;

    public function __construct(string $name, Bucket $bucket)
    {
        $this->name = $name;
        $this->bucket = $bucket;
    }

    public function collection(string $name): Collection
    {
        return new Collection($name, $this);
    }
}
