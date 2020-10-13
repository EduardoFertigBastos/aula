<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAIXEIRO DA DESGRAÇA</title>
    <style>
        body {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <?php
        require_once 'estrutura.php';

        definirCidades($iInicio, $iMedio, $iFim);

        $iGrau = 12;
        $iResult = 0;
        $sCaminho = $iInicio;
        $teste = 0;
        $aCaminhosFechados[0] = $iInicio;
        $aValores[0] = 0;
        $aCaminhosFinalizados[] = $iInicio . '-';
        $iChamada = 1;
    
        insertArray($aMatrizCusto);
        arranjarDados($aMatrizCusto, $aQtddCaminhos, $aCaminhos, $iGrau);        
        descobrirCaminhos($iChamada, $aQtddCaminhos, $aCaminhos, 12, $iInicio, $iMedio, $iFim, $aCaminhosFinalizados);

        
    ?>
</body>
</html>