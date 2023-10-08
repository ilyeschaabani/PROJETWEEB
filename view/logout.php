<?php
session_start();
setcookie('email', '',time()-3600);
setcookie('password', '',time()-3600);
unset($_SESSION['facebook_access_token']);
unset($_SESSION['fb_user_id']);
unset($_SESSION['fb_user_name']);
unset($_SESSION['fb_user_email']);
unset($_SESSION['fb_user_pic']);
$_SESSION = array();
session_destroy();
header('Location: ./index.php');
?>
