<?php

/**
 * Listar todos os Registros
 */
function listarRegistros($conn, &$aResult, &$aCabec)
{
    try {    
        $sSql = "SELECT IDRegiao        as 'Código',
                        DescricaoRegiao as 'Nome'
                   FROM regiao";
        
        $stmt = $conn->prepare($sSql);

        $stmt->execute();

        $aResult = $stmt->fetchAll(PDO::FETCH_NUM);

        $aCabec = [
            'Código',
            'Nome',
        ];
        
    } catch(PDOException $e) {
        imprimirErro($e);
    }
}
?>

