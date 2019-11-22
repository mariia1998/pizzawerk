<!-- Always shows a header, even in smaller screens. -->

  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">PizzaWerk</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation ">
        <a class="mdl-navigation__link" href="panier.php"><i class="material-icons">shopping_cart</i></a>

      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">PizzaWerk</span>
    <nav class="mdl-navigation">
      <!-- <a class="mdl-navigation__link" href="">Pizzen</a>
      <a class="mdl-navigation__link" href="">Nudeln</a>
      <a class="mdl-navigation__link" href="">Grillgerichete</a>-->
      <a class="mdl-navigation__link" href="description.php"></b>ABOUT</b></a> 
      <?php

      $result_one = $file_db->query("SELECT * FROM categorie ");
      foreach($result_one as $row) {
 print '<a class="mdl-navigation__link" href="acceuil.php?cid='.$row['id'].'">'.$row['nom'].'</a>';
      }

       ?>
    </nav>
  </div>
