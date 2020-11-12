<?php
    if(isset($_POST['gravar'])) {
        try {
            /**
             * Buscar último ID inserido no banco ja que esta tabela não é auto_increment.
             */
            $sSql = "SELECT IDCategoria 
               FROM categorias
              ORDER BY IDCategoria DESC
              LIMIT 1;";
        
            $stmt = $conn->prepare($sSql);
            $stmt->execute();            
            $aResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $iUltimoID = intval($aResult[0]['IDCategoria']) + 1;

            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = ' INSERT INTO categorias (IDCategoria, NomeCategoria, Descricao, Figura)
                      VALUES (:id, :nome, :descricao, :figura)';
                      
            $stmt = $conn->prepare($sSql);
           
            $stmt->execute([
                ':id'        => $iUltimoID,
                ':nome'      => $_POST['nome'],
                ':descricao' => $_POST['descricao'],
                ':figura'    => $_POST['figura']
            ]);
            
            /**
             * Redirecionar para a listagem.
             */
            header('Location: ' . LOCALHOST . 'categorias?pg=categorias&metodo=listagem');
        } catch(PDOException $e) {
            imprimirErro($e);
        }
    }

    
?>

<!-- Formulário para cadastro. -->

<form method="post" action="<?= LOCALHOST .'?pg=categorias&metodo=cadastro'?>">
    <div class="form-group">
        <label for="nome"> Nome </label>
        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome...">
    </div>

    <div class="form-group">
        <label for="descricao"> Descrição </label>
        <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição...">
    </div>

    <div class="form-group">
        <label for="figura"> Figura </label>
        <input type="text" name="figura" class="form-control" id="figura" placeholder="Figura...">
    </div>

    <input type="submit" value="Gravar" name="gravar">
</form>