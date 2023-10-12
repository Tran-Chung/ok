<?php
include('header.php');
if (!isset($_SESSION['user'])) {
  header('Location:../login.php');
  exit();
}
$listType = $data->cGetPart();
$listBasic = $data->cGetBasic();
?>
<body>
   <div class="container-fluid">
    <div class="row main-bar">
      <div class="location">
        <i class="fa fa-map-marker i-right" style="color:red;"> </i><span>WORK INTRUCSION >> File</span>
      </div>
    </div>
      <div class="row">
        <div class="mg0 left-filter" id="left-filter">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fas fa-filter i-right"></i>Filters
            </div>
            <div class="panel-body filters-main">
              <label>Basic :</label>
              <input type="text" list="listBasic" id="group1" class="form-control form-control-sm">
              <datalist id="listBasic">
                <option value=""></option>
                <?php 
                foreach ($listBasic as $key) {
                ?>
                  <option value="<?php echo $key->name; ?>"><?php echo $key->name; ?></option>
                <?php
                }
                ?>
              </datalist>
              
              <label>Model Code :</label>
              <input type="text" list="listModelCode" id="part" class="form-control form-control-sm">
              <datalist id="listModelCode">
                <option value=""></option>
                <?php 
                foreach ($listType as $key) {
                ?>
                  <option value="<?php echo $key->type; ?>"><?php echo $key->type; ?></option>
                <?php
                }
                ?>
              </datalist>
              <label>Status :</label>
              <select id="status" class="form-control form-control-sm">
                <option></option>
                <option value="2">OLD</option>
                <option value="1" selected>USING</option>
              </select>
              <button class="btn btn-primary btn-sm appy-filter" id="apply"><i class="fa fa-check i-right"></i>Apply</button>
            </div>
          </div>
           <div class="panel panel-primary resouce-rack">
            
              <!-- <button class="btn btn-dark form-control mg-top-10" id="updateVer"><i class="fas fa-upload btn-i" style="color: #00ffc4;"></i> Update Ver</button> -->
              <!-- <button class="btn btn-dark form-control mg-top-10" id="addModel"><i class="fas fa-plus btn-i" style="color: #00ffc4;"></i> Thêm Model</button> -->
            <div class="panel-body" id="show-oder"></div>
          </div>
        </div>
        <div class="body-right mg0">

          <div class="mgl-5 data-content">

            <div class="panel panel-primary">
              <div class="panel-heading-content">
                <div class="title_box">
                  <i class="fas fa-info-circle i-right"></i>
                </div>
              </div>
              
              <div class="mg-top-10" id="show">

              </div>
            </div>
          </div>
        </div>
      </div>
   </div>
   
<?php
include('footer.php');
?>
<script type="text/javascript">
  $(document).ready(function(){
    loadMain()
  });
    
  $('#apply').click(function(){
    loadMain()
  });

  $('#toggler-left').click(function(){
    $('#left-filter').toggle('slow');
  });
  
</script>

