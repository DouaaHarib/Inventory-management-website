<?php 
if(isset($_GET['numProvider'])){
    $numProvider=$_GET['numProvider'];

    require"../DAO.php";
    $dao=new DAO();
    $dao->supprimerprovider($numProvider);
    header("location:providerManagement.php");
}
?>