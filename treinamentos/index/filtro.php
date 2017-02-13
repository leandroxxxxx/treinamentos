<?php
/*
   nao preciso fazer o require do arquivo config.php nem do DB pois ja 
 * estao feitos no arquivo function.php que ja esta requerido no index
 */

//funcoes para contralar o conteudo exibido na tela de treinamentos

$filtro = isset($_GET['option']) ? $_GET['option'] : null; 

$sql_filtro = null;

/*************************************************************************************
 * **************************PARTE DESTINADA A PAGINACAO******************************
 ************************************************************************************/
$pag = isset($_GET['pagina']) ? $_GET['pagina'] : 1; 
$total_reg = 5; //total de registro por pagina

$inicio = $pag - 1; 
$inicio = $inicio * $total_reg; //valor inicial na busca no DB

$tr; //total de rows na filtragem



/*************************************************************************************
 * **********************************************************************************
 ************************************************************************************/

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
    global $tr;
    $sql_filtro = "SELECT * FROM treinamentos ORDER BY id DESC LIMIT $inicio, $total_reg";
    $treinamentos = filtro($sql_filtro); //variavel global utilizada no index como uma array
    $tr = my_query("SELECT * FROM treinamentos")->num_rows;
}
if($filtro == 'p' || !$filtro){//retornara a query apenas dos treinamentos nao concluidos
    global $tr;
    $sql_filtro = "SELECT * FROM treinamentos WHERE concluido = 'n' ORDER BY id DESC LIMIT $inicio, $total_reg";
    $treinamentos = filtro($sql_filtro);
    $tr = my_query("SELECT * FROM treinamentos WHERE concluido = 'n'")->num_rows;
}
if($filtro == 'c'){
    global $tr;
    $sql_filtro = "SELECT * FROM treinamentos WHERE concluido = 's' ORDER BY id DESC LIMIT $inicio, $total_reg";
    $treinamentos = filtro($sql_filtro);
    $tr = my_query("SELECT * FROM treinamentos WHERE concluido = 's'")->num_rows;
}

$tp = $tr / $total_reg; // verifica o número total de páginas em cada filtro
$tp = ceil($tp); //aredondando para cima. Variavel eh utilizada no btn_paginacao.php
