<?php

$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");
$gid =$_COOKIE['gid'];



if (isset($_GET['trash']) && $_GET['trash'] > 0)  {
$trashid= $_GET['trash'];
  $file_db->exec("DELETE FROM panier WHERE id='$trashid'");
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdl/material.min.css">
    <script src="mdl/material.min.js"></script>
    <style>

table.panier {width:100%;}
table.panier tr td{padding:8px;}
.page-content{padding:8px;}
    </style>
    <title></title>
  </head>
  <body style="background:#fff59d">



<!-- No header, and the drawer stays open on larger screens (fixed drawer). -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

<?php include 'navbar.php'; ?>

<main class="mdl-layout__content">
  <div class="page-content">





  <style media="screen">
  strong{color:red;}
  i{color:red;}
  </style>
    <div class="mdl-card__actions">
      <img src=images/pizzawerk3.png style=" height:120px;margin-left:110px;margin-top:10px;margin-bottom:20px;"></img>
    </div>


      <i class="material-icons">place</i>
    <strong style="color:black;"> Landgrafenstrasse 87   Dortmund</strong>

    <hr>


    <i class="material-icons">phone</i>
  <strong style="color:black;"> 0231 - 47797356</strong>

  <hr>
  <i class="material-icons">restaurant</i>
  <strong> Öffnungszeiten:</strong>
  <br>
  Mo.-So. und Feiertage:
  <br>
  11:30 - 23:00 Uhr
  <br>
  Fr.:16:30 - 23:00 Uhr

  <hr>


  <i class="material-icons">local_shipping</i>
  <strong> Lieferzeiten:</strong>
  <br>
  Mo.-So. und Feiertage:
  <br>
  12:00 - 22:30 Uhr
  <br>
  Fr.:16:30 - 22:30 Uhr
  <hr>









  </div>
</main>

</div>
