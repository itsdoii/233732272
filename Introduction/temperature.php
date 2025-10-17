<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Temperature Converter</h1>
        <form method="post" action="">
            <label for="celsius">Enter temperature in Celsius:</label>
            <input type="number" name="celsius" id="celsius" required>
            <button type="submit">Convert</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $celsius = $_POST['celsius'];
            $fahrenheit = ($celsius * 9/5) + 32;
            echo "<h2>$celsius °C is equal to $fahrenheit °F</h2>";
        }
        ?>
    </div>
</body>
</html>