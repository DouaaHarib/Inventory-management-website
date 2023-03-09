<?php 
if(isset($_GET['numCatego'])){
    $numCatego=$_GET['numCatego'];

    require"../DAO.php";
    $dao=new DAO();
    $dao->supprimercategorie($numCatego);
    header("location:categorie.php");
}
?>