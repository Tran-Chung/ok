<?php
  require('controller.php');
  $data = new cSqldata;
  $userInfo = $data->cGetShop();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop</title>
        <link href="./vendor/css/style.css" rel="stylesheet" type="text/css" >
        <link href="./vendor/css/cs.css" rel="stylesheet" type="text/css" >
		<!-- <link rel="shortcut icon" type="image/png" href="./vendor/img/icon.jpg"/> -->
		<link href="./vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" >
		<link href="./vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" >
		<link href="./vendor/bootstrap/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" >
		<link href="./vendor/datatable/dataTables.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
		<link href="./vendor/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="./vendor/datatable/select.dataTables.css" rel="stylesheet" type="text/css" />
		<link href="./vendor/chart/chartist.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            
<!-- modal -->
<div class="modal fade bd-example-modal-xl" id="exampleModal" data-backdrop = "static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="modal-content">
        </div>
    </div>
</div>

