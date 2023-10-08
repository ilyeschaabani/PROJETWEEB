<?php
include '../Controller/RepC.php';

$pc = new RepC ();


    $id = $_GET['id'];
  
        $pc->DeleteRep($id);
    


        header('Location:ListRep.php');
        
    
  
?>
