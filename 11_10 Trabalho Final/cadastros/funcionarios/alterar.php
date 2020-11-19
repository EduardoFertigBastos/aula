<?php

/**
 * Busca os dados do registro que será alterado.
 */
function colherDadosCampos($conn)
{
    $sSql = "SELECT IDFuncionario, 
                    Nome, 
                    Sobrenome, 
                    Titulo, 
                    TituloCortesia, 
                    DATE_FORMAT(DataNac, '%Y-%m-%dT%H:%i') AS DataNac,
                    DATE_FORMAT(DataAdmissao, '%Y-%m-%dT%H:%i') AS DataAdmissao,
                    TelefoneResidencial, 
                    Endereco, 
                    Cidade, 
                    Regiao, 
                    Cep, 
                    Pais, 
                    Extensao, 
                    Reportase, 
                    Foto, 
                    FotoCaminho, 
                    Notas
               FROM funcionarios
              WHERE IDFuncionario = :id";
                        
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
    echo '<form method="post" action="' . LOCALHOST .'?pg=funcionarios&alterar=' . $aValores[0] . '">
           
            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-3">
                    <label for="nome"> Nome </label>
                    <input type="text" value="' . $aValores[1] . '" name="nome" class="form-control" id="nome" placeholder="Nome...">
                </div>

                <div class="form-group col-sm-8 col-md-10 col-lg-5">
                    <label for="sobrenome"> Sobrenome </label>
                    <input type="text" value="' . $aValores[2] . '" name="sobrenome" class="form-control" id="sobrenome" placeholder="Sobrenome...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-7 col-lg-6">
                    <label for="titulo"> Título </label>
                    <input type="text" value="' . $aValores[3] . '" name="titulo" class="form-control" id="titulo" placeholder="Titulo...">
                </div>

                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="cortesia"> Titulo Cortesia </label>
                    <input type="text" value="' . $aValores[4] . '" name="cortesia" class="form-control" id="cortesia" placeholder="Cortesia...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-4 col-lg-3">
                    <label for="nascimento"> Data de Nascimento </label>
                    <input type="datetime-local" value="' . $aValores[5] . '" name="nascimento" class="form-control" id="nascimento" placeholder="Dascimento...">
                </div>

                <div class="form-group col-sm-8 col-md-4 col-lg-3">
                    <label for="admissao"> Admissão </label>
                    <input type="datetime-local" value="' . $aValores[6] . '" name="admissao" class="form-control" id="admissao" placeholder="Admissão...">
                </div>

                <div class="form-group col-sm-8 col-md-2 col-lg-2">
                    <label for="telefone"> Telefone </label>
                    <input type="text" value="' . $aValores[7] . '" name="telefone" class="form-control" id="telefone" placeholder="Telefone...">
                </div>      
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="endereco"> Endereço </label>
                    <input type="text" value="' . $aValores[8] . '" name="endereco" class="form-control" id="endereco" placeholder="Endereço...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-4 col-lg-3">
                    <label for="cidade"> Cidade </label>
                    <input type="text" value="' . $aValores[9] . '" name="cidade" class="form-control" id="cidade" placeholder="Cidade...">
                </div>

                <div class="form-group col-sm-8 col-md-3 col-lg-3">
                    <label for="regiao"> Região </label>
                    <input type="text" value="' . $aValores[10] . '" name="regiao" class="form-control" id="regiao" placeholder="Região...">
                </div>
                
                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="cep"> CEP </label>
                    <input type="number" value="' . $aValores[11] . '" name="cep" class="form-control" id="cep" maxlength="8" placeholder="CEP...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-4 col-lg-4">
                    <label for="pais"> País </label>
                    <input type="text" value="' . $aValores[12] . '" name="pais" class="form-control" id="pais" placeholder="País...">
                </div>

                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="extensao"> Extensão </label>
                    <input type="text" value="' . $aValores[13] . '" name="extensao" class="form-control" maxlength="4" id="extensao" placeholder="Extensao...">
                </div>
                
                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="reporta"> Reporta </label>
                    <input type="text" value="' . $aValores[14] . '" name="reporta" class="form-control" maxlength="1" id="reporta" placeholder="Reporta...">
                </div>
            </div>
                
            <div class="form-row">
                <div class="form-group col-sm-8 col-md-6 col-lg-5">
                    <label for="foto"> Foto </label>
                    <input type="text" value="' . $aValores[15] . '" name="foto" class="form-control" id="foto" placeholder="Foto...">
                </div>

                <div class="form-group col-sm-8 col-md-4 col-lg-3">
                    <label for="fotocaminho"> Caminho da Foto </label>
                    <input type="text" value="' . $aValores[16] . '" name="fotocaminho" class="form-control" id="fotocaminho" placeholder="Caminho da Foto...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="notas"> Notas </label>
                    <input type="text" value="' . $aValores[17] . '" name="notas" class="form-control" id="notas" placeholder="Notas...">
                </div>
            </div>
        
            <input type="submit" value="Alterar" name="alterar" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2">
            <a href="' . LOCALHOST .'?pg=funcionarios" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2 mt-1">
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
            $sSql = "UPDATE funcionarios
                        SET Nome                = :nome, 
                            Sobrenome           = :sobrenome,
                            Titulo              = :titulo,
                            TituloCortesia      = :cortesia,
                            DataNac             = :nascimento, 
                            DataAdmissao        = :admissao,
                            Endereco            = :endereco,
                            Cidade              = :cidade,
                            Regiao              = :regiao,
                            Cep                 = :cep,
                            Pais                = :pais,
                            TelefoneResidencial = :telefone,
                            Extensao            = :extensao,
                            Foto                = :foto,
                            Notas               = :notas,
                            Reportase           = :reporta,
                            FotoCaminho         = :fotocaminho
                      WHERE IDFuncionario = :id;";
            $stmt = $conn->prepare($sSql);
            $stmt->execute([
                ':id'           => $_GET['alterar'],
                ':nome'         => $_POST['nome'],
                ':sobrenome'    => $_POST['sobrenome'],
                ':titulo'       => $_POST['titulo'],
                ':cortesia'     => $_POST['cortesia'],
                ':nascimento'   => $_POST['nascimento'],
                ':admissao'     => $_POST['admissao'],
                ':endereco'     => $_POST['endereco'],
                ':cidade'       => $_POST['cidade'],
                ':regiao'       => $_POST['regiao'],
                ':cep'          => $_POST['cep'],
                ':pais'         => $_POST['pais'],
                ':telefone'     => $_POST['telefone'],
                ':extensao'     => $_POST['extensao'],
                ':foto'         => $_POST['foto'],
                ':notas'        => $_POST['notas'],
                ':reporta'      => $_POST['reporta'],
                ':fotocaminho'  => $_POST['fotocaminho']
            ]);

            /**
             * Redirecionar para a listagem.
             */
            redirecionar([
                'pagina'    => 'funcionarios', 
                'mensagem'  => 'Registro alterado com sucesso.'
            ]);
        } catch(PDOException $e) {
            imprimirErro($e);
        }   
    }
}

alterarBanco($conn);