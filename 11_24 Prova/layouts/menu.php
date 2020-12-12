<?php

$aMenu = [
    'regiao'
]

?>
</div>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">
            <a class="navbar-brand h1 mb-0" href="#"> Prova </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                
                <ul class="navbar-nav">
                    
                    <?php

                    foreach($aMenu as $linha) {
                        echo '  <li class="nav-item">
                                    <a href="?pg=' . $linha . '" class="nav-link">' . 
                                        ucwords($linha) . 
                                    '</a>
                                </li>';
                    }

                    ?>

                    <li class="nav-item ml-auto">
                        <a href="?sair=1" class="nav-link">
                            Sair
                        </a>
                    </li>

                
                </ul>

            </div>
        </div>
    </nav>
</header>

<div class="container">
<?php
