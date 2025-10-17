<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Simulation</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Bank Account Simulation</h1>
    <form method="post" action="">
        <label for="initial_balance">Initial Balance:</label>
        <input type="number" id="initial_balance" name="initial_balance" required><br>

        <label for="deposit">Deposit Amount:</label>
        <input type="number" id="deposit" name="deposit" required><br>

        <label for="withdrawal">Withdrawal Amount:</label>
        <input type="number" id="withdrawal" name="withdrawal" required><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $initial_balance = $_POST['initial_balance'];
        $deposit = $_POST['deposit'];
        $withdrawal = $_POST['withdrawal'];

        $new_balance = $initial_balance + $deposit - $withdrawal;

        echo "<h2>Transaction Summary</h2>";
        echo "<p>Initial Balance: $" . number_format($initial_balance, 2) . "</p>";
        echo "<p>Deposit Amount: $" . number_format($deposit, 2) . "</p>";
        echo "<p>Withdrawal Amount: $" . number_format($withdrawal, 2) . "</p>";
        echo "<p>New Balance: $" . number_format($new_balance, 2) . "</p>";
    }
    ?>
</body>
</html>