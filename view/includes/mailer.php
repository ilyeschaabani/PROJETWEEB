<?php
    $email = $_POST['email'];
    $subject = "Email from Contact form";
   // $comment = $_POST['comment'];
    mail($email,$subject,$comment);
?>