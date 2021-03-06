<?php

/**
 * Busca os dados do registro que será alterado.
 */
function colherDadosCampos($conn)
{
    $sSql = "SELECT *
               FROM transportadoras
              WHERE IDTransportadora = :id";
                        
    $stmt = $conn->prepare($sSql);

    $stmt->bindParam(':id', $_GET['alterar'], PDO::PARAM_INT);
    $stmt->execute();

    return  $stmt->fetchAll(PDO::FETCH_NUM);
}

/**
 * Menu para Cadastro.
 */
function menuAlterar($aValores) 
{
    echo '<form method="post" action="' . LOCALHOST .'?pg=transportadoras&alterar=' . $aValores[0] . '">
           
            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="nome"> Nome </label>
                    <input type="text" value="' . $aValores[1] . '" 
                    name="nome" class="form-control" id="nome" placeholder="Nome...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="telefone"> Telefone </label>
                    <input type="text" value="' . $aValores[2]. '" minlength="8" name="telefone" 
                            class="form-control" id="telefone" placeholder="Telefone...">
                </div>
            </div>
            
            <input type="submit" value="Alterar" name="alterar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">
            <a href="' . LOCALHOST .'?pg=transportadoras" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2 mt-1">
                Não Alterar
            </a>
        </form>'; 
}

function alterarBanco($conn)
{
    if(isset($_POST['alterar'])) {
        try {
            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = "UPDATE transportadoras
                        SET NomeConpanhia    = :nome,
                            telefone         = :telefone
                      WHERE IDTransportadora = :id;";
            $stmt = $conn->prepare($sSql);
            $stmt->execute([
                ':id'        => $_GET['alterar'],
                ':nome'      => $_POST['nome'],
                ':telefone'  => $_POST['telefone']
            ]);

            /**
             * Redirecionar para a listagem.
             */
            redirecionar([
                'pagina' => 'transportadoras', 
                'mensagem' => 'Registro alterado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }   
    }
}

alterarBanco($conn);