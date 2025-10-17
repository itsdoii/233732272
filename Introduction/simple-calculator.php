<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Simple Calculator</h1>
    <form method="post" action="">
        <label for="num1">Enter first number:</label>
        <input type="number" name="num1" id="num1" required>
        <br>
        <label for="num2">Enter second number:</label>
        <input type="number" name="num2" id="num2" required>
        <br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $sum = $num1 + $num2;
        $difference = $num1 - $num2;
        $product = $num1 * $num2;
        $quotient = $num2 != 0 ? $num1 / $num2 : 'undefined';

        echo "<h2>Results:</h2>";
        echo "<p>Sum: $sum</p>";
        echo "<p>Difference: $difference</p>";
        echo "<p>Product: $product</p>";
        echo "<p>Quotient: $quotient</p>";
    }
    ?>
</body>
</html>