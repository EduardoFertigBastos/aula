<?php
function vet($a) {
    echo'<pre>';
    var_dump($a);
    echo'</pre>';
}
function imprimirTabela($aCabec, $aResult)
{
    echo '<table class="table table-striped">
            <tr>';
            foreach ($aCabec as $linha) {
                echo '<th>' . $linha . '</th>';
            }
    echo '     <th colpasn="2">Ações</td>
            </tr>';

        if (count($aResult)) {
            foreach($aResult as $linha) {
                echo '<tr>';
                foreach ($linha as $coluna) {
                    echo '  <td> ' . $coluna . '</td>';
                }
                    echo '<td>';
                    echo '      <a href="#"> Alterar </a>';
                    echo '       | ';
                    echo '      <a href="#"> Excluir </a>';
                    echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '  <tr>
                        <td colspan="3">
                            Nenhum resultado foi encontrado
                        </td>
                    </tr>';
        }
}