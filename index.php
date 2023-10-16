<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
include('header.php');
if (empty($_SESSION['user'])) {
  header('Location:../login.php');
  exit();
}
$listModel = $data->cGetListModel();
$listCode = $data->cGetListCode();
$listRbCode = $data->cGetListRbCode();
?>
<body>
   <div class="container-fluid">
    <div class="row main-bar">
      <div class="location">
        <i class="fa fa-map-marker i-right" style="color:red;"> </i><span>WORK INTRUCSION >> Follow</span>
        
      </div>
      <div class="bar-center">

      </div>
      <div class="option_box">
       <!--  <i class="fas fa-trash-alt" title="Delete Bom" id="deleteBom"></i>
        <i class="fas fa-download" title = "Up Bom" id = "upBom"></i>
        <i class="fas fa-edit" title="Edit Bom" id="editBom"></i>
        <i class="fas fa-plus" title="Add Bom" id="addBom"></i>
        <i class="far fa-eye" title="View Bom" id="viewBom"></i>
        <i class="fas fa-compare" title="Compare Bom" id="compareBom"></i> -->
      </div>
    </div>
      <div class="row">
        <div class="mg0 left-filter2" id="left-filter">
          
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fas fa-filter i-right"></i>Filters
            </div>
            <div class="panel-body filters-main">
              <label>Model :</label>
               <input type="text" id="model" class="form-control form-control-sm" list="arrModel">
                <datalist id="arrModel">
                  <?php
                  foreach ($listModel as $key) {
                  ?>
                    <option><?php echo $key->model; ?></option>
                  <?php
                  }
                  ?>    
                </datalist>
              <label>Code :</label>
              <input type="text" id="code" class="form-control form-control-sm" list="arrProccess">
                <datalist id="arrProccess">
                <?php
                foreach ($listCode as $key) {
                ?>
                  <option><?php echo $key->subCode; ?></option>
                <?php
                }
                ?>      
                </datalist>
              <label>RB Code :</label>
              <input type="text" id="rbCode" class="form-control form-control-sm" list="arrProcess">
                <datalist id="arrProcess">
                <?php
                foreach ($listRbCode as $key) {
                ?>
                  <option><?php echo $key->rbCode; ?></option>
                <?php
                }
                ?>      
                </datalist>
              <button class="btn btn-primary btn-sm appy-filter" id="apply"><i class="fa fa-check i-right"></i>Apply</button>
            </div>
          </div>
           <div class="panel panel-primary resouce-rack">
            
              <!-- <button class="btn btn-dark form-control mg-top-10" id="updateVer"><i class="fas fa-upload btn-i" style="color: #00ffc4;"></i> Update Ver</button> -->
              <div class="panel-body">
            </div>
            <div class="panel-body" id="show-oder"></div>
          </div>
        </div>
        <div class="body-right2 mg0">

          <div class="mgl-5 data-content">

            <div class="panel panel-primary">
              <div class="panel-heading-content">
                <div class="title_box">
                  <i class="fas fa-info-circle i-right"></i>
                </div>
              </div>
              
              <div class="mg-top-10" id="show" style="height: 800px;">

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

  $('#updateVer').click(function(){
    loadUpdateVer()
  });

  $('#addModel').click(function(){
    loadAddModel()
  });

  $('#editInf').click(function(){
    loadEditInf()
  });

  $('#giaoSX').click(function(){
    loadGiaoSX()
  });

  $('#editModel').click(function(){
    loadEditAll()
  });

  $('#del').click(function(){
    loadDel()
  });

  $('#toggler-left').click(function(){
    $('#left-filter').toggle('slow');
  });
  
</script>

