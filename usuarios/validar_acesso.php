<?php

session_start();
require_once('../config.php');
require_once (DBAPI);


$usuario 	= $_POST['usuario'];
$senha 		= md5($_POST['senha']);

$sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

$database = open_database();

$resultado_id = my_query($sql);

if($resultado_id){

	$dados_usuario = mysqli_fetch_assoc($resultado_id);        

	if(isset($dados_usuario['usuario'])){

		$_SESSION["id_usuario"]	= (int) $dados_usuario['id'];
		$_SESSION["usuario"]	=       $dados_usuario['usuario'];
		$_SESSION["nivel"]	= (int) $dados_usuario['nivel'];
                $_SESSION['nome']       =       $dados_usuario['nome'];
                var_dump($_SESSION['nivel']);
		header("Location: ../index.php");		
	} else {
		header("Location: index.php?erro=1");
	}
	

} else {
	echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
}

// erro: false
// resource

?>