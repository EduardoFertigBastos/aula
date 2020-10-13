<?php 

function arranjarDados($aMatriz, &$aManyPaths, &$aPaths, $iGrau) 
{
    /**
     * [0] = Total de Caminhos disponíveis
     * [1] = Valores dos Caminhos disponíveis
     * [2] = 
     */

    for ($x = 0; $x < $iGrau; $x++) {
        $aManyPaths[$x] = 0; 

        for ($y = 0; $y < $iGrau; $y++) {
            if ($aMatriz[$x][$y] <> 0) {
                $aManyPaths[$x] = $aManyPaths[$x] + 1;
                $aPaths[$x][] = $y;
            }
        }
    }
    
}    

function insertArray(&$aMatriz) 
{
    //mudar [0,1][1,0] = 3
    $aMatriz = [
/*        0  1  2  3  4  5  6  7  8  9 10 11 */
/* 0 */  [0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 9],
/* 1 */  [0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 5, 0],
/* 2 */  [0, 4, 0, 3, 0, 0, 0, 0, 0, 0, 6, 0],
/* 3 */  [0, 0, 3, 0, 4, 0, 0, 0, 0, 0, 0, 9],
/* 4 */  [0, 0, 0, 4, 0, 5, 0, 0, 0, 0, 0, 8],
/* 5 */  [0, 0, 0, 0, 5, 0, 4, 0, 0, 0, 0, 0],
/* 6 */  [0, 0, 0, 0, 0, 4, 0, 2, 0, 0, 0, 3],
/* 7 */  [0, 0, 0, 0, 0, 0, 2, 0, 4, 0, 0, 5],
/* 8 */  [0, 0, 0, 0, 0, 0, 0, 4, 0, 6, 0, 0],
/* 9 */  [0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 7],
/*10 */  [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
/*11 */  [9, 0, 0, 9, 8, 0, 3, 5, 0, 7, 0, 0],
    ];

    
} 

function definirCidades(&$iInicio, &$iMedio, &$iFim) 
{
    $iInicio = 0;
    $iMedio  = $iInicio;
    $iFim    = 8;
}

function fala($porra) 
{
    echo $porra . '<br />';
}

function compararResultados(&$iResult, &$sCaminhoFinal, $sCaminho, &$iSoma, $aValores) 
{
    $iSoma = 0;

    for ($y = 0; $y < sizeof($aValores); $y++) {
        $iSoma = $iSoma + $aValores[$y];
    }

    if ($iResult < $iSoma) {
        $iResult = $iSoma;
        $sCaminhoFinal = $sCaminho;
    }
}

function falaFim($sCaminho, $iSoma, $sCaminhoFinal, $iResult) 
{
    fala('Caminho: ' .$sCaminho);
    fala('Resultado: ' .$iSoma);
    fala('CAMINHO FINAL: ' .$sCaminhoFinal);
    fala('RESULTADO FINAL: ' .$iResult);
}

function falaCaminhos($aCaminhosFechados, $sCaminho) 
{    
    vet($aCaminhosFechados);
    fala($sCaminho);
}

function vet($vetor) 
{
    echo '<pre>';
        var_dump($vetor);
    echo '</pre>';
}

function removeCidade(&$sCaminho, &$aCaminhosFechados, $iVezes) 
{
    fala('*****************************');
    fala('CAMINHO <b> ANTES </b>');
    fala($sCaminho);
    for ($x = 0; $x < $iVezes; $x++) {
        $sCaminho = substr($sCaminho, 0, -2);
        array_pop($aCaminhosFechados);
    }
    fala($sCaminho);
    fala('CAMINHO <b> DEPOIS </b>');
    fala('*****************************');
}

function descobrirCaminhos($iCh, $aManyPaths, $aPaths, $iGrau, $iInicio, $iMedio, $iFim, $aPathsTotal)
{
    $iCh += $iCh;
    vet($aManyPaths[$iInicio]);
    vet($aPaths[$iInicio]);
    vet($aPathsTotal);
    for ($x = 0; $x < $aManyPaths[$iInicio]; $x++) {
        $aStringBroken = explode('-', $aPathsTotal[array_key_last($aPathsTotal)]);
        $bRep = false;

        for ($y = 0; $y < sizeof($aStringBroken); $y++) { 
            if ($aPathsTotal[array_key_last($aPathsTotal)] == $aStringBroken[$y]) {
                $bRep = true;
            }
        }
        fala('<hr>');
        vet($aStringBroken);
        fala('<hr>');
        
        if ($bRep == false) {
            $aPathsTotal[] = $aPathsTotal[array_key_last($aPathsTotal) - $x] . $aPaths[$iMedio][$x] . '-';
        }

        if (($aStringBroken[array_key_last($aStringBroken)] <> $iFim)) {
            if ($iCh > 30) {
                return;
            }
            fala($aPaths[$iMedio][$x]);
            descobrirCaminhos($iCh, $aManyPaths, $aPaths, $iGrau, $iInicio, $aPaths[$iMedio][$x], $iFim, $aPathsTotal);
        }
    }

    $iInicio == $iMedio ? array_shift($aPathsTotal) : '' ;    
    
    vet($aPathsTotal);
}
