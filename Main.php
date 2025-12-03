<?php
    declare(strict_types = 1);

    // Hero Information 
    $name = "Cafe ni Ulan";
    $tagline = "Fresh & Delicious, Everyday";
    $description = "A good coffee is like a warm hug in a cup, rich in aroma, smooth in taste, and comforting with every sip.";

    // Menu
    $menu_coffee = [
        "Espresso" => 80,
        "Americano" => 90,
        "Cappuccino" => 120,
        "Latte" => 130,
        "Mocha" => 150,
        "Macchiato" => 110,
    ];

    $menu_food = [
        "Pancakes with Syrup" => 150,
        "French Toast" => 160,
        "Omelette" => 140,
        "Club Sandwich" => 180,
        "Chicken Caesar Wrap" => 170,
        "Caesar Salad" => 150,
    ];

    // Operational Var
    $totalPrice = 0;
    $prices = array_values($menu_coffee);
    $count = 0;

    // While Loop
    while (count($prices) > $count){
        $totalPrice += $prices[$count];
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
    
    <!-- Tables that uses foreach iteration -->
    <h2 id="price">PRICE LIST</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Coffee</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menu_coffee as $item => $price) { ?>
                    <tr>
                        <td><?= $item ?></td>
                        <td><?= "₱" .$price ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><?= "Bundle" ?></td>
                    <td><?= "₱" .$totalPrice ?></td>
                </tr>
            </tbody>
        </table><br>
    </div>

    <?php include 'Footer.php';?>
</body>
</html>