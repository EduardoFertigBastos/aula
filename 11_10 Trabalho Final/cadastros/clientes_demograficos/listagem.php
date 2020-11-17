<?php

/**
 * Listar todos os Registros
 */
function listarRegistros($conn, &$aResult, &$aCabec)
{
    try {    
        $sSql = "SELECT IDTipoCliente    as 'Código',
                        DescricaoCliente as 'Nome'
                   FROM clientes_demograficos";
        
        $stmt = $conn->prepare($sSql);

        $stmt->execute();

        $aResult = $stmt->fetchAll(PDO::FETCH_NUM);

        $aCabec = [
            'Código',
            'Descrição',
        ];
        
    } catch(PDOException $e) {
        imprimirErro($e);
    }
}
?>

