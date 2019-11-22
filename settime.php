<?php
$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");
$id = $_GET['cid'];
$t = $_GET['t'];

if($t =='5'){
  $file_db->exec("UPDATE commande SET temps=temps+'$t'  WHERE id='$id'");
} else {
  $file_db->exec("UPDATE commande SET temps='$t'  WHERE id='$id'");
}




 ?>
