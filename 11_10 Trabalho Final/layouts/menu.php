<?php

    $sSql = 'SHOW TABLES';

    $stmt = $conn->prepare($sSql);
    $stmt->execute();

    $aResult = $stmt->fetchAll();

?>
<div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        

        <?php

            foreach($aResult as $linha) {
                echo '  <li class="nav-item">
                            <a href="' . $linha[0] . '" class="nav-link">' . 
                                $linha[0] . 
                            '</a>
                        </li>';
            }

        ?>

    
        </ul>
    </div>
    </nav>
</div>