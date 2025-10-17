<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rectangle Calculator</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Rectangle Calculator</h1>
    <form method="post" action="">
        <label for="length">Length:</label>
        <input type="number" id="length" name="length" required>
        <br>
        <label for="width">Width:</label>
        <input type="number" id="width" name="width" required>
        <br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $length = $_POST['length'];
        $width = $_POST['width'];

        $area = $length * $width;
        $perimeter = 2 * ($length + $width);

        echo "<h2>Results:</h2>";
        echo "<p>Area: " . $area . " square units</p>";
        echo "<p>Perimeter: " . $perimeter . " units</p>";
    }
    ?>
</body>
</html>