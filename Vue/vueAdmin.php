<html>


<link rel="stylesheet" href="Css/boostrap/css/boostrap.min.css">
<link rel="stylesheet" href="Css/style.css">

<body>
  <div class="container-fluid">
<?php
if (!empty($_SESSION['userId']) ) {

?>
<section">
    <article>
        <br><h1> ESPACE ADMIN SL COMPETITION 974 !</h1>
   
    <article>
    <table class="table table-sm">
        <?php
        echo "<thead>";
          echo "<tr>";
            echo "<th>#</th>";
             echo "<th>Nom</th>";
            
            echo "<th>Prenom</th>";
            
            echo "<th>Adresse email</th>";
            echo "<th>Login</th>";
            echo "<th>Pays</th>";
            echo "<th>Code Postal</th>";
          echo "</tr>";
        echo "</thead>";
        
        echo "<tbody>";
         
          
          foreach ($tblEmp as $client) {
            echo "<form action='index.php?action=Supprimer' method='POST'>";
            echo 
            "<tr>" 
                ."<td>"."<input readonly type='text' name='ide' id='ide' value=".$client['Id']."></td>"
                ."<td>"."<input type='text' name='nom' id='Nom' value='".$client['Nom'] . "'></td>"  
                
                ."<td>"."<input type='text' name='Prenom' id='Prenom' value='".$client['Prenom'] . "'></td>" 
                
                ."<td>"."<input type='text' name='mail' id='mail'  value='".$client['email'] . "'></td>"
                ."<td>"."<input type='text' name='login' id='login' value='".$client['login'] . "'></td>" 
                ."<td>"."<input type='text' name='codepostal' id='codepostal' value='".$client['codepostal'] . "'></td>" 
                ."<td>"."<input type='text' name='Pays' id='Pays' value='".$client['Pays'] . "'></td>" 


                ."<td>". "<input type='submit' name='action' value='Supprimer'></td>".
                
            "</tr>";
            echo "</form>";
          }
        echo "</tbody>";
        ?>
      </table>
        </article>

      
        <acticle>
      <table>
      <tr>

      <hr align="center" width="100%" color="black" size="3">       
      <h2>Ajouter un produit</h2><br>
      <form action="index.php?action=Addproduit" method="POST">


          <label for="Nom_piece">Nom du produit</label><br>
          <input type="text" name="Nom_piece" id="Nom_piece" ><br><br>
          
    

         <label for="Description_piece">Description</label><br>
          <textarea id="Description_piece" name="Description_piece" rows="5" cols="33">
          </textarea><br><br>

          <label for="Image_pieces">Image</label><br>
          <input type="text" name="Image_pieces" id="Image_pieces" > <br><br>



          <label for="Prix_piece">Prix Pieces</label><br>
          <input type="number" name="Prix_piece" id="Prix_piece"><br><br>

          <label for="Quantite_piece">Quantité</label><br>
          <input type="number" name="Quantite_piece" id="Quantite_piece"><br><br>

          <label for="categorie">Catégorie</label><br>
          <input type="text" name="categorie" id="categorie"><br><br>

          <label for="idprod">Id Prod</label><br>
          <input type="text" name="idprod" id="idprod"><br><br>
            
            
          <button type="submit" class='btn btn-success'  >Ajouter</button>
            <br><br>

            
    </form>
    
</td>
</tr>
</table>
</article>

<?php

} else{

  header("Location: ./index.php?action=formLog");
 
 }
?>
</section>
</div>
<body>
  </html>
<?php
include "footer.php";
?>