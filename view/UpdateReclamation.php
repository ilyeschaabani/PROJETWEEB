<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/client.css">
    <title>Mindzone</title>
</head>
<body>
<div class="container">
        <div class="navbar">
            <img src="../assets/img/logo.png" alt="Logo du site web" class="logo"> </br>
            <span></span>
            <h1>update </h1>
        </div>
        <div class="center">
<?php
include '../Controller/ReclamationC.php';


$pc = new ReclamationC();
if(isset($_GET['IdR'])) {
    $id = $_GET['IdR'];
    $client = $pc->getReclamation($idR);
}
if(isset($_POST['updateReclamation'])) {
    $reclamation = new Reclamation($_POST['IdR'],$_POST['typeR'],$_POST['descriptionR']);
    $pc->updateReclamation($idR, $reclamation);
    header('Location: ListReclamation.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindzone</title>
</head>
<body>
    
<h1>Edit Reclamation</h1>
   
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
                <input type="submit" name="update" value="Update">
    </div>
    <script src="../assets/js/reclamation.js"></script>
</body>
</html> 
