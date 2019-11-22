
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="mdl/material.min.css" >
    <link rel="stylesheet" href="mdl/animate.css" >
<script src="mdl/material.min.js" charset="utf-8"></script>
<style media="screen">

.commandes {padding:15px;}
.comm {background:#90caf9;height: 2cm;padding-left:3cm;position: relative;font-size: 0.5cm;margin-bottom: 5px}
.comm[data-status="-1"] {background: #ef9a9a}
.comm[data-status="1"] {background: #fff59d}
.comm[data-status="2"] {background: #e6ee9c}
.comm .temp{position: absolute;left:0;top:0;width:3cm;text-align: center;line-height: 2cm;font-size: 1cm}
.comm span.alert {color:#FF0000}

.comm .plus5{position: absolute;right:0;top:0;width:2cm;height: 2cm;text-align: center;line-height: 2cm;font-size: 1cm;opacity:0.4}
.comm .nom {line-height: 1cm;}
.comm h3 {line-height: 1cm;margin:0}
.comm h5 {line-height: 0.5cm;margin:0}

 .table{background:#e57373;margin-bottom: 1cm;margin-top: 1cm;text-align: left;margin-left: auto;margin-right:auto}

.det {padding:10px;background-color:#ef5350;bottom: 5px;height: auto;opacity: 0}
.afficher{color:#fff;margin-bottom:5px;opacity:1}
.masquer{display: none;}
</style>

</head>
<body style="background:#111">


  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--8-col">
      <div class="commandes">








      <div class="comm">

       <h3> Adresse</h3>
        <h5 >08465798</h5>
       <h5 >nom</h5>
       <div class="temp wow infinite pulse">15 "</div>
       <button class="mdl-button plus5">
         5+</button>
      </div>


      <div class="comm">

       <h3> Adresse</h3>
        <h5 >08465798</h5>
       <h5 >nom</h5>
       <div class="temp wow infinite pulse">15 "</div>
       <button class="mdl-button plus5">
         5+</button>
      </div>


      <div class="comm">

       <h3> Adresse</h3>
        <h5 >08465798</h5>
       <h5 >nom</h5>
       <div class="temp wow infinite pulse">15 "</div>
       <button class="mdl-button plus5">
         5+</button>
      </div>

      <div class="comm">

       <h3> Adresse</h3>
        <h5 >08465798</h5>
       <h5 >nom</h5>
       <div class="temp wow infinite pulse">15 "</div>
       <button class="mdl-button plus5">
         5+</button>
      </div>







      <div class="comm">

       <h3> Adresse</h3>
        <h5 >08465798</h5>
       <h5 >nom</h5>
       <div class="temp wow infinite pulse">15 "</div>
       <button class="mdl-button plus5 ">
         5+</button>
      </div>






      </div>


    </div>
    <div class="mdl-cell mdl-cell--4-col det " >


      <div class="mdl-grid tmp masquer">
        <div class="mdl-cell mdl-cell--6-col"><!-- Colored raised button -->
<button onclick='settime(15)' class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
  15 min</button>
</div>

<div class="mdl-cell mdl-cell--6-col"><!-- Colored raised button -->
<button onclick='settime(30)' class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
30 min
</button>
</div>

        <div class="mdl-cell mdl-cell--6-col"><!-- Colored raised button -->
<button onclick='settime(45)' class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
45 min
</button>
</div>

<div class="mdl-cell mdl-cell--6-col"><!-- Colored raised button -->
<button onclick='settime(60)' class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
  60 min
</button>
</div>


      </div>




      <table class="mdl-data-table  mdl-shadow--2dp table" >
        <thead>
          <!-- <tr>
             <th class="mdl-data-table__cell--non-numeric"></th>
               <th>qt</th>
               <th>m</th>
               <th>montant</th>
             </tr> -->
</head>
        <tbody id="details">
          <tr>
            <td >25</td>
            <td class="mdl-data-table__cell--non-numeric">pizza</td>
          </tr>
          <tr>
            <td>50</td>
            <td class="mdl-data-table__cell--non-numeric">nuddeln</td>
          </tr>
          <tr>
            <td>10</td>
            <td class="mdl-data-table__cell--non-numeric">pasta</td>
          </tr>
        </tbody>
      </table>

<div class="">

  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
  valider
  </button>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="supprimer()">
  löschen
  </button>
</div>


    </div>

  </div>





  <script type="text/javascript">
  var idactive ;
  function show(id,tmp) {
      frequency.getJSON('jdetails.php?id='+id,function(res){
        console.log(res);
        var details = '';

        if (tmp == undefined) {
          document.querySelector('.tmp').classList.remove('masquer');
        } else {

          document.querySelector('.tmp').classList.add('masquer');
        }
idactive = id;
document.querySelector('[data-id="'+idactive+'"]').setAttribute('data-status','1');
      res.forEach(function(comm){

          details+='<tr><td >'+comm.quantite+'</td><td>'+comm.mmenu+'</td><td>'+comm.montant +' e</td></tr>';
        })

document.querySelector('#details').innerHTML=details;


        document.querySelector('.det').classList.add('afficher');
      })
  }
  function hide() {
      document.querySelector('.det').classList.remove('afficher')
  }
  function settime(t,cid) {
    if (cid == undefined ) cid= idactive;
    frequency.get('settime.php?cid='+cid+'&t='+t,function(){
      document.querySelector('.tmp').classList.add('masquer');
    })

  }

  function supprimer(){
    frequency.get('delete.php?cid='+idactive,function(){
document.querySelector('[data-id="'+idactive+'"]').setAttribute('data-status','-1');
    //  document.querySelector('.tmp').classList.add('masquer');
    hide();

    })

  }
  function valider() {

    frequency.get('.php?cid='+idactive,function(){

    //  document.querySelector('.tmp').classList.add('masquer');
    hide();
  //  init();

    })
  }


</script>

  <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/frequency.js"></script>
  <script type="text/javascript" src="js/moment.min.js"></script>

<script type="text/javascript" src="js/wow.js"></script>
            <script>
             new WOW().init();

var liste , minutes;
function init() {
  var tp='';
  frequency.getJSON('jcomm.php',function(res){
    liste = res;

liste.forEach(function(comm){
  minutes = '';
  if (comm.temps == '' && comm.debut !== '') {
    minutes = moment().diff(moment(comm.date),'minutes');
    minutes+= '"';
  } else {
    var t = moment(comm.debut).add(comm.temps,'minutes');
minutes = t.diff(moment(),'minutes');
minutes = afficherTempRest(minutes);
}
  tp +='<div data-id="'+comm.id+'" data-status="'+comm.etat+'" class="comm" onclick="show('+comm.id+','+comm.temps+')"><h3 class="nom">'+comm.nom+'</h3><h5 >'+comm.addr+' <br>'+comm.tel+'</h5><div class="temp wow infinite pulse">'+minutes+'</div><button class="mdl-button plus5" onclick="settime(5,'+comm.id+')">5+</button></div>';
})
document.querySelector('.commandes').innerHTML = tp;
  })
   window.setTimeout(init,10000);

}


init();




function afficherTempRest(m){

if (m <= 5) {
if (m >=1 ) {
  return '<span class="alert">'+m+'"</span>';
} else {
  return '<span class="alert">0"</span>';
}
} else {
  return m+'"';
}


}

             </script>

</body>




</html>
