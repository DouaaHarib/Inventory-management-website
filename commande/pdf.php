<?php
if(isset($_GET['numcmd'])){
    require "../DAO.php";
    $dao=new DAO();
    $numcmd=$_GET['numcmd'];
    $data=$dao->getcmd($numcmd);

    
    $dao->pdf($numcmd);
    header("location:order.php");
}











?>