<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 1</title>
</head>
<body>
    <h2>Triangle Area Calculator</h2>

    <form method="POST">
        Side 1: <input type="number" name="side1" step="0.01" required><br><br>
        Side 2: <input type="number" name="side2" step="0.01" required><br><br>
        Side 3: <input type="number" name="side3" step="0.01" required><br><br>
    <input type="submit" name="calculate" value="Calculate Area">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $a = $_POST['side1'];
    $b = $_POST['side2'];
    $c = $_POST['side3'];

    $s = ($a + $b + $c) / 2;

    
    $area = ($s * ($s - $a) * ($s - $b) * ($s - $c)) ** 0.5;

   
    echo "<h3>Area of Triangle: " . number_format($area, 2) . "</h3>";
}

?>
</body>
</html>