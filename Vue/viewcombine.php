


    <link rel="stylesheet" href="Css/boostrap/css/boostrap.min.css">
 
    <body>
 <div class="container-fluid">
  
 <p class="h1">Pièces Disponible</p>
  <table class="table table-hover">
 
   <th>#</th>
   <th>Nom de la Pièces</th>
   <th>Despcription</th>
   <th>Image</th>
   <th>Prix</th>
   <th>Quantité</th>
  
   </tr>
 <?php
 $page= (!empty($_GET['page']) ? $_GET['page'] : 0);
 $page =($page <= 0 ? 1 :$page);
   // $resultat ici énoncé de la requête
   // $cnx connexion à la base de données
 
   foreach ($combine as $ligne) 
   {
     echo "<form class='formproduit' action='index.php?action' method='POST'>";
 
     echo "<tr>";
       echo "<td> <input readonly type='text' name='Id_piece' id='ide' value=".$ligne['Id_piece'].">  </td>";
       echo "<td>"  . $ligne['Nom_piece'] . "</td>";
       echo "<td>" . $ligne['Description_piece'] . "</td>";
       echo "<td>" . $ligne['Image_pieces'] . "</td>";
       echo "<td>" . $ligne['Prix_piece'] 	. "€"."</td>";
       echo "<td> <input type='number' name='qte' id='qte' value='1' min='1' max='100'></td>";
       echo "<td>"."<input type='submit' name='action' value='Ajouter au panier' /></td>";
       echo "<td>";
      echo  "</form>";
   }
 
  
  ?>  
 
         
   </form>
  </div>
 </body>
 </table>
 </diV>
 
 
 <ul class="pagination pagination-sm">
   <li class="page-item"><a class="page-link" href=?action=Page&page=<?php echo $page -1 ?>>Précédent</a></li>
   
   <li class="page-item"><a class="page-link" href="?action=Page&page=<?php echo $page +1 ?>">Suivant</a></li>
 </ul>
 </div>
 <?php
 include "Vue/footer.php";
 ?>
 </html>
 
 
 