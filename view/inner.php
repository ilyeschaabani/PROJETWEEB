<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindzone</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #4CAF50;
    color: white;
    border-right: 1px solid #ddd;
  }

  td {
    background-color: #f2f2f2;
    color: black;
    border-right: 1px solid #ddd;
  }
</style>


</head>
<body>
    
<!-- header section starts  -->

<header class="header "id="particles-js" >

    <a href="#" class="logo"><span>A</span>vanti</a>

    <nav class="navbar" >
        <a href="http://127.0.0.1/projet%20web/view/index.html">home</a>
        
    </nav>

    <div id="menu-bars" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

    <div class="content">
<?php
include '../controller/clientC.php';
$pc = new clientC();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $p1= $pc->join ($id);
}
?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Avanti</title>
</head>-->
<body>
<form id="searchForm" method="GET">
    <input type="text" name="id" >
    <button type="submit">Search</button>
</form>
<div class="form-wrap">
    <form action="">
        <h2 class="mt-5 mb-15"><span></span> Reclamation</h2>
        <style>h2 {
  color: white;
  font-size: 30px;
}
</style>
    </form>
</div>

<table class="table" id="avisTalbe">
    <tr>
        <td>prenom</td>
        <td>nom</td>
        <td>date</td>
        <td>contenu</td>
        <td>contenu_rep</td>
        <td>date_rep</td>
        
        
    </tr>
    <?php
    foreach ($p1 as $row) {
    ?>
    <tr>
        <td><?= $row['prenom']; ?></td>
        <td><?= $row['nom']; ?></td>
        
        <td><?= $row['date']; ?></td>
        <td><?= $row['contenu']; ?></td>
        <td><?= $row['contenu_rep']; ?></td>
        <td><?= $row['date_rep']; ?></td>
       
       
        <td>
            <!-- Add actions here if needed -->
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>