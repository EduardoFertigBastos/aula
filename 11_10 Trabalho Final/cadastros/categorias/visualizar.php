<?php

/**
 * Busca o registro que será visualizado.
 */
function colherDadosCampos($conn)
{
    $sSql = "SELECT *
               FROM categorias
              WHERE IDCategoria = :id";
                        
    $stmt = $conn->prepare($sSql);

    $stmt->bindParam(':id', $_GET['visualizar'], PDO::PARAM_INT);
    $stmt->execute();

    return  $stmt->fetchAll(PDO::FETCH_NUM);
}

/**
 * Menu para Cadastro
 */
function mostrarRegistro($aValores) 
{
    echo '<div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="nome"> Nome </label>
                <input type="text" name="nome" value="' . $aValores[1] . '" class="form-control" id="nome" disabled>
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="descricao"> Descrição </label>
                <input type="text" name="descricao" value="' . $aValores[2] . '" class="form-control" id="descricao" disabled>
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="figura"> Figura </label>
                <input type="text" name="figura" value="' . $aValores[3] . '" class="form-control" id="figura" disabled>
            </div>
            <a href="' . LOCALHOST .'?pg=categorias" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2 mt-1">
                Voltar
            </a>';
}
