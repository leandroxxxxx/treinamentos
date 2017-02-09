<?php require_once '../usuarios/session.php';?>
<?php 
  require_once('functions.php'); 
  add();
  $id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
  $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : null;
  $erro = isset($_GET['erro']) ? (int)$_GET['erro'] : null; 
?>
<?php 
    if(!$ordem){        
        //os valores abaixo eh para repopular os inputs apos finalizar, caso retorne a pagina
        $chave = isset($_GET['chave']) ? $_GET['chave'] : '';
        $contato = isset($_GET['contato']) ? $_GET['contato'] : '';
        $data = isset($_GET['data']) ? $_GET['data'] : '';
        $obs = isset($_GET['observacao']) ? $_GET['observacao'] : '';
    }else{
        finalizar_1();
        //inserindo valores nos inputs caso o treinamento seja finalizado e passe para o próximo. Esses valores vem da funcao finalizar_atend()
        $chave = $treinamento['chave'];
        $contato = $treinamento['contato'];
        $data = "";
        $obs = "";
    }
 ?>
<?php include(HEADER_TEMPLATE); ?>

        <?php if ($erro == 1) : ?>
                <div class="alert alert-danger" alert-dismissible role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p align="center">Já existe um treinamento marcado para esta data<p>
                </div>

        <?php endif; ?>

<h2>Novo Treinamento</h2>

<form action="add.php" method="post" onsubmit='return validarData()'>
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="chave">Chave</label>
      <input type="text" class="form-control" name="treinamento['chave']" value="<?php echo $chave ?> " required>
    </div>
      <div class="form-group col-md-3">
      <label for="contato">Contato</label>
      <input type="text" class="form-control" name="treinamento['contato']" value="<?php echo $contato ?>">
    </div>
  </div>
  
  <div class="row">
  <div class="form-group col-md-3">
      <label for="i_data">Data</label>
      <input id='dataInserida' type="date" class="form-control" name="treinamento['data_inicio']" value="<?php echo $data ?>" required>
    </div>
  </div>   
  
  <div class="row">    
          <div class="form-group col-md-3">
      <label for="inicio">Início</label>
      <input id='inicio' type="time" class="form-control" name="treinamento['tempo_inicio']" required>
    </div>
         <div class="form-group col-md-3">
      <label for="fim">Fim</label>
      <input id='fim' type="time" class="form-control" name="treinamento['tempo_fim']" required>
    </div>
  </div>
  
  <div class="row">
  <div class="form-group col-md-6">
      <label>Observação</label>
      <textarea class="form-control" rows="3" name="treinamento['observacao']"><?php echo $obs ?></textarea> 
    </div>
  </div> 
  
  <?php include 'add/radioBox.php'; ?>
    
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<script>

            function validarData(){
                var data = new Date();
                var ano = data.getFullYear();
                var mes = data.getMonth();
                var dia = data.getDate();
                
                var dataHoje = new Date(ano, mes, dia);
                var dataInput = document.getElementById('dataInserida').value;
                var dataFutura = new Date(dataInput);
                console.log(dataHoje);
                console.log(dataFutura);
                
                //adicionando tres horas a data do input, nao sei o motivo mas esta saindo com a data anterior as 22:00
                if((dataFutura.getTime() + 1000*60*60*3) < dataHoje.getTime()){
                    alert('Insira uma data futura!!');
                    return false;
                }

                var inicio = document.getElementById('inicio').value;
                var fim = document.getElementById('fim').value;
                inicio = Number(inicio.replace(':', '')); //transforma a estring hh:mm em numero
                fim = Number(fim.replace(':', ''));
                if(fim <= inicio){
                  alert('A horário final deve ser maior do que o horário inicial');
                  return false;
                }
             
            }
        
  </script>

<?php include(FOOTER_TEMPLATE); ?>

