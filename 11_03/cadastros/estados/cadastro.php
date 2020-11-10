<?php
    if(isset($_POST['gravar'])) {
        try {
            $sSql = ' INSERT INTO estados
                                    (codigo, nome, siglas)
                      VALUES (:codigo, :nome, :siglas)';

            $stmt->conn->prepare($sSql);
            $stmt->execute(array(
                'codigo' => $_POST['codigo'],
                'nome'   => $_POST['nome'],
                'siglas' => $_POST['siglas'],
            ));
        } catch(PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
?>


<form method="post" action="">
    <div class="form-group">
        <label for="codigo"> Código </label>
        <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Código...">
    </div>

    <div class="form-group">
        <label for="nome"> Nome </label>
        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome...">
    </div>

    <div class="form-group">
        <label for="nome"> Sigla </label>
        <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Sigla...">
    </div>

    <input type="submit" value="Gravar" name="gravar">
</form>