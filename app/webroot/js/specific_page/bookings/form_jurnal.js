/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
  function dlor(){
                   $('#amount2').formatCurrency();
  }

$(document).ready(function(){     
    $('.jurnalLink').bind('click', function(){
        var account_debet = $("#account_debet").val();
        var cashflow_id = $("#cashflow_id").val();
        var account_credit = $("#account_credit").val();
        var no_transaction = $("#no_transaction").val();
        var id_trans = $("#id").val();
        var project_id = $("#project_id").val();
        var unit_id = $("#unit_id").val();
        var description = $("#description").val();
        var trans_date = $("#trans_date").val();
        var amount = $("#amount").val();
        $('div.description').html("");
        $('div.trans_date').html("");
        $('div.amount').html("");
        $('div.alertsuccess').html("");
       
        if(description == ""){
            $('div.description').html("<span class='required' style='color:red'>Cicilan pembayaran harus diisi</span>");
            return false;
        } else {
            if(trans_date == ""){
                $('div.trans_date').html("<span class='required' style='color:red'>Tanggal pembayaran harus diisi</span>");
                return false;
            } else {
                if(amount == ""){
                    $('div.amount').html("<span class='required' style='color:red'>Jumlah pembayaran harus diisi</span>");
                    return false;
                }
            }
        }

        $.ajax({

            url: baseUrl +'Bookings/addJurnal',
            dataType: 'json',
            data: 'description=' + description + '&trans_date=' +trans_date+'&amount=' +amount+'&id_trans='+id_trans+'&account_debet='+account_debet+'&account_credit='+account_credit+'&no_transaction='+no_transaction+'&project_id='+project_id+'&unit_id='+unit_id+'&cashflow_id='+cashflow_id,
            success: function(result) {
                $("#description").val("");
                $("#trans_date").val("");
                $("#amount").val("");
                $.sticky("Data Pembayaran SPR Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tablejurnal').html(displayTableJurnal(result));
                console.log("we succeeded, man: " + result);
                
            }
        });
    });

});



function displayTableJurnal(data){

            //var jurnal = data;
            var html = "<table id='tablejurnal' class='table table-bordered table-striped table_vam'><thead><tr><th>Nomor Transaksi</th><th>Cicilan Pembayaran</th><th>Tanggal</th><th>Jumlah</th><th>Aksi</th></th></thead><tbody>";
            var jumlah = 0;
            for (var index in data) {
               
                for (var jurnal in data[index]) {
                 // console.log("\tService: " + jurnal + "; value: " + data[index][jurnal]['id']);
                  var description = data[index][jurnal]['description'];
                  var trans_date = data[index][jurnal]['trans_date'];
                  var amount = data[index][jurnal]['amount'];
                  
                  var account_debet = data[index][jurnal]['account_debet'];
                  var account_credit = data[index][jurnal]['account_credit'];
                  var no_transaction = data[index][jurnal]['no_transaction'];
                  var project_id = data[index][jurnal]['project_id'];
                  var unit_id = data[index][jurnal]['unit_id'];
                  var id_trans = data[index][jurnal]['booking_id'];
                  var id_jurnal = data[index][jurnal]['id'];
                  var cashflow_id = data[index][jurnal]['cashflow_id'];
                  
                  
                  html += "<tr><td>"+no_transaction+"</td><td>"+description+"</td><td>"+trans_date+"</td><td>"+ formatCurrency(amount)+"</td>";
                  html += "<input id='description' value='"+description+"' type='hidden' class='description' />";
                  html += "<input id='amount' value='"+amount+"' type='hidden' class='amount' />";
                  html += "<input id='trans_date' value='"+trans_date+"' type='hidden' class='trans_date' />";
                  html += "<input id='account_debet' value='"+account_debet+"' type='hidden' class='account_debet' />";
                  html += "<input id='account_credit' value='"+account_credit+"' type='hidden' class='account_credit' />";
                  html += "<input id='no_transaction' value='"+no_transaction+"' type='hidden' class='no_transaction' />";
                  html += "<input id='project_id' value='"+project_id+"' type='hidden' class='project_id' />";
                  html += "<input id='unit_id' value='"+unit_id+"' type='hidden' class='unit_id' />";
                  html += "<input id='jurnal_id' value='"+id_jurnal+"' type='hidden' class='jurnal_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                  html += "<input id='cashflow_id' value='"+cashflow_id+"' type='hidden' class='cashflow_id' />";
                  
                   html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditSPR' onClick='editJurnal($(this))' class='label ttip_b' title='Edit Pembayaran SPR'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusSPR' onClick='deleteJurnal($(this))' class='label ttip_b' title='Hapus Pembayaran SPR'>Hapus</a></td>";
                 
                  html += "</tr>";
                  jumlah += parseFloat(amount,2);
            }
           
           // return html;
        }
         html += "<tr><td colspan='3'><b>Jumlah</b></td><td colspan='2'><b>"+ formatCurrency(jumlah)+"</b></td></tr>";
        html +=  "</tbody></table>";
       
        return html;
}

function editJurnal(data){
    var row = data.parent().parent();
    var description = $(row).find('input.description').val();
    var amount = $(row).find('input.amount').val();
    var trans_date = $(row).find('input.trans_date').val();
    var account_debet = $(row).find('input.account_debet').val();
    var account_credit = $(row).find('input.account_credit').val();
    var no_transaction = $(row).find('input.no_transaction').val();
    var project_id = $(row).find('input.project_id').val();
    var unit_id = $(row).find('input.unit_id').val();
    
    var jurnal_id = $(row).find('input.jurnal_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var cashflow_id = $(row).find('input.cashflow_id').val();
    
    var split_date = trans_date.split('-');
    var show_date = split_date[1]+'/'+split_date[2]+'/'+split_date[0];
   
    var html = '<div class="row-fluid">';
    html += '<label>Deskripsi Pembayaran</label>';
    html += '<input id="description2" name="description2" type="text" class="span12 required" minlength="3" value="'+description+'"/><div class="description2"></div>';
    html += '<label>Tanggal</label>';
    html += '<input id="trans_date2" name="trans_date2" type="text" class="datepickerJurnal span12 required" minlength="3" value="'+show_date+'"/></div>'
    html += '<label>Jumlah</label>';
    html += '<div class="input-prepend input-append input-price">';
    html += '<span class="add-on">Rp.</span><input id="amount2" name="amount2" type="text" class="currency field-price required" minlength="3" onblur="dlor();" value="'+amount+'"/><span class="add-on coma">.00</span>';
    html += '</div></div>';
    
   
    html += '<br/><input type="button" id="saveJurnal" class="btn btn-info" value="Update Transaksi">';
    $('.editable_jurnal').html(html);

    $('.datepickerJurnal').datepicker({ dateFormat:  "dd/mm/yyyy", changeMonth: true, changeYear: true});

    $(window).bind('resize',positionPopup);
    positionPopup();
    


    $('#saveJurnal').click(function(){
        var ndescription = $("#description2").val();
        
        var date_temp = $("#trans_date2").val();
        
        var nsplit_date = date_temp.split('/')
        
        var namount = $("#amount2").val();
        
        //var nsplit_date = $("#date_payment2").val().split('/');
         var nshow_date = nsplit_date[2]+'-'+nsplit_date[0]+'-'+nsplit_date[1];
     
       var ntrans_date = nshow_date;
        
        $('div.description2').html("");
        $('div.trans_date2').html("");
        $('div.amount2').html("");
        $('div.alertsuccess').html("");
        
        if(ndescription == ""){
                    $('div.description2').html("<span class='required' style='color:red'>Cicilan pembayaran harus diisi</span>");
                    return false;
                } else {
                    if(namount == ""){
                        $('div.amount2').html("<span class='required' style='color:red'>Jumlah pembayaran harus diisi</span>");
                        return false;
                    } else {
                        if(nshow_date == ""){
                            $('div.trans_date2').html("<span class='required' style='color:red'>Tanggal pembayaran harus diisi</span>");
                            return false;
                        }
                    }
                }
        //console.log(bank_name);
        console.log('ajisaputra');
         
        $.ajax({
                    url: baseUrl +'Bookings/addJurnal',
                   
                    dataType: 'json',
                    data: 'description=' + ndescription + '&trans_date=' +nshow_date+'&amount=' +namount+'&id_trans='+id_trans+'&account_debet='+account_debet+'&account_credit='+account_credit+'&no_transaction='+no_transaction+'&project_id='+project_id+'&unit_id='+unit_id+'&jurnal_id='+jurnal_id+'&cashflow_id='+cashflow_id,
                    success: function(result) {
                        $(".close").click();
                        $.sticky("Data Pembayaran SPR Telah Di Update", {autoclose : 5000, position: "top-center", type: "st-success" });
                        $('#tablejurnal').html(displayTableJurnal(result));
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
 
 function deleteJurnal(data){
    $(window).bind('resize',positionPopupDel);
    var row = data.parent().parent();
    //console.log(row);
    var description = $(row).find('input.description').val();
    var jurnal_id = $(row).find('input.jurnal_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var cashflow_id = $(row).find('input.cashflow_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus '+description+' pada pemesanan unit ini ?<br/>'
    html += '</div></div></div><br/>';
    html += ' <div class="center"><input type="button" id="deleteJurnal" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    $('.deletable_spr').html(html);
    $('#deleteJurnal').click(function(){
        $.ajax({

            url: baseUrl +'Bookings/deleteJurnal',
           
            dataType: 'json',
            data: 'id_trans='+id_trans+'&jurnal_id='+jurnal_id,
            success: function(result) {
                $(".close").click();
                $.sticky("Data Pembayaran SPR Telah Dihapus", {autoclose : 5000, position: "top-center", type: "st-success" });
                $('#tablejurnal').html(displayTableJurnal(result));
                
            }
        });
        $("#overlay_form_del").fadeOut(500);
    }); 
    
    $("#close_del").click(function(){
       $("#overlay_form_del").fadeOut(500);
        $(".close").click();
               
    });
  
 }
 
Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
 
   
