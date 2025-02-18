<?php

function calculateTotalPrice(array $items): float {
    $total = 0;

    foreach ($items as $item) {
        if (isset($item['price'])) {
            $total += $item['price'];
        }
    }

    return $total;
}

function modifyString(string $string): string {
    $string = str_replace(' ', '', $string);
    $string = strtolower($string);
    return $string;
}

function checkEvenOrOdd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 20],
    ['name' => 'Widget C', 'price' => 15]
];

$total = calculateTotalPrice($items);
echo "Total price: $$total\n";

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($string);
echo "Modified string: $modifiedString\n";

$number = 42;
echo checkEvenOrOdd($number);

?>