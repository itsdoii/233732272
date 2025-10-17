<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Cost Estimator</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Travel Cost Estimator</h1>
    <form method="post" action="">
        <label for="distance">Distance (in km):</label>
        <input type="number" id="distance" name="distance" required>
        
        <label for="fuel_consumption">Fuel Consumption (km per liter):</label>
        <input type="number" id="fuel_consumption" name="fuel_consumption" required>
        
        <label for="fuel_price">Fuel Price (per liter):</label>
        <input type="number" id="fuel_price" name="fuel_price" required>
        
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $distance = $_POST['distance'];
        $fuel_consumption = $_POST['fuel_consumption'];
        $fuel_price = $_POST['fuel_price'];

        $liters_needed = $distance / $fuel_consumption;
        $total_cost = $liters_needed * $fuel_price;

        echo "<h2>Estimated Travel Cost: $" . number_format($total_cost, 2) . "</h2>";
    }
    ?>
</body>
</html>