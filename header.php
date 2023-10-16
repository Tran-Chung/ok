<?php
require('controller.php');
$data = new cSqlAll();
session_start();
if (empty($_SESSION['user'])) {
  header('Location:../login.php');
  exit();
}
$id = $_SESSION['id'];
$user = $data->cGetUser($id);
if (empty($user)) {
  echo "Bạn Chưa Có Tài Khoản";
  exit();
}
$_SESSION['position']=$user->position;
$_SESSION['user']=$user->name;
// $_SESSION['id'] = $user->id;

// if ($_SESSION['id'] != '45614') {
//   echo "Đang Xử Lý Chờ Nhóe <3 ";;
//   exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Form Order Material</title>

  <!-- liên kết css -->
  <link href="./vendor/css/style.css" rel="stylesheet" type="text/css" >
  <link rel="shortcut icon" type="image/png" href="./vendor/img/icon.jpg"/>
  <!-- liên kết bootstrap css -->
  <link href="./vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" >
  <link href="./vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" >
  <link href="./vendor/bootstrap/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" >
  <!-- liên kết datatable css -->
  <link href="./vendor/datatable/dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- liên kết font css -->
  <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
  <link href="./vendor/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="./vendor/datatable/select.dataTables.css" rel="stylesheet" type="text/css" />
  <link href="./vendor/chart/chartist.min.css" rel="stylesheet" type="text/css" />
  
    <style>
       
    </style>
</head>
<div class="fixed-top">
   <nav class="navbar fixed-top navbar-expand-lg bg-light white scrolling-navbar"  style="border-bottom: 1px solid #d5d5d5;font-size:14px; ">
      <div class="container-fluid">
        <a class="navbar-brand waves-effect padding-0" href="./index" style = "text-align:center;">
          <span class = "logo-ad"><i class="fas fa-chart-bar"></i>DREAMTECH-EMS</span> </br>
        </a>
         <button class="hide-left" id="toggler-left">
          <span class="fas fa-exchange-alt"></span>
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars" style="font-size: 1em;color: black;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             
              <li class="nav-item menu-admin">
                <a class="nav-link waves-effect padding-menu" href="./index.php">Follow Code Model</a>
              </li>
              
              <li class="nav-item menu-admin">
                <!-- <a class="nav-link waves-effect padding-menu" href="./form.php">Create Form</a> -->
              </li>
              <li class="nav-item menu-admin">
                <!-- <a class="nav-link waves-effect padding-menu" href="./hisMuonTra.php">History Borrow - Return</a> -->
              </li>
              <li class="nav-item menu-admin">
                <!-- <a class="nav-link waves-effect padding-menu" href="./unplan.php">Form Finish</a> -->
              </li>
              <li class="nav-item menu-admin">
                <a class="nav-link waves-effect padding-menu" href="./po.php">Stock</a>
              </li>
              <li class="nav-item menu-admin">
                <!-- <a class="nav-link waves-effect padding-menu" href="./import.php">Import</a> -->
              </li>
              <li class="nav-item menu-admin">
                <a class="nav-link waves-effect padding-menu" href="./detailMaterial.php">Detail Material</a>
              </li>
              <li class="nav-item menu-admin">
                <a class="nav-link waves-effect padding-menu" href="./qr.php">QR Octa</a>
              </li>
              <li class="nav-item menu-admin">
                <a class="nav-link waves-effect padding-menu" href="./hisImport.php">History Import</a>
              </li>
              <li class="nav-item menu-admin">
                <a class="nav-link waves-effect padding-menu" href="./export.php">History Export</a>
              </li>
              <?php
              if($_SESSION['id'] == '45614')
              {
              ?>
                <li class="nav-item menu-admin">
                  <!-- <a class="nav-link waves-effect padding-menu" href="./User.php">User</a> -->
                </li>
                <li class="nav-item menu-admin">
                  <a class="nav-link waves-effect padding-menu" href="./updateImage.php">Update</a>
                </li>
              <?php
              }
              ?>
          </ul>
          <ul class="navbar-nav mr-auto navbar-right" style="margin-right: 0 !important;display: flex;">
              <li class="nav-item menu-admin">
                <a class="nav-link waves-effect user"><i class="fa fa-user"></i><?php echo($_SESSION['user']); ?> </a>
                <!-- <a class="nav-link waves-effect user"><i class="fa fa-user"></i><?php echo 'x'; ?> </a> -->
                
                    
              </li>
              <li class="">
                <a class="nav-link waves-effect user" href="../"><i class="fas fa-sign-out-alt" style="font-size:14px; border-left: 1px solid white;"> </i></a>
                </li>
                <li class="">
                  <a class="nav-link waves-effect user" href="../editUser.php"><i class="fas fa-user-edit" style="font-size:14px; border-left: 1px solid white;"></i></a>
                </li>
          </ul>
        </div>

      </div>
  </nav>
</div>
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="modal-content">
        </div>
    </div>
</div>
 