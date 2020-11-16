<?php

/**
 * Menu para Cadastro
 */
function menuCadastro() {
    echo '<form method="post" action="' . LOCALHOST .'?pg=transportadoras">
           
            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="nome"> Nome </label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="telefone"> Telefone </label>
                <input type="number" minlength="8" name="telefone" class="form-control" id="telefone" placeholder="Telefone...">
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
            $sSql = "SELECT IDTransportadora 
                       FROM transportadoras
                      ORDER BY IDTransportadora DESC
                      LIMIT 1;";
        
            $stmt = $conn->prepare($sSql);
            $stmt->execute();            
            $aResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $iUltimoID = intval($aResult[0]['IDTransportadora']) + 1;

            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = ' INSERT INTO transportadoras (IDTransportadora, NomeConpanhia, telefone)
                      VALUES (:id, :nome, :telefone)';
                      
            $stmt = $conn->prepare($sSql);
           
            $stmt->execute([
                ':id'        => $iUltimoID,
                ':nome'      => $_POST['nome'],
                ':telefone'  => $_POST['telefone']
            ]);
            
            /**
             * Redirecionar para a listagem.
             */
            redirecionar([
                'pagina'    => 'transportadoras', 
                'mensagem'  => 'Registro cadastrado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }
    }
}

cadastrarBanco($conn);
?>

