<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
include('../controller/controller.php');
$data = new cSqldata;
$dataShow = $data->cGetAllListItem();
?>
<table class="table table-bordered mideTH mideTd text-center" style="font-size: 13px;" id="viewList">
	<thead>
		<tr>
			<!-- <th>ID</th> -->
			<th>Tên Sản Phẩm</th>
			<th>Số Lượng</th>
			<th>Giá Tiền</th>
			<!-- <th>ĐVT</th> -->
		</tr>
	</thead>
	<tbody >
		
	</tbody>
</table>
<button class="btn btn-info floatRight" id="addDon" style="margin: -10px -10px 0 0;">Thêm Vào Đơn</button>
<script>
    $(document).ready(function(){
    arrDid = [];
    function table(data){
        let example = $('#viewList').DataTable({
            "lengthMenu": [[10, -1], [10, "All"]],
            "scrollY":        "600px",
            "paging":         false,
            "info":false,
            dom: 'Bfrtip',
            buttons: [
            'selectNone',
            {
                // text: '<i class="fa fa-power-off" style="color:green;">Nhập Hàng</i>',
                text: '<i class="fas fa-sync-alt"></i> ReLoad',
                action: function ( e, dt, node, config ) {
                    // $('#viewBuild').html('')
                    loadListSanPham()
                }
            },
            ],
            data: data,
            columns:[
            {data:"name"},
            {data:"qty"},
            {data:"price"},
            ],
            select: {
                style: 'multi'
            }
        });
        example
        .on( 'select', function ( e, dt, type, indexes ) {
            var rowData = example.rows( indexes ).data().toArray();
            for (var i = 0; i < rowData.length; i++) {
                var x = arrDid.indexOf(rowData[i]['id']);
                if (x === -1) //neu ko ton tai
                    arrDid.unshift(rowData[i]['id']); //thi push 
            }
        } )
        .on( 'deselect', function ( e, dt, type, indexes ) {
            var rowDataUn = example.rows( indexes ).data().toArray();
            for (var i = 0; i < rowDataUn.length; i++) {
                var x = arrDid.indexOf(rowDataUn[i]['id']);
                arrDid.splice(x, 1);
            }
        });
    }
res = <?php echo json_encode($dataShow); ?>;
table(res);
    let arrBuild = [];
    $("#addDon").click(function(){
        if(arrDid.length < 1){
            errAlert('Chọn Sản Phẩm Rồi Thêm')
        }else{
            // $('.borderBuild').show();
            for (var i = 0; i < arrDid.length; i++) {
                let idd = arrDid[i];
                let info = res.filter(a=>a.id == idd);
                let quy_doi = info[0].action;
                let name = info[0].name;
                let price = info[0].price;
                let dvt = info[0].dvt;
                let dv_doi = info[0].dv_doi;
                let rate = info[0].rate;
                let dvt2 = '';
                let qty = 1;
                let a = arrBuild.indexOf(idd)
                if(a == -1){
                    arrBuild.push(idd);
                    if(quy_doi == 1){
                        $('#viewBuild').prepend('<tr><td>'+(arrBuild.length)+'</td> <td>'+name+'</td><td hidden>'+idd+'</td> <td>'+dvt+'</td> <td><input type="number" id="'+idd+'" value="1" class="form-control form-control-sm"></td> <td>'+dv_doi+'</td> <td><span id = "sl_doi'+idd+'">'+rate+'</span></td> <td hidden>'+rate+'</td> <td>'+price+'</td> <td><span id = "price'+idd+'">'+price+'</span></td> <td class = "text-center "><button class = "btn btn-outline-danger btn-sm">X</button></td></tr>');
                        
                    }else{
                        $('#viewBuild').prepend('<tr><td>'+(arrBuild.length)+'</td> <td>'+name+'</td><td hidden>'+idd+'</td> <td>'+dvt+'</td> <td><input type="number" id="'+idd+'" value="1" class="form-control form-control-sm"></td> <td></td> <td></td> <td hidden>'+rate+'</td> <td>'+price+'</td> <td><span id = "price'+idd+'">'+price+'</span></td> <td class = "text-center "><button class = "btn btn-outline-danger btn-sm">X</button></td></tr>');
                    }
                }
            }
            $(".buttons-select-none").click()
        }
    })

    $('#viewBuild').on('keyup', 'tr td input', function() {
        let id = $(this).closest('tr').find('td:eq(2)').text();
        let price = $(this).closest('tr').find('td:eq(8)').text();
        let rate = $(this).closest('tr').find('td:eq(7)').text();
        let qty = $('#'+id+'').val();
        let total = qty*price;
        let qty_doi = qty*rate;
        $('#price'+id+'').html(total)
        $('#sl_doi'+id+'').html(qty_doi)
    });

    $('#viewBuild').on('click', 'tr td button', function() {
        let id = $(this).closest('tr').find('td:eq(2)').text();
        arrBuild = removeItemArray(id,arrBuild)
        $(this).closest('tr').remove();
    });
    
    $("#confirmDon").click(function(){
        let data = document.getElementById('viewBuild');
        let arrDatas = [];
        if (data.rows.length < 1) {
            errAlert('Chưa có dữ liệu')
        } else {
            for (let i = 0; i < data.rows.length; i++) {
                let objCells = data.rows.item(i).cells;
                let arrData = [];
                for (let j = 2; j < objCells.length-1; j++) {
                    // arrData.push(objCells.item(j).innerHTML) 
                    if(j == 4){
                        arrData.push(objCells.item(j).children[0].value)
                    }else if(j == 2 || j == 8){
                        arrData.push(objCells.item(j).innerHTML) 
                    }
                    // else if(j == 9){
                    //     arrData.push($('#price'+objCells.item(2).innerHTML+'').text()); 
                    // }
                }
                arrDatas.push(arrData);
            }

            $.post('./view/createBuild.php', 
                {arrDatas:arrDatas},
                function(data){
                    $("#modal-content").html(data);
                    $('#exampleModal').modal('show');
            });
        }
    });
});
</script>
