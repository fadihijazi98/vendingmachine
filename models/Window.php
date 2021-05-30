<?php


namespace Model;


class Window extends CountableComponent
{
    private $rows;

    public function __construct($quantity = 5)
    {
        parent::__construct($quantity);
    }

    public function newRow($quantity = 5)
    {
        // check point
        $this->checkIfIsInLimit();

        $row = new Row($quantity);
        $this->rows[] = $row;

        return $row;
    }

    public function fetchRow($index = null)
    {
        return $this->fetch($index);
    }

    public function dropRow($index = null)
    {
        return $this->drop($index);
    }

    public function getNumberOfBlocks()
    {
        return sizeof($this->rows);
    }

    public function fetchAll() {
        return $this->rows;
    }

    public function &getList()
    {
        return $this->rows;
    }
}