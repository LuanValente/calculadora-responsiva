<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Luan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 90%;
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-top: 100px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .error {
            margin-top: 20px;
            text-align: center;
            color: #ff0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora Luan</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="number" name="num1" required>
            <select name="operator" required>
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
                <option value="power">^</option>
                <option value="sqrt">√</option>
                <option value="sin">sin</option>
                <option value="cos">cos</option>
                <option value="tan">tan</option>
                <option value="log">log</option>
            </select>
            <input type="number" name="num2" required>
            <input type="submit" value="Calcular">
        </form>
        <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    $result = 0;

    switch ($operator) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 == 0) {
                echo "Erro: divisão por zero não é permitida.";
                exit;
            }
            $result = $num1 / $num2;
            break;
        case 'power':
            $result = pow($num1, $num2);
            break;
        case 'sqrt':
            if ($num1 < 0) {
                echo "Erro: a raiz quadrada de um número negativo não é permitida.";
                exit;
            }
            $result = sqrt($num1);
            break;
        case 'sin':
            $result = sin($num1);
            break;
        case 'cos':
            $result = cos($num1);
            break;
        case 'tan':
            $result = tan($num1);
            break;
        case 'log':
            if ($num1 <= 0 || $num2 <= 0) {
                echo "Erro: o logaritmo de um número não positivo não é permitido.";
                exit;
            }
            $result = log($num1, $num2);
            break;
        default:
            echo "Erro: operador inválido.";
            exit;
    }

    echo "Resultado: " . $result;
}
?>
</body>
</html>