<?php
$id_com= $_POST['mid'];
$id_qtt= $_POST['mqt'];
$gid=$_COOKIE['gid'];

$dbname =   __DIR__ . '/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

$result_one = $file_db->query("SELECT prix FROM menu WHERE id='$id_com' ") ;
foreach($result_one as $row) {
$prix = $row['prix'];
}

$trouve = false;
$result_one = $file_db->query("SELECT * FROM panier WHERE id_menu='$id_com' and gid='$gid' AND cid=''") ;
foreach($result_one as $row) {
$trouve =true;
}

if ($trouve){
  $file_db->exec(" UPDATE panier SET quantite=quantite+($id_qtt),montant=montant+$prix WHERE id_menu='$id_com'and cid='' and gid='$gid'");
} else {
$file_db->exec(" INSERT INTO panier (gid,cid,id_menu,quantite,prix,montant,confirme) VALUES ('$gid','',$id_com,$id_qtt,$prix,$prix,'0' ) ");
}



$result_one = $file_db->query("SELECT SUM(prix*quantite) AS MNT from panier WHERE gid='$gid'  AND cid=''") ;
foreach($result_one as $row) {
print $row['MNT'];
}


 ?>
