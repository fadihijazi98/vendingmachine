<?php

use Model\Purchase;

require_once realpath("vendor/autoload.php");
session_start();

if (!isset($_SESSION['vending_machine'])) {
    $vending_machine = new \Model\System();
    $vending_machine->fillWindow();
    $_SESSION['vending_machine'] = serialize($vending_machine);
    die();
} else {
    $vending_machine = unserialize($_SESSION['vending_machine']);
}

// purchase order through coins
if (isset($_POST['coins'])) {
    $message = '';

    if (!isset($_POST['item_number'])) {
        $message = "please chose item !";
    } else {
        $item_number = $_POST['item_number'];
        $coins = $_POST['coins'];

        if (!in_array($coins, ['10c', '20c', '50c', '$1']))
            $message = "Invalid operation!";
        else {
            $purchase = $vending_machine->makePurchase($item_number, $coins);

            if (!$purchase)
                $message = "status: <span class='text-danger'>Error</span> <br /> no item have the entered column number !";
            else if (!($purchase instanceof Purchase))
                $message = $purchase;
            else {
                $message = "purchase information: <br />";

                $message .= "id: " . $purchase->getId() . "<br />";
                $message .= "totally: " . $purchase->getTotally() . "<br />";
                $message .= "date: " . $purchase->getPurchaseDate() . "<br />";
                $message .= "Status: <span class='text-success'>Done</span>";
            }
        }
    }
}

include 'view.php';

?>


