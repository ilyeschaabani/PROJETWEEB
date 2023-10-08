<?php
include("../config.php");
$options = isset($_POST['options']) ? explode(',', $_POST['options']) : array();

// Print out the selected options
foreach ($options as $option) {
  echo $option . "<br>";
}
?>