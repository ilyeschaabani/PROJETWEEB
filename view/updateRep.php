<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reponse.css">
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
include '../Controller/RepC.php';


$pc = new RepC();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $reponsee = $pc-> getRep($id);
}
if(isset($_POST['update'])) {
    $reponsee = new reponsee($_POST['contenu_rep'],$_POST['date_rep']);
    $pc->update($id, $reponsee);
    header('Location: listRep.php');
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
    
<h1>Table reponse</h1>
   
   <form method="post">
   <div class="inputbox">
        
        <input type="text" name="contenu_rep" value="<?php echo $reponse ['contenu_rep'] ?>" required><br><br>
        <span>contenu_rep </span>
                </div>
                <div class="inputbox">
        
        <input type="date" name="date_rep" value="<?php echo $reponse ['date_rep'] ?>" required><br><br>
        <span>date_rep </span>
                </div>
        <input type="submit" name="update" value="Update">
   </form>
   
</body>
</html> 