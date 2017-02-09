<?php 
        //so poderar finalizar o administrador ou o proprio usuario que criou
?>

<?php 
    //funcao do arquivo function que ja esta incluido no index
   
?>

<?php if($treinamento['concluido'] == 's'): ?>
            <a href="#" class="btn btn-xs btn-primary" disabled><i class="fa fa-calendar-check-o"></i> Finalizado </a>
<?php else: ?>

    <?php if($_SESSION['nivel'] == 2): ?>

                    <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#finalizar-modal" data-finalizar="<?php echo $treinamento['id']; ?>">
                        <i class="fa fa-calendar-check-o"></i> Finalizar
                    </a>    
    <?php else: ?>

    <?php if($usuario['id'] == $_SESSION['id_usuario']): //caso o usuario que criou seja igual ao usuario da sessao?> 
                   <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#finalizar-modal" data-finalizar="<?php echo $treinamento['id']; ?>">
                    <i class="fa fa-calendar-check-o"></i> Finalizar
                   </a>
    <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>

