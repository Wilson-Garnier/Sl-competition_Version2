


<body>
<link rel="stylesheet" href="Css/boostrap/css/boostrap.min.css">
<h1> Espace utilisateur : </h1>

<form action='index.php?action=Se connecter' method='POST'>

  <div>


    <div class="Nom">
        <label for="username">Identifiant</label></td>
        <input name="login" id="login" type="text" required><br>

        <label for="password">Mot de passe</label></td> 
        <input name="motdepasse" id="motdepasse" type="password" required ><br>

    </div> 
<br>
<br>
    <div class='bouton'>
        <input type='submit' name='action' value='Se connecter' >

    </div>

        <?php
      if(isset($_SESSION['erreurMessages']))
      {
        echo "<tr>";
        echo "<td colspan='2'>";
        echo $_SESSION['erreurMessages'];
        echo "</td>";
        echo "</tr>";

        session_destroy();

      }
      ?>
      <hr size="4" color="black">
</form>

  </div>

  <h1> Espace administration : </h1>
  <div class="wrapper1">

      
      <form action='index.php?action=Login' method='POST'>
        <div class="Nom">
            <label for="pseudo_mbr">Identifiant</label></td>
            <input name="pseudo_mbr" id="pseudo_mbr" type="text" required><br>

            <label for="mdp_mbr">Mot de passe</label></td> 
            <input name="mdp_mbr" id="mdp_mbr" type="password" required >

        </div> 

        <div class='bouton'>
        <br>
        <br>
            <input type='submit' name='action' value='Login' >

        </div>

              <?php
            if(isset($_SESSION['erreurMessage']))
            {
              echo "<tr>";
              echo "<td colspan='2'>";
              echo $_SESSION['erreurMessage'];
              echo "</td>";
              echo "</tr>";

              session_destroy();

            }
            ?>
 </div>
      </form>
     
      

<?php
include "Vue/footer.php";
?>
</html>




