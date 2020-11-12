<?php

/**
 * Função só pra simplificar o var_dump.
 */
function vet($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

/**
 * Função pra imprimir os erros.
 */
function imprimirErro($e)
{
    echo 'Erro: ' . $e->getMessage();
}

/**
 * Função pra criar cabeçalho de tabelas dinamicamente.
 */
function imprimirCabecalho($aCabec)
{
    foreach ($aCabec as $linha) {
        echo '<th>' . $linha . '</th>';
    }
}

/**
 * Função pra imprimir os dados nas colunas da tabela.
 */
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

/**
 * Função pra imprimir a Tabela
 */
function imprimirTabela($aCabec, $aResult)
{
    /**
     * Cabeçalho
     */
    echo    '<table class="table table-striped">';
    echo        '<tr>';
                        imprimirCabecalho($aCabec);
    echo                '<th colpasn="2">Ações</td>';
    echo         '</tr>';

    /**
     * Dados
     */
    if (count($aResult)) {
        foreach ($aResult as $linha) {
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

function botaoSubmit() {
    echo    '<div class="col-sm-12 col-md-8 col-lg-8 offset-sm-4 offset-md-2 offset-lg-2">
        
                <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">
                
            </div>';
}