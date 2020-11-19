<?php

/**
 * Busca os dados do registro que será alterado.
 */
function colherDadosCampos($conn)
{
    $sSql = "SELECT IDFuncionario, 
                    TelefoneResidencial, 
                    Nome, 
                    Sobrenome, 
                    Titulo, 
                    TituloCortesia, 
                    DATE_FORMAT(DataNac, '%Y-%m-%dT%H:%i') AS DataNac,
                    DATE_FORMAT(DataAdmissao, '%Y-%m-%dT%H:%i') AS DataAdmissao,
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

    $stmt->bindParam(':id', $_GET['visualizar'], PDO::PARAM_INT);
    $stmt->execute();

    return  $stmt->fetchAll(PDO::FETCH_NUM);
}

/**
 * Menu para Cadastro.
 */
function mostrarRegistro($aValores) 
{
    echo 
            '<div class="form-row">
                <div class="form-group col-sm-8 col-md-6 col-lg-5">
                    <label for="codigo"> Código </label>
                    <input type="text" name="codigo" value="' . $aValores[0] . '" class="form-control" id="codigo" disabled>
                </div>

                <div class="form-group col-sm-8 col-md-4 col-lg-3">
                    <label for="telefone"> Telefone </label>
                    <input type="text" value="' . $aValores[1] . '" name="telefone" class="form-control" id="telefone" disabled>
                </div>      
            </div>
           
            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-3">
                    <label for="nome"> Nome </label>
                    <input type="text" value="' . $aValores[2] . '" name="nome" class="form-control" id="nome" disabled>
                </div>

                <div class="form-group col-sm-8 col-md-10 col-lg-5">
                    <label for="sobrenome"> Sobrenome </label>
                    <input type="text" value="' . $aValores[3] . '" name="sobrenome" class="form-control" id="sobrenome" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-7 col-lg-6">
                    <label for="titulo"> Título </label>
                    <input type="text" value="' . $aValores[4] . '" name="titulo" class="form-control" id="titulo" disabled>
                </div>

                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="cortesia"> Titulo Cortesia </label>
                    <input type="text" value="' . $aValores[5] . '" name="cortesia" class="form-control" id="cortesia" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-5 col-lg-4">
                    <label for="nascimento"> Data de Nascimento </label>
                    <input type="datetime-local" value="' . $aValores[6] . '" name="nascimento" class="form-control" id="nascimento" disabled>
                </div>

                <div class="form-group col-sm-8 col-md-5 col-lg-4">
                    <label for="admissao"> Admissão </label>
                    <input type="datetime-local" value="' . $aValores[7] . '" name="admissao" class="form-control" id="admissao" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="endereco"> Endereço </label>
                    <input type="text" value="' . $aValores[8] . '" name="endereco" class="form-control" id="endereco" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-4 col-lg-3">
                    <label for="cidade"> Cidade </label>
                    <input type="text" value="' . $aValores[9] . '" name="cidade" class="form-control" id="cidade" disabled>
                </div>

                <div class="form-group col-sm-8 col-md-3 col-lg-3">
                    <label for="regiao"> Região </label>
                    <input type="text" value="' . $aValores[10] . '" name="regiao" class="form-control" id="regiao" disabled>
                </div>
                
                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="cep"> CEP </label>
                    <input type="number" value="' . $aValores[11] . '" name="cep" class="form-control" id="cep" maxlength="8" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-4 col-lg-4">
                    <label for="pais"> País </label>
                    <input type="text" value="' . $aValores[12] . '" name="pais" class="form-control" id="pais" disabled>
                </div>

                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="extensao"> Extensão </label>
                    <input type="text" value="' . $aValores[13] . '" name="extensao" class="form-control" maxlength="4" id="extensao" disabled>
                </div>
                
                <div class="form-group col-sm-8 col-md-3 col-lg-2">
                    <label for="reporta"> Reporta </label>
                    <input type="text" value="' . $aValores[14] . '" name="reporta" class="form-control" maxlength="1" id="reporta" disabled>
                </div>
            </div>
                
            <div class="form-row">
                <div class="form-group col-sm-8 col-md-6 col-lg-5">
                    <label for="foto"> Foto </label>
                    <input type="text" value="' . $aValores[15] . '" name="foto" class="form-control" id="foto" disabled>
                </div>

                <div class="form-group col-sm-8 col-md-4 col-lg-3">
                    <label for="fotocaminho"> Caminho da Foto </label>
                    <input type="text" value="' . $aValores[16] . '" name="fotocaminho" class="form-control" id="fotocaminho" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-8 col-md-10 col-lg-8">
                    <label for="notas"> Caminho da Foto </label>
                    <textarea class="form-control" id="notas" rows="6" disabled>
                        ' . $aValores[17] .'
                    </textarea>
                </div>
            </div>
        
            <a href="' . LOCALHOST .'?pg=funcionarios" class="btn btn-primary col-sm-8 col-md-10 col-lg-8 py-2 mt-1">
                Voltar
            </a>
        </form>'; 
        //<label for="notas"> Notas </label>
        //<input type="text" value="' . $aValores[17] . '" name="notas" class="form-control" id="notas" disabled>
}
