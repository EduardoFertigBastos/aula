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

    // Concatena os caracteres pressionados.
    $_SESSION['calculadora'] = $_SESSION['calculadora'] . $_POST['button'];    

    verificarApagar($_SESSION['calculadora']);
    verificarApagarUm($_SESSION['calculadora']);

    calcularResultado($_SESSION['calculadora']);

    /**
     * Função que calcula o Resultado.
     */
    function calcularResultado(&$sCalculadora)
    {
        $aCon = [];

        /**
         * Separa a string em um Vetor em Número 1, Operador, Número 2.
         */
        function separarVetor(&$sConta, &$aCon)
        {
            $iNum = '';
            $iCont = 0;
            $iLimite = 1;
            $bPrimeiroPositivo = true;
            $bSegundoPositivo  = true;
            $bAux  = false;
            $bAux2 = false;

            // Percorre toda a string.
            for ($x = 0; $x < strlen($sConta); $x++) {
                
                // Se o caracter for um sinal...
                if (($sConta[$x] == '+') or ($sConta[$x] == '-') or
                    ($sConta[$x] == '*') or ($sConta[$x] == '/') or 
                    ($sConta[$x] == '=')) {
                    
                    // Verifica se o primeiro número é negativo
                    if ($bAux == false) {
                        if ($sConta[0] == '-') {
                            $bPrimeiroPositivo = false;
                            $iLimite = 2;
                        } else {
                            $bPrimeiroPositivo = true;
                        }   
                        $bAux = true;
                    }                    
                   
                    // Verifica se o segundo número é negativo.
                    for ($y = 0; $y < strlen($sConta); $y++) {
                        if (($sConta[$y] == '+') or ($sConta[$y] == '-') or
                            ($sConta[$y] == '*') or ($sConta[$y] == '/')) {

                                if ($sConta[$y + 1] == '-') {
                                    if ($bAux2 == false) {
                                        $bSegundoPositivo = false;
                                        $bAux2 = true;      
                                        $iSimb = $y;    
                                        if ($bPrimeiroPositivo == true) {
                                            $iLimite = 2;
                                        } else {
                                            $iLimite = 3;
                                        }                           
                                    }
                                }
                            }
                    }
                    // Aumenta a contagem de operadores envolvidos na equação.
                    $iCont = $iCont + 1;
                    
                    // Inclui no vetor caso seja o primeiro número a ser digitado.
                    if ($iCont == $iLimite) {
                        $aCon[0] = $iNum;
                        $aCon[1] = $sConta[$x];
                    }                    

                    // Inclui no vetor caso o primeiro número já exista no vetor.
                    if ($iCont == $iLimite + 1) {

                        $aCon[2] = substr($iNum, strlen($aCon[0]));
 
                        if ($bSegundoPositivo == false) {
                            $aCon[1] = $sConta[$iSimb];
                        }

                        resolverConta($aCon, $bPrimeiroPositivo, $bSegundoPositivo);

                        // Verifica se o botão pressionado foi '='.
                        if (($sConta[$x] == '=')) {
                            
                            $sConta = $aCon[0];
                            $iCont  = 0;
                            unset($aCon);
                            
                        } else {
                            if ($bSegundoPositivo == true) {
                                $aCon[1] = $sConta[$x];
                            } 

                            $sConta = $aCon[0] . $sConta[$x];
                            $iCont  = 1;                                
                            $aCon[2] = 0;                                                     
                        }
                    }
                    
                    // Se entrar na condição, o número é resetado, afinal ele já 
                    // foi quebrado e inserido no vetor anteriormente.
                    if ((!(($iCont == 0) and ($sConta[0] == '-') and ($x == 0)))
                        and (($bSegundoPositivo == true) and ($sConta[$x] == '-'))) {

                        $iNum    = '';
                    } 
                    
                } else {
                    //Concatena o número. 
                    $iNum = $iNum . $sConta[$x];
                }
            }
        }

        /**
         * Função antiga pra verificar se o botão era '='. 
         * Não é mais usada. 
         */
        function verificarIgual(&$sCalculadora, &$aCon)
        {
            if ($_POST['=']) {
                $sCalculadora = $aCon[0];
                unset($aCon);
            }
        }
       
        
        separarVetor($sCalculadora, $aCon);
    }

    /**
     * Função para calcular a conta.
     */
    function resolverConta(&$aCon, $bPrimeiroPositivo, $bSegundoPositivo)
    {
        // Verifica se o primeiro ou se o segundo número são positivos.
        $bPrimeiroPositivo ? $aCon[0] : $aCon[0] = 0 - floatval($aCon[0]);
        $bSegundoPositivo  ? $aCon[2] : $aCon[2] = 0 - floatval($aCon[2]);
  
        if ($aCon[1] == '+') {
            $aCon[0] = $aCon[0] + $aCon[2];
        }
        
        if ($aCon[1] == '-') {
            $aCon[0] = $aCon[0] - $aCon[2];
        }
        
        if ($aCon[1] == '*') {
            $aCon[0] = $aCon[0] * $aCon[2];
        }

        if ($aCon[1] == '/') {
            $aCon[0] = $aCon[0] / $aCon[2];
        }
        $_SESSION['resultado']   = $aCon[0];
    }
    
    /**
     * Função para deixar o var_dump mais fácil de ser lido.
     */
    function vet($e) 
    {
        echo '<pre>';
             var_dump($e); 
        echo '</pre>';
    }

    /**
     * Função para apagar tudo.
     */
    function verificarApagar(&$sCalculadora)
    {
        if ($_POST['apagar']) {
            $sCalculadora = '';
            $_SESSION['resultado'] = '';
            header("Refresh:0");
        }
    }

    /**
     * Função para apagar o último digito.
     */
    function verificarApagarUm(&$sCalculadora)
    {
        if ($_POST['C']) {
            $sCalculadora = substr($sCalculadora, 0, -1);
        }
    }

    /**
     * Função para facilitar o debug.
     */
    function console_log($data){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

      /**
       * Inputs que mostram a conta, e o resultado salvo anteriormente, respectivamente.
       */
      echo '<input type="text" id="result" value="' . $_SESSION['calculadora'] . '">';
      echo '<input type="text" id="vista" value="' . $_SESSION['resultado'] . '">';
    ?>

        <!-- Calculadora -->
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
            <input type="submit" value="=" name="button">

        </form>
</body>
</html>