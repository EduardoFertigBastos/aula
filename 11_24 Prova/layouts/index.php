<?php
require_once LAYOUTS . 'head.php';

if ($_SESSION['usuarioLogado']) {
    require_once LAYOUTS . 'menu.php';
    
    if (!isset($_GET['pg'])) {
        require_once 'home.php';
    } else {
        require_once 'cadastros/' . $_GET['pg'] . '/index.php';
    }
} else {
    require_once LAYOUTS . 'login.php';
}

require_once LAYOUTS . 'footer.php';