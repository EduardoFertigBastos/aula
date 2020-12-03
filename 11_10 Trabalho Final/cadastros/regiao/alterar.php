<?php

/**
 * Busca os dados do registro que será alterado.
 */
function colherDadosCampos($conn)
{
    $sSql = "SELECT *
               FROM regiao
              WHERE IDRegiao = :id";
                        
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
    echo '  <form method="post" action="' . LOCALHOST .'?pg=regiao&alterar=' . $aValores[0] . '">';
           
    echo '      <div class="form-row">';
    echo '          <div class="form-group col-sm-8 col-md-10 col-lg-8">';
    echo '              <label for="descricao"> Descrição </label>';
    echo '              <input type="text" name="descricao" value="' . $aValores[1] . '" class="form-control" id="descricao" placeholder="Descrição...">';
    echo '           </div>';
    echo '      </div>';
    
    echo '      <input type="submit" value="Alterar" name="alterar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">';
    echo '      <a href="' . LOCALHOST .'?pg=regiao" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2 mt-1">';
    echo '          Não Alterar';
    echo '      </a>';
    echo '  </form>'; 
}

function alterarBanco($conn)
{
    if(isset($_POST['alterar'])) {
        try {
            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = "UPDATE regiao
                        SET DescricaoRegiao = :descricao
                      WHERE IDRegiao = :id;";
            $stmt = $conn->prepare($sSql);
            $stmt->execute([
                ':id'        => $_GET['alterar'],
                ':descricao' => $_POST['descricao']
            ]);

            /**
             * Redirecionar para a listagem.
             */
            redirecionar([
                'pagina'    => 'regiao', 
                'mensagem'  => 'Registro alterado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }   
    }
}

alterarBanco($conn);