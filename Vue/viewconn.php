<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/style.css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


<body>

 <a href="../profil2.php?action=lire" style="font-size:13pt" class="button"> Mon profil </a>
  <a href="../index.php?action=Deco" style="font-size:13pt" class="button"> Déconnexion </a>
  <a href="Panier.php">Panier<img src="../image/panier.png" width=50 height=50></a>
 <h1> Pièces Disponible 	 </h1>
  <table border="2">
  <tr>
  <th>#</th>
  <th>Nom de la Pièces</th>
  <th>Despcription</th>
  <th>Image</th>
  <th>Prix</th>
  <th>Stock</th>
  </tr>
<?php
  // $resultat ici énoncé de la requête
  // $cnx connexion à la base de données
  require "../Model/model.php";
  require "../Controleur/control.php";
  
  $pieces= new pieces();
  foreach ($pieces->getSelect() as $ligne) 
  {
    echo "<tr>";
      echo "<td>" . $ligne['Id_piece'] . "</td>";
      echo "<td>"  . $ligne['Nom_piece'] . "</td>";
      echo "<td>" . $ligne['Description_piece'] . "</td>";
      echo "<td>" . $ligne['Image_pieces'] . "</td>";
      echo "<td>" . $ligne['Prix_piece'] 	. "€"."</td>";
      echo "<td>" . $ligne['Quantite_piece'] 	."</td>";
      echo "<td>"."<a href='Panier.php'><img src='../image/panier2.png'width=50 height=50></a>"."</td>";
      echo "<td>";
  
  }

 
 ?>  

 
        
  </form>
</body>
</table>
<?php require '../footer.php';
?>
</html>