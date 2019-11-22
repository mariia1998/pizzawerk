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
.hidden {display:none;}
.mdl-data-table {width: 100%}
    </style>
    <title></title>
  </head>
  <body>



<!-- No header, and the drawer stays open on larger screens (fixed drawer). -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

<?php include 'navbar.php'; ?>

<main class="mdl-layout__content">
  <div class="page-content">


    <?php
  $montant = 0;
  $panier = '';
    $result_one = $file_db->query("SELECT panier.id,panier.quantite,panier.prix,panier.montant,menu.nom FROM panier left join menu on menu.id=panier.id_menu WHERE gid='$gid' AND confirme='0'");
    foreach($result_one as $row) {
     // print_r($row);
     $montant += ($row['quantite'] * $row['prix']);
     $panier.= '<tr><td>'.$row['quantite'].'</td><td>'.$row['nom'].'</td><td>'.$row['montant'].'</td><td><a class="mdl-navigation__link" href="?trash='.$row['id'].'"><i class="material-icons">delete</i></a> </td></tr>';

    }

    $panier.= '<tr><td colspan="2">TOTAL</td> <td colspan="2"><h3><b> '.$montant.' €</b></h3></td></tr>';



     ?>


     <?php if ($montant > 0) {?>

<table class="panier">
  <tr>
    <td>Menge</td>
    <td>Beschreibung</td>
    <td>Betrag</td>
    <td>löschen</td>
  </tr>
  <?php print $panier.' </table>'; ?>



<hr>
<?php } ?>

<div class="conf <?php print($montant >0 ?'':'hidden');?>">

<div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="nom" required>
  <label class="mdl-textfield__label" for="nom">Nom...</label>
</div>
<div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="adresse" required>
  <label class="mdl-textfield__label" for="adresse">adresse...</label>
</div>
<div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="tel" required>
  <label class="mdl-textfield__label" for="tel">telephone...</label>
</div>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"onclick="Confirmer(this)">
  bestätigen
</button>

</div>





<hr>
<h3>meine Befehle</h3>
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Datum</th>
      <th>Betrag</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $result_one = $file_db->query("SELECT * FROM commande WHERE gid='$gid'");
    foreach($result_one as $row) {
      $date = explode(' ',$row['date'])[0];
      $temps = $row['temps'];
      $debut = $row['debut'];
      switch ($row['etat']) {
        case '0':
          $etat='abgeschickt';
          print '<tr c-id="'.$row['id'].'"><td class="mdl-data-table__cell--non-numeric">'.$date.'</td>  <td>'.$row['montant'].'</td><td>'.$etat.'</td></tr>';

          break;

          case '1':

          $etat='in Vorbereitung...';
          if ($temps !== '') $etat =  date('H:i', strtotime($debut. ' + '.$temps.' minutes'));
          print '<tr c-id="'.$row['id'].'" style="background:#fff59d"><td class="mdl-data-table__cell--non-numeric">'.$date.'</td>  <td>'.$row['montant'].'</td><td>'.$etat.'</td></tr>';

         break;

         case '2':


         $etat='fertiggestellt';
         print '<tr c-id="'.$row['id'].'" style="background:#a5d6a7"><td class="mdl-data-table__cell--non-numeric">'.$date.'</td>  <td>'.$row['montant'].'</td><td>'.$etat.'</td></tr>';

        break;


        default:

          $etat='verweigert';
           print '<tr c-id="'.$row['id'].'" style="background:#ef5350"><td class="mdl-data-table__cell--non-numeric" >'.$date.'</td>  <td>'.$row['montant'].'</td><td>'.$etat.'</td></tr>';
                  break;
      }
 // print '<tr><td class="mdl-data-table__cell--non-numeric">'.$row['date'].'</td>  <td>'.$row['montant'].'</td><td>'.$etat.'</td></tr>';
    }



     ?>

    <!-- <tr>
      <td class="mdl-data-table__cell--non-numeric">Acrylic (Transparent)</td>
      <td>25</td>
      <td>$2.90</td>
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">Plywood (Birch)</td>
      <td>50</td>
      <td>$1.25</td>
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">Laminate (Gold on Blue)</td>
      <td>10</td>
      <td>$2.35</td>
    </tr> -->
  </tbody>
</table>




<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"onclick="Supprimer()">
  löschen
</button>







  </div>
</main>
<script src="js/frequency.js" charset="utf-8"></script>
<script type="text/javascript">
  document.getElementById('nom').value = localStorage.nom;
  document.getElementById('adresse').value = localStorage.adresse;
  document.getElementById('tel').value = localStorage.tel;

  function Confirmer(boutton) {
    var nom = document.getElementById('nom').value ,adresse = document.getElementById('adresse').value,tel = document.getElementById('tel').value,gid = '<?php print $_COOKIE['gid']; ?>';
frequency.post('data/confirmer.php','nom='+nom+'&adresse='+adresse+'&tel='+tel+'&gid='+gid,function(l){
  console.log(l);
boutton.remove();
document.querySelector('.conf').remove();
window.location.reload();
})
  }


  function Supprimer() {
var data = [];
  var sel = document.querySelectorAll('.is-selected') ;
  // if (sel.length)
  if (sel.length == 0) return;

for (var i = 0; i < sel.length; i++) {
  // sel[i]
  data.push(sel[i].getAttribute('c-id'));

}

frequency.post('data/supprimerpanier.php','id='+data.join(','),function(res){
  console.log(res);
window.location.reload();
})
console.log(data.join(','));
  }



</script>
</div>
