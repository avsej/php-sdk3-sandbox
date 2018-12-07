<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class ReadResult
{
    /* @var string */
    private $id;
    /* @var string */
    private $value;
    /* @var string */
    private $cas;
    /* @var int */
    private $expiration;

    public function __construct(string $id, string $value, string $cas, int $expiration = 0)
    {
        $this->id = $id;
        $this->cas = $cas;
        $this->expiration = $expiration;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function cas(): string
    {
        return $this->cas;
    }

    public function expiration(): ?int
    {
        return $this->expiration;
    }

    public function content(Decoder $decoder = null): ?object
    {
        if ($decoder) {
            return $decoder->decode($this->value);
        } else {
            return JsonDecoder::getInstance()->decode($this->value);
        }
    }
}
