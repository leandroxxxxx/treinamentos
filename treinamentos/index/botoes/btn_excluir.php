<?php 
        //so poderar finalizar o administrador ou o proprio usuario que criou
?>

<?php 
    //funcao do arquivo function que ja esta incluido no index
   
?>

<?php if($treinamento['concluido'] == 's'): ?>
            <a href="#" class="btn btn-sm btn-danger" disabled><i class="fa fa-trash" ></i> Excluir </a>
<?php else: ?>

    <?php if($_SESSION['nivel'] == 2): ?>

                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-treinamento="<?php echo $treinamento['id']; ?>">
                        <i class="fa fa-trash"></i> Excluir
                    </a>    
    <?php else: ?>

        <?php if($usuario['id'] == $_SESSION['id_usuario']): //caso o usuario que criou seja igual ao usuario da sessao?> 
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-treinamento="<?php echo $treinamento['id']; ?>">
                            <i class="fa fa-trash"></i> Excluir
                    </a>

        <?php else: ?>

              <a href="#" class="btn btn-sm btn-danger"  disabled ><i class="fa fa-trash" ></i> Excluir </a>

        <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>

