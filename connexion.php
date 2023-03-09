<?php



//fonction d'alerte au cas d erreure
function phpAlert($msg) {
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  require "DAO.php";
  $dao=new DAO();
   $lst=$dao->signin($username,$password );
   if( empty($lst['0']) && empty($lst['1'] )        ){
phpAlert("your username or password is incorrect"); 
header("location:signIn.php");
   }else{
    session_start();
    $_SESSION['username']=$username;
    header("location:index.php");

   }
   

}
?>