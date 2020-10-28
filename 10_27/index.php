<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        input {
            width: 30px;
        }

        #apagar {
            width: 168px;
        }
    </style>
</head>

<body>

    <form action="index.php" method="POST">

        <input type="submit" value="APAGAR" id="apagar" name="apagar">
        <br />
        <input type="submit" value="7" name="button">
        <input type="submit" value="8" name="button">
        <input type="submit" value="9" name="button">
        <input type="submit" value="+" name="button">
        <input type="submit" value="-" name="button">

        <br />

        <input type="submit" value="4" name="button">
        <input type="submit" value="5" name="button">
        <input type="submit" value="6" name="button">
        <input type="submit" value="*" name="button">
        <input type="submit" value="/" name="button">

        <br />

        <input type="submit" value="0" name="button">
        <input type="submit" value="1" name="button">
        <input type="submit" value="2" name="button">
        <input type="submit" value="3" name="button">
        <input type="submit" value="=" name="button">

    </form>

    <?php
    session_start();

    $_SESSION['calculadora'] = $_SESSION['calculadora'] . $_POST['button'];
    echo '<br>Calculadora: ' . $_SESSION['calculadora'] . '<br>';

    calcularResultado($_SESSION['calculadora']);
    verificarApagar($_POST['apagar'], $_SESSION['calculadora']);


    function calcularResultado(&$sConta)
    {
        function separarVetor($sConta, &$aCon)
        {
            $iNum = '';
            for ($x = 0; $x < strlen($sConta); $x++) {
                if (($sConta[$x] == '+') or
                    ($sConta[$x] == '-') or
                    ($sConta[$x] == '*') or
                    ($sConta[$x] == '/') or
                    ($sConta[$x] == '=')
                ) {
                    $aCon[] = $iNum;
                    $aCon[] = $sConta[$x];
                    $iNum = '';
                } else {
                    $iNum = $iNum . $sConta[$x];
                }
            }
        }

        function verificarMultiplicaoDivisao(&$aCon)
        {
            for ($x = 0; $x < sizeof($aCon); $x++) {
                if ($aCon[$x] == '*') {
                    $aCon[$x] = $aCon[$x - 1] * $aCon[$x + 1];
                    unset($aCon[$x - 1]);
                    unset($aCon[$x + 1]);
                }

                if ($aCon[$x] == '/') {
                    $aCon[$x] = $aCon[$x - 1] / $aCon[$x + 1];
                    unset($aCon[$x - 1]);
                    unset($aCon[$x + 1]);
                }
            }
        }

        function verificarAdicaoSubtracao(&$aCon)
        {
            for ($x = 0; $x < sizeof($aCon); $x++) {
                if ($aCon[$x] == '+') {
                    $aCon[$x] = $aCon[$x - 1] + $aCon[$x + 1];
                    unset($aCon[$x - 1]);
                    unset($aCon[$x + 1]);
                }

                if ($aCon[$x] == '-') {
                    $aCon[$x] = $aCon[$x - 1] - $aCon[$x + 1];
                    unset($aCon[$x - 1]);
                    unset($aCon[$x + 1]);
                }
            }
        }

        function verificarIgual($sIgual, $aCon)
        {
            if ($sIgual == '=') {
                echo '<br>Resultado: ' . array_sum($aCon) . '<br/>';
            }
        }

        separarVetor($sConta, $aCon);
        verificarMultiplicaoDivisao($aCon);
        verificarAdicaoSubtracao($aCon);

        verificarIgual($aCon[array_key_last($aCon)], $aCon);
    }

    function verificarApagar($sApagar, &$sCalculadora)
    {
        if ($sApagar == 'APAGAR') {
            $sCalculadora = '';
            header("Refresh:0");
        }
    };

    ?>
</body>

</html>