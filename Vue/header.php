
<?php

if (!empty($_SESSION['userId']) ) {

  $afficherNom = $_SESSION['userId'][0][3];
  $deco = "<a href='index.php?action=Deco'class='btn btn-danger'> Déconnexion </a>";
} else if (!empty($_SESSION['user'])) {

  $afficherNom = $_SESSION['user'][0][1];
  $deco = "<a href='index.php?action=Deco' class='btn btn-danger'> Déconnexion </a>";

}


?>

<!doctype html>


<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title class="titre">SL COMPETITION</title>
	
    <link rel="stylesheet" href="Css/boostrap.min.css">

    <link rel="stylesheet" href="Css/style.css">

    
  </head>
  
  
  <body>
  <br>
  <a class="pl-4 bg-light" href="index.php?action=lire">
  <img src="image/logo1.png"    width="300" style="border:solid 5px #252A39;"  ></a>   
 
 
  <div style="text-align:right">

 

<div>


  



  
  
<?php


                  if (!empty($afficherNom) && !empty($deco)){
                    echo "<b> Bienvenue , ".$afficherNom."</b>&nbsp";
                          
                            if ($afficherNom === 'Administrateur'){

                            echo "<a href='index.php?action=Administrateur' class='btn btn-warning'> Espace Admin</a> &nbsp";

                            }else {

                            echo "<a href='index.php?action=profil' class='btn btn-info'> Profil </a>&nbsp ";

                            }
                            echo $deco;

                     

                  }else{

                    echo "<a href='index.php?action=Connect' class='btn btn-success'>Se Connecter</a> &nbsp;";
                    
                    
                   
                    
                 
                    echo"<a href='index.php?action=VueInscri' class='btn btn-info'>S'inscrire</a> &nbsp";
                  }
                ?>
                <a href="index.php?action=Voir"><img src="image/panier5.png"  width=90 height=80  align=top,right></a>
<br>
 </div>
 <br>
 <br>
 <article class="padd">
 <div align="right">
      <!-- ------------------------------------------- Formulaire Recherche  ---------------------------------------- -->
      <form action='index.php?action=Rechercher' method='POST'>
        <table>
          <tr> 
           
            <td> <input type='text' name='Nom_piece' id='Nom_piece' > &nbsp; </td> 
            <td colspan='2'> <input type='submit'  class="btn btn-outline-info" name='action' value='Rechercher'></td>
          </tr>
        </table>
      </form>
    </article>
    </div>

  </div>
  
    
    <br>
    <br>
    
  
  <ul class="topnav">   
<li><a  href="index.php?action=accueil">Accueil</a></li>
<li><a href="index.php?action=lire"> Turbo</a></li>
<li><a href="index.php?action=combine"> Combiné Filetés</a></li>
<li><a href="index.php?action=ligne"> Ligne Echappement</a></li>
<li ><a href="index.php?action=echangeur"> Echangeur à air </a></li> 
</ul> 


</body>
</html>    