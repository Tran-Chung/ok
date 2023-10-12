<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
include('header.php');
?>
<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading bg-light text-center p-2">
        <a href="index.php" style="font-family: ui-monospace;text-shadow: 7px 8px 0px #e6e6e6"><i class="fas fa-biohazard"></i> <b>SHOP THAO HUỆ</b></a>
    </div>
    <div class="sidebar-heading border-bottom bg-light text-center" style="margin-top: -35px;">
      <label style="font-size: 11px;"><i class="fas fa-phone"></i> <?php echo $userInfo->sdt; ?></label>
    </div>

    <div class="list-group list-group-flush nav-link">
        <a class="list-group-item list-group-item-action list-group-item-light p-2 active" id="index" href="index.php"><i class=" fas fa-cart-arrow-down i-right"> </i>Bán Hàng</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-2" id="stock" href="stock.php"><i class="fas fa-warehouse i-right"> </i>Tồn Kho</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-2" id="his" href="his.php"><i class="fas fa-recycle i-right"> </i>Nhập - Xuất</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-2" id="congNo" href="congNo.php"><i class="fab fa-cc-amazon-pay i-right"> </i>Công Nợ</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-2" id="thuChi" href="thuChi.php"><i class="fas fa-chart-pie i-right"> </i>Thu Chi</a>
    </div>
    <div class="qrCode">
      <label onclick="viewQrCode()"><img src="./vendor/img/qrCode.jpg" width="100%" height="100%"></label>
    </div>
</div>
<!-- Page content wrapper-->
<div id="page-content-wrapper">
    <!-- Top navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" style="padding-left: 0px;padding: 23px !important;">
        <div class="container-fluid">
            <button class="btn btn-light" id="sidebarToggle" style="padding: 0px;"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li><a><div id="showTime"></div></a></li>
                    <li class="nav-item active ml-lg-2"><i class="fas fa-user" title="Đổi Thông Tin Cửa Hàng" style="font-size:14px;" onclick="changeInfoShop()"></i></li>
                </ul>
            </div>
        </div>
    </nav>

                <!-- Page content-->
<div id="show">

</div>
<?php
include('footer.php');
?>
<script type="text/javascript">
  $(document).ready(function(){
    loadHang();
 });
</script>