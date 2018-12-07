<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class Cluster
{
    /* @var string */
    private $username;
    /* @var string */
    private $password;
    /* @var array */
    private $options;


    public function authenticateAs(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function configure(array $options)
    {
        foreach ($options as $key => $value) {
            $this->options[$key] = (string)$value;
        }
    }

    public function bucket(string $name): Bucket
    {
        return new Bucket($name, $this);
    }
}
