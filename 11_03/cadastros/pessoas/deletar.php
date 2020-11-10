<?php
    if (isset($_POST['deletar'])) {
        try {
            $sSql = 'DELETE FROM pessoas
                      WHERE id = :id';
            $stmt = $conn->prepare($sSql);
            $stmt->execute(array('id' => $_GET['id']));

            echo '<div class="alert alert-success>
                    Sucesso, o registro foi deletado.
                </div>';

            exit();

        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    if (isset($_GET['pessoa'])) {
        $sSql = 'SELECT *
                   FROM pessoa
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