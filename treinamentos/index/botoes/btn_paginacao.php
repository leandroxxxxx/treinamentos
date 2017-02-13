<?php 
        // variaveis pag, tp e tr vem do arquivo filtro que ja foi chamado no index
    $anterior = $pag -1;
    $proximo = $pag +1;    
      
    function getParam(){
        if(isset($_REQUEST)){
        $param = "";
        
        //a funcao abaixo eh para pegar os parametros ja existentes na url
        foreach ($_REQUEST as $key => $value){
            if($key != "pagina"){  //para nao repitir a pagina
                $param .=$key."=".$value."&"; 
            }
        }
        return $param;
        }
    }
?>


<?php if($tp >= 1): //caso o total de paginas seja somente igual a 1?> 
    <div>
      <ul class="pager">
          <p class="text-muted">Página <?php echo $pag ?> de <?php echo $tp ?></p>
          <?php if($pag>1):?>
          <li><a href="?<?php echo getParam() ?>pagina=<?php echo $anterior?>">Anterior</a></li>
          <?php else: ?>  
              <li ><a href="#" style="background-color:#dddddd; cursor: default ">Anterior</a></li>
          <?php endif; ?>
              
          <?php if($pag<$tp): //na ultima pagina este botao nao aparece?>
              <li><a href="?<?php echo getParam() ?>pagina=<?php echo $proximo?>">Proximo</a></li>
          <?php else: ?>  
              <li ><a href="#" style="background-color:#dddddd; cursor: default ">Próximo</a></li>
          <?php endif; ?>        

      </ul>
    </div>
<?php endif; ?>