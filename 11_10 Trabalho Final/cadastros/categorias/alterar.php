<?php

function colherDadosCampos($conn)
{
    $sSql = "SELECT *
               FROM categorias
              WHERE IDCategoria = :id";
                        
    $stmt = $conn->prepare($sSql);

    $stmt->bindParam(':id', $_GET['alterar'], PDO::PARAM_INT);
    $stmt->execute();

    return  $stmt->fetchAll(PDO::FETCH_NUM);
}

/**
 * Menu para Cadastro
 */
function menuAlterar($aValores) 
{
    echo '<form method="post" action="' . LOCALHOST .'?pg=categorias&metodo=listagem&alterar=' . $aValores[0] . '">
           
            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="nome"> Nome </label>
                <input type="text" name="nome" value="' . $aValores[1] . '" class="form-control" id="nome" placeholder="Nome...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="descricao"> Descrição </label>
                <input type="text" name="descricao" value="' . $aValores[2] . '" class="form-control" id="descricao" placeholder="Descrição...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="figura"> Figura </label>
                <input type="text" name="figura" value="' . $aValores[3] . '" class="form-control" id="figura" placeholder="Figura...">
            </div>
       
            <input type="submit" value="Alterar" name="alterar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">
            
        </form>'; 
}

function alterarBanco($conn)
{
    if(isset($_POST['alterar'])) {
        try {
            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = "UPDATE categorias
                        SET NomeCategoria   = :nome,
                            Descricao       = :descricao,
                            figura          = :figura
                    WHERE IDCategoria = :id;";
            $stmt = $conn->prepare($sSql);
            $stmt->execute([
                ':id'        => $_GET['alterar'],
                ':nome'      => $_POST['nome'],
                ':descricao' => $_POST['descricao'],
                ':figura'    => $_POST['figura']
            ]);

            /**
             * Redirecionar para a listagem.
             */
            redirecionar(
                'categorias', 
                'Registro alterado com sucesso.'
            );
        } catch(PDOException $e) {
            imprimirErro($e);
        }   
    }
}

alterarBanco($conn);