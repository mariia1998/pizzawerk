<?php
$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");
$id = $_GET['cid'];


  $file_db->exec("UPDATE commande SET etat='-1'  WHERE id='$id'");





 ?>
