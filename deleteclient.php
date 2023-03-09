<?php 
if(isset($_GET['idcli'])){
    $idcli=$_GET['idcli'];

    require"DAO.php";
    $dao=new DAO();
    $dao->supprimer($idcli);
    header("location:client.php");
}
?>
