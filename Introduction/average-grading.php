<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Grading</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Average Grading Calculator</h1>
    <form method="post" action="">
        <label for="math">Math Score:</label>
        <input type="number" id="math" name="math" required><br>

        <label for="english">English Score:</label>
        <input type="number" id="english" name="english" required><br>

        <label for="science">Science Score:</label>
        <input type="number" id="science" name="science" required><br>

        <input type="submit" value="Calculate Average">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $math = $_POST['math'];
        $english = $_POST['english'];
        $science = $_POST['science'];

        $average = ($math + $english + $science) / 3;

        if ($average >= 90) {
            $grade = 'A';
        } elseif ($average >= 80) {
            $grade = 'B';
        } elseif ($average >= 70) {
            $grade = 'C';
        } elseif ($average >= 60) {
            $grade = 'D';
        } else {
            $grade = 'F';
        }

        echo "<h2>Your Average Score: " . number_format($average, 2) . "</h2>";
        echo "<h2>Your Grade: " . $grade . "</h2>";
    }
    ?>
</body>
</html>