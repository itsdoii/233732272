<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>
<body>
    <h1>Currency Converter</h1>
    <form method="post" action="">
        <label for="amount">Amount in PHP:</label>
        <input type="number" id="amount" name="amount" required>
        
        <label for="currency">Convert to:</label>
        <select id="currency" name="currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="JPY">JPY</option>
        </select>
        
        <button type="submit">Convert</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        
        $exchangeRates = [
            "USD" => 0.018, // Example exchange rate
            "EUR" => 0.017, // Example exchange rate
            "JPY" => 2.5    // Example exchange rate
        ];
        
        if (array_key_exists($currency, $exchangeRates)) {
            $convertedAmount = $amount * $exchangeRates[$currency];
            echo "<h2>Converted Amount: " . number_format($convertedAmount, 2) . " " . $currency . "</h2>";
        } else {
            echo "<h2>Invalid currency selected.</h2>";
        }
    }
    ?>
</body>
</html>