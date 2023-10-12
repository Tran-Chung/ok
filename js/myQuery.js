window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function loadHang() {
    $.post('./view/showHang.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadImportHang() {
    // let dateS = $('#dateS').val()
    // let dateE = $('#dateE').val()
    $.post('./view/showImportHang.php', 
        function(data){
        $("#show").html(data);
    });
}

function loadHis() {
    let dateS = $('#dateS').val()
    let dateE = $('#dateE').val()
    $.post('./view/showHis.php',  {dateS:dateS, dateE:dateE},
        function(data){
        $("#show").html(data);
    });
}

function loadCongNo() {
    $.post('./view/showCongNo.php',
        function(data){
        $("#show").html(data);
    });
}

function loadListSanPham() {
    $.post('./view/viewListSanPham.php', 
        function(data){
        $("#show-hang").html(data);
    });
}

function loadThuChi() {
    let year = $('#year').val()
    let dateS = year+'-01-01';
    let dateE = year+'-12-31';
    $.post('./view/showThuChi.php',  {dateS:dateS, dateE:dateE, year:year},
        function(data){
        $("#show").html(data);
    });
}

function viewQrCode() {
    $.post('./view/viewQrCode.php', 
        function(data){
        $("#modal-content").html(data);
        $('#exampleModal').modal('show');
    });
}

function changeInfoShop() {
    $.post('./view/changeInfoShop.php', 
        function(data){
        $("#modal-content").html(data);
        $('#exampleModal').modal('show');
    });
}

function loadTime() {
    let time = new Date()
    let Y = time.getFullYear()
    let d = time.getDate()
    let m = time.getMonth()+1
    let H = time.getHours()
    let i = time.getMinutes()
    let s = time.getSeconds()
    if(d <10){
        d = '0'+d;
    }
    if(m <10){
        m = '0'+m;
    }
    if(H <10){
        H = '0'+H;
    }
    if(i <10){
        i = '0'+i;
    }
    if(s <10){
        s = '0'+s;
    }
    let html = d+'/'+m+'/'+Y+' '+H+':'+i+'/'+s
    $('#showTime').html(html)
}

function removeItemArray(e,arr){
  let index = arr.indexOf(e)
  if(index !== -1){
    arr.splice(index,1)
  }
  return arr
}

function errAlert(text){
    Swal.fire({
        icon: 'error',
        title: text,
        // text: 'Something went wrong!'
      })
}

function successAlert(res){
    Swal.fire(
        res,
        '',
        'success'
    )
}

// tạo ra để gọi lại liên tục

function Quest(title, buttonText){
    return Swal.fire({
        title: title,
        // text: text,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: buttonText,
        denyButtonText: 'CANCEL',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    })
}

// đúng thì như thế này

// function Quest_binh_thuong(title){
//     Swal.fire({
//         title: title,
//         // text: text,
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonText: 'CONFIRM',
//         denyButtonText: 'CANCEL',
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//     }).then((result) => {
//         if (result.isConfirmed) {
//             console.log("confirm")
//         } else if (result.isDismissed) {
//             console.log("deny")
//         }
//     });
// }

function plus (idd, price, rate) { 
    let qty = $('#'+idd+'').text();
    let qty_up = parseInt(qty)+1
    let cham = (parseFloat(price)*qty_up).toString().indexOf('.')
    let total = parseFloat(price)*qty_up
    if(cham != -1){
        total = (parseFloat(price)*qty_up).toString().substr(0,cham+3)
    }
    let dv_doi = (qty_up/parseFloat(rate)).toString().substr(0,4)

    $('#'+idd+'').html(qty_up)
    $('#price'+idd+'').html(total)
    $('#dv_doi'+idd+'').html(dv_doi)
    
};

function tru (idd, price, rate) { 
    let qty = $('#'+idd+'').text();
    let qty_up = qty
    if(qty > 1){
        qty_up = parseInt(qty)-1
    }
    let cham = (parseFloat(price)*qty_up).toString().indexOf('.')
    let total = parseFloat(price)*qty_up
    if(cham != -1){
        total = (parseFloat(price)*qty_up).toString().substr(0,cham+3)
    }
    let dv_doi = (qty_up/parseFloat(rate)).toString().substr(0,4)

    $('#'+idd+'').html(qty_up)
    $('#price'+idd+'').html(total)
    $('#dv_doi'+idd+'').html(dv_doi)
};

function plus_doi (idd, price, rate) { 
    let qty = $('#dv_doi'+idd+'').text();
    let qty_up = parseInt(qty)+1
    let qty_doi = qty_up*parseFloat(rate)
    let cham = (qty_doi*parseFloat(price)).toString().indexOf('.')
    let total = qty_doi*parseFloat(price)
    if(cham != -1){
        total = (qty_doi*parseFloat(price)).toString().substr(0,cham+3)
    }

    $('#'+idd+'').html(qty_doi)
    $('#price'+idd+'').html(total)
    $('#dv_doi'+idd+'').html(qty_up)
};

function tru_doi (idd, price, rate) { 
    let qty = $('#dv_doi'+idd+'').text();
    let qty_up = qty
    if(qty > 1){
        qty_up = parseInt(qty)-1
    }
    let qty_doi = qty_up*parseFloat(rate)
    let cham = (qty_doi*parseFloat(price)).toString().indexOf('.')
    let total = qty_doi*parseFloat(price)
    if(cham != -1){
        total = (qty_doi*parseFloat(price)).toString().substr(0,cham+3)
    }
    
    if(qty >= 1){
        // $('#totalSum').html(totalSum)
        $('#'+idd+'').html(qty_doi)
        $('#price'+idd+'').html(total)
        $('#dv_doi'+idd+'').html(qty_up)
    }
};