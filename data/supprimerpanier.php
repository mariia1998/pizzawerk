<?php
$id= $_POST['id'];
$dbname =   __DIR__ . '/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

$file_db->exec("DELETE FROM commande WHERE id IN($id) AND etat <> 1") OR print_r( $file_db->errorInfo());



 ?>
