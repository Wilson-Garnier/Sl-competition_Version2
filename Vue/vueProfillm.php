


<link rel="stylesheet" href="Css/boostrap/css/boostrap.min.css">
 <body>
 <section id="pageContent">

      <article class="ar_prof">

      <div class="container-profil">
        <center>
       <h1> Modifier Mon Profil</h1>
        <br>

        <img src="image/edit.jpg"  width="180">
        <div class="formProfil">
<style>
ul {
list-style:none;}
</style>


          <ul >
          <form action='index.php?action=Modifier' method='POST'>

              <li> Nom : <input name='Nom' type="text" value="<?php echo $_SESSION['user'][0][1] ?>"> </li>
              <li> Pseudo : <input name='login' type="text" readonly  value="<?php echo $_SESSION['user'][0][4] ?>"> </li>

              <li> Prénom : <input name='Prenom' type="text" value="<?php echo $_SESSION['user'][0][2] ?>"></li>
              <li> Mail : <input name='email' type="text" value="<?php echo $_SESSION['user'][0][3] ?>"> </li>
              <li> Code Postal : <input name='codepostal' type="text" value="<?php  echo $_SESSION['user'][0][6] ?>"> </li>
              <li> Pays : <input name='Pays' type="text" value="<?php  echo $_SESSION['user'][0][7] ?>"> </li><br>

 
              <input type='submit'class="btn btn-success"  name='action' value='Modifier' >
          </form>
          </ul>

        </div>
  </center>
      </div>
      </article>


</section>
 
</body>
<?php
include "Vue/footer.php";
?>
</html>


