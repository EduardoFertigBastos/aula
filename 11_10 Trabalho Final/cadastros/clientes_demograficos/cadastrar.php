<?php

/**
 * Menu para Cadastro
 */
function menuCadastro() {
    echo '<form method="post" action="' . LOCALHOST .'?pg=clientes_demograficos">
           
            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="descricao"> Descrição </label>
                    <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição...">
                </div>
            </div>
       
            <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">
            
        </form>'; 
}

/**
 * Cadastra os dados no banco.
 */
function cadastrarBanco($conn)
{
    if(isset($_POST['cadastrar'])) {
        try {
            /**
             * Buscar último ID inserido no banco ja que esta tabela não é auto_increment.
             */
            $sSql = "SELECT IDTipoCliente 
                       FROM clientes_demograficos
                      ORDER BY IDTipoCliente DESC
                      LIMIT 1;";
        
            $stmt = $conn->prepare($sSql);
            $stmt->execute();            
            $aResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $iUltimoID = intval($aResult[0]['IDTipoCliente']) + 1;

            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = ' INSERT INTO clientes_demograficos (IDTipoCliente, DescricaoCliente)
                      VALUES (:id, :descricao)';
                      
            $stmt = $conn->prepare($sSql);
           
            $stmt->execute([
                ':id'        => $iUltimoID,
                ':descricao' => $_POST['descricao']
            ]);
            
            /**
             * Redirecionar para a listagem.
             */
            redirecionar([
                'pagina'    => 'clientes_demograficos', 
                'mensagem'  => 'Registro cadastrado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }
    }
}

cadastrarBanco($conn);
?>

