


<link rel="stylesheet" href="Css/boostrap/css/boostrap.min.css">
 <body>
 
<div class="container-fluid">

<section id="pageContent">

      <article class="ar_prof">

      <div class="container-profil">
        <center>
       <h1>Profil</h1>
        <br>

        <img src="image/profil1.png" width="170 ">

        <div class="formProfil">


<style>
ul {
list-style:none;
margin-left:0;
padding-left:0;
}
</style>
          <ul>

              <li> Nom : <b><?php echo $_SESSION['user'][0][1] ?></b> </li>
              <li> Prénom : <b><?php echo $_SESSION['user'][0][2] ?> </b></li>
              <li> Pseudo : <b><?php echo $_SESSION['user'][0][4] ?></b> </li>

              <li> Email : <b><?php echo $_SESSION['user'][0][3] ?></b> </li>
              <li> Pays : <b><?php  echo $_SESSION['user'][0][7] ?></b> </li>
              <li> Code Postal : <b><?php  echo $_SESSION['user'][0][6] ?></b> </li><br>
                <a href="index.php?action=modifProfil" class="btn btn-warning"> Modifier mon profil </a>

          </ul>
          

        </div>
  </center>
      </div>
      </article>


</section>


 </div>
</body>
<?php
include "Vue/footer.php";
?>
</html>


