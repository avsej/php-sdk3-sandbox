<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class MutateResult
{
    /* @var string */
    private $id;
    /* @var string */
    private $cas;
    /* @var int */
    private $mutationToken;

    public function __construct(string $id, string $cas, MutationToken $mutationToken = null)
    {
        $this->id = $id;
        $this->cas = $cas;
        $this->mutationToken = $mutationToken;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function cas(): string
    {
        return $this->cas;
    }

    public function mutationToken(): ?MutationToken
    {
        return $this->mutationToken;
    }
}
