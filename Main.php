<?php
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

    $totalPrice_2 = 0;
    $prices_2 = array_values($menu_food);

    // For Loop
    for ($count = 0; count($prices) > $count; $count++){
        $totalPrice_2 += $prices_2[$count];
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

    <main>
        <section class="hero" id="hero">
            <div>
                <h2><?= $tagline?></h2>
                <p><?= $description?></p>
            </div>
        </section>
    </main>

    <h2 id="price">PRICE LIST</h2>
    <table>
        <tr>
            <th>Coffee</th>
            <th>Price</th>
        </tr>
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
    </table><br>

     <table>
        <tr>
            <th>Food</th>
            <th>Price</th>
        </tr>
        <?php foreach ($menu_food as $item => $price) { ?>
            <tr>
                <td><?= $item ?></td>
                <td><?= "₱" .$price ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td><?= "Bundle" ?></td>
            <td><?= "₱" .$totalPrice_2 ?></td>
        </tr>
    </table>

    <?php include 'Footer.php';?>
</body>
</html>