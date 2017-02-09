<?php

  require_once('functions.php'); 
  if (isset($_GET['id'])){
    delete($_GET['id']);
    header('Location: index.php');
  } else {
    die("ERRO: ID não definido.");
  }

