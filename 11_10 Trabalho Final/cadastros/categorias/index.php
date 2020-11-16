<div class="row justify-content-center mt-2">

    <div class="col-sm-12 col-md-8 col-lg-8 offset-sm-4 offset-md-2 offset-lg-2">

        <?php
            if (isset($_SESSION['mensagem'])) {
                echo '<p class="lead">' . $_SESSION['mensagem'] . '</p>';
                unset($_SESSION['mensagem']);
            }

            if (!isset(($_GET['alterar'])) && (!isset($_GET['deletar'])) && (!isset($_GET['visualizar']))) {

                require_once CATEGORIAS . 'cadastrar.php';

                menuCadastro();

            } else if (isset($_GET['alterar'])) {

                require_once CATEGORIAS . 'alterar.php';
                
                $aObjeto = colherDadosCampos($conn);
                menuAlterar($aObjeto[0]); 

            } else if (isset($_GET['deletar'])) {

                require_once CATEGORIAS . 'deletar.php';
                
                confirmacaoDeletar($_GET['deletar']);

            } else if (isset($_GET['visualizar'])) {

                require_once CATEGORIAS . 'visualizar.php';
                
                $aObjeto = colherDadosCampos($conn);
                mostrarRegistro($aObjeto[0]); 
            } 

        ?>

    </div>

    <!-- Tabela Listagem -->
    <div class="col-10 mt-4">

        <?php
            require_once 'listagem.php';
            
            listarRegistros($conn, $aResult, $aCabec);
            imprimirTabela($aCabec, $aResult); 
        ?> 

    </div>

</div>