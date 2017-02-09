<?php require_once '../usuarios/session.php';?>
<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Treinamento</h2>

<form action="edit.php?id=<?php echo $treinamento['id']; ?>" method="post">
  <hr />
      <div class="row">
    <div class="form-group col-md-3">
      <label for="chave">Chave</label>
      <input type="text" class="form-control" name="treinamento['chave']" value="<?php echo $treinamento['chave']; ?>" required>
    </div>
      <div class="form-group col-md-3">
      <label for="contato">Contato</label>
      <input type="text" class="form-control" name="treinamento['contato']" value="<?php echo $treinamento['contato']; ?>" required>
    </div>
  </div>
  
  <div class="row">
  <div class="form-group col-md-3">
      <label for="i_data">Data</label>
      <input type="date" class="form-control" name="treinamento['data_inicio']" value="<?php echo $treinamento['data_inicio']; ?>" required>
    </div>
  </div>   
  
  <div class="row">    
          <div class="form-group col-md-3">
      <label for="name">Início</label>
      <input type="time" class="form-control" name="treinamento['tempo_inicio']" value="<?php echo $treinamento['tempo_inicio']; ?>" required>
    </div>
         <div class="form-group col-md-3">
      <label for="name">Fim</label>
      <input type="time" class="form-control" name="treinamento['tempo_fim']" value="<?php echo $treinamento['tempo_fim']; ?>" required>
    </div>
  </div>
  
  <div class="row">
  <div class="form-group col-md-6">
      <label>Observação</label>
      <textarea class="form-control" rows="3" name="treinamento['observacao']" ><?php echo $treinamento['observacao']; ?></textarea> 
    </div>
  </div> 
  
  <div class="radio">
      <label><input type="radio" name="treinamento['ordem']" value='1' checked>Primeiro Treinamento</label>
    </div>
  
    <div class="radio">
        <label><input type="radio" name="treinamento['ordem']" value='2'>Segundo Treinamento</label>
    </div>

    
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>
<?php include(FOOTER_TEMPLATE); ?>

