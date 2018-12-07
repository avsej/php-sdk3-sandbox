<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class MutateOptions
{
    /* @var array */
    private $options = [];

    public function timeout(float $seconds)
    {
        $this->options['timeout'] = $seconds;
    }

    public function createPath(bool $shouldCreate)
    {
        $this->options['create_path'] = $shouldCreate;
    }
}
