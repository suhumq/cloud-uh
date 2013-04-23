/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  function ext(){
    $('#price2').formatCurrency();
  }

$(document).ready(function(){              
    $('.ppjbLink').bind('click', function(){
        var type = $(this).parent().attr('id');

        var draft = $("#description_transdraft").val();
        var price = $("#price").val();
        var date_payment = $("#date_deadline").val();
        var id_trans = $("#id_trans").val();
       
        $('div.description_transdraft').html("");
        $('div.price').html("");
        $('div.date_payment').html("");
        $('div.alertsuccess').html("");
       
        if(description_transdraft == ""){
            $('div.description_transdraft').html("<span class='required' style='color:red'>Keterangan pembayaran harus diisi</span>");
            return false;
        } else {
            if(price == ""){
                $('div.price').html("<span class='required' style='color:red'>Jumlah pembayaran harus diisi</span>");
                return false;
            } else {
                if(date_payment == ""){
                    $('div.date_payment').html("<span class='required' style='color:red'>Tanggal jatuh tempo harus diisi</span>");
                    return false;
                }
            }
        }

        $.ajax({

            url: baseUrl +'Bookings/addDraftTransaction',

            dataType: 'json',
            data: 'draft=' + draft + '&price=' +price+'&datePayment=' +date_payment+'&id_trans='+id_trans,

            success: function(result) {
                $("#description_transdraft").val("");
                $("#price").val("");
                $("#date_payment").val("");
                $('.price').formatCurrency();
                $.sticky("Data PPJB Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tableppjb').html(displayTablePpjb(result));
            }
        });
        //            }
    });

});



function displayTablePpjb(data){

            var ppjb = data;
            var html = "<table id='tableppjb' class='table table-bordered table-striped table_vam'><thead><tr><th>Pembayaran</th><th>Jumlah</th><th>Tanggal Jatuh Tempo</th><th>Aksi</th></th></thead><tbody>";
            var jumlah = 0;
            for (var index in data) {
               
                for (var ppjb in data[index]) {
                 // console.log("\tService: " + ppjb + "; value: " + data[index][ppjb]['id']);
                  var draft = data[index][ppjb]['description_transdraft'];
                  var price = data[index][ppjb]['price'];
                  var date_payment = data[index][ppjb]['date_payment'];
                  var id_trans = data[index][ppjb]['booking_id'];
                  var id_draft = data[index][ppjb]['id'];
                 
                  html += "<tr><td>"+draft+"</td><td>"+formatCurrency(price)+"</td><td>"+date_payment+"</td>";
                  html += "<input id='description_transdraft' value='"+draft+"' type='hidden' class='description_transdraft' />";
                  html += "<input id='price' value='"+price+"' type='hidden' class='price' />";
                  html += "<input id='date_payment' value='"+date_payment+"' type='hidden' class='date_payment' />";
                  html += "<input id='draft_id' value='"+id_draft+"' type='hidden' class='draft_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                  html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditPPJB' onClick='editPpjb($(this))' class='label ttip_b' title='Edit PPJB'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusPPJB' onClick='deletePpjb($(this))' class='label ttip_b' title='Hapus PPJB'>Hapus</a></td>";
                  
                  html += "</tr>";
                  jumlah += parseFloat(price,2);
            }
           
           // return html;
        }
        html += "<tr><td colspan='1'><b>Jumlah</b></td><td colspan='3'><b>"+formatCurrency(jumlah)+"</b></td></tr>";
        html +=  "</tbody></table>";
       
        return html;
}

function editPpjb(data){
    
    $("#overlay_form_ppjb").fadeIn(1000);
    var row = data.parent().parent();
    console.log(row);
    var draft = $(row).find('input.description_transdraft').val();
    var price = $(row).find('input.price').val();
    var date_payment = $(row).find('input.date_payment').val();
    
    var draft_id = $(row).find('input.draft_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var split_date = date_payment.split('/');
    var show_date = split_date[1]+'/'+split_date[0]+'/'+split_date[2];
    console.log(draft);
    
    var html = '<div class="row-fluid"><div class="span12">';
    html += '<label>Deskripsi Pembayaran</label>';
    html += '<input id="description_transdraft2" name="description_transdraft" type="text" class="span12 required" minlength="3" placeholder="Deskripsi Pembayaran" value="'+draft+'"/>';
    html += '<label>Jumlah</label>';
    html += '<div class="input-prepend input-append input-price">';
    html += '<span class="add-on">Rp.</span><input id="price2" name="price" type="text" class="field-price required" onblur="ext();" minlength="3" value="'+price+'"/><span class="add-on coma">.00</span><br/><br/>';
    html += '<label>Tanggal Jatuh Tempo</label>';
    html += '<input id="date_payment2" name="date_payment2" type="text" class="datepicker span2 required" minlength="3" value="'+show_date+'"/>';
    html += '</div></div>';
    
   
    html += '<br/><input type="button" id="savePpjb" class="btn btn-info" value="Update PPJB">';
    $('.editable_ppjb').html(html);
    $('.datepicker').datepicker({ dateFormat:  "dd/mm/yyyy", changeMonth: true, changeYear: true});
//    var dateText = $(this).data('date');
//    $('.datepicker').datepicker('hide');
    $(window).bind('resize',positionPopup);
    positionPopup();
    
    $('#savePpjb').click(function(){
        var ndraft = $("#description_transdraft2").val();
        var nprice = $("#price2").val();
        var nsplit_date = $("#date_payment2").val().split('/');
        var nshow_date = nsplit_date[1]+'/'+nsplit_date[0]+'/'+nsplit_date[2];
        var ndate_payment = nshow_date;
        $('div.description_transdraft2').html("");
        $('div.price2').html("");
        $('div.date_payment2').html("");
        $('div.alertsuccess').html("");
        
        if(ndraft == ""){
                    $('div.description_transdraft2').html("<span class='required' style='color:red'>Keterangan pembayaran harus diisi</span>");
                    return false;
                } else {
                    if(nprice == ""){
                        $('div.price2').html("<span class='required' style='color:red'>Jumlah pembayaran harus diisi</span>");
                        return false;
                    } else {
                        if(ndate_payment == ""){
                            $('div.date_payment2').html("<span class='required' style='color:red'>Tanggal jatuh tempo harus diisi</span>");
                            return false;
                        }
                    }
                }
        //console.log(bank_name);
        
        $.ajax({
                    
                    url: baseUrl +'Bookings/addDraftTransaction',
                    data : id_trans,
                    dataType: 'json',
                    data: 'draft=' + ndraft + '&price=' +nprice+'&datePayment=' +ndate_payment+'&id_trans='+id_trans+'&id_draft='+draft_id,
                    
                    // beforeSend: $('input.bank_name').html("<input id='bank_name' name='bank_name' type='text' class='span12 required' />"),
                    success: function(result) {
                       $(".close").click(); 
                       $.sticky("Data PPJB Berhasil Di Update", {autoclose : 5000, position: "top-center" , type: "st-success"});
                       $('#tableppjb').html(displayTablePpjb(result));
                    }
                });
        
        
        $("#overlay_form_ppjb").fadeOut(500);
      });
    //close popup
    $("#close").click(function(){
       $("#overlay_form_ppjb").fadeOut(500);
       $(".close").click();
    });
 }
 
 function deletePpjb(data){
    $("#overlay_form_del").fadeIn(1000);
    positionPopupDel();
    $(window).bind('resize',positionPopupDel);
    var row = data.parent().parent();
    console.log(row);
    var draft = $(row).find('input.description_transdraft').val();
    var draft_id = $(row).find('input.draft_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus '+draft+' pada pemesanan unit ini ?<br/>'
    html += '</div></div></div><br/>';
   
    html += ' <div class="center"><input type="button" id="deleteDraft" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    $('.deletable_ppjb').html(html);
    $('#deleteDraft').click(function(){
        $.ajax({

            url: baseUrl +'Bookings/deleteDraftTransaction',
           
            dataType: 'json',
            data: 'id_trans='+id_trans+'&id_draft='+draft_id,
            success: function(result) {
                $(".close").click();
                $.sticky("Data PPJB Berhasil Dihapus", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tableppjb').html(displayTablePpjb(result));
                
            }
        });
        $("#overlay_form_del").fadeOut(500);
    }); 
    
    $("#close_del").click(function(){
       $("#overlay_form_del").fadeOut(500);
        $(".close").click();
    });
  
 }
 
 
   
   
