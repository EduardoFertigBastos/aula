<?php

    try {
        require_once BIBLIOTECAS . 'estrutura.php';
        if (isset($id)) {
            $id = $_GET['id'];

            $sSql = 'SELECT *
                       FROM categorias
                      WHERE id = :id';
            $stmt = $conn->prepare($sSql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {

            $sSql = "SELECT categorias.IDCategoria     as 'Código',
                            categorias.NomeCategoria   as 'Nome',
                            categorias.Descricao       as 'Descrição'
                      FROM trabalhofinal.categorias";
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
        ?>
        
        </table>
        <?php
    } catch(PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }