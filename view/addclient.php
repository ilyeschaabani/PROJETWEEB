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
            <h1>Gestion d'avis</h1>
        </div>
        <div class="center">
<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="inputbox">
                  <input type="text" id="Id" name="Id" required="required">
                  <span>Id </span>
                </div>
                <div class="inputbox">
        <input type="text" name="prenom" placeholder="Entrer votre prenom "required>
        <span>prenom</span>
                </div>
                <div class="inputbox">
        <input type="text" name="nom" placeholder="Entrer votre nom"required >
        <span>nom</span>
                </div>
        <div class="inputbox">
        <input type="text" name="contenu" placeholder="Entrer le contenu de votre avis"required>
        <span>contenu </span>
                </div>
        <div class="inputbox">
        <input type="date" name="date" placeholder="Entrer la date actuel"required>
        <span>date </span>
                </div>
                <div class="inputbox">
        <input type="text" name="mail" placeholder="Entrer votre adresse mail "required>
        <span>mail </span>
                </div>
       
        <input type="submit" value="Save">
    </form>
</body>
<script src="../assets/js/client.js"></script>

</html>
</html>
<?php
include '../Controller/ClientC.php';
//include '../Model/Client.php';
$pc = new ClientC();
  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $c = new client(  $_POST['prenom'], $_POST['nom'], $_POST['contenu'], $_POST['date']);
    
        $pc->addClient($c);
             // $pc->addcrud($c);

             header('Location:ListClients.php');
        
    
        }
        
       
    

?>

<?php

include '../controller/clientC.php';
require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/Exception.php';
require_once 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//include '../model/client.php';
$pc = new ClientC();
  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //
    
    // collect value of input field
    $c = new client($_POST['id'],$_POST['prenom'], $_POST['nom'], $_POST['contenu'], $_POST['date']);
    $email=$_POST['email'];
    $nom=$_POST['nom'];
    $contenu=$_POST['contenu'];
    
    

    // use the function to send an email
    $to = $email;
    $subject = 'Mindzone';
    $message = $contenu;
    send_email($email, $subject, $message);
        $pc->addclient($c);
       // $pc->addcrud($c);

       if (send_email($email, $subject, $message)) {
         echo 'Email sent successfully!';
       } else {
         echo 'Email could not be sent.';
       }
       
       
        header('Location:ListClients.php');
        

// include the function
}
function send_email($to, $subject, $message) {
  // Instantiation and passing true enables exceptions
  $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'meriem.bousseta@esprit.tn';                  // SMTP username
    $mail->Password   = 'jddrwscfndwqjbaz';                         // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above

    //Recipients
    $mail->setFrom('meriem.bousseta@esprit.tn', 'meriem');
    $mail->addAddress($to);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "<h1> Welcome to our website </h1> <p>" . $message . "</p>";
    $mail->send();
    return true;
  } catch (Exception $e) {
    return false;
  }
}

?>







 
 