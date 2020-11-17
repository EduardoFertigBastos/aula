<?php

/**
 * Busca o registro que será visualizado.
 */
function colherDadosCampos($conn)
{
    $sSql = "SELECT *
               FROM transportadoras
              WHERE IDTransportadora = :id";
                        
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
            <input type="text" value="' . $aValores[1] . '" 
            name="nome" class="form-control" id="nome" disabled>
        </div>

        <div class="form-group col-sm-8 col-md-10 col-lg-8">
            <label for="telefone"> Telefone </label>
            <input type="text" value="' . $aValores[2]. '" minlength="8" name="telefone" 
                    class="form-control" id="telefone" disabled>
        </div>
        
        <a href="' . LOCALHOST .'?pg=transportadoras" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2 mt-1">
            Voltar
        </a>';
}
