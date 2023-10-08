
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
            <h1>List avis</h1>
        </div>
        <div class="center">

<?php
include '../Controller/RepC.php';

$pc = new RepC();

$liste = $pc->listRep();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avanti</title>
</head>
<body>
    
<h1 > table réponse</h1>
   
   <table border=1 width="100%" >
         <tr align="center">
         <td>id reponse </td>
         <td>date </td>
         <td>contenu </td>
         </tr>
         <?php
        foreach ($liste as $p) {

        ?>
        <tr>
        <td><?= $p['id']; ?></td> 
        <td><?= $p['date_rep']; ?></td>
        <td><?= $p['contenu_rep']; ?></td>
        
        <td><a href="deleteRep.php?id=<?= $p['id']; ?>">Delete</a> 
            <form action="updateRep.php">
                <input type="hidden" name='id' value="<?= $p['id'];?>">
                <input type="submit" value="update"></form> 
    </td>
        </tr>
        <?php } ?>
        </table>
        
</body>
</html>
</body>
</html>