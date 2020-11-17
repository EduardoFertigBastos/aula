<?php

/**
 * Menu para Cadastro
 */
function menuCadastro() {
    echo '<form method="post" action="' . LOCALHOST .'?pg=funcionarios">
           
            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="nome"> Nome </label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="sobrenome"> Sobrenome </label>
                <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="Sobrenome...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="titulo"> Título </label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="cortesia"> Titulo Cortesia </label>
                <input type="text" name="cortesia" class="form-control" id="cortesia" placeholder="Cortesia...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="nascimento"> Data de Nascimento </label>
                <input type="date" name="nascimento" class="form-control" id="nascimento" placeholder="Dascimento...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="admissao"> Admissão </label>
                <input type="date" name="admissao" class="form-control" id="admissao" placeholder="Admissão...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="endereco"> Endereço </label>
                <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="cidade"> Cidade </label>
                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="regiao"> Região </label>
                <input type="text" name="regiao" class="form-control" id="regiao" placeholder="Região...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="cep"> CEP </label>
                <input type="number" name="cep" class="form-control" id="cep" maxlength="8" placeholder="CEP...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="pais"> País </label>
                <input type="text" name="pais" class="form-control" id="pais" placeholder="País...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="telefone"> Telefone </label>
                <input type="number" name="telefone" class="form-control" id="telefone" placeholder="Telefone...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="extensao"> Extensão </label>
                <input type="text" name="extensao" class="form-control" id="extensao" placeholder="Extensao...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="foto"> Foto </label>
                <input type="text" name="foto" class="form-control" id="foto" placeholder="Foto...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="fotocaminho"> Caminho da Foto </label>
                <input type="text" name="fotocaminho" class="form-control" id="fotocaminho" placeholder="Caminho da Foto...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="notas"> Notas </label>
                <input type="text" name="notas" class="form-control" id="notas" placeholder="Notas...">
            </div>

            <div class="form-group col-sm-8 col-md-10 col-lg-8">
                <label for="reporta"> Reporta </label>
                <input type="text" name="extensao" class="form-control" id="extensao" placeholder="Extensao...">
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
            $sSql = "SELECT IDCategoria 
                       FROM categorias
                      ORDER BY IDCategoria DESC
                      LIMIT 1;";
        
            $stmt = $conn->prepare($sSql);
            $stmt->execute();            
            $aResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $iUltimoID = intval($aResult[0]['IDCategoria']) + 1;

            /**
             * Inserir no Banco de Dados os dados passados pelo formulário.
             */
            $sSql = ' INSERT INTO categorias (IDCategoria, NomeCategoria, Descricao, Figura)
                      VALUES (:id, :nome, :descricao, :figura)';
                      
            $stmt = $conn->prepare($sSql);
           
            $stmt->execute([
                ':id'        => $iUltimoID,
                ':nome'      => $_POST['nome'],
                ':descricao' => $_POST['descricao'],
                ':figura'    => $_POST['figura']
            ]);
            
            /**
             * Redirecionar para a listagem.
             */
            redirecionar([
                'pagina'    => 'categorias', 
                'mensagem'  => 'Registro cadastrado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }
    }
}

cadastrarBanco($conn);
?>

