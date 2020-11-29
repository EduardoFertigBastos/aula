<?php
require_once LAYOUTS . 'head.php';

if ($_SESSION['usuarioLogado']) {
    require_once LAYOUTS . 'menu.php';

    echo '<div class="container">';
    
    if (!isset($_GET['pg'])) {
        require_once 'home.php';
    } else {
        require_once 'cadastros/' . $_GET['pg'] . '/index.php';
    }
    
    echo '</div>';
    require_once LAYOUTS . 'footer.php';
    

} else {
    require_once LAYOUTS . 'login.php';
}

