<?php
include '../Controller/ReclamationC.php';

$pc = new ReclamationC();

$idR = $_GET['idR'];
echo "ID to delete: " . $idR;

$pc->DeleteReclamation($idR);
echo "Reclamation deleted successfully!";

header('Location: ListReclamation.php');
exit();
?>