
<div align="center">
<H1> Formulaire d'inscription</h1>



<form action="index.php?action=add" method="POST">

         
         <label for="Nom">Nom :</label>
         <input id="Nom" name="Nom" type="text" /><br />
         <label for="Prenom">Prénom: </label>
         <input id="Prenom" name="Prenom" type="text" /><br>
         <label for="email">Email :</label>
         <input id="email" name="email" type="text" /><BR>

         <label for="login">Login:</label>
         <input id="login" name="login" type="text" /><br>

         <label for="motdepasse">Mot de passe:</label>
         <input id="motdepasse" name="motdepasse" type="password" /><br>

         <label for="codepostal">Code Postal:</label>
         <input id="codepostal" name="codepostal" type="text" /><br>

         <label for="Pays">Pays:</label>
         <input id="Pays" name="Pays" type="text" /><br><br>

         <p><input type="checkbox"  required name="terms"> <a href="Vue/charte.php"> J'ai lu et j'accepte 
<u>les conditions générales de vente</u>
</a></p>

    <button type="submit" class="btn btn-dark" >S'inscrire</button>

    


     </div>

     </from>
     <br>
     <?php
     include "Vue/footer.php";

     ?>