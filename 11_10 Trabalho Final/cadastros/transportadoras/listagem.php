<?php
/**
 * Listar todos os Registros
 */
function listarRegistros($conn, &$aResult, &$aCabec)
{
    try {    
        $sSql = "SELECT IDTransportadora as 'Código', 
                        NomeConpanhia    as 'Nome',
                        Telefone         as 'Telefone'
                   FROM transportadoras";
        
        $stmt = $conn->prepare($sSql);

        $stmt->execute();

        $aResult = $stmt->fetchAll(PDO::FETCH_NUM);

        $aCabec = [
            'Código',
            'Nome',
            'Telefone',
        ];
        
    } catch(PDOException $e) {
        imprimirErro($e);
    }
}
?>

