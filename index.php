<?php 
  // Cela signifie que vous ne souhaitez pas voir le résultat de votre script mis une fois pour toutes en cache, 
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  

    if (isset($_REQUEST['action'])) {

      session_start();
      require "Vue/header.php";
      require "Model/model.php";
      require "Controleur/control.php";
	    require "Controleur/membre.php";
	
      $pieces = new Pieces();
      $client = new membre();

     

      if ($_GET['action'] == 'add') {
        $pieces->setAdd($_POST);
      include "Vue/succesco.php";
       
       
      }

      if ($_GET['action'] == 'Rechercher') {
       $all= $pieces->Search($_POST);
      include "Vue/view.php";
       
       
      }

      if ($_GET['action'] == 'Connect') {
           
        include "Vue/vueLogin.php";
      }

      if($_GET['action'] == 'VueInscri'){

        include "Vue/vueFormulaire.php";
      
      }
      if($_REQUEST['action'] == 'Sinscrire'){

        $cli=$pieces->setAdd($_POST);
       
      }
        
      



      if ($_GET['action'] == 'profil'){
        if (!empty($_SESSION['user'])){
    
          include "./Vue/vueProfil.php";
    
        }
      }
      if ($_GET['action'] == 'modifProfil'){

        if(!empty($_SESSION['user'])){

          include "Vue/vueProfillm.php";

        }
      }
      if ($_GET['action'] == 'apropos'){
        include "Vue/apropos.php";

      
      }




      if ($_REQUEST['action'] == 'Modifier') {
        if (!empty($_SESSION['user'])){
        $pieces->setUpdate($_POST);
       

        $_SESSION['user'][0][1] = $_POST['Nom'];

        $_SESSION['user'][0][2] = $_POST['Prenom'];
        $_SESSION['user'][0][3] = $_POST['email'];
        $_SESSION['user'][0][6] = $_POST['codepostal'];
        $_SESSION['user'][0][7] = $_POST['Pays'];
        }

        header ("Location: index.php?action=profil");

      }





      if($_REQUEST['action'] == 'Ajouter au panier'){


        $tblpanier = $pieces->panier($_POST);

          include "Vue/vuePanier.php";
        }

        if($_GET['action'] == 'Voir'){


         
            include "Vue/vuePanier.php";
          }


     
     


      if ($_GET['action'] == 'lire') {
        $turbo = $pieces->getLire();  
        
       
        
       include "Vue/viewturbo.php";
      }






      if ($_GET['action'] == 'combine') {
        $combine = $pieces->getcombine(); 
           
        include "Vue/viewcombine.php";
    }

    if ($_GET['action'] == 'Addproduit') {
     
     $newpieces=$pieces->Addprod($_POST);
      include "Vue/succes.php";
  }





    if ($_GET['action'] == 'ligne') {
      $echappement=$pieces->getligne();
      
      include "Vue/viewligne.php";
     
    }





    if ($_GET['action'] == 'echangeur') {
      $echangeur = $pieces->getechangeur();       
      include "Vue/viewechangeur.php";
    }
      


    if ($_REQUEST['action'] == 'deletep') {
      if(!empty($_SESSION["panierprod"])) {


            foreach($_SESSION["panierprod"] as $k => $v) {

              if($_REQUEST["idprod"] == $_SESSION["panierprod"][$k]['idprod'])

                unset($_SESSION["panierprod"][$k]);

              if(empty($_SESSION["panierprod"]))
                unset($_SESSION["panierprod"]);
                include "Vue/vuePanier.php";




          }
        }
      }

      
      if($_GET['action']=='accueil'){
        
          include "Vue/accueil.php";
        

      }



      
      






      if ($_GET['action'] == 'Administrateur') {
        $tblEmp =$pieces->getclient();
           
        include "Vue/vueAdmin.php";
      }

      if ($_GET['action'] == 'index') {
        $turbo = $pieces->getLire();          
  include "Vue/viewturbo.php";
       
      }



      if($_GET['action']=='Deco'){
        session_destroy();
        header ("Location: index.php?action=index");
        
        
        
      
        

      }




      
     
        if ($_GET['action'] == 'Login') {
   
          

          $username = filter_var($_POST["pseudo_mbr"], FILTER_SANITIZE_STRING);
          $password = filter_var($_POST["mdp_mbr"], FILTER_SANITIZE_STRING);

          require_once "Controleur/membre.php";
          require_once  "Controleur/control.php";
          $membre = new Membre();

          $tblEmp = $pieces->getSelect();


          $isLoggedIn = $membre->verifLogin($username, $password);


          if (! $isLoggedIn) {
              $_SESSION["erreurMessage"] = "Les informations d'identification sont invalides !";
              include "vue/vueLogin.php";


          }else{

            header ("Location: index.php?action=Administrateur");
          }

        }
    

     
    if ($_GET['action'] == 'Se connecter') {



        $username = filter_var($_POST["login"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["motdepasse"], FILTER_SANITIZE_STRING);

        require_once "Controleur/membre.php";
        require_once  "Controleur/control.php";
        $membre = new Membre();

        $isLoggedInUser = $membre->verifUser($username, $password);



        if (! $isLoggedInUser) {
            $_SESSION["erreurMessages"] = "Les informations d'identification sont invalides !";
            include "vue/vueLogin.php";

        }else{

          header ("Location: index.php?action=index");

        }

      }

      if ($_REQUEST['action'] == 'Supprimer') {

        
        $pieces->getdelete($_POST['ide']);
        $tblEmp=$pieces->getclient();
        include "Vue/vueAdmin.php";
      } 
    }
  
     
      
    
    else{

      require "Vue/header.php";
      require "Model/model.php";
      require "Controleur/control.php";
	    require "Controleur/membre.php";
	
      $pieces = new Pieces();
      $all = $pieces->getSelect();
      include "Vue/accueil.php";
    }

?>