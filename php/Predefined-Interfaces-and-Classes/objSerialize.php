<?php

class ObjSerialize implements Serializable
{
    private $data;

    public function __construct()
    {
        $this->data = "my private data";
    }

    public function serialize()
    {
        return serialize($this->data);
    }

    public function unserialize($data)
    {
        $this->data = unserialize($data);
    }

    public function getData()
    {
        return $this->data;
    }
}

$obj = new ObjSerialize();

$ser = serialize($obj);
var_dump($ser);
$newObj = unserialize($ser);
