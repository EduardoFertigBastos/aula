<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exe 02</title>
</head>
<body>
    <?php
    for ($x = 0; $x < 10; $x++) {
        for ($y = 0; $y < 4; $y++) {
            $aMatriz[$x][$y] = rand(0, 100);
        }   
    }
    
    for ($x = 0; $x < 10; $x++) {
        for ($y = 0; $y < 4; $y++) {
            // Só pra formatar
            if ($aMatriz[$x][$y] < 10) {
                $aMatriz[$x][$y] = '0' . $aMatriz[$x][$y];
            }
            echo "[$x][$y] = " . $aMatriz[$x][$y] . " ";
        }   
        echo '<br />';
    }

    ?>
</body>
</html>