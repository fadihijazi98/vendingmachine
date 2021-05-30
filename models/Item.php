<?php


namespace Model;


class Item extends Component
{
    private $name;
    private $img_path;
    private $price;

    public function __construct($name = null, $img_path = null, $price = null)
    {
        parent::__construct();

        $this->name = $name;
        $this->img_path = $img_path;
        $this->price = $price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setImgPath($img_path)
    {
        $this->img_path = $img_path;
    }

    public function getImgPath()
    {
        return $this->img_path;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function ItemToString()
    {
        return "item id: " . $this->getId() . ", item name: " . $this->name .
            ", item image: " . $this->img_path . ", item price: $" . $this->price;
    }
}