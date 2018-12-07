<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class ReplaceOptions
{
    /* @var array */
    private $options = [];

    public function timeout(float $seconds)
    {
        $this->options['timeout'] = $seconds;
        return $this;
    }

    public function cas(string $cas)
    {
        $this->options['cas'] = $cas;
        return $this;
    }
}
