<?php
 function menu() {
    echo '<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <a class="navbar-brand h1 mb-0" href="http://www.globo.com"> Aula 09_29 </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"> Inicio </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="eduardo.php"> Eduardo </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="jeferson.php"> Jeferson </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mateus.php"> Mateus </a>
            </li>
        </ul>
    </div>
</div>
</nav>';

}

function threeTexts($aVet) {
    echo '<div class="row">';

    for ($x = 0; $x < sizeof($aVet); $x++) {
        echo '<div class="col-sm-6 col-md-4 mb-3">
                
                <p>
                    ' . $aVet[$x] . '
                </p>

            </div>';
    }

    echo '</div>';
}

function apresentacao($aApre) {
 echo '<div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="display-3">
                    ' . $aApre[0] . ' 
                </h1>
                <p>
                    ' . $aApre[1] . '                   
                </p>
            </div>
        </div>';
}

function blockquote($aVet) {
    echo '<div class="col-12 mt-5">

        <blockquote class="blockquote text-center">

            <p class="mb-0">
                ' . $aVet[0] . '
            </p>
            <footer class="blockquote-footer">
                ' . $aVet[1]. ' <cite title="Source Title"> ' . $aVet[2] . '  </cite>
            </footer>
        </blockquote>
    </div>';
}
?>