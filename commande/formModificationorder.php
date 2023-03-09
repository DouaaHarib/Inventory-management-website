<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:signIn.php");
}


    require"../DAO.php";
    $dao=new DAO();

 if(isset($_GET['numcmd'])){
    $numcmd=$_GET['numcmd'];
    $amodifier=$dao->getcmd($numcmd);
    
 }

 if(isset($_GET['submit'])){
    $date=$_GET['date'];
    $idcli=$_GET['idcli'];
    $reference=$_GET['reference'];
    $quantite=$_GET['quantite'];

    $dao->modifiercmd($amodifier['0'],$date,$idcli,
    $reference,$quantite);

 }
 ?>











<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>gestion de stock</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/1200px-Byphasse.png" rel="icon">
  <link href="../assets/img/1200px-Byphasse.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/1200px-Byphasse.png" alt="">
        <span class="d-none d-lg-block">BYPHASSE</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="searchprovider.php">
        <input type="text" name="q" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search" name="searchprovider"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->
          
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <span class="d-none d-md-block dropdown-toggle ps-2"><!-- ysername--><?php echo $_SESSION['username']; ?></span>
          </a>
          <!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><!--username--><?php echo $_SESSION['username']; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../deconnexion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="../index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../product/product.php">
              <i class="bi bi-circle"></i><span>product management</span>
            </a>
          </li>
          <li>
            <a href="../product/addproduct.php">
              <i class="bi bi-circle"></i><span>add product</span>
            </a>
          </li>
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>sales</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End product Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="categorie.php">
              <i class="bi bi-circle"></i><span> categories management</span>
            </a>
          </li>
          <li>
            <a href="addcategorie.php">
              <i class="bi bi-circle"></i><span>add categories</span>
            </a>
          </li>
        </ul>
      </li><!-- End categories Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi-file-earmark-person"></i><span>provider</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../fournisseur/providerManagement.php">
              <i class="bi bi-circle"></i><span>provider management</span>
            </a>
            <a href="../fournisseur/addprovider.php">
              <i class="bi bi-circle"></i><span>add provider </span>
            </a>
          </li>
        </ul>  
      </li>
      <!-- End provider Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi-file-earmark-person-fill"></i><span>clients</span><i class="bi bi-chevron-down ms-auto"></i>       
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../client.php">
            <i class="bi bi-circle"></i><span>customer management</span>
          </a>
        </li>
      </ul>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="../ajoutclient.php">
            <i class="bi bi-circle"></i><span>add customer</span>
          </a>
        </li>
      </ul>
    </li>
      <!-- End clients Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi-cart"></i><span>order</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../commande/order.php">
              <i class="bi bi-circle"></i><span>order management</span>
            </a>
          </li>
          <li>
            <a href="../commande/addorder.php">
              <i class="bi bi-circle"></i><span>add order</span>
            </a>
          </li>
          
        </ul>
      </li>
      <!-- End order Nav -->
      
</aside>

  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="providerManagement.php">order</a></li>
          <li class="breadcrumb-item active">order management</li>
          <li class="breadcrumb-item active">modification</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
<div class="card-body">
    <h2>modify an order </h2>
    <form class="row g-3" action="formModificationorder.php" method="get" >
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">number of order</label>
                  <input type="text" class="form-control" id="inputNanme4" name="numcmd" value="<?php echo $amodifier['0'] ; ?>">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">date</label>
                  <input type="text" class="form-control" id="inputEmail4" name="date" value="<?php echo $amodifier['1']; ?>">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">id client</label>
                  <input type="text" class="form-control" id="inputPassword4" name="tele" value="<?php echo $amodifier['2']; ?>">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">product reference</label>
                  <input type="reference" class="form-control" id="inputAddress" name="reference" value="<?php echo $amodifier['3']; ?>">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">quantite</label>
                  <input type="text" class="form-control" id="inputAddress" name="quantite" value="<?php echo $amodifier['4']; ?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  
                </div>
              </form>
     </div>         
     </div>
              <!-- End modification form -->






    
    

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>