<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class RemoveOptions
{
    /* @var array */
    private $options = [];

    public function timeout(float $seconds)
    {
        $this->options['timeout'] = $seconds;
        return $this;
    }

    public function persistTo(int $nodes)
    {
        $this->options['persist_to'] = $nodes;
        return $this;
    }

    public function replicateTo(int $replicas)
    {
        $this->options['replicate_to'] = $replicas;
        return $this;
    }

    public function durability(int $level, float $timeout)
    {
        $this->options['durability'] = [
            "level" => $level,
            "timeout" => $timeout
        ];
    }
}
