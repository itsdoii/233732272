<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Manipulation</title>
</head>
<body>
    <h1>String Manipulation</h1>
    <form method="post">
        <label for="sentence">Enter a sentence:</label><br>
        <textarea id="sentence" name="sentence" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sentence = $_POST['sentence'];
        $numCharacters = strlen($sentence);
        $numWords = str_word_count($sentence);
        $uppercase = strtoupper($sentence);
        $lowercase = strtolower($sentence);

        echo "<h2>Results:</h2>";
        echo "<p>Number of characters: $numCharacters</p>";
        echo "<p>Number of words: $numWords</p>";
        echo "<p>Uppercase: $uppercase</p>";
        echo "<p>Lowercase: $lowercase</p>";
    }
    ?>
</body>
</html>