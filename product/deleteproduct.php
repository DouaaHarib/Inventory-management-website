<?php 
if(isset($_GET['reference'])){
    $reference=$_GET['reference'];

    require"../DAO.php";
    $dao=new DAO();
    $dao->supprimerproduct($reference);
    header("location:product.php");
}
?>