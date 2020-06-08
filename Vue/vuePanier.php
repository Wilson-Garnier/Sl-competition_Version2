
  <link rel="stylesheet" href="Css/boostrap/css/boostrap.min.css">

<section id="pageContent">


  <article>

    <br><h1>Mon Panier</h1>

  </article>

​

  <article>
    <?php
   if (isset($_SESSION["panierprod"])) {

    ?>
  <table  class="table table-hover">

      <tbody>

        <tr>

          <th>

            <h4>Produit</h4>

          </th>

          <th>

            <h4>Type</h4>

          </th>

          <th>

            <h4 >Id produit</h4>

          </th>

          <th width="5%">

            <h4>Quantité</h4>

          </th>

          <th width="10%">

            <h4>Unité</h4>

          </th>

          <th  width="10%">

            <h4>Prix</h4>

          </th>

          <th  width="5%">

            <h4>Supprimer</h4>

          </th>

        </tr>

​

      <?php

      if (isset($_SESSION["panierprod"])) {

          $total_quantity = 0;

          $total_price = 0;

      }

      foreach ($_SESSION["panierprod"] as $prod) {

          $prod_prix = $prod["qte"] * $prod["prix"];
          ?>

                <td colspan="2">

                  <div>

                    <?php

                      echo $prod["img"];

                     

                    ?>

                  </div>

                </td>

                <td> <?php echo $prod["type"]; ?> </td>

                <td> <?php echo $prod["idprod"]; ?> </td>

                <td> <?php echo $prod["qte"]; ?> </td>

                <td> <?php echo $prod["prix"]." €"; ?> </td>

                <td> <?php echo number_format($prod_prix, 2) . " €"; ?> </td>

                <td><a href="index.php?action=deletep&idprod=<?php echo $prod["idprod"]; ?>"><img src="image/supprimer.jpg" width="50" alt="Supprimer Produit" /></a></td>

              </tr>

          <?php

              

            $total_quantity += $prod["qte"];

                $total_price += ($prod["prix"] * $prod["qte"]);

            }

          ?>


        <tr>

          <td colspan="2" align="right">Total:</td>

          <td align="right" colspan="5"><strong><?php echo number_format($total_price, 2) . " €"; ?></strong></td>

          <td></td>

        </tr>

      </tbody>

    </table>

    <?php
    }else {

            echo "<div class='empty'>

            <h1> Votre panier est actuellement vide ! </h1>

           </div>";


}
?>

  </article>

</section>
<?php
include "Vue/footer.php";
?>
