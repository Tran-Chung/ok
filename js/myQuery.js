function loadMain() {
    let rbCode = $("#rbCode").val().trim();
	let model = $("#model").val().trim();
	let code = $("#code").val().trim();
	$.post('./view/viewMain.php', 
		{model:model, code:code, rbCode:rbCode},
            function(data){
            $("#show").html(data);
        });
}

function loadIm() {
    let rbCode = $("#rbCode").val().trim();
  let model = $("#model").val().trim();
  let code = $("#code").val().trim();
  $.post('./view/viewIm.php', 
    {model:model, code:code, rbCode:rbCode},
            function(data){
            $("#show").html(data);
        });
}

function loadHisIm() {
    let rbCode = $("#rbCode").val().trim();
  let model = $("#model").val().trim();
  let code = $("#code").val().trim();
  $.post('./view/viewHisIm.php', 
    {model:model, code:code, rbCode:rbCode},
            function(data){
            $("#show").html(data);
        });
}

function loadHisEx() {
    let rbCode = $("#rbCode").val().trim();
  let model = $("#model").val().trim();
  let code = $("#code").val().trim();
  $.post('./view/viewHisEx.php', 
    {model:model, code:code, rbCode:rbCode},
            function(data){
            $("#show").html(data);
        });
}

function loadDetailMaterial() {
    // let rbCode = $("#rbCode").val().trim();
    let rbCode = '';
  let model = $("#model11111").val().trim();
  let code = $("#code11111").val().trim();
  let area = $("#area1111").val().trim();
  $.post('./view/viewDetailMaterial.php', 
    {model:model, code:code, rbCode:rbCode, area:area},
            function(data){
            $("#show").html(data);
        });
}

function loadQR() {
    // let rbCode = $("#rbCode").val().trim();
    let rbCode = '';
  let model = $("#model11111").val().trim();
  let code = $("#code11111").val().trim();
  let area = $("#area1111").val().trim();
  $.post('./view/viewQR.php', 
    {model:model, code:code, rbCode:rbCode, area:area},
            function(data){
            $("#show").html(data);
        });
}

function loadListForm() {
    // let rbCode = $("#rbCode").val().trim();
    $.post('./view/viewListForm.php', 
        // {rbCode:rbCode},
            function(data){
            $("#show").html(data);
        });
}

function loadListFormFinish() {
    let rbCode = $("#rbCode").val().trim();
    $.post('./view/viewListFormFinish.php', 
        {rbCode:rbCode},
            function(data){
            $("#show").html(data);
        });
}

function loadFormMuonWip() {
    $.post('./view/creatFormMuonWip.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadFormTraWip() {
    $.post('./view/creatFormTraWip.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadFormUnplan() {
    $.post('./view/creatFormUnplan.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadFormPo() {
    $.post('./view/viewPo.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadHisMuonTra() {
    $.post('./view/viewHisMuonTra.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadUpdateImg() {
    $.post('./view/updateImg.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadListPo() {
    let model = $("#model11111").val().trim();
    let code = $("#code11111").val().trim();
    let status = $("#status11").val().trim();
    let area = $("#area11").val().trim();
    $.post('./view/viewPo.php', 
        {model11111:model, code11111:code, status11111:status, area11111:area},
        function(data){
        $("#show").html(data);
    });
}

function loadCreatePo() {
    $.post('./view/choosePo.php', 
        function(data){
        $("#modal-content").html(data);
        $('#exampleModal').modal('show');
    });
}

function removeItemArray(e,arr){
  let index = arr.indexOf(e)
  if(index !== -1){
    arr.splice(index,1)
  }
  return arr
}

function dbClickEdit(dataDb) {
    let type = 'add';
    $.post('view/viewImage.php',  
        {arrDid:dataDb, type:type},
        function(data){
        $("#showImgMaterial").html(data);
        // $('#exampleModal').modal('show');
    });
}

function dbClickEditMain(dataDb) {
    let type = 'view';
    $.post('view/viewImage.php',  
        {arrDid:dataDb, type:type},
        function(data){
        $("#modal-content").html(data);
        $('#exampleModal').modal('show');
    });
}

function dbClickView(dataDb) {
    let type = dataDb[0]['type']
    let arr = dataDb[0]['stt']
    if (type == 'muonWip') {
      window.open("./view/viewFormMuonWip.php?stt="+arr, "_blank", "scrollbars=yes,resizable=yes,width = "+screen.availWidth+",top=20,height="+screen.availWidth+"");
    }else if(type == 'traWip'){
      window.open("./view/viewFormTraWip.php?stt="+arr, "_blank", "scrollbars=yes,resizable=yes,width = "+screen.availWidth+",top=20,height="+screen.availWidth+"");
    }else{
      window.open("./view/viewFormUnplan.php?stt="+arr, "_blank", "scrollbars=yes,resizable=yes,width = "+screen.availWidth+",top=20,height="+screen.availWidth+"");
    }
    
}

function inputSelect(inputSelect){
  Swal.fire({
  title: 'Select Outage Tier',
  input: 'select',
  inputOptions: inputSelect,
  inputPlaceholder: 'required',
  showCancelButton: true,
  inputValidator: function (value) {
    return new Promise(function (resolve, reject) {
      if (value !== '') {
        resolve();
      } else {
        resolve('You need to select a Tier');
      }
    });
  }
}).then(function (result) {
  if (result.isConfirmed) {
    Swal.fire({
      icon: 'success',
      html: 'You selected: ' + result.value
    });
  }
});
}

function quest(text){
    return Swal.fire({
      title: 'Are you sure?',
      text: text,
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Confirm it!'
    })
}
