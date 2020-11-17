<?php
session_start();
error_reporting(E_ALL); 
ini_set('display_errors', 'On'); 

require_once(__DIR__ . "/bibliotecas/parametros.php");
require_once BIBLIOTECAS . 'estrutura.php';
require_once BIBLIOTECAS . "conexao.php";
require_once LAYOUTS     . "index.php";