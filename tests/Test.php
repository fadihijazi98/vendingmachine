<?php


namespace Test;


use Model\Window;

class Test
{
    protected $dataNumbers;

    public function __construct()
    {
        $this->dataNumbers['columns'] = [];
        $this->dataNumbers['rows'] = [];

        $window = new Window();

        $rows = 5;
        $columns = 3;
        $items = 2;

        $window->setQuantity($rows);

        for ($i = 0; $i < $window->getQuantity(); $i++) {
            // loop rows
            $row = $window->newRow($columns);

            for ($j = 0; $j < $row->getQuantity(); $j++) {
                // loop columns
                $column = $row->newColumn($items);

                for($k = 0; $k < $column->getQuantity(); $k++) {
                    // loop
                    $this->dataNumbers['rows'] = $row->getNumber();
                    $this->dataNumbers['columns'] = $column->getNumber();
                }
            }
        }
    }
}