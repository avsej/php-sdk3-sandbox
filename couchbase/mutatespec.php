<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class MutateSpec
{
    /* @var array */
    private $operations = [];

    public function replace(string $path, $value, bool $xattr = false): MutateSpec
    {
        $this->operations []= [
            'operation' => 'replace',
            'path' => $path,
            'value' => $value,
            'xattr' => $xattr
        ];
        return $this;
    }
}
