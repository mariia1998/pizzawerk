<?php
$nom = $_POST['nom'];
$adr = $_POST['adresse'];
$tel = $_POST['tel'];
$gid = $_POST['gid'];
$date = date('Y-m-d H:i:s');

$dbname =   __DIR__ . '/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

$mnt = 0;
$result_one = $file_db->query("SELECT *  FROM panier WHERE gid='$gid' AND cid = '' ") ;
foreach($result_one as $row) {
$mnt+= $row['prix'];
}
print $gid;
 $file_db->query("INSERT INTO commande (gid,montant,temps,date,etat,debut,nom,addr,tel) VALUES ('$gid','$mnt','','$date','0','','$nom','$adr','$tel') ") or  print_r($file_db->errorInfo());
 $nid =  $file_db->lastInsertId();
$file_db->query("UPDATE  panier SET confirme='1',cid='$nid'  WHERE gid='$gid' AND cid='' ") ;


 ?>
