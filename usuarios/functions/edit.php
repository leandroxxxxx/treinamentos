<?php

$id_edit;
$usuario_edit;


function editUser() {
  
  if (isset($_GET['id'])) {
    global $id_edit;  
    $id_edit = (int)$_GET['id'];
    //ja vai gravar no db, pois foi feito o submit com o post
    if (isset($_POST['usuario']) && !usuarioExiste()) {
      
      $usuario_edit = $_POST['usuario'];      
      $usuario_edit["'senha'"] = md5($usuario_edit["'senha'"]);
      update('usuarios', $id_edit, $usuario_edit);
    
      header("Location: manager.php");     
      die();  //utilizei o die aqui para que a pagina de layout edit nao seja lida por completo, pois apagaria a mensagem da session e nao mostraria na pagina manager;
      //
      //caso nao tenha feito o submit, sem post. Entao o id do get eh utilizado para encontar os dados do usuario e inserir nos inputs
    } else {
      global $usuario_edit;
      $usuario_edit = find('usuarios', $id_edit);      
    } 
  } else {
    $_SESSION['message'] = "Algo deu errado...";
    $_SESSION['type'] = "danger";   
  }
}

function usuarioExiste(){
    if(isset($_POST['usuario'])){
        
        $usuario = $_POST['usuario'];
        $id = $_GET['id'];
                
        $sql = "SELECT * FROM usuarios WHERE id != '$id' AND usuario = '{$usuario["'usuario'"]}'";
        $result = my_query($sql);
//        var_dump($sql);
        if($result->num_rows > 0){
            $_SESSION['message'] = "Este usuário já existe!";
            $_SESSION['type'] = "danger";
            return true;
        }else{
            return false;
        }
    }
}






