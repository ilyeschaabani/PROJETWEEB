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
include '../Controller/ClientC.php';

$pc = new ClientC();

$liste = $pc->listClient();


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
    
   <h1>clients table</h1>
   <script
            src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
            integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
   
        <button id="download-button">Export Pdf</button>

   <table border=1 width="100%" id="table">
         <tr align="center">
         <td>id client </td>
         <td>prenom </td>
         <td>nom </td>
         <td>contenu </td>
         <td>Date </td>
         </tr>
         <?php
        foreach ($liste as $p) {

        ?>
        <tr>
        <td><?= $p['id']; ?></td> 
        <td><?= $p['prenom']; ?></td> 
        <td><?= $p['nom']; ?></td>
        <td><?= $p['contenu']; ?></td>
        <td><?= $p['date']; ?></td>
        <td><a href="delete.php?id=<?= $p['id']; ?>">Delete</a> 
            <form action="update.php">
                <input type="hidden" name='id' value="<?= $p['id'];?>">
                <input type="submit" value="update"></form> 
    </td>
        </tr>
        <?php } ?>
        </table>
        <script>
            const btn = document.getElementById('download-button');

            function generatePDF() {
                // Choose the element that your content will be rendered to.
                const element = document.getElementById('table');
                // Choose the element and save the PDF for your user.
                html2pdf().from(element).save();
            }

            btn.addEventListener('click', generatePDF);
        </script> 
        
</body>
</html>