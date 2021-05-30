<?php


namespace Model;

class Row extends CountableComponent
{
    private $columns;

    public function __construct($quantity)
    {
        parent::__construct($quantity);

        $this->columns = [];
    }

    public function newColumn($quantity = 5)
    {
        // check point
        $this->checkIfIsInLimit();

        $column = new Column($quantity);
        $this->columns[] = $column;

        return $column;
    }

    public function dropColumn($index = null)
    {
        $this->drop($index);
    }

    public function fetchColumn($index)
    {
        return $this->fetch($index);
    }

    public function fetchAll() {
        return $this->columns;
    }

    public function getNumberOfBlocks()
    {
        return sizeof($this->columns);
    }

    public function &getList()
    {
        return $this->columns;
    }
}