<?php
class DAO{
      function __construct(){}
      //fonction qui permet la connexion avec la base de donnée 
      function connexion(){
          $pdo=new PDO('mysql:host=localhost;dbname=gestiondestock','root','');
          return $pdo;
      }
      //sign in
      function signin($username,$password){
        $pdo=$this->connexion();
        $pdostat=$pdo->prepare("SELECT *FROM users WHERE username='$username' && password='$password' ");
        $pdostat->execute();
          $lst=[];
        if($res=$pdostat->fetch()) {
            $lst=[$res['username'],$res['password'] ];
        }
        return $lst;


      }



      //fonction qui permet l'affichage des clients
      function listeclient(){
          $pdo=$this->connexion();
          $pdostate=$pdo->prepare("SELECT *FROM client");
          $pdostate->execute();
          $lstcli=[];
          while($res=$pdostate->fetch()){
              $lstcli[]=[  $res['idCli'],$res['name'],$res['tele'],$res['email'],$res['address']    ];
          }
          return $lstcli;
      }
      //fonction pour supprimer un element 
      function supprimer($idcli){
        $pdo=$this->connexion();
        $pdostat = $pdo->prepare("delete from client where idcli=:idcli") ;
        $pdostat->execute(array(":idcli"=>$idcli)) ;

      }
      //fonction pour la modification de client
      function modifierclient($idcli,$name,$tele,$email,$address){
        $pdo=$this->connexion();
        $pdostat=$pdo->prepare(" UPDATE client SET 
        name='$name' ,tele='$tele', email='$email',address='$address'
        WHERE idCli='$idcli'  ");
        $pdostat->execute(array()) ;
      }
      //recuperer un client a l'aide de son idcli
      function getclient($idcli){
        $pdo=$this->connexion();
        $pdostat = $pdo->prepare("select * from client where idCli=:idcli") ;
        $pdostat->execute(array(":idcli"=>$idcli)) ;
        $lst=[];
        if($res=$pdostat->fetch()) {
            $lst=[$res['idCli'],$res['name'],$res['tele'],$res['email'],$res['address']];
        }
        return $lst;
    }
    //fonction de la recherche du client
    function searchclient($q){
      $pdo=$this->connexion();
      $pdostat=$pdo->prepare("SELECT *FROM client WHERE idCli like '%$q%' OR name LIKE '%$q%'
      OR tele LIKE '%$q%' OR email LIKE '%$q%' OR address LIKE '%$q%'");
      $pdostat->execute(array()) ;
      
      $ligne=$pdostat->fetchAll();
      return $ligne;
    }
    //fonction d ajout client
    function addclient($idcli,$name,$tele,$email,$address){
      $pdo=$this->connexion();
      $pdostat=$pdo->prepare("INSERT INTO client VALUES ('$idcli','$name','$tele','$email','$address') " );
      $pdostat->execute(array()) ;

    }
    // ========================provider==========================
    //fonction qui permet l'affichage des fournisseur
    function listefourni(){
      $pdo=$this->connexion();
      $pdostate=$pdo->prepare("SELECT *FROM fournisseure");
      $pdostate->execute();
      $lstcli=[];
      while($res=$pdostate->fetch()){
          $lstcli[]=[  $res['numProvider'],$res['name'],$res['tele'],$res['email'],$res['address']    ];
      }
      return $lstcli;
  }
  //fonction pour supprimer un fournisseur 
  function supprimerprovider($numProvider){
    $pdo=$this->connexion();
    $pdostat = $pdo->prepare("delete from fournisseure where numProvider=:numProvider") ;
    $pdostat->execute(array(":numProvider"=>$numProvider)) ;

  }
  //fonction pour la modification de fournisseur
  function modifierfournisseur($numProvider,$name,$tele,$email,$address){
    $pdo=$this->connexion();
    $pdostat=$pdo->prepare(" UPDATE fournisseure SET 
    name='$name' ,tele='$tele', email='$email',address='$address'
    WHERE numProvider='$numProvider'  ");
    $pdostat->execute(array()) ;
  }
  //recuperer un client a l'aide de son idcli
  function getfournisseur($numProvider){
    $pdo=$this->connexion();
    $pdostat = $pdo->prepare("select * from fournisseure where numProvider=:numProvider") ;
    $pdostat->execute(array(":numProvider"=>$numProvider)) ;
    $lst=[];
    if($res=$pdostat->fetch()) {
        $lst=[$res['numProvider'],$res['name'],$res['tele'],$res['email'],$res['address']];
    }
    return $lst;
}
//fonction de la recherche du fournisseur
function searchfourni($q){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("SELECT *FROM fournisseure WHERE numProvider like '%$q%' OR name LIKE '%$q%'
  OR tele LIKE '%$q%' OR email LIKE '%$q%' OR address LIKE '%$q%'");
  $pdostat->execute(array()) ;
  
  $ligne=$pdostat->fetchAll();
  return $ligne;
}
//fonction d ajout fournisseure
function addprovider($numProvider,$name,$tele,$email,$address){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("INSERT INTO fournisseure VALUES ('$numProvider','$name','$tele','$email','$address') " );
  $pdostat->execute(array()) ;

}
//========================      categoreis    ==================================
//fonction qui permet l'affichage des categories
function listecategories(){
  $pdo=$this->connexion();
  $pdostate=$pdo->prepare("SELECT *FROM categories");
  $pdostate->execute();
  $lstcli=[];
  while($res=$pdostate->fetch()){
      $lstcli[]=[  $res['numCatego'],$res['name']  ];
  }
  return $lstcli;
}
//fonction pour supprimer une categorie
function supprimercategorie($numCatego){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("delete from categories where numCatego=:numCatego") ;
  $pdostat->execute(array(":numCatego"=>$numCatego)) ;

}
//fonction pour la modification categorie
function modifiercategorie($numCatego,$name,$nbProduct){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare(" UPDATE categories SET 
  name='$name' ,nbProduct='$nbProduct'
  WHERE numCatego='$numCatego'  ");
  $pdostat->execute(array()) ;
}
//recuperer un client a l'aide de son idcli
function getcategorie($numCatego){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("select * from categories where numCatego=:numCatego") ;
  $pdostat->execute(array(":numCatego"=>$numCatego)) ;
  $lst=[];
  if($res=$pdostat->fetch()) {
      $lst=[$res['numCatego'],$res['name'],$res['nbProduct']];
  }
  return $lst;
}
//fonction de la recherche du categories
function searchcategorie($q){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("SELECT *FROM categories WHERE numCatego like '%$q%' OR name LIKE '%$q%' ");
  $pdostat->execute(array()) ;
  
  $ligne=$pdostat->fetchAll();
  return $ligne;
}
//fonction d ajout categorie
function addcategorie($numCatego,$name,$nbProduct){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("INSERT INTO categories VALUES ('$numCatego','$name','$nbProduct') " );
  $pdostat->execute(array()) ;

}
//calcule number of product
 function nbProduct($name){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("SELECT COUNT(categorieProd) as res  FROM product WHERE categorieProd='$name' " );
  $pdostat->execute(array());
  $ligne=$pdostat->fetch();
  $resultat=$ligne['res'];
  return $resultat;


 }


//===============================  product  ===============================
//fonction qui permet l'affichage des produit
function listeproduct(){
  $pdo=$this->connexion();
  $pdostate=$pdo->prepare("SELECT *FROM product");
  $pdostate->execute();
  $lstprod=[];
  while($res=$pdostate->fetch()){
    $lstprod[]=[  $res['reference'],$res['libellé'] ,$res['prixUnitaire'],$res['stock'],$res['prixAchat'],
    $res['prixVente'],$res['categorieProd'],$res['img'] ]; }
  return $lstprod;
}
//fonction pour supprimer un produit
function supprimerproduct($reference){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("delete from product where reference=:reference") ;
  $pdostat->execute(array(":reference"=>$reference)) ;

}
//fonction de la recherche du produit
function searchproduct($q){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("SELECT *FROM product WHERE reference like '%$q%' OR 	libellé LIKE '%$q%'
  OR 	prixUnitaire LIKE '%$q%' OR stock LIKE '%$q%'
   OR prixAchat LIKE '%$q%' OR prixVente LIKE '%$q%' OR categorieProd	LIKE '%$q%' ");
  $pdostat->execute(array()) ;
  
  $ligne=$pdostat->fetchAll();
  return $ligne;
}
//recuperer un produit a l'aide de son reference
function getproduct($reference){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("select * from product where reference=:reference") ;
  $pdostat->execute(array(":reference"=>$reference)) ;
  $lst=[];
  if($res=$pdostat->fetch()) {
      $lst=[$res['reference'],$res['libellé'],$res['prixUnitaire'],$res['stock'],$res['prixAchat'],$res['prixVente']
      ,$res['categorieProd'],$res['img'] ];
  }
  return $lst;
}
//fonction pour la modification des produit
function modifierproduct($reference,$libellé,$stock,$unitprice,$buyingprice,$sellprice,$Productcategory,$picture){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare(" UPDATE product SET 
  libellé='$libellé',stock='$stock',prixUnitaire='$unitprice',prixAchat='$buyingprice',
  prixVente='$sellprice',categorieProd='$Productcategory',img='$picture'
  WHERE reference='$reference'  ");
  $pdostat->execute(array()) ;
}
//fonction d ajout produit
function addproduct($reference,$libellé,$stock,$unitprice,$buyingprice,$sellprice,$Productcategory,$picture){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("INSERT INTO product VALUES ('$reference','$libellé','$stock','$unitprice','$buyingprice','$sellprice','$Productcategory','$picture') " );
  $pdostat->execute(array()) ;

}
//=====================  order   ===========================
//fonction pour afficher les commande
function listecmd(){
  $pdo=$this->connexion();
  $pdostate=$pdo->prepare("SELECT *FROM commande");
  $pdostate->execute();
  $cmd=[];
  while($res=$pdostate->fetch()){
    $cmd[]=[  $res['numcmd'],$res['datecmd'] ,$res['idCli'],$res['reference'],$res['quantite'] ]; }
  return $cmd;
}
//fonction pour supprimer une commande
function supprimercmd($numcmd){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("delete from commande where numcmd=:numcmd") ;
  $pdostat->execute(array(":numcmd"=>$numcmd)) ;

}
//recuperer une commande a l'aide de son numero
function getcmd($numcmd){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("select * from commande where numcmd=:numcmd") ;
  $pdostat->execute(array(":numcmd"=>$numcmd)) ;
  $lst=[];
  if($res=$pdostat->fetch()) {
      $lst=[$res['numcmd'],$res['datecmd'],$res['idCli'],$res['reference'],$res['quantite'] ];
  }
  return $lst;
}

//fonction pour la modification des commande
function modifiercmd($numcmd,$date,$idcli,$reference,$quantite){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare(" UPDATE commande SET 
  datecmd='$date',idcli='$idcli',reference='$reference',quatite='$quantite'
  WHERE numcmd='$numcmd' ");
  $pdostat->execute(array()) ;
}
//fonction d ajout commande
function addcmd($numcmd,$date,$idcli,$reference,$quantite){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("INSERT INTO commande VALUES ('$numcmd','$date','$idcli','$reference','$quantite') " );
  $pdostat->execute(array()) ;

}
//fonction de la recherche du commande
function searchcmd($q){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("SELECT *FROM commande WHERE numcmd like '%$q%' OR datecmd LIKE '%$q%'
  OR idCli LIKE '%$q%' OR reference LIKE '%$q%' OR quantite LIKE '%$q%'");
  $pdostat->execute(array()) ;
  
  $ligne=$pdostat->fetchAll();
  return $ligne;
}
// generation d une facture sous forme pdf
/*
function pdf($numcmd){
//require "../projet web/commande/fpdf184/fpdf.php";
include "./commande/fpdf184/fpdf.php";
$dao=$this->connexion();
$data=$dao->getcmd($numcmd);
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",15);

$pdf->Cell(50,10,"number of order",1,0);
$pdf->Cell(50,10,$data['0'],1,1);

$pdf->Cell(50,10,"date of order",1,0);
$pdf->Cell(50,10,$data['1'],1,1);

$pdf->Cell(50,10,"id client",1,0);
$pdf->Cell(50,10,$data['2'],1,1);

$pdf->Cell(50,10,"reference",1,0);
$pdf->Cell(50,10,$data['3'],1,1);

$pdf->Cell(50,10,"quantite",1,0);
$pdf->Cell(50,10,$data['4'],1,1);


$pdf->Output();


}
    */
    //======================= supply ============================
    //fonction pour afficher les approvisionnement
function listesupply(){
  $pdo=$this->connexion();
  $pdostate=$pdo->prepare("SELECT *FROM supply");
  $pdostate->execute();
  $supply=[];
  while($res=$pdostate->fetch()){
    $supply[]=[  $res['numsupply'],$res['datesupply'] ,$res['numProvider'],$res['reference'],$res['quantite'] ]; }
  return $supply;
}
//fonction pour supprimer une approvisionnement
function supprimersupply($numsupply){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("delete from supply where numsupply=:numsupply") ;
  $pdostat->execute(array(":numsupply"=>$numsupply)) ;

}
//recuperer une supply a l'aide de son numero
function getsupply($numsupply){
  $pdo=$this->connexion();
  $pdostat = $pdo->prepare("select * from supply where numsupply=:numsupply") ;
  $pdostat->execute(array(":numsupply"=>$numsupply)) ;
  $lst=[];
  if($res=$pdostat->fetch()) {
      $lst=[$res['numsupply'],$res['datesupply'] ,$res['numProvider'],$res['reference'],$res['quantite'] ];
  }
  return $lst;
}

//fonction pour la modification des approvisionnement
function modifiersupply($numsupply,$datesupply,$numprovider,$reference,$quantite){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare(" UPDATE supply SET 
  datesupply='$datesupply',numProvider='$numprovider',reference='$reference',quantite='$quantite'
  WHERE numsupply='$numsupply'  ");
  $pdostat->execute(array()) ;


}
//fonction d ajout supply
function addsupply($numsupply,$datesupply,$numprovider,$reference,$quantite){
  $pdo=$this->connexion();
  $pdostat=$pdo->prepare("INSERT INTO supply VALUES ('$numsupply','$datesupply','$numprovider','$reference','$quantite') " );
  $pdostat->execute(array()) ;

}










}

?>