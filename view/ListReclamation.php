<?php
include '../Controller/ReclamationC.php';

$pc = new ReclamationC();

$liste = $pc->listReclamation();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Reclamations</title>
</head>
<body>
    
   <h1>Table Reclamations</h1>
   
   <table border=1 width="100%">
         <tr align="center">
         <td>id reclamation</td>
         <td>type reclamation </td>
         <td>description reclamation </td>
         
         </tr>
         <?php
        foreach ($liste as $p) {

        ?>
        <tr>
        <td><?= $p['IdR']; ?></td> 
        <td><?= $p['typeR']; ?></td> 
        <td><?= $p['descriptionR']; ?></td>
        <td><a href="DeleteReclamation.php?idR=<?= $p['IdR']; ?>">Delete</a> 
            <form action="update.php">
                <input type="hidden" name='IdR' value="<?= $p['IdR'];?>">
                <input type="submit" value="update"></form> 
    </td>
        </tr>
        <?php } ?>
        </table>
</body>
</html>