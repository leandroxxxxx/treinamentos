
<?php 
        require_once 'session.php';

        if($_SESSION['nivel'] != 2){
            echo 'Você não tem permissão para acessar esta página';
            exit();     
}
?>
<?php
require_once '../config.php';
require_once '../inc/database.php';
require_once 'functions/edit.php';
editUser();

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <title>Treinamentos</title>

        <!-- jquery - link cdn -->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <!-- bootstrap - link cdn -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    </head>

    <body>

        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="imagens/logo-ab2.png" />
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.php">Início</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <?php if (!empty($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" style="text-align:center" role="alert">
                <button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $_SESSION['message']; ?>
            </div>
            <?php $_SESSION['message'] = ""; /*****/ $_SESSION['message'] = "" ?>
        <?php endif; ?>
        
<!--        alerta javascript-->
        <div id="alerta" class="alert alert-danger alert-dismissible" role="alert" style="text-align: center">
            <button type="button" class="close" onclick="$('#alerta').hide()"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
		As senhas estão diferentes!!
	</div>
<!--        alerta javascript-->

        
        <div class="container">

            <br /><br />

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3 align="center">Cadastro</h3>
                <br />
                <form id="edit" method="post" action="edit.php?id=<?php echo $id_edit; ?>">

                    <div class="form-group">
                        <input type="text" class="form-control" id="nome" name="usuario['nome']" placeholder="nome" required="requiored" value="<?php echo $usuario_edit['nome']?>">

                    </div>  

                    <div class="form-group">
                        <input type="text" class="form-control" id="usuario" name="usuario['usuario']" placeholder="usuário" value="<?php echo $usuario_edit['usuario']?>">
                       
                    </div>


                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" name="usuario['senha']" placeholder="senha" required="requiored">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="re_senha"  placeholder="repita a senha" required="requiored">
                    </div>
                    
                    <div class="radio">
                          <label><input type="radio" name="usuario['nivel']" value='1' checked>Usuário</label>
                    </div>

                    <div class="radio">
                            <label><input type="radio" name="usuario['nivel']" value='2'>Administrador</label>
                    </div>
                    <button id="cadastrar" type="submit" class="btn btn-primary form-control">Cadastrar</button>

                </form>
            </div>
            <div class="col-md-4"></div>

            <div class="clearfix"></div>
            <br />
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>

        </div>
        
        <script>
            $(document).ready(function(){ 
                $("#alerta").hide();
                
                $( "#edit" ).submit(function( event ) {
                    if($('#senha').val() !== $('#re_senha').val()){                        
                        $('#alerta').show();
                        event.preventDefault();
                   }
                  
                });
            });
                
         
        
        </script>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>