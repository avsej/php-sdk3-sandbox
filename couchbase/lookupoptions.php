<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class LookupOptions
{
    /* @var array */
    private $options = [];

    public function timeout(float $seconds)
    {
        $this->options['timeout'] = $seconds;
        return $this;
    }
}
