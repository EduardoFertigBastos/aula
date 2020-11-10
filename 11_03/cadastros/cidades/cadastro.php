<?php
    if(isset($_POST['gravar'])) {
        try {
            $sSql = ' INSERT INTO cidades
                                    (codigo, nome, estados)
                      VALUES (:codigo, :nome, :estado)';

            $stmt->conn->prepare($sSql);
            $stmt->execute(array(
                'codigo' => $_POST['codigo'],
                'nome'   => $_POST['nome'],
                'estado' => $_POST['estado'],
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
        <label for="nome"> Estado </label>
        <select name="estado" id="estado" class="form-control">
            <option value="">** Selecione **</option>
            <?php
            $sSql = 'SELECT *
                       FROM estados';
            $stmt = $conn->prepare($sSql);
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $estado) {
                echo '<option value="' . $estado['id'] . '"> ' . $estado['sigla'] . ' - ' . $estado['nome'] . ' </option>';
            }
            ?>
        </select>
    </div>

    <input type="submit" value="Gravar" name="gravar">
</form>