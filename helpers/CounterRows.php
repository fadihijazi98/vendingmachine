<?php


namespace Helper;


class CounterRows
{
    private static $counter = 0;

    private static function incCounter()
    {
        self::$counter += 1;
    }

    public static function getCounter()
    {
        self::incCounter();
        return self::$counter;
    }
}