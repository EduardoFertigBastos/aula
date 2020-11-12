<?php
    require_once BIBLIOTECAS . 'estrutura.php';

    try {        
        if (isset($id)) {
            $id = $_GET['id'];

            $sSql = 'SELECT *
                       FROM categorias
                      WHERE id = :id';

            $stmt = $conn->prepare($sSql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {

            $sSql = "SELECT IDCategoria     as 'Código',
                            NomeCategoria   as 'Nome',
                            Descricao       as 'Descrição'
                       FROM categorias";
        
            $stmt = $conn->prepare($sSql);
        }

        $stmt->execute();

        $aResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $aCabec = [
            'Código',
            'Nome',
            'Descrição',
        ];

        imprimirTabela($aCabec, $aResult);
        
    } catch(PDOException $e) {
        imprimirErro($e);
    }