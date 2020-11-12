<?php
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
        
    } catch(PDOException $e) {
        imprimirErro($e);
    }
?>

<div class="row justify-content-center mt-2">

    <div class="col-sm-12 col-md-8 col-lg-8 offset-sm-4 offset-md-2 offset-lg-2">

        <!-- Formulário para cadastro. -->
        <form method="post" action="<?= LOCALHOST .'?pg=categorias&metodo=cadastro'?>">
           
            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="nome"> Nome </label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="descricao"> Descrição </label>
                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="figura"> Figura </label>
                <input type="text" name="figura" class="form-control" id="figura" placeholder="Figura...">
            </div>
       
            <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">
            
        </form>      

    </div>

    <!-- Tabela Listagem -->
    <div class="col-10 mt-4">

        <?= imprimirTabela($aCabec, $aResult); ?> 

    </div>

</div>