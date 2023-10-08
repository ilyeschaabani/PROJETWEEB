<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/client.css">
    <title>Mindzone</title>
</head>
</body>
<div class="container">
        <div class="navbar">
            <img src="../assets/img/logo.png" alt="Logo du site web" class="logo"> </br>
            <span></span>
            <h1>Gestion reponse</h1>
        </div>
        
        <div class="center">
<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="inputbox">
                  <input type="text" id="Id" name="Id" required="required">
                  <span>Id </span>
                </div>
                <div class="inputbox">
        <input type="text" name="contenu_rep" placeholder="Entrer votre reponse "required>
        <span>contenu_rep</span>
                </div>
                <div class="inputbox">
        <input type="date" name="date_rep" placeholder="Entrer la date "required >
        <span>date_rep</span>
                </div>
       
       
        <input type="submit" value="Save">
    </form>
<!-- header section starts  -->



<!--controle de saisi-->
<script>
    
  function condition(event) {
    var regex = /^[a-zA-Z\s]+$/; 
    let text = event.target.value;
    if (!regex.test(text) ) {
        event.target.setCustomValidity("only caracteres");
      return false;
    } 
  }
  
</script>
<?php
include '../Controller/RepC.php';


$pc = new RepC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input fields
    
    $contenu_rep = isset($_POST['contenu_rep']) ? $_POST['contenu_rep'] : "";
    $date_rep = isset($_POST['date_rep']) ? $_POST['date_rep'] : "";
    
    if ( !empty($contenu_rep) && !empty($date_rep)) {
        $c = new reponsee($contenu_rep, $date_rep);
        
    
        $pc->addRep($c);

        header('Location:ListRep.php');
        exit();
    } else {
        // handle empty input fields
        echo "Please fill in all the fields.";
    }
}
?>
