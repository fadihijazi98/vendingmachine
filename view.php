<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- fonts google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">

    <title>Vending Machine</title>

    <style>
        body {
            background-color: #181818;
            color: white;
            font-family: 'Squada One', cursive;
        }

        img {
            max-width: 200px !important;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="row py-4">
        <div class="col-12 border p-4 rounded">
            <h3>
                # Vending Machine
                <br/>
            </h3>
            <h4 class="px-3">
                Fadi Hijazi
            </h4>
        </div>
        <div class="col-12 p-4 my-2 border rounded">
            <div class="row">
                <div class="col-9">
                    <?php do { ?>
                        <div class="row">
                            <?php do { ?>
                                <div class="col">
                                    <img src=<?php echo $vending_machine->getColumn()->fetchItem(0)->getImgPath(); ?>>
                                    <br/>
                                    <h5 class="py-2">
                                        <?php
                                        echo $vending_machine->getColumn()->fetchItem(0)->getId();
                                        ?>
                                        <br/>
                                        <?php
                                        echo 'Column # ' . $vending_machine->getColumn()->getNumber();
                                        ?>
                                        <br/>
                                        <?php
                                        echo 'Price: ' . $vending_machine->getColumn()->fetchItem(0)->getPrice();
                                        ?>

                                    </h5>
                                </div>
                            <?php } while ($vending_machine->nextColumn()); ?>
                        </div>
                    <?php } while ($vending_machine->nextRow()); ?>
                </div>
                <div class="col-3">
                    <div>
                        <h1>
                            <span class="border-bottom pb-2">
                                Slots
                            </span>
                        </h1>
                    </div>
                    <div style="background-color: white" class="p-4 my-4 rounded">
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="item_number" class="text-dark">Item</label>
                                <input type="Number" class="form-control" id="item_number" name="item_number"
                                       placeholder="By column number">
                            </div>
                            <div class="form-group">
                                <label for="coins" class="text-dark">Coins</label>
                                <select class="custom-select" id="coins" name="coins">
                                    <option value="0">0</option>
                                    <option value="10c">10 c</option>
                                    <option value="20c">20 c</option>
                                    <option value="50c">50 c</option>
                                    <option value="$1">$1</option>
                                </select>
                            </div>
                            <button class="btn btn-dark" type="submit">
                                Purchase
                            </button>
                        </form>
                    </div>
                    <!-- screen -->
                    <div class="p-2 bg-white text-dark rounded d-flex justify-content-center align-items-center" style="min-height: 200px">
                        <h4>
                            <?php if(isset($message)) { ?>
                            <?php echo $message; } else { ?>
                            LCD IDLE
                            <?php } ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>
</html>