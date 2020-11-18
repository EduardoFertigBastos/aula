<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>

    
    <?php
    session_start();

    $_SESSION['calculadora'] = $_SESSION['calculadora'] . $_POST['button'];
    
    $aCon = [];
    verificarApagar($_SESSION['calculadora']);
    verificarApagarUm($_SESSION['calculadora']);
    verificarIgual($_SESSION['calculadora']);
    
    imprimirConta($_SESSION['calculadora']);

    realizarCalculo($_SESSION['calculadora'], $_SESSION['conta']);
    /*
    Primeira função que usei, fazia 90% certo mas havia um equivoco numa multiplicação seguido de divisão.
    Deixo então exposto o meu fracasso.
    function calcularResultado(&$sConta, &$aCon)
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

        separarVetor($sConta, $aCon);
        verificarMultiplicaoDivisao($aCon);
        verificarAdicaoSubtracao($aCon);        
    }
    */
    
    function verificarApagar(&$sCalculadora)
    {
        if ($_POST['apagar']) {
            $sCalculadora = '';
            header("Refresh:0");
        }
    }

    function verificarApagarUm(&$sCalculadora)
    {
        if ($_POST['C']) {
            $sCalculadora = substr($sCalculadora, 0, -1);
        }
    }

    function verificarIgual(&$sCalculadora)
    {
        if ($_POST['=']) {
            $sCalculadora = eval('return ' . $sCalculadora . ';');
        }
    }

    function imprimirConta($sCalculadora)
    {
        echo '<input id="result" value="' . $sCalculadora . '"/>';
    }

    function realizarCalculo($sCalculadora, &$sResultado) {
        $sCaracter = substr($sCalculadora, -1);
    
        if (($sCaracter == '+') or ($sCaracter == '-') or ($sCaracter == '*') or ($sCaracter == '/') or ($sCaracter == '=')) {
            echo '<input id="vista" value="' . $sResultado . '"/><br />';
        } else {
            $sResultado = eval('return ' . $sCalculadora . ';');
            echo '<input id="vista" value="' . $sResultado . '"/><br />';
        }
    }
    
    ?>

        <form action="index.php" method="POST">

        <input type="submit" value="APAGAR" id="apagar" name="apagar">
        <input type="submit" value="C" id="C" name="C">
        <input type="submit" value="." id="button" name="button">
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
        <input type="submit" value="=" name="=">

        </form>
    <?php
    ?>
</body>

</html>