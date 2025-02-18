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
