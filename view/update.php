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
include '../controller/clientC.php';


$pc = new clientC();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $client = $pc->getclient($id);
}
if(isset($_POST['update'])) {
    $client = new client($_POST['prenom'],$_POST['nom'],$_POST['contenu'],$_POST['date']);
    $pc->update($id, $client);
    header('Location: listClients.php');
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
    
<h1>Edit client</h1>
   
   <form method="post">
   <div class="inputbox">
        
        <input type="text" name="prenom" value="<?php echo $client['prenom'] ?>" required><br><br>
        <span>prenom </span>
                </div>
                <div class="inputbox">
       
        <input type="text" name="nom" value="<?php echo $client['nom'] ?>" required><br><br>
        <span>nom </span>
                </div>
                <div class="inputbox">
    
        <input type="text" name="contenu" value="<?php echo $client['contenu'] ?>" required><br><br>
        <span>contenu </span>
                </div>
                <div class="inputbox">
        
        <input type="date" name="date" value="<?php echo $client['date'] ?>" required><br><br>
        <span>date </span>
                </div>
        <input type="submit" name="update" value="Update">
   </form>
   
</body>
</html> 
