<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        /* Page basics */
        :root {
            --bg: #f5f7fb;
            --card: #ffffff;
            --accent: #2563eb;
            --muted: #6b7280;
            --danger: #dc2626;
            --radius: 8px;
            --shadow: 0 6px 18px rgba(15, 23, 42, 0.08);
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: linear-gradient(180deg, #eef2ff 0%, var(--bg) 100%);
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container {
            max-width: 640px;
            margin: 48px auto;
            background: var(--card);
            padding: 28px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid rgba(15, 23, 42, 0.03);
        }

        h1 {
            margin: 0 0 14px 0;
            font-size: 1.5rem;
            letter-spacing: -0.2px;
        }

        /* Form layout */
        form.calc-form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            align-items: center;
        }

        label {
            font-size: 0.95rem;
            color: var(--muted);
            display: block;
            margin-bottom: 6px;
        }

        input[type="number"],
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e6edf3;
            border-radius: 8px;
            background: #fbfdff;
            font-size: 1rem;
            color: #0f172a;
            transition: box-shadow 0.12s ease, border-color 0.12s ease;
            box-sizing: border-box;
        }

        input[type="number"]:focus,
        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: rgba(37,99,235,0.9);
            box-shadow: 0 4px 16px rgba(37,99,235,0.08);
        }

        .ops {
            margin-top: 8px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .ops button {
            appearance: none;
            -webkit-appearance: none;
            border: none;
            background: linear-gradient(180deg, rgba(37,99,235,0.95), rgba(37,99,235,0.9));
            color: #fff;
            padding: 10px 14px;
            font-size: 0.95rem;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.08s ease, box-shadow 0.08s ease, opacity 0.08s ease;
            box-shadow: 0 6px 14px rgba(37,99,235,0.12);
        }

        .ops button[title="Subtraction"],
        .ops button[value="sub"] {
            background: linear-gradient(180deg, rgba(6,95,70,0.95), rgba(6,95,70,0.9));
            box-shadow: 0 6px 14px rgba(6,95,70,0.08);
        }

        .ops button[title="Multiplication"],
        .ops button[value="mul"] {
            background: linear-gradient(180deg, rgba(99,102,241,0.95), rgba(99,102,241,0.9));
            box-shadow: 0 6px 14px rgba(99,102,241,0.08);
        }

        .ops button[title="Division"],
        .ops button[value="div"] {
            background: linear-gradient(180deg, rgba(211,54,130,0.95), rgba(211,54,130,0.9));
            box-shadow: 0 6px 14px rgba(211,54,130,0.08);
        }

        .ops button:hover { transform: translateY(-2px); opacity: 0.98; }
        .ops button:active { transform: translateY(0); }

        /* Result & messages */
        .message {
            margin-top: 14px;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 1rem;
        }
        .message.error {
            background: rgba(220,38,38,0.06);
            color: var(--danger);
            border: 1px solid rgba(220,38,38,0.12);
        }
        .message.result {
            background: linear-gradient(90deg, rgba(99,102,241,0.06), rgba(37,99,235,0.04));
            color: #0f172a;
            border: 1px solid rgba(15, 23, 42, 0.04);
            font-weight: 600;
            font-size: 1.05rem;
        }

        /* Responsiveness */
        @media (min-width: 720px) {
            form.calc-form {
                grid-template-columns: 1fr 1fr;
            }
            label[for="b"], #b {
                grid-column: 2 / 3;
            }
            .ops {
                grid-column: 1 / -1;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Calculator</h1>

        <form method="POST" action="" class="calc-form">
            <div>
                <label for="a">First number:</label>
                <input type="number" name="a" id="a" step="any" required value="<?php echo isset($_POST['a']) ? htmlspecialchars($_POST['a']) : ''; ?>">
            </div>

            <div>
                <label for="b">Second number:</label>
                <input type="number" name="b" id="b" step="any" required value="<?php echo isset($_POST['b']) ? htmlspecialchars($_POST['b']) : ''; ?>">
            </div>

            <div class="ops" role="group" aria-label="Operations">
                <button type="submit" name="op" value="add" title="Addition">Addition (+)</button>
                <button type="submit" name="op" value="sub" title="Subtraction">Subtraction (-)</button>
                <button type="submit" name="op" value="mul" title="Multiplication">Multiplication (×)</button>
                <button type="submit" name="op" value="div" title="Division">Division (÷)</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $a_raw = $_POST['a'] ?? '';
            $b_raw = $_POST['b'] ?? '';
            $op = $_POST['op'] ?? '';

            if (!is_numeric($a_raw) || !is_numeric($b_raw)) {
                echo "<div class='message error'>Please enter valid numbers.</div>";
            } else {
                $a = (float)$a_raw;
                $b = (float)$b_raw;
                $result = null;
                $symbol = '';

                switch ($op) {
                    case 'add':
                        $result = $a + $b;
                        $symbol = '+';
                        break;
                    case 'sub':
                        $result = $a - $b;
                        $symbol = '-';
                        break;
                    case 'mul':
                        $result = $a * $b;
                        $symbol = '×';
                        break;
                    case 'div':
                        if ($b == 0.0) {
                            echo "<div class='message error'>Cannot divide by zero.</div>";
                        } else {
                            $result = $a / $b;
                            $symbol = '÷';
                        }
                        break;
                    default:
                        echo "<div class='message error'>No operation selected.</div>";
                }

                if ($result !== null) {
                    echo "<div class='message result'>Result: " . htmlspecialchars($a_raw) . " {$symbol} " . htmlspecialchars($b_raw) . " = " . number_format($result, 2) . "</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>