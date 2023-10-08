<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reclamation.css">
    
    <title>Reclamation</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <img src="../assets/img/logo.png" alt="Logo du site web" class="logo"> </br>
            <span></span>
            <h1>Gestion de Reclamation</h1>
        </div>
        <div class="center">
            <form id="f" name="f" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"  >
                <div class="inputbox">
                  <input type="text" id="IdR" name="IdR" required="required">
                  <span>Id Reclamation</span>
                </div>
                <div class="inputbox">
                  <input type="text" id="typeR" name="typeR" required="required">
                  <span>Type Reclamation</span>
                </div>
                <div class="inputbox">
                    
                    <textarea id="descriptionR" name="descriptionR" placeholder="Description Reclamation" ></textarea>
                </div>
                <div class="inputbox">
                    <button type="submit"  >Submit</button> 
                 <br>
                 
                    <button type="Reset">Reset</button>
                  </div>
    </div>
    <script src="../assets/js/reclamation.js"></script>
</body>
</html>

<?php
include_once '../Controller/ReclamationC.php';
include_once '../Model/Reclamation.php';
$pc = new ReclamationC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $r = new Reclamation($_POST['IdR'], $_POST['typeR'], $_POST['descriptionR']);
    
        $pc->addReclamation($r);
       // $pc->addcrud($c);

        header('Location:ListReclamation.php');
}
