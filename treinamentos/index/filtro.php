<?php
/*
   nao preciso fazer o require do arquivo config.php nem do DB pois ja 
 * estao feitos no arquivo function.php que ja esta requerido no index
 */

//funcoes para contralar o conteudo exibido na tela de treinamentos

$filtro = isset($_GET['option']) ? $_GET['option'] : null; 

$sql_filtro = null;

function filtro($sql_filtro = null){
    	$database = open_database();
	$found = array();
	try {
	    $result = $database->query($sql_filtro);
	    
	    if ($result->num_rows > 0) {
	      //$found = $result->fetch_all(MYSQLI_ASSOC);		   
		  while ($row = $result->fetch_assoc()) {
				$found[] = $row;
	      }
		    
	    }
            
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

if($filtro == 't'){
    index();//funcao que está no arquivo geral function, ja esta incluida no index.php
}
if($filtro == 'p' || !$filtro){//retornara a query apenas dos treinamentos nao concluidos
    $sql_filtro = "SELECT * FROM treinamentos WHERE concluido = 'n' ORDER BY id DESC";
    $treinamentos = filtro($sql_filtro);
}
if($filtro == 'c'){
    $sql_filtro = "SELECT * FROM treinamentos WHERE concluido = 's' ORDER BY id DESC";
    $treinamentos = filtro($sql_filtro);
}




