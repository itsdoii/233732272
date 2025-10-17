<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swapping Variables</title>
</head>
<body>
    <h1>Swapping Variables</h1>
    <form method="post" action="">
        <label for="value1">Enter first value:</label>
        <input type="text" id="value1" name="value1" required>
        <br>
        <label for="value2">Enter second value:</label>
        <input type="text" id="value2" name="value2" required>
        <br>
        <input type="submit" value="Swap Values">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];

        // Swapping values using a temporary variable
        $temp = $value1;
        $value1 = $value2;
        $value2 = $temp;

        echo "<h2>Swapped Values:</h2>";
        echo "<p>First value: $value1</p>";
        echo "<p>Second value: $value2</p>";
    }
    ?>
</body>
</html>