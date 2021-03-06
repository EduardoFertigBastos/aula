<?php
    if (isset($_POST['deletar'])) {
        try {
            $sSql = 'UPDATE estados
                        SET nome = :nome
                      WHERE id = :id';
            $stmt = $conn->prepare($sSql);
            $stmt->execute(array(
                'id' => $_GET['id'], 
                'nome' => $_POST['nome']
            ));

            echo '<div class="alert alert-success>
                    Sucesso, o registro foi deletado.
                </div>';

            exit();

        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    if (isset($_GET['estado'])) {
        $sSql = 'SELECT *
                   FROM estados
                  WHERE id = :id';
        $stmt = $conn->prepare($sSql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        $stmt->execute();
        $pessoa = $stmt->fetchAll();
    }
?>

<form method="post" action="">
    <input type="text" name="nome" id="nome" value="<?=$pessoa[0]['id'] - $pessoa[0]['nome']?>" disabled>
    Deseja realmente excluir esse cadastro?$_GET
    <input type="submit" name="deletar" value="Deletar">
</form>