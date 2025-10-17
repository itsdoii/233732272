<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Calculator</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Salary Calculator</h1>
        <form method="POST" action="">
            <label for="basic_salary">Basic Salary:</label>
            <input type="number" name="basic_salary" id="basic_salary" required>

            <label for="allowance">Allowance:</label>
            <input type="number" name="allowance" id="allowance" required>

            <label for="deduction">Deduction:</label>
            <input type="number" name="deduction" id="deduction" required>

            <button type="submit">Calculate Net Salary</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $basic_salary = $_POST['basic_salary'];
            $allowance = $_POST['allowance'];
            $deduction = $_POST['deduction'];

            $net_salary = $basic_salary + $allowance - $deduction;

            echo "<h2>Net Salary: $" . number_format($net_salary, 2) . "</h2>";
        }
        ?>
    </div>
</body>
</html>