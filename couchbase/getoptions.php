<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class GetOptions
{
    /* @var array */
    private $options = [];

    public function timeout(float $seconds)
    {
        $this->options['timeout'] = $seconds;
        return $this;
    }

    public function withExpiration(bool $includeExpiration)
    {
        $this->options['with_expiration'] = $includeExpiration;
        return $this;
    }
}
