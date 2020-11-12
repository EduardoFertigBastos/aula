<?php
function vet($a) {
    echo'<pre>';
    var_dump($a);
    echo'</pre>';
}

function imprimirErro($e) 
{
    echo 'Erro: ' . $e->getMessage();
}

function imprimirCabecalho($aCabec) 
{
    foreach ($aCabec as $linha) {
        echo '<th>' . $linha . '</th>';
    }
}

function imprimirColunas($linha) 
{
    foreach ($linha as $coluna) {
        echo    '<td> ' . $coluna . '</td>';
    }
        echo    '<td>';
        echo        '<a href="#"> Alterar </a>';
        echo        ' | ';
        echo        '<a href="#"> Excluir </a>';
        echo    '</td>';
}

function imprimirTabela($aCabec, $aResult)
{
    echo    '<table class="table table-striped">';
    echo        '<tr>';
                        imprimirCabecalho($aCabec);
    echo                '<th colpasn="2">Ações</td>';
    echo         '</tr>';

        if (count($aResult)) {
            foreach($aResult as $linha) {
                echo '<tr>';
                            imprimirColunas($linha);
                echo '</tr>';
            }
        } else {
            echo    '<tr>
                        <td colspan="3">
                            Nenhum resultado foi encontrado
                        </td>
                    </tr>';
        }
}