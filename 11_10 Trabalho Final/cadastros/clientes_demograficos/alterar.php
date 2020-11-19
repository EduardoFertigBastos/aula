<?php

/**
 * Busca os dados do registro que será alterado.
 */
function colherDadosCampos($conn)
{
    $sSql = "SELECT *
               FROM clientes_demograficos
              WHERE IDTipoCliente = :id";
                        
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
    echo '<form method="post" action="' . LOCALHOST .'?pg=clientes_demograficos&alterar=' . $aValores[0] . '">
           
            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="descricao"> Descrição </label>
                    <input type="text" name="descricao" value="' . $aValores[1] . '" class="form-control" id="descricao" placeholder="Descrição...">
                </div>
            </div>
       
            <input type="submit" value="Alterar" name="alterar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">
            <a href="' . LOCALHOST .'?pg=clientes_demograficos" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2 mt-1">
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
            $sSql = "UPDATE clientes_demograficos
                        SET DescricaoCliente = :descricao
                      WHERE IDTipoCliente = :id;";
            $stmt = $conn->prepare($sSql);
            $stmt->execute([
                ':id'        => $_GET['alterar'],
                ':descricao' => $_POST['descricao']
            ]);

            /**
             * Redirecionar para a listagem.
             */
            redirecionar([
                'pagina'    => 'clientes_demograficos', 
                'mensagem'  => 'Registro alterado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }   
    }
}

alterarBanco($conn);