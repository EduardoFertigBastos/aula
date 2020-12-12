<?php
    $sSql = "SELECT *
               FROM usuario
              WHERE Email = :email
                AND Senha = md5(:senha)";
                        
    $stmt = $conn->prepare($sSql);

    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':senha', $_POST['senha']);
    
    $stmt->execute();

    $oUsuario = $stmt->fetchAll();

    if (isset($_POST['entrar'])) {
        if ($oUsuario != NULL) {
            $_SESSION['usuarioLogado'] = true;
            
        } else {
            $_SESSION['erroLogin'] = true;
        }
    }