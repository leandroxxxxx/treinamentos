

<?php 
        require_once 'session.php';

        if($_SESSION['nivel'] != 2){
            echo 'Você não tem permissão para acessar esta página';
            exit();     
}
?>
<?php
$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0; //retorna erro via get caso o usuario ja exista
$erro_senha = isset($_GET['erro_senha']) ? $_GET['erro_senha'] : 0;
$retorno = isset($_GET['retorno']) ? $_GET['retorno'] : 0;
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

        <?php if ($retorno == 1) : ?>
                <div class="alert alert-success" alert-dismissible role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p align="center">Cadastro realizado com sucesso!<p>
                </div>

        <?php endif; ?>
        <div class="container">

            <br /><br />

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3 align="center">Cadastro</h3>
                <br />
                <form method="post" action="registra_usuario.php" id="formCadastrarse">

                    <div class="form-group">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="nome" required="requiored">

                    </div>  

                    <div class="form-group">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuário" >
                        <?php
                        if ($erro_usuario) {
                            echo '<font style="color:#FF0000">Usuário já cadastrado</font>';
                        }
                        ?>
                    </div>


                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="senha" required="requiored">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="re_senha" name="re_senha" placeholder="repita a senha" required="requiored">
                    </div>
                    <?php
                        if ($erro_senha) {
                            echo '<font style="color:#FF0000">Senhas não conferem</font>';
                        }
                    ?>
                    <div class="radio">
                          <label><input type="radio" name="usuario_nivel" value='1' checked>Usuário</label>
                    </div>

                    <div class="radio">
                            <label><input type="radio" name="usuario_nivel" value='2'>Administrador</label>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Cadastrar</button>

                </form>
            </div>
            <div class="col-md-4"></div>

            <div class="clearfix"></div>
            <br />
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>

        </div>


    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>