<div class="row justify-content-center mt-2">

    <div class="col-sm-12 col-md-8 col-lg-8 offset-sm-4 offset-md-2 offset-lg-2">

        <?php
            escreverMensagem();

            if (!isset(($_GET['alterar'])) && (!isset($_GET['deletar'])) && (!isset($_GET['visualizar']))) {

                require_once TRANSPORTADORAS . 'cadastrar.php';

                menuCadastro();

            } else if (isset($_GET['alterar'])) {

                require_once TRANSPORTADORAS . 'alterar.php';
                
                $aObjeto = colherDadosCampos($conn);
                menuAlterar($aObjeto[0]); 

            } else if (isset($_GET['deletar'])) {

                require_once TRANSPORTADORAS . 'deletar.php';
                
                confirmacaoDeletar($_GET['deletar']);

            } else if (isset($_GET['visualizar'])) {

                require_once TRANSPORTADORAS . 'visualizar.php';
                
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