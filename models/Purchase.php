<?php


namespace Model;


class Purchase extends Component
{
    private $totally;
    private $status;
    private $item_id;
    private $purchase_date;

    public function getTotally()
    {
        return $this->totally;
    }

    public function setTotally($totally)
    {
        $this->totally = $totally;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getItemId()
    {
        return $this->item_id;
    }

    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }

    public function getPurchaseDate()
    {
        return $this->purchase_date;
    }

    public function setPurchaseDate($purchase_date)
    {
        $this->purchase_date = $purchase_date;
    }

}