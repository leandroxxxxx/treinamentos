<?php
session_start();

if(!isset($_SESSION['usuario'])){ 
  header("Location: ../../treinamentos/usuarios/index.php");
  exit();//para o codigo nao ser executado logo abaixo
}

if($_SESSION['nivel'] == 2){
    $display = '';
}else{
    $display = 'hidden';
}

//var_dump($display);
//var_dump($_SESSION['nivel']);


