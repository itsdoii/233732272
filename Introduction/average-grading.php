<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Grading</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        :root{
            --card-bg: #ffffff;
            --accent: #4CAF50;
            --muted: #6b7280;
            --page-bg: linear-gradient(120deg,#f3f7ff 0%, #f7fff5 100%);
        }
        html,body{
            height:100%;
            margin:0;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            background: var(--page-bg);
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
        }
        .wrap{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:24px;
        }
        .card{
            background:var(--card-bg);
            width:100%;
            max-width:420px;
            border-radius:12px;
            padding:24px;
            box-shadow:0 10px 30px rgba(16,24,40,0.08);
            box-sizing:border-box;
        }
        h1{
            margin:0 0 12px 0;
            font-size:1.4rem;
            text-align:center;
            color:#111827;
        }
        .hint{
            text-align:center;
            font-size:0. nine rem;
            color:var(--muted);
            margin-bottom:18px;
        }
        label{
            display:block;
            font-weight:600;
            margin-bottom:6px;
            color:#111827;
            font-size:0.95rem;
        }
        input[type="number"]{
            width:100%;
            padding:10px 12px;
            border:1px solid #e6e9ef;
            border-radius:8px;
            font-size:0.95rem;
            margin-bottom:12px;
            box-sizing:border-box;
            transition:box-shadow .15s, border-color .15s;
        }
        input[type="number"]:focus{
            outline:none;
            border-color:rgba(76,175,80,0.6);
            box-shadow:0 4px 14px rgba(76,175,80,0.08);
        }
        .actions{
            margin-top:6px;
        }
        input[type="submit"]{
            width:100%;
            padding:10px 14px;
            background:var(--accent);
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-weight:700;
            font-size:1rem;
            transition:transform .08s ease, background .12s ease;
        }
        input[type="submit"]:hover{ background:#43a047; transform:translateY(-1px); }
        .result{
            margin-top:16px;
            padding:14px;
            border-radius:8px;
            background:linear-gradient(180deg, #f8fff6 0%, #ffffff 100%);
            border-left:4px solid var(--accent);
            text-align:center;
        }
        .result h2{ margin:4px 0; font-size:1.05rem; color:#0f172a; }
        .result .score{ font-weight:700; font-size:1.2rem; color:var(--accent); }
        @media (max-width:420px){
            .card{ padding:18px; border-radius:10px; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <main class="card">
            <h1>Average Grading Calculator</h1>
            <p class="hint">Enter scores (0 - 100) and press Calculate.</p>

            <form method="post" action="">
                <label for="math">Math Score:</label>
                <input type="number" id="math" name="math" min="0" max="100" required>

                <label for="english">English Score:</label>
                <input type="number" id="english" name="english" min="0" max="100" required>

                <label for="science">Science Score:</label>
                <input type="number" id="science" name="science" min="0" max="100" required>

                <div class="actions">
                    <input type="submit" value="Calculate Average">
                </div>
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

                echo '<div class="result">';
                echo "<h2>Your Average Score: <span class=\"score\">" . number_format($average, 2) . "</span></h2>";
                echo "<h2>Your Grade: " . $grade . "</h2>";
                echo '</div>';
            }
            ?>
        </main>
    </div>
</body>
</html>