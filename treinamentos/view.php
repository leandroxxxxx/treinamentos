<?php 
	require_once '../usuarios/session.php';
        require_once('functions.php'); 
	view($_GET['id']);
        
        $sql_c = "SELECT nome FROM usuarios WHERE id = {$treinamento['criado_por']} ";             
        $usuario_c = mysqli_fetch_assoc(my_query($sql_c));
        
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Treinamento <?php echo $treinamento['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>ID:</dt>
	<dd><?php echo $treinamento['id']; ?></dd>

	<dt>CHAVE:</dt>
	<dd><?php echo $treinamento['chave']; ?></dd>

	<dt>Contato:</dt>
	<dd><?php echo $treinamento['contato']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Data do Treinamento:</dt>
        <dd><?php echo formatarData($treinamento['data_inicio']); ?></dd>

	<dt>Horário Início:</dt>
	<dd><?php echo $treinamento['tempo_inicio']; ?></dd>

	<dt>Horário Términio:</dt>
	<dd><?php echo $treinamento['tempo_fim']; ?></dd>
        
        <dt>Observação:</dt>
	<dd><?php echo $treinamento['observacao']; ?></dd>
</dl>
        
<!-- As datas estao formatadas na funcao view do arquivo function.php       -->
<dl class="dl-horizontal">
	<dt>Criado:</dt>
	<dd><?php echo $usuario_c['nome'].'    ('.$treinamento['data_inclusao'].')'; ?></dd>

	<?php if($treinamento['modificado_por']):
        
            $sql_m = "SELECT nome FROM usuarios WHERE id = {$treinamento['modificado_por']}";                
            $usuario_m = mysqli_fetch_assoc(my_query($sql_m));
            ?>
        
            <dt>Modificado:</dt>
            <dd><?php echo $usuario_m['nome'].'   ('.$treinamento['data_modificado'].')'; ?></dd>
        
	<?php endif;?>
           
        <?php if($treinamento['concluido'] == 's'): ?>
             <dt>Status:</dt>
            <dd>Treinamento concluído!</dd>
        <?php endif; ?>
            
</dl>
        

<div id="actions" class="row">
	<div class="col-md-12">
          <?php  include 'view/btn_editar.php' ?>	  
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>