<?php
$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");
$id = $_GET['id'];
$date = date('Y-m-d H:i');
$file_db->exec("UPDATE commande SET etat='1',debut='$date' WHERE id='$id'");
$result_one = $file_db->query("SELECT *,(SELECT nom from menu  where menu.id=panier.id_menu ) AS mmenu FROM panier  where cid='$id'");
foreach($result_one as $row) {

$data[] = $row;


}



$json = json_encode( $data );
header("Content-type: application/json");
exit(  $json );

 ?>
