<?php

    $aItens = [
        [
            'Categorias', 
            'categorias'
        ],
        [
            'Clientes Demográficos',
            'clientes_demograficos'
        ],
        [
            'Funcionários',
            'funcionarios'
        ],
        [
            'Região',
            'regiao'
        ],
        [
            'Transportadoras',
            'transportadoras'
        ]        
    ];

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

                foreach($aItens as $linha) {
                    echo '  <li class="nav-item">
                                <a href="?pg=' . $linha[1] . '" class="nav-link">' . 
                                    $linha[0] . 
                                '</a>
                            </li>';
                }

                ?>
                
                </ul>

               
            </div>
        </div>
    </nav>
</header>
<?php
