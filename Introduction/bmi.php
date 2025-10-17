<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>BMI Calculator</h1>
    <form method="post" action="">
        <label for="weight">Weight (in kg):</label>
        <input type="number" id="weight" name="weight" step="0.1" required>
        <br>
        <label for="height">Height (in meters):</label>
        <input type="number" id="height" name="height" step="0.01" required>
        <br>
        <input type="submit" value="Calculate BMI">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST['weight'];
        $height = $_POST['height'];

        if ($height > 0) {
            $bmi = $weight / ($height * $height);
            echo "<h2>Your BMI is: " . number_format($bmi, 2) . "</h2>";
        } else {
            echo "<h2>Please enter a valid height.</h2>";
        }
    }
    ?>
</body>
</html>