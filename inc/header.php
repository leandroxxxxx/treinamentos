<?php //use Usuarios\Session ;?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Treinamentos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo BASEURL; ?>index.php" class="navbar-brand">Treinamento</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">          
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Menu <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEURL; ?>treinamentos">Gerenciar Treinamentos</a></li>
                    <li><a href="<?php echo BASEURL; ?>treinamentos/add.php">Novo Treinamento</a></li>
                    <li <?php echo $display;?>><a href="<?php echo BASEURL; ?>usuarios/manager.php">Usuários</a></li>
                </ul>
            </li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><?= $_SESSION['nome']?></a></li>    
                <li><a href="../../treinamento/usuarios/logout.php">Sair</a></li>
	          </ul>
        </div><!--/.navbar-collapse -->
      </div>
        
    </nav>

    <main class="container">
