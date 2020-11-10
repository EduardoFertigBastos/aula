<?php

    $sSql = 'SELECT *
            FROM menu
            ORDER BY ordem, descricao';

    $stmt = $conn->prepare($sSql);
    $stmt->execute();

    $aResult = $stmt->fetchAll();

?>

<div class="row">
    <?php

        foreach($aResult as $linha) {
            echo '<a href="' . $linha['endereco'] . '" class="' . $linha['classe'] . '">' . 
                        $linha['descricao'] . 
                  '</a>';
        }

    ?>
</div>