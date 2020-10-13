<?php
function executamosOsCara(&$aGrafo, &$aCaminho, $iVertices, $iInf, $iInicio, $iFim)  
{      
    for ($k = 0; $k < $iVertices; $k++) {  
        for ($i = 0; $i < $iVertices; $i++) {  
            for ($j = 0; $j < $iVertices; $j++) {  
                if ($aGrafo[$i][$k] + $aGrafo[$k][$j] < $aGrafo[$i][$j]) {
                    
                    $aGrafo[$i][$j] = $aGrafo[$i][$k] + $aGrafo[$k][$j];
                    
                    $aCaminho[$i][$j] = $aCaminho[$i][$k] . '-' . $aCaminho[$k][$j];
                }  
            }  
       }  
    }      
}  
  
function imprimirMatriz($aGrafo, $aCaminho, $iVertices, $iInf, $iInicio, $iFim)  
{  
    if ($aGrafo[$iInicio][$iFim] == $iInf) {
        echo 'Mesma Cidade de inicio e fim brother';
    } else {
        echo 'Custa ' . $aGrafo[$iInicio][$iFim] . 'L de gasolina e o caminho é: <br />';
        echo $aCaminho[$iInicio][$iFim] . '-' . $iFim;
    }    

}  

  
$iVertices  = 12; 
$iInf       = 99999; 
  
$aGrafo = [
    [    0,     3, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     5, $iInf,     9],
    [    3,     0,     4, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     5, $iInf],
    [$iInf,     4,     0,     3, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     6, $iInf],
    [$iInf, $iInf,     3,     0,     4, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     9],
    [$iInf, $iInf, $iInf,     4,     0,     5, $iInf, $iInf, $iInf, $iInf, $iInf,     8],
    [$iInf, $iInf, $iInf, $iInf,     5,     0,     4, $iInf, $iInf, $iInf, $iInf, $iInf],
    [$iInf, $iInf, $iInf, $iInf, $iInf,     4,     0,     2, $iInf, $iInf, $iInf,     3],
    [$iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     2,     0,     4, $iInf, $iInf,     5],
    [$iInf, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     4,     0,     6, $iInf, $iInf],
    [$iInf, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     6,     0, $iInf,     7],
    [$iInf,     5,     6, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf, $iInf,     0, $iInf],
    [    9, $iInf, $iInf,     9,     8, $iInf,     3,     5, $iInf,     7, $iInf,     0], 
];

$aDist = $aGrafo;

for ($x = 0; $x < 12; $x++) { 
    for ($y = 0; $y < 12; $y++) { 
        $aCaminho[$x][$y] = $x;
    }
}

$iInicio = 0; 
$iFim    = 5; 
executamosOsCara($aDist, $aCaminho, $iVertices, $iInf, $iInicio, $iFim);
imprimirMatriz($aDist, $aCaminho, $iVertices, $iInf, $iInicio, $iFim); 
 
  
?> 