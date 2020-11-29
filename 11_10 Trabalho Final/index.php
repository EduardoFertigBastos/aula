<?php
session_start();
//error_reporting(E_ALL); 
ini_set('display_errors', 'Off'); 

if ($_GET['sair']) {
    session_destroy();
    session_start();
    header("Location : /");
}

require_once(__DIR__ . "/bibliotecas/parametros.php");
require_once BIBLIOTECAS . 'estrutura.php';
require_once BIBLIOTECAS . "conexao.php";
require_once BIBLIOTECAS . "autenticacao.php";
require_once LAYOUTS     . "index.php";