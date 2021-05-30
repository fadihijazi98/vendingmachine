<?php


namespace Model;


class System
{
    // vending machine system.
    private $window;
    private $purchases;

    private $costs = ['10c', '20c', '50c', '$1'];

    private $row_index = 0;
    private $column_index = 0;

    public function __construct()
    {
        $this->window = new Window(); // default 5 rows.
        $this->purchases = [];
    }

    public function fillWindow($rows = 5, $columns = 3, $items = 2)
    {
        // translate parameters to expressive sentences
        // widow has 5 rows. each row contains 3 column, each column contains 2 item
        $this->window->setQuantity($rows);

        for ($i = 0; $i < $this->window->getQuantity(); $i++) {
            // loop rows
            $row = $this->window->newRow($columns);

            for ($j = 0; $j < $row->getQuantity(); $j++) {
                // loop columns
                $column = $row->newColumn($items);

                for ($k = 0; $k < $column->getQuantity(); $k++) {
                    // loop
                    $item_name = "item-" . ($column->getNumber() + $k);
                    $item_image = "images/" . $column->getNumber() . ".jpg";
                    $item_price = $this->costs[rand(0, sizeof($this->costs))];

                    $column->newItem($item_name, $item_image, $item_price);
                }
            }
        }
    }

    public function getRow()
    {
        return $this->window->fetchRow($this->row_index);
    }

    public function nextRow()
    {
        $quantity = $this->window->getQuantity() - 1;

        if ($this->row_index < $quantity) {
            $this->row_index++;
            return true;
        } else
            return false;
    }

    public function getColumn()
    {
        return $this->getRow()->fetchColumn($this->column_index);
    }

    public function nextColumn()
    {
        $quantity = $this->getRow()->fetchColumn($this->column_index)->getQuantity();

        if ($this->column_index < $quantity) {
            $this->column_index++;
            return true;
        } else {
            $this->column_index = 0;
            return false;
        }
    }

    public function findItemByNumber($number, $coins)
    {
        $item = null;

        $previous_row_index = $this->row_index;
        $previous_column_index = $this->column_index;

        $this->row_index = 0;
        $this->column_index = 0;

        do {
            do {
                $column_number = $this->getColumn()->getNumber();

                if ($column_number == $number) {
                    $item = $this->getColumn()->fetchItem(0);

                    preg_match('/\$(.+)/', $item->getPrice(), $result);
                    $int_price = 0;

                    if (!empty($result))
                        $int_price = (int)$result[1];
                    else {
                        preg_match("/(.+?)c/", $item->getPrice(), $result);
                        $int_price = (int)$result[1];
                    }

                    if ($int_price == 1)
                        $int_price *= 100;

                    preg_match('/\$(.+)/', $coins, $result);

                    $int_coins = 0;

                    if (!empty($result))
                        $int_coins = (int)$result[1];
                    else {
                        preg_match("/(.+?)c/", $coins, $result);
                        $int_coins = (int)$result[1];
                    }
                    if ($int_coins == 1)
                        $int_coins *= 100;


                    if ($int_price > $int_coins) {
                        $this->row_index = $previous_row_index;
                        $this->column_index = $previous_column_index;
                        return "Total is not enough";
                    }

                    $this->getColumn()->dropItem($this->getColumn()->getNumber());
                }
            } while ($this->nextColumn());
        } while ($this->nextRow() && !$item);

        $this->row_index = $previous_row_index;
        $this->column_index = $previous_column_index;

        return $item;
    }

    public function makePurchase($item_number, $totally)
    {
        $item = $this->findItemByNumber($item_number, $totally);

        if (!$item)
            return null;

        if (!($item instanceof Item))
            return $item;

        $purchase = new Purchase();

        $purchase->setItemId($item->getId());
        $purchase->setStatus('done');
        $purchase->setTotally($totally);
        $purchase->setPurchaseDate(date('l jS \of F Y h:i:s A'));

        return $purchase;
    }
}