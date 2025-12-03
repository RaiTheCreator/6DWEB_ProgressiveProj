<?php
    declare(strict_types = 1);

    // Global Vars
    $tax_rate = 20;

    // Hero Information 
    $name = "Cafe ni Ulan";
    $tagline = "Fresh & Delicious, Everyday";
    $description = "A good coffee is like a warm hug in a cup, rich in aroma, smooth in taste, and comforting with every sip.";

    // Menu
    $coffee = [
        "Espresso" => ["price" => 80, "stock" => 8],
        "Americano" => ["price" => 90, "stock" => 30],
        "Cappuccino" => ["price" => 120, "stock" => 15],
        "Latte" => ["price" => 130, "stock" => 20],
        "Mocha" => ["price" => 150, "stock" => 5],
        "Macchiato" => ["price" => 110, "stock" => 10],
    ];

    $food = [
        "Pancakes with Syrup" => 150,
        "French Toast" => 160,
        "Omelette" => 140,
        "Club Sandwich" => 180,
        "Chicken Caesar Wrap" => 170,
        "Caesar Salad" => 150,
    ];

    // Functions
    function get_reorder_message(int $stock_level): string {
        return ($stock_level < 10) ? "Yes" : "No";
    }

    function get_total_value(float $price, int $quantity): float{
        return $price * $quantity;
    }

    function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float{
        $total = $price * $quantity;
        $tax_due = $total * ($tax_rate / 100);
        return $tax_due;
    }

    // Operational Var
    $totalPrice = 0;
    $prices = array_values($coffee);
    $count = 0;

    // While Loop
    while (count($prices) > $count){
        $totalPrice += $prices[$count]["price"];
        $count++;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe ni Ulan</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'Header.php';?>


    <!-- Hero -->
    <main>
        <section class="hero" id="hero">
            <div>
                <h2><?= $tagline?></h2>
                <p><?= $description?></p>
            </div>
        </section>
    </main>
    
    <!-- For Prices -->
    <h2 id="separate">MENU</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>COFFEE</th>
                    <th>PRICE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coffee as $item => $price) { ?>
                    <tr>
                        <td><?= $item ?></td>
                        <td><?= "₱" .$price["price"] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><?= "Bundle" ?></td>
                    <td><?= "₱" .$totalPrice ?></td>
                </tr>
            </tbody>
        </table><br>
    </div>


    <!-- For stock control -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>COFFEE</th>
                    <th>STOCK</th>
                    <th>RE-ORDER</th>
                    <th>TOTAL VALUE</th>
                    <th>TAX DUE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coffee as $item => $information) { ?>
                    <tr>
                        <td><?= $item ?></td>
                        <td><?= $information["stock"] ?></td>
                        <td><?= get_reorder_message($information["stock"]) ?></td>
                        <td><?= get_total_value(price: $information["price"], quantity: $information["stock"]) ?></td>
                        <td><?= "₱" .get_tax_due(price: $information["price"], quantity: $information["stock"], tax_rate: $tax_rate) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table><br>
    </div>

    <?php include 'Footer.php';?>
</body>
</html>