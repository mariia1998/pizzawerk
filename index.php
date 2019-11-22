<?php
if (!isset($_COOKIE['gid'])) {
  setcookie("gid", RandomString(), time()+3600000,"/", "", 0);
}


function RandomString()
{
    $characters = '0123456789ABCDEFGHJKL';
    $randstring = '';
    for ($i = 0; $i < 8; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="mdl/material.min.css" >
<script src="mdl/material.min.js" charset="utf-8"></script>
<style media="screen">
  .infos {
    position:fixed;left:0;right:0;top:0;bottom:0;
    display: none;pointer-events: none;z-index: 0;
    background: #fff;
  }
.infos.aff {
  display: block;
  pointer-events: auto;
  z-index: 10;

}
</style>

</head>
<body style="background:#fff176">

<div class="mdl-card__actions">
  <img src=images/pizzawerk3.png style=" height:220px;margin-left:70px;margin-top:200px;"></img>
</div>
<div align="center">

<div class="mdl-spinner mdl-js-spinner is-active"></div>
</div>
</div>



<div class="infos">

     <div class="mdl-textfield mdl-js-textfield">
      <input class="mdl-textfield__input" type="text" id="nom">
      <label class="mdl-textfield__label" for="nom">Nom...</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield">
      <input class="mdl-textfield__input" type="text" id="adr">
      <label class="mdl-textfield__label" for="adr">Adresse...</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield">
      <input class="mdl-textfield__input" type="text" id="tel">
      <label class="mdl-textfield__label" for="tel">Tel...</label>
    </div>
<br>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="sauvegarder()">
      SAVE
    </button>



</div>


</body>


<script type="text/javascript">
// localStorage.nom = '';
// localStorage.adresse = '';
// localStorage.tel = '';
// localStorage.gps = '';


function sauvegarder(){
localStorage.nom = document.querySelector('#nom').value;
localStorage.adresse = document.querySelector('#adr').value;
localStorage.tel = document.querySelector('#tel').value;

verifierLesInfos();
}


window.onload = verifierLesInfos;
 function verifierLesInfos () {
if (localStorage.nom == undefined) {
document.querySelector('.infos').classList.add('aff');
} else {
   window.location.href = "acceuil.php";
}
}








</script>






</html>
