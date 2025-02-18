<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 02: Array of Fruits</title>
</head>
<body>

    <h2>Array of Fruits</h2>
    <?php
    // Create 5 array elements 
    $fruits = ["Apple", "Banana", "Orange", "Grapes", "Mango"];

    // Display loop in an ordered list
    echo "<ol>";
    for ($i = 0; $i < count($fruits); $i++) {
        echo "<li>$fruits[$i]</li>";
    }
    echo "</ol>";
    ?>

    <h2>While Loop Example</h2>
    <?php
    $x = 1;
    while ($x <= 5) {
        echo "Number: $x <br>";
        $x++;
    }
    ?>

    <h2>Do-While Loop Example</h2>
    <?php
    $x = 1;
    do {
        echo "Number: $x <br>";
        $x++;
    } while ($x <= 5);
    ?>

    <h2>Foreach Loop Example</h2>
    <?php
    $numbers = [1, 2, 3, 4, 5];
    foreach ($numbers as $num) {
        echo "Number: $num <br>";
    }
    ?>

</body>
</html>
