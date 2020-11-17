<?php

/**
 * Menu para Cadastro
 */
function menuCadastro() {
    echo '<form method="post" action="' . LOCALHOST .'?pg=regiao">
           
            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="descricao"> Descrição </label>
                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição...">
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
            $sSql = "SELECT IDRegiao 
                       FROM regiao
                      ORDER BY IDRegiao DESC
                      LIMIT 1;";
        
            $stmt = $conn->prepare($sSql);
            $stmt->execute();            
            $aResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $iUltimoID = intval($aResult[0]['IDRegiao']) + 1;

            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = ' INSERT INTO regiao (IDRegiao, DescricaoRegiao)
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
                'pagina'    => 'regiao', 
                'mensagem'  => 'Registro cadastrado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }
    }
}

cadastrarBanco($conn);
?>

