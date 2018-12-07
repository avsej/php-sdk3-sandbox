<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class LookupSpec
{
    /* @var array */
    private $operations = [];

    public function get(string $path, bool $xattr = false): LookupSpec
    {
        $this->operations []= [
            'operation' => 'get',
            'path' => $path,
            'xattr' => $xattr
        ];
        return $this;
    }

    public function exist(string $path, bool $xattr = false): LookupSpec
    {
        $this->operations []= [
            'operation' => 'exist',
            'path' => $path,
            'xattr' => $xattr
        ];
        return $this;
    }
}
