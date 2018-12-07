<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

interface Decoder
{
    public function decode(?string $blob);
}
