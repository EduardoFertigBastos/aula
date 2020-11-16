<?php

/**
 * Função só pra simplificar o var_dump.
 */
function vet($a)
{
    echo '<pre>';
        var_dump($a);
    echo '</pre>';
    die();
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
    echo        '<a href="' . LOCALHOST . '?pg=' . $_GET['pg']. '&alterar=' . $linha[0] . '"> Alterar </a>';
    echo        ' | ';
    echo        '<a href="' . LOCALHOST . '?pg=' . $_GET['pg']. '&deletar=' . $linha[0] . '"> Excluir </a>';
    echo        ' | ';
    echo        '<a href="' . LOCALHOST . '?pg=' . $_GET['pg']. '&visualizar=' . $linha[0] . '"> Visualizar </a>';
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

function redirecionar($sResto, $mensagem)
{
    $_SESSION['mensagem'] = $mensagem;
    header('Location: ' . LOCALHOST . '?pg=' . $sResto);
}

function escreverMensagem() 
{
    if (isset($_SESSION['mensagem'])) {
        echo '<p class="lead">' . $_SESSION['mensagem'] . '</p>';
        unset($_SESSION['mensagem']);
    }
}