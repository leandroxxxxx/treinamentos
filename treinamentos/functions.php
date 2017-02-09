<?php
require_once('../config.php');
require_once(DBAPI);
$treinamentos = null;
$treinamento = null;
$usuarios = null;
$usuario = null;
/**
 *  Listagem dos treinamentos
 */
function index() {
	global $treinamentos;
	$treinamentos = find_all('treinamentos');         
}
function listar_usuarios(){
        global $usuarios;
        $usuarios = find_all('usuarios');
} 


/**
 *  Cadastro dos treinamentos
 */
function add() {
  if (!empty($_POST['treinamento'])) {
    
    $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $treinamento = $_POST['treinamento'];    
    $treinamento['data_inclusao'] = $today->format("Y-m-d H:i:s"); 
    $treinamento['id_usuario']= $treinamento['criado_por'] = $_SESSION['id_usuario'];
    
    
    //quando printada, a chave aparece envolvida com duas aspas simples. Ao chamar a array somente com uma aspas na chave, dá erro
    //verificando abaixo se o intervalo de tempo existe nesta data no banco
    $sql_1 = "SELECT * FROM treinamentos WHERE data_inicio = '{$treinamento["'data_inicio'"]}' AND tempo_inicio BETWEEN '{$treinamento["'tempo_inicio'"]}:00' AND '{$treinamento["'tempo_fim'"]}:00'";
    $result_1  = my_query($sql_1);    
    $sql_2 = "SELECT * FROM treinamentos WHERE data_inicio = '{$treinamento["'data_inicio'"]}' AND tempo_fim BETWEEN '{$treinamento["'tempo_inicio'"]}:00' AND '{$treinamento["'tempo_fim'"]}:00'";
    $result_2  = my_query($sql_2);  
    
    if($result_1->num_rows == 0 && $result_2->num_rows == 0){  //caso nao haja resultado da query, continua a operacao de salvar
    save('treinamentos', $treinamento);  
    header('location: index.php');    
    }else{        
       header('location: add.php?erro=1&&chave='.$treinamento["'chave'"].'&&contato='.$treinamento["'contato'"].'&&data='.$treinamento["'data_inicio'"].'&&observacao='.$treinamento["'observacao'"]); //erro que mostra o alert do bootstrap na pagina add.php e repopulacao dos inputs
    }
  }
}

/**
 *	Atualizacao/Edicao dos treinamentos
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['treinamento'])) {
      $treinamento = $_POST['treinamento'];
      $treinamento['data_modificado'] = $now->format("Y-m-d H:i:s"); 
      $treinamento['id_usuario']= $treinamento['modificado_por'] = $_SESSION['id_usuario'];
      update('treinamentos', $id, $treinamento);
      header('location: index.php');
    } else {
      global $treinamento;
      $treinamento = find('treinamentos', $id);
    } 
  } else {
    header('location: index.php');
  }
}

function clear_messages(){
    $_SESSION['message'] = "";
    $_SESSION['type'] = "";
}


/**
 *  Visualização de um treinamento
 */
function view($id = null) {
  global $treinamento;
  $treinamento = find('treinamentos', $id); 
  $treinamento['data_inclusao'] = formatarData($treinamento['data_inclusao'] , 'completa');
  $treinamento['data_modificado'] = formatarData($treinamento['data_modificado'] ,'completa');
}

/**
 *  Exclusão de um treinamento
 */
function delete($id = null) {
  global $treinamento;
  $treinamento = remove('treinamentos', $id);
  header('location: index.php');
}

function finalizar(){//funcao para fazer o update no db recuperando o parametro passado pelo GET
     if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $sql_finalizar = "UPDATE treinamentos SET concluido = 's' WHERE id = '$id'";
        my_query($sql_finalizar);               
    }
}

function finalizar_1(){ //funcao usada na pagina add para finalizar o primeiro treinamento e passar os dados do treinamento com este id para os inputs  
     if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        finalizar();
        global $treinamento;
        $treinamento = find('treinamentos', $id);
    }
}

function formatarData($data, $tipo = null){
    
  $format = new DateTime($data);
  
  if(!$tipo):      
      return $format->format("d-m-Y");  
  elseif($tipo == 'completa'):
      return $format->format("d-m-Y H:i:s");
  else:
      return $format->format("d-m-Y");
  endif;
}

