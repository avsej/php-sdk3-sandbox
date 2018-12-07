<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class MultiReadResult
{
    /* @var string */
    private $id;
    /* @var string */
    private $value;
    /* @var string */
    private $cas;

    public function __construct(string $id, array $value, string $cas, int $expiration = 0)
    {
        $this->id = $id;
        $this->cas = $cas;
        $this->expiration = $expiration;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function content(Decoder $decoder = null): ?array
    {
        if ($decoder == null) {
            $decoder = JsonDecoder::getInstance();
        }
        $data = [];
        foreach ($this->value as $field => $value) {
            $data[$key] = $decoder->decode($value);
        }
        return $data;
    }

    public function contentEntry(string $key, Decoder $decoder = null): ?object
    {
        if ($this->value[$key] == null) {
            return null;
        }
        if ($decoder == null) {
            $decoder = JsonDecoder::getInstance();
        }
        return $decoder->decode($this->value[$key]);
    }
}
