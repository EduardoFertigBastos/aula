<?php 

function insertArray(&$aMatriz, &$aPontos) 
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

    $aPontos = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
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

function verificarNovoCaminho(&$iResult, &$sCaminhoFinal, $sCaminho, &$iSoma, $aValores) 
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

function removeCidade(&$sCaminho, &$aCaminhosFechados) 
{
    $sCaminho = substr($sCaminho, 0, -2);
    array_pop($aCaminhosFechados);
}

function iniciarTrajeto(&$teste, $aMatriz, &$aValores, &$aCaminhosFechados, $iGrau, 
                        $iPontoInicio, &$iPontoMedio, $iPontoFim, $iResult, $sCaminho, $sCaminhoFinal)
{
    fala('<hr> Chamada: ' . $teste);
    $teste += 1;

    for ($x = 0; $x < $iGrau; $x++) {
        $iMatrizValorPonto = $aMatriz[$iPontoMedio][$x];

        if ($iMatrizValorPonto <> 0) {
            fala('Matriz[' . $iPontoMedio . '][' . $x . ']');
            

            if (in_array($x, $aCaminhosFechados) == false) {
                $iPontoMedio = $x;
                fala('<b style="font-size:24;">Cidade ' . $x . ' foi fechada.</b>');

                array_push($aCaminhosFechados, $iPontoMedio);
                array_push($aValores, $iMatrizValorPonto);
                $sCaminho = $sCaminho . '-'  . $iPontoMedio   ;

                if ($aCaminhosFechados[array_key_last($aCaminhosFechados)] == $iPontoFim) {
                    
                    verificarNovoCaminho($iResult, $sCaminhoFinal, $sCaminho, $iSoma, $aValores); 
                    
                    vet($aCaminhosFechados);
                    fala('<b style="font-size:24;">Cidade ' . substr($sCaminho, -1) . ' foi ABERTA.</b>');

                    removeCidade($sCaminho, $aCaminhosFechados);                    
                    falaCaminhos($aCaminhosFechados, $sCaminho);
                    
                } else {
                    falaCaminhos($aCaminhosFechados, $sCaminho);
                    iniciarTrajeto($teste, $aMatriz, $aValores, $aCaminhosFechados, 12, $iPontoInicio, $iPontoMedio, 
                                    $iPontoFim, $iResult, $sCaminho, $sCaminhoFinal);
                }

            } else {
                
            }           

            
        }        
    }
    
}

insertArray($aMatrizCusto, $aPontos);

definirCidades($iInicio, $iMedio, $iFim);

$iResult = 0;
$sCaminho = $iInicio;
$teste = 0;
$aCaminhosFechados[0] = $iInicio;
$aValores[0] = 0;
echo '<div style="font-size:20px;">';
iniciarTrajeto($teste, $aMatrizCusto, $aValores, $aCaminhosFechados, 12, $iInicio, $iMedio, $iFim, $iResult, $sCaminho, $sCaminhoFinal);