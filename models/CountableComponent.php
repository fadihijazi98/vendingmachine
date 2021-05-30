<?php


namespace Model;

use Helper;

abstract class CountableComponent extends Component
{
    private $number;
    private $quantity;

    /**
     * @throws \Exception
     */
    public function __construct($quantity)
    {
        parent::__construct();

        // important checkpoint
        if (gettype($quantity) != "integer")
            throw new \Exception('quantity must be integer value !!');

        $this->setQuantity($quantity);

        // !$this->number: is to make sure the instance take increment integer value once
        if (!$this->number && $this instanceof Column)
            $this->number = Helper\CounterColumns::getCounter();

        else if (!$this->number && $this instanceof Row)
            $this->number = Helper\CounterRows::getCounter();
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @throws \Exception
     */
    protected function drop($index = null)
    {
        $list = $this->getList();

        if ($index) {
            $this->checkIfIsInLimit();
            unset($list[$index]);
        } else
            // to support drop last item in the list
            unset($list[$this->getNumberOfBlocks() - 1]);

        return true;
    }

    /**
     * @throws \Exception
     */
    protected function fetch($index = null)
    {
        $list = $this->getList();

        if ($index || $index === 0) {
            $this->checkIfIsInLimit();
            return $list[$index];
        } else
            // to support fetch last item in the list
            return $list[$this->getNumberOfBlocks() - 1];
    }

    protected abstract function fetchAll();

    /**
     * @throws \Exception
     */
    public function checkIfIsInLimit($index = null)
    {
        if ($index && ($index > $this->getNumberOfBlocks() || $index < 0))
            throw new \Exception('out of bounds');
        else if ($this->getNumberOfBlocks() > $this->getQuantity())
            throw \Exception('can not insert any new item. exceeded the limit.');
        else
            return true;
    }

    public abstract function getNumberOfBlocks();

    public abstract function &getList();
}