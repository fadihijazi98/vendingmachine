<?php


namespace Model;

class Column extends CountableComponent
{
    private $items;

    public function __construct($quantity)
    {
        parent::__construct($quantity);
        $this->items = [];
    }

    public function newItem($name, $img_path, $price)
    {
        // check point
        $this->checkIfIsInLimit();

        $item = new Item($name, $img_path, $price);
        $this->items[] = $item;

        return $item;
    }

    public function dropItem($index = null)
    {
        $this->drop($index);
    }

    public function fetchItem($index = null)
    {
        return $this->fetch($index);
    }

    public function fetchAll()
    {
        return $this->items;
    }

    public function updateItem($index, $name = null, $img_path = null, $price = null)
    {
        // 2 check points
        if (!$name && !$img_path && !$price)
            return "!!";
        else if ($index > $this->getNumberOfItems() && $index < 0)
            return false;

        // updates
        if ($name)
            $this->items[$index]->name = $name;
        if ($img_path)
            $this->items[$index]->img_path = $img_path;
        if ($price)
            $this->items[$index]->price = $price;
    }

    public function getNumberOfBlocks()
    {
        return sizeof($this->items);
    }

    public function &getList()
    {
        return $this->items;
    }
}