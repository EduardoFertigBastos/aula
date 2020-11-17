<?php

/**
 * Listar todos os Registros
 */
function listarRegistros($conn, &$aResult, &$aCabec)
{
    try {    
        $sSql = "SELECT IDCategoria     as 'Código',
                        NomeCategoria   as 'Nome',
                        Descricao       as 'Descrição'
                   FROM categorias";
        
        $stmt = $conn->prepare($sSql);

        $stmt->execute();

        $aResult = $stmt->fetchAll(PDO::FETCH_NUM);

        $aCabec = [
            'Código',
            'Nome',
            'Descrição',
        ];
        
    } catch(PDOException $e) {
        imprimirErro($e);
    }
}
?>

