<?php 
if(isset($_GET['numcmd'])){
    
    $numcmd=$_GET['numcmd'];

    require "../DAO.php";
    $dao=new DAO();
    $dao->supprimercmd($numcmd);
    header("location:order.php");
}
?>