<?php

$stopWords = ["the", "and", "in", "on", "at", "to", "a", "an", "is", "of", "for", "with", "as", "this", "that", "it", "by", "be", "or", "was", "are", "from", "but", "not", "have", "has", "had"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = strtolower($_POST['text']);
    $sortingOrder = $_POST['sort']; 
    $displayLimit = (int) $_POST['limit'];

    $words = preg_split('/\W+/', $inputText, -1, PREG_SPLIT_NO_EMPTY);
    
    $filteredWords = array_diff($words, $stopWords);
    
    $wordFrequencies = array_count_values($filteredWords);
    
    if ($sortingOrder === 'asc') {
        asort($wordFrequencies);
    } else {
        arsort($wordFrequencies);
    }
    
    $wordFrequencies = array_slice($wordFrequencies, 0, $displayLimit, true);
    
    echo "<h2>Word Frequency Results</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Word</th><th>Frequency</th></tr>";
    foreach ($wordFrequencies as $word => $count) {
        echo "<tr><td>$word</td><td>$count</td></tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 20px;
    padding: 20px;
    text-align: center;
}

h1 {
    color: #333;
}

form {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    display: inline-block;
    text-align: left;
}

label {
    font-weight: bold;
}

textarea, select, input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background: #28a745;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background: #218838;
}

table {
    width: 50%;
    margin: 20px auto;
    border-collapse: collapse;
    background: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}

td {
    background: #f9f9f9;
}

</style>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>
</body>
</html>
