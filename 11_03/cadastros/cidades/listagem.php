<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    try {
        if (isset($id)) {
            $sSql = 'SELECT cidades.codigo, cidades.nome, estados.sigla 
                       FROM cidades
                       JOIN estados
                      WHERE cidades.id = :id';
            $stmt = $conn->prepare($sSql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $sSql = 'SELECT cidades.codigo, cidades.nome, estados.sigla 
                       FROM cidades
                       JOIN estados';
            $stmt = $conn->prepare($sSql);
        }
        $stmt->execute();
        $aResult = $stmt->fetchAll();
        ?>
        <table class="table table-striped">
            <tr>
                <td>Código</td>
                <td>Nome</td>
                <td>Estado</td>
                <td>Ações</td>
            </tr>
            
        <?php
        if (count($aResult)) {
            
            echo '<pre>';
            var_dump($aResult);
            echo '</pre>';

            foreach($aResult as $linha) {
                echo '<tr>';
                echo '  <td>' . $linha['codigo'] . '</td>';
                echo '  <td>' . $linha['nome'] . '</td>';
                echo '  <td>' . $linha['sigla'] . '</td>';
                echo '  <td>';
                echo '      <a href="#"> Alterar </a>';
                echo '      <a href="#"> Excluir </a>';
                echo '  <td>';
                echo '  </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>
                    <td colspan="3">
                        Nenhum resultado foi encontrado
                    </td>
                  </tr>';
        }
        ?>
        
        </table>
        <?php
    } catch(PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }