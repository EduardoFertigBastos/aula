<?php
require_once LAYOUTS . 'head.php';
require_once LAYOUTS . 'menu.php';

if (!isset($_GET['pg'])) {
    require_once 'home.php';
} else {
    require_once 'cadastros/' . $_GET['pg'] . '/' . $_GET['metodo'] . '.php';
}

require_once LAYOUTS . 'footer.php';