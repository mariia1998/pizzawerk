

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdl/material.min.css">
    <script src="mdl/material.min.js"></script>
    <style>

body {
  background: #111111;
  padding: 10px;
}
.comm {display:block;background:#fff176;height:auto;line-height:30px;padding:10px; font-size: 30px}
.comm .details {height:0;opacity: 0;pointer-events: none;overflow: hidden;}
.comm.active .details {height: auto;opacity: 1;pointer-events: auto;min-height: 3cm;background: #fff9c4}
    </style>
    <title></title>
  </head>
  <body>






<div class="comm" onclick="affd(this)">
NOM
<div class="details">
DESCRIPTION
</div>
</div>











<script src="js/frequency.js" charset="utf-8"></script>
<script type="text/javascript">
function affd(el){
  el.classList.toggle('active');
}
</script>
</div>
