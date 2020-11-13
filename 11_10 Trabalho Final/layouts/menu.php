<?php

    
    /**
     * Pegar as tabelas sem '_' no meio do título 
     */
    $sSql = "SHOW TABLES
             FROM trabalhofinal
            WHERE Tables_in_trabalhofinal NOT LIKE '%\_%';";

    $stmt = $conn->prepare($sSql);
    $stmt->execute();

    $aItensSoltos = $stmt->fetchAll();

    /**
     * Pegar as tabelas com '_' no meio do título 
     */
    $sSql = "SHOW TABLES
             FROM trabalhofinal
            WHERE Tables_in_trabalhofinal LIKE '%\_%';";

    $stmt = $conn->prepare($sSql);
    $stmt->execute();

    $aItensDropdown = $stmt->fetchAll();

    /**
     * Diminuir os itens principais do menu
     */
    function mudarMenus(&$aItensSoltos, &$aItensDropdown, $iTamanho) 
    {
        for ($x = sizeof($aItensSoltos); $x > $iTamanho; $x--) {
            $aItensDropdown[] = $aItensSoltos[array_key_last($aItensSoltos)];
            unset($aItensSoltos[array_key_last($aItensSoltos)]);
        }
    }

    mudarMenus($aItensSoltos, $aItensDropdown, 8); 

?>



<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">
            <a class="navbar-brand h1 mb-0" href="#"> NorthWind </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                
                <ul class="navbar-nav">
                    
                <?php

                foreach($aItensSoltos as $linha) {
                    echo '  <li class="nav-item">
                                <a href="?pg=' . $linha[0] . '" class="nav-link">' . 
                                    ucwords($linha[0]) . 
                                '</a>
                            </li>';
                }

                ?>
                
                </ul>

                <ul class="navbar-nav ml-3">
                    <li class="navbar-item dropdown">

                        <a class="nav-item dropdown-toggle text-light" href="#" id="navDrop" data-toggle="dropdown">
                            Outras Tabelas
                        </a>

                        <div class="dropdown-menu">
                            <?php 

                            foreach ($aItensDropdown as $linha) {
                                echo '<a class="dropdown-item" href="?pg=' . $linha[0] . '">' .
                                        ucwords(str_replace('_', ' ', $linha[0])) . '                     
                                    </a>';
                            }
                            
                            ?>                            
                                    
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php
