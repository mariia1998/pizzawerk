<?php

$dbname =   __DIR__ . '/data/pizzawerk.db';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdl/material.min.css">
    <script src="mdl/material.min.js"></script>
    <style>
    .fullscreen {position: fixed;left:0;right:0;top:0;bottom: 0px;background-color: #000!important;z-index: 2;color: #fff;padding: 90px 15px;
    background-size: 100vw 300px!important;padding-top: 300px}
    .fullscreen.hid {opacity: 0;pointer-events: none}
    .fullscreen .close {font-size: 48px;position: absolute;left:15px;top:70px}


    .demo-card-event.mdl-card {
      width: 100%;
      height: 256px;
      background: #263238;
      margin-bottom:5px;
    }
    .demo-card-event > .mdl-card__actions {
      border-color: rgba(255, 255, 255, 0.2);
    }
    .demo-card-event > .mdl-card__title {
      align-items: flex-start;
     }
    .demo-card-event > .mdl-card__title > h4 {
      margin-top: 0;
      background: rgba(0,0,0,0.5)
    }
    .demo-card-event > .mdl-card__actions {
      display: flex;
      box-sizing:border-box;
      align-items: center;
    }
    .demo-card-event > .mdl-card__actions > .material-icons {
      padding-right: 10px;
    }
    .demo-card-event > .mdl-card__title,
    .demo-card-event > .mdl-card__actions,
    .demo-card-event > .mdl-card__actions > .mdl-button {
      color: #fff;
    }
    .page-content {padding:10px}
    </style>
    <title></title>
  </head>
  <body>



<!-- No header, and the drawer stays open on larger screens (fixed drawer). -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

<?php include 'navbar.php'; ?>

<main class="mdl-layout__content">
  <div class="page-content">




     <!-- <div class="demo-card-event mdl-card mdl-shadow--2dp">
       <div class="mdl-card__title mdl-card--expand" style="background:url('images/pizza1.jpg')">
         <h4>
           ANGEBOT<br>
           11.-  €
         </h4>
       </div>
       <div class="mdl-card__actions mdl-card--border">
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"> Add</button>
         <div class="mdl-layout-spacer"></div>
         11.-  €
       </div>
     </div> -->


<?php

$condition = "";
if (isset($_GET['cid'])) {
  $condition = " WHERE id_categorie ='".$_GET['cid']."'";
}

$result_one = $file_db->query("SELECT * FROM menu $condition");
foreach($result_one as $row) {
 // print_r($row);
 $row['description'] = str_replace("'","\'",$row['description']);
 $image = ($row['image']== ''?'':'style="background:url(\'images/'.$row['image'].'\');background-size:cover"');
 print '<div class="demo-card-event mdl-card mdl-shadow--2dp" data-name="'.$row['nom'].'" data-details="'.$row['description'].'" data-id="'.$row['id'].'"  data-image="'.$row['image'].'" data-price="'.$row['prix'].'" onclick="showRam(this)">';
 print '<div class="mdl-card__title mdl-card--expand" '.$image.'>';
 print '<h4>'.$row['nom'].'</h4> </div>';
 print ' <div class="mdl-card__actions mdl-card--border">';
// print '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="ajouterAuPanier('.$row['id'].')"><i class="material-icons">add_shopping_cart</i></button>';
 print ' <div class="mdl-layout-spacer"></div>';
 print  $row['prix'].' €</div></div>';
}



 ?>







  </div>



<div class="fullscreen hid" >


    <span class="material-icons close" onclick="trans.close()" style="text-shadow: 2px 2px 4px rgba(23,10,6,0.88);">keyboard_arrow_left</span>
<h2 id="titre"></h2>


 <hr>

<h4 id="details"></h4>

<div class="" style="margin:auto">

<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored"  onclick="qtt_plus()" style="background:red">
  <i class="material-icons">add</i>
</button>

<input size="2" value="1"  id='qte' style="width:30px;height:30px;text-align:center"  >
<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" onclick="qtt_moins()" style="background:red">
  <i class="material-icons">-</i>
</button>
<span style="float:right;font-size:20px" id="prix"> </span>

</div>
<br>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="valider" style="margin:auto" onclick="ajouterAuPanier()">
Valider
</button>
</div>


  <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
</main>
<script src="js/ramjet.js" charset="utf-8"></script>
<script type="text/javascript">



function ajouterAuPanier(){
  document.getElementById('valider').setAttribute('disabled','disabled');
frequency.post('data/ajouteraupanier.php','mid='+id_act+'&mqt='+qtt,function(re){
  console.log(re);
notification('commande ajoutée , montant '+re +'€');
})

}

var prix_u , qtt =1 , id_act;

function qtt_moins(){
if (qtt == 1) return;
  qtt--;
  document.getElementById('qte').value = qtt;

  document.getElementById('prix').innerText = parseFloat(prix_u) *qtt+ '  €';

}

function qtt_plus(){
  qtt++;
  document.getElementById('qte').value = qtt;

  document.getElementById('prix').innerText = parseFloat(prix_u) *qtt+ '  €';
}

function showRam(x){
    document.getElementById('valider').removeAttribute('disabled');
  var sprice =  x.getAttribute('data-price') ,
  sname = x.getAttribute('data-name'),
  sid = x.getAttribute('data-id'),
  sdesc = x.getAttribute('data-details'),
  simage = x.getAttribute('data-image');
  id_act = sid;
  document.getElementById('titre').innerText = sname;
  document.getElementById('details').innerText = sdesc;
  document.querySelector('.fullscreen').setAttribute('style',"background:url('images/"+simage+"') no-repeat;")
prix_u = sprice;
qtt=1;
document.getElementById('qte').value = 1;
document.getElementById('prix').innerText = prix_u + '  €';


 trans.a = x;
 trans.run();
}

function notification(txt) {
  var snackbarContainer = document.querySelector('#demo-toast-example');
  var data = {message: txt};
  snackbarContainer.MaterialSnackbar.showSnackbar(data);
}



var ca;
var trans = {
  a:null,
  b: document.querySelector('.fullscreen'),
  run: function(){
     if (ca == trans.a) {trans.close();ca = null;return;}
    ramjet.transform( trans.a, trans.b, {
  done: function () {
     trans.b.classList.remove('hid');
     ca = trans.a;
  }
});
// trans.a.classList.add('hidden');
// trans.b.classList.add('hidden');

} ,
close : function(){
  // _('.fsinner').innerHTML = '';
  trans.b.classList.add('hid');

  ramjet.transform( trans.b, trans.a, {
done: function () {
   trans.b.classList.add('hid');
   ca = null;
}
});


}
}
</script>

<script src="js/frequency.js" charset="utf-8"></script>

</div>
