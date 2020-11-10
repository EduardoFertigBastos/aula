<?php
    if (isset($_POST['deletar'])) {
        try {
            $sSql = 'UPDATE cidades
                        SET nome = :nome,
                            sigla = :sigla
                      WHERE id = :id';
            $stmt = $conn->prepare($sSql);
            $stmt->execute(array(
                'id' => $_GET['id'],
                'sigla' => $_GET['sigla'],
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

    if (isset($_GET['cidade'])) {
        $sSql = 'SELECT *
                   FROM cidades
                  WHERE id = :id';
        $stmt = $conn->prepare($sSql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        $stmt->execute();
        $pessoa = $stmt->fetchAll();
    }
?>

<form method="post" action="">
    <input type="text" name="nome" id="nome" value="<?=$cidade[0]['id'] - $cidade[0]['nome']?>" disabled>
    Deseja realmente excluir esse cadastro?
    <input type="submit" name="deletar" value="Deletar">
</form>