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
            <h1>Delete</h1>
        </div>
        <div class="center">
<?php
include '../Controller/ClientC.php';


$pc = new ClientC();


    $id = $_GET['id'];
  
        $pc->DeleteClient($id);

        header('Location:ListClients.php');
        
    
  
?>
