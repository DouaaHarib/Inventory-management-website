<?php 
if(isset($_GET['numsupply'])){
    $numsupply=$_GET['numsupply'];

    require"../DAO.php";
    $dao=new DAO();
    $dao->supprimersupply($numsupply);
    header("location:supply.php");
}
?>