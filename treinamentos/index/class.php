

<?php // 
    $today = date_create('now', new DateTimeZone('America/Sao_Paulo')); 
?>



<?php 
//trocar cor de acordo com o status
//estes valores serao inseridos na tag tr e buscados pelo arquivo style
    if($treinamento['concluido'] == 's'){
        echo "tr_c";
    }elseif(strtotime($treinamento['data_inicio']) < strtotime($today->format("Y-m-d"))){
        echo "tr_3";
    }else{
        if($treinamento['ordem'] == 1){
            echo "tr_1";            
        }
        if($treinamento['ordem'] == 2){
            echo "tr_2";
        }
    }

?>