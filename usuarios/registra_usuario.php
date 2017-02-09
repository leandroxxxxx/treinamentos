<?php

require_once('../config.php');
require_once (DBAPI);

//$_POST
//$_GET

$usuario	= $_POST['usuario'];
$nome 		= $_POST['nome'];
$senha		= md5($_POST['senha']);
$re_senha	= md5($_POST['re_senha']);
$nivel          = (int)$_POST['usuario_nivel'];

open_database();
        
$usuario_existe = false;
$senha_repetida = false;

$sql = " select * from usuarios where usuario = '$usuario' ";
$resultado_id = my_query($sql);
var_dump($resultado_id);
if($resultado_id){
	$dados = mysqli_fetch_array($resultado_id);
	if(isset($dados['usuario'])){
		$usuario_existe = true;
	}
} else {
	echo 'Erro ao tentar localizar o registro de usuário no banco de dados';
}

if($senha != $re_senha){
    $senha_repetida = true;
}


if($usuario_existe || $senha_repetida){

	$retorno_get = '';

	if($usuario_existe){
		$retorno_get.= "erro_usuario=1&";
	}
	
        if($senha_repetida){
		$retorno_get.= "erro_senha=1";
	}

	header("Location: cadastro.php?".$retorno_get);
	die();
}

$sql = " insert into usuarios(usuario, nome, senha, nivel)values('$usuario', '$nome', '$senha', '$nivel') ";

if(my_query($sql)){
        header("Location: cadastro.php?retorno=1");	
} else {
	header("Location: cadastro.php?erro_cadastro = 1");
}

?>