<?php

namespace Model;

abstract class Component
{
    private $id = null;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function getId()
    {
        return $this->id;
    }
}
