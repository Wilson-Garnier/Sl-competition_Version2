<?php
class Pieces extends DB {
 
  function getSelect(){

    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =5;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` LIMIT $limite OFFSET $debut");
  }

  function getclient(){

   
    return $this->getRequete("SELECT * FROM `client`");
  }
 





  function panier($prod){
    $strSQL="SELECT * FROM pieces where Id_piece = ".$prod['Id_piece'];
    $tabValeur = array("*"
    );


    $prodResultat = $this->Requete($strSQL, $tabValeur);



      $itemArray = array($prodResultat[0]["Id_piece"]=>array('nom'=>$prodResultat[0]["Nom_piece"], 'type'=>$prodResultat[0]["categorie"], 'qte'=>$prod["qte"], 'prix'=>$prodResultat[0]["Prix_piece"], 'img'=>$prodResultat[0]["Image_pieces"], 'idprod'=>$prodResultat[0]["idprod"]));

          if(!empty($_SESSION["panierprod"])) {
            if(in_array($prodResultat[0]["Id_piece"],array_keys($_SESSION["panierprod"]))) {
              foreach($_SESSION["panierprod"] as $k => $v) {
                  if($prodResultat[0]["Id_piece"] == $k) {
                    if(empty($_SESSION["panierprod"][$k]["qte"])) {
                      $_SESSION["panierprod"][$k]["qte"] = 0;
                    }
                    $_SESSION["panierprod"][$k]["qte"] += $_POST["qte"];
                  }
              }
            } else {
              $_SESSION["panierprod"] = array_merge($_SESSION["panierprod"],$itemArray);
            }
          } else {
            $_SESSION["panierprod"] = $itemArray;
          }

            return $_SESSION["panierprod"];



  }
 
  function setAdd($tblcli){


    
  
   $Nom= $tblcli['Nom'];
   $Prenom=$tblcli['Prenom'];
   $mail=$tblcli['email'];
   $login=$tblcli['login'];
 $mdp=md5($tblcli['motdepasse']);
 $code=$tblcli['codepostal'];
 $pays=$tblcli['Pays'];
     $strSQL ='INSERT INTO client (Nom, Prenom,email, login, motdepasse, codepostal, Pays) 
     VALUES ("'.$Nom.'","'.$Prenom.'","'.$mail.'","'.$login.'","'.$mdp.'","'.$code.'","'.$pays.'");';
       $add = $this->getRequete($strSQL);
       return $add;
      
   }



   function Addprod($produit){


    
  
    $Nom= $produit['Nom_piece'];
    $Description=$produit['Description_piece'];
    $img=$produit['Image_pieces'];
    $prix=$produit['Prix_piece'];
    $qt=$produit['Quantite_piece'];
    $cat=$produit['categorie'];
    $idprod=$produit['idprod'];


  
      $strSQL ='INSERT INTO pieces (Nom_piece, Description_piece,Image_pieces, Prix_piece, Quantite_piece, categorie, idprod) 
      VALUES ("'.$Nom.'","'.$Description.'","'.$img.'","'.$prix.'","'.$qt.'","'.$cat.'","'.$idprod.'");';
        $ajouter = $this->getRequete($strSQL);
        return $ajouter;
       
    }




   function getLire(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =4;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='turbo' LIMIT $limite OFFSET $debut");
  }



  function getcombine(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =4;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='combiné' LIMIT $limite OFFSET $debut");
  }
  function getligne(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =3;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='ligne'LIMIT $limite OFFSET $debut");
  }
  
  
  
  
  function getechangeur(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =3;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='echangeur'LIMIT $limite OFFSET $debut");
  }



  
  function getRecherche($tblpieces){
   
    
    $strSQL = "SELECT * FROM pieces 
                WHERE Nom_piece LIKE  :Nom_piece
              
              ";

    empty($tblpieces['Nom_piece'])  ? $tblpieces['Nom_piece'] = '*' : $tblpieces['Nom_piece']; 

    $tabValeur = array(
          'Nom_piece'  => "%".$tblpieces['Nom_piece']."%", 
        );

    $sch = $this->Requete($strSQL, $tabValeur);
    
    return $sch;
    
    }

    
    function getdelete($Id){

      var_dump($Id);

      $strSQL = "DELETE FROM client WHERE id = ?";
      $tabValeur = array($Id);
      $del = $this->Requete($strSQL, $tabValeur);
      return $del;
    }
    
    

    function setUpdate($tblemp){

     

      $strSQL = "UPDATE client SET Prenom = :pnom, Nom = :Nom, email = :email, codepostal = :codepostal , Pays= :pays WHERE login = :login";
  
      $tabValeur = array(
        'login'  => $tblemp['login'],

        'pnom'  => $tblemp['Prenom'],
        'Nom'   => $tblemp['Nom'], 
        'email' => $tblemp['email'],
        'codepostal' => $tblemp['codepostal'],
        'pays' => $tblemp['Pays']
      );
  
      $update = $this->Requete($strSQL, $tabValeur);
  
      return $update;
    }

    function  Search($tblpieces){


      $strSQL = "SELECT * FROM pieces 
                  WHERE Nom_piece LIKE  :Nom_piece
  
                ";
  
      empty($tblpieces['Nom_piece'])  ? $tblpieces['Nom_piece'] = '*' : $tblpieces['Nom_piece']; 
  
      $tabValeur = array(
            'Nom_piece'  => "%".$tblpieces['Nom_piece']."%", 
          );
  
      $sch = $this->Requete($strSQL, $tabValeur);
  
      return $sch;
      }



    }
    



?>