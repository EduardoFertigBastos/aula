fala('<hr>');
    for ($x = 0; $x < $iGrau; $x++) {
        $iMatrizValorPonto = $aMatriz[$iPontoMedio][$x];

        if ($iMatrizValorPonto <> 0) {
            fala('Matriz[' . $iPontoMedio . '][' . $x . ']');
            

            if (in_array($x, $aCaminhosFechados) == false) {
                $iPontoMedio = $x;
                fala('<b>Cidade ' . $x . ' foi fechada.</b>');

                array_push($aCaminhosFechados, $iPontoMedio);
                array_push($aValores, $iMatrizValorPonto);
                $sCaminho = $sCaminho . '-'  . $iPontoMedio   ;

                if ($aCaminhosFechados[array_key_last($aCaminhosFechados)] == $iPontoFim) {
                    
                    compararResultados($iResult, $sCaminhoFinal, $sCaminho, $iSoma, $aValores); 
                    
                    // Tenho que arrumar aqui, para ajustar a questão da remoção e fechar
                    $iVezes = 1;
                    removeCidade($sCaminho, $aCaminhosFechados, $iVezes);                    
                }
                
                falaCaminhos($aCaminhosFechados, $sCaminho);
                iniciarTrajeto($teste, $aMatriz, $aValores, $aCaminhosDisponiveis, $aCaminhosFechados, 12,
                                    $iPontoInicio, $iPontoMedio, $iPontoFim, $iResult, $sCaminho, $sCaminhoFinal);
                
            }
        }        
    }