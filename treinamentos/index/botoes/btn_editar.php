<?php 
        //so poderar editar o administrador ou o proprio usuario que criou
?>

<?php 
    //funcao do arquivo function que ja esta incluido no index
   
?>

<?php if($treinamento['concluido'] == 's'): ?>
    <a href="#" class="btn btn-sm btn-warning" disabled><i class="fa fa-pencil"></i> Editar</a>
<?php else: ?>

    <?php if($_SESSION['nivel'] == 2): ?>

        <a href="edit.php?id=<?php echo $treinamento['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>    
    <?php else: ?>

        <?php if($usuario['id'] == $_SESSION['id_usuario']): //caso o usuario que criou seja igual ao usuario da sessao?> 
                    <a href="edit.php?id=<?php echo $treinamento['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>

        <?php else: ?>
            <a href="#" class="btn btn-sm btn-warning" disabled><i class="fa fa-pencil"></i> Editar</a>
        <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>

