<?php require_once '../usuarios/session.php';?>
<?php
    require_once('functions.php'); 
    finalizar();
    require_once 'index/filtro.php'; 
    
?>

<?php include(HEADER_TEMPLATE); ?>
<?php include 'index/style.php'; ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Treinamentos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Treinamento</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>
<form id="filtro" action="index.php" method="get">
    
    <select name="option" class="selectpicker">
        <option value="p" selected>Pendentes</option>
        <option value="t" >Todos</option>
        <option value="c" >Concluídos</option>
    </select>
    
    <button type="submit" class="btn btn-xs btn-primary">Pesquisar</button>
</form>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th>CHAVE</th>
		<th>Contato</th>
		<th>Data</th>
		<th>Início</th>
		<th>Fim</th>
                <th>Atendente<th>
	</tr>
</thead>
<tbody>
<?php if ($treinamentos) : ?>
    
<?php foreach ($treinamentos as $treinamento) : ?>
    <tr class="<?php include 'index/class.php'; ?>">
        
                <?php
                //procurando o nome do usuario na tabela usuarios                
                $sql_u = "SELECT * FROM usuarios WHERE id = {$treinamento['id_usuario']}";
                
                
                $usuario = mysqli_fetch_assoc(my_query($sql_u));
                ?>   
            
		<td><?php echo $treinamento['id']; ?></td>
		<td><?php echo $treinamento['chave']; ?></td>
		<td><?php echo $treinamento['contato']; ?></td>
		
                <td><?php echo formatarData($treinamento['data_inicio']); ?></td>
                <td><?php echo $treinamento['tempo_inicio']; ?></td>
                <td><?php echo $treinamento['tempo_fim']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <?php include 'index/ordem.php'; ?>
                
                
		<td class="actions text-right">
            <?php include 'index/botoes/btn_finalizar.php'; ?>
			<a href="view.php?id=<?php echo $treinamento['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<?php include 'index/botoes/btn_editar.php'; ?>
			<?php include 'index/botoes/btn_excluir.php'; ?>
		</td>
	</tr>       
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>
<?php include 'js/scripts.php'; ?>
<?php include('modal/index.php'); ?>
<?php include 'modal/finalizar.php'; ?>
<?php include(FOOTER_TEMPLATE); ?>

