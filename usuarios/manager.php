<?php require_once 'session.php';?>
<?php if($_SESSION['nivel'] != 2){
    echo 'Você não tem permissão para acessar esta página';
    exit();     
}
?>
<?php
    require_once('../treinamentos/functions.php');
    listar_usuarios(); 
    
?>

<?php include(HEADER_TEMPLATE); ?>


<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Usuários</h2>
                        <h3>Área do administrador</h3>
            </div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="cadastro.php"><i class="fa fa-plus"></i> Novo Usuário</a>
	    	<a class="btn btn-default" href="manager.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

 <?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php $_SESSION['message'] = ""; /*****/ $_SESSION['message'] = "" ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Usuário</th>
		<th>Nível</th>		
	</tr>
</thead>
<tbody>
<?php if ($usuarios) : ?>
<?php foreach ($usuarios as $usuario) : ?>
	<tr>
		<td><?php echo $usuario['id']; ?></td>
		<td><?php echo $usuario['usuario']; ?></td>	
                <td><?php echo $usuario['nivel']; ?></td>
		<td class="actions text-right">			
			<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>			
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

<?php include(FOOTER_TEMPLATE); ?>

