<?php

/**
 * Listar todos os Registros
 */
function listarRegistros($conn, &$aResult, &$aCabec)
{
    try {    
        $sSql = "SELECT IDFuncionario                                            as 'Código',
                        concat(Nome,' ', Sobrenome)                              as 'Nome',
                        Titulo                                                   as 'Título',
                        concat(year(CURRENT_TIMESTAMP) - year(DataNac), ' anos') as 'Idade', 
                        date(DataAdmissao)                                       as 'Data de Admissão',
                        concat(Pais, ' - ', Cidade, ' - ', Cep)                  as 'Endereco',
                        TelefoneResidencial                                      as 'Telefone Residencial'
                   FROM funcionarios";
        
        $stmt = $conn->prepare($sSql);

        $stmt->execute();

        $aResult = $stmt->fetchAll(PDO::FETCH_NUM);

        $aCabec = [
            'Código',
            'Nome',
            'Título',
            'Idade',
            'Data de Admissão',
            'Endereço',
            'Telefone Residencial',
        ];
        
    } catch(PDOException $e) {
        imprimirErro($e);
    }
}
?>

