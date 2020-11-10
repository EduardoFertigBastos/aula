<?php
require_once LAYOUTS . 'head.php';

require_once LAYOUTS . 'menu.php';

if (!isset($_GET['pagina'])) {
    require_once 'home.php';
} else {
    require_once 'cadastros/' . $_GET['modulo'] . '/' . $_GET['pagina'] . '.php';
}

require_once 'footer.php';