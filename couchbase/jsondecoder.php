<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class JsonDecoder implements Decoder
{
    /* @var JsonDecoder */
    private static $instance = null;


    public static function getInstance(): JsonDecoder
    {
        if (self::$instance == null) {
            self::$instance = new JsonDecoder();
        }
        return self::$instance;
    }

    public function decode(?string $blob)
    {
        if ($blob) {
            return json_decode($blob);
        }
        return null;
    }
}
