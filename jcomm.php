<?php
$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

$data = array();
$result_one = $file_db->query("SELECT * FROM commande where etat='0' OR etat='1'");
foreach($result_one as $row) {

$data[] = $row;


}

$json = json_encode( $data );
header("Content-type: application/json");
exit(  $json );

 ?>
