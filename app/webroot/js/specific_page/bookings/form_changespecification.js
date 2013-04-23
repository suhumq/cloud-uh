/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 function dlor(){
    $('#material_standard2').formatCurrency();
    $('#material_new2').formatCurrency(); 
  }
$(document).ready(function(){     
    $('.cspLink').bind('click', function(){
        var material_name = $("#material_name").val();
        var id_trans = $("#id_trans").val();
        var material_standard = $("#material_standard").val();
        var material_new = $("#material_new").val();
        var material_qty = $("#material_qty").val();
        $('div.materialqty').html("");
        $('div.materialname').html("");
        $('div.materialnew').html("");
        $('div.materialstandard').html("");
        $('div.alertsuccess').html("");
       
        if(material_name == ""){
            $('div.materialname').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
            return false;
        } else {
            if(material_standard == ""){
                $('div.materialstandard').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                return false;
            } 
        }

        $.ajax({

            url: baseUrl +'Bookings/addBookingMaterial',
            dataType: 'json',
            data: 'materialName=' + material_name + '&id_trans=' +id_trans+'&materialStandard=' +material_standard+'&materialNew='+material_new+'&materialQty='+material_qty,
            success: function(result) {
                $("#material_name").val("");
                $("#material_standard").val("");
                $("#material_new").val("");
                $("#material_qty").val("");
                $.sticky("Data Perubahan Spesifikasi Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tablesmaterial').html(displayTableMaterial(result));
                console.log("we succeeded, man: " + result);
                
            }
        });
    });

});



function displayTableMaterial(data){
            //var jurnal = data;
            var html = "<table id='tablesmaterial' class='table table-bordered table-striped table_vam'><thead><tr><th>Jenis Penambahan/Perubahan</th><th>Harga Standard</th><th>Harga Baru</th><th>Satuan Perubahan</th><th>Total</th><th>Aksi</th></th></thead><tbody>";
            var jumlah = 0;
            var jumlah2 = 0;
            var qty = 0;
            var sub_total = 0;
            for (var index in data) {
               
                for (var material in data[index]) {
                  var material_name = data[index][material]['description_material'];
                  var material_standard = data[index][material]['price_standard'];
                  var material_new = data[index][material]['price_new'];
                  var material_qty = parseInt(data[index][material]['qty']);
                  var id_trans = data[index][material]['booking_id'];
                  var id_bank = data[index][material]['id'];
                  var total = (data[index][material]['price_new']*data[index][material]['qty'])
                  
                  html += "<tr><td>"+material_name+"</td><td>"+formatCurrency(material_standard)+"</td><td>"+formatCurrency(material_new)+"</td><td>"+material_qty+"</td><td>"+formatCurrency(total)+"</td>";
                  html += "<input id='material_name' value='"+material_name+"' type='hidden' class='material_name' />";
                  html += "<input id='material_standard' value='"+material_standard+"' type='hidden' class='material_standard' />";
                  html += "<input id='material_new' value='"+material_new+"' type='hidden' class='material_new' />";
                  html += "<input id='material_qty' value='"+material_qty+"' type='hidden' class='material_qty' />";
                  html += "<input value='"+(material_qty*material_new)+"' type='hidden' class='material_qty' />";

                  html += "<input id='material_id' value='"+id_bank+"' type='hidden' class='material_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                 

                  html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditMaterial' onClick='editMaterial($(this))' class='label ttip_b' title='Edit Perubahan Spesifikasi'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusMaterial' onClick='deleteMaterial($(this))' class='label ttip_b' title='Hapus Perubahan Spesifikasi'>Hapus</a></td>";
                  html += "</tr>";
                  jumlah += parseFloat(material_standard,2);
                  jumlah2 += parseFloat(material_new,2);
                  qty += material_qty;
                 
                  sub_total += total;
                       
            }
           
           // return html;
        }
         html += "<tr><td><b>Jumlah</b></td><td><b>"+ formatCurrency(jumlah)+"</b></td><td><b>"+ formatCurrency(jumlah2)+"</b></td><td><b>"+parseInt(qty)+"</b></td><td><b>"+formatCurrency(sub_total)+"</b></td></tr>";
        html +=  "</tbody></table>";
       
        return html;
}

function editMaterial(data){
    var row = data.parent().parent();
    var material_name = $(row).find('input.material_name').val();
    var material_standard = $(row).find('input.material_standard').val();
    var material_new = $(row).find('input.material_new').val();
    var material_qty = $(row).find('input.material_qty').val();
    var material_id = $(row).find('input.material_id').val();
    var id_trans = $(row).find('input.booking_id').val();
   
   
    var html = '<div class="row-fluid">';
    html += '<label>Perubahan/Penambahan Spesifikasi</label>';
    html += '<input id="material_name2" name="material_name2" type="text" class="span12 required" minlength="3" value="'+material_name+'"/><div class="material_name2"></div>';
    
    html += '<label>Harga Standard</label>';
    html += '<div class="input-prepend input-append input-price">';
    html += '<span class="add-on">Rp.</span><input id="material_standard2" name="material_standard2" type="text" class="currency field-price required" minlength="3" onblur="dlor();" value="'+material_standard+'"/><span class="add-on coma">.00</span>';
   
    html += '<label>Harga Baru</label>';
    html += '<div class="input-prepend input-append input-price">';
    html += '<span class="add-on">Rp.</span><input id="material_new2" name="material_new2" type="text" class="currency field-price required" minlength="3" onblur="dlor();" value="'+material_new+'"/><span class="add-on coma">.00</span>';
    
    html += '<label>Satuan Perubahan</label>';
    html += '<input id="material_qty2" name="material_qty2" type="text" class="span12 required" minlength="3" value="'+material_qty+'"/><div class="material_name2"></div>';
   
    html += '</div></div>';
    
   
    html += '<br/><input type="button" id="saveMaterial" class="btn btn-info" value="Update Spesifikasi">';
    $('.editable_material').html(html);

    $(window).bind('resize',positionPopup);
    positionPopup();
    


    $('#saveMaterial').click(function(){
        var nmaterial_name = $("#material_name2").val();
        var nmaterial_standard = $("#material_standard2").val();
        var nmaterial_new = $("#material_new2").val();
        var nmaterial_qty = $("#material_qty2").val();
        
        
        $('div.material_name2').html("");
        $('div.material_standard2').html("");
        $('div.material_new2').html("");
        $('div.material_qty2').html("");
        $('div.alertsuccess').html("");
        
        if(nmaterial_name == ""){
                    $('div.material_name2').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                    return false;
                } else {
                    if(nmaterial_standard == ""){
                        $('div.material_standard2').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                        return false;
                    }
                }
        //console.log(bank_name);
        //console.log('ajisaputra');
         
        $.ajax({
                    url: baseUrl +'Bookings/addBookingMaterial',
                    data : id_trans,
                    dataType: 'json',
                    // data: 'description=' + ndescription + '&trans_date=' +nshow_date+'&amount=' +namount+'&id_trans='+id_trans+'&account_debet='+account_debet+'&account_credit='+account_credit+'&no_transaction='+no_transaction+'&project_id='+project_id+'&unit_id='+unit_id+'&jurnal_id='+jurnal_id+'&cashflow_id='+cashflow_id,
                    // data: 'materialName=' + material_name + '&id_trans=' +id_trans+'&materialStandard=' +material_standard+'&materialNew='+material_new+'&materialQty='+material_qty,
                    data: 'materialName=' + nmaterial_name + '&materialStandard=' + nmaterial_standard+'&materialNew='+nmaterial_new+'&materialQty='+nmaterial_qty+'&id_trans='+id_trans+'&id_material='+material_id,
                    
                    success: function(result) {
                        $(".close").click();
                        $.sticky("Data Perubahan Spesifikasi Telah Di Update", {autoclose : 5000, position: "top-center", type: "st-success" });
                        $('#tablesmaterial').html(displayTableMaterial(result));
                    }
                });
        
        // $("#overlay_form_ppjb").fadeOut(500);
      });
    //close popup
    $("#close").click(function(){
       $("#overlay_form_ppjb").fadeOut(500);
        $(".close").click();
    });
 }
 
 function deleteMaterial(data){
    $(window).bind('resize',positionPopupDel);
    var row = data.parent().parent();
    //console.log(row);
    var material_name = $(row).find('input.material_name').val();
    var material_id = $(row).find('input.material_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus '+material_name+' pada pemesanan unit ini ?<br/>'
    html += '</div></div></div><br/>';
    html += ' <div class="center"><input type="button" id="deleteMaterial" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    $('.deletable_material').html(html);
    $('#deleteMaterial').click(function(){
        $.ajax({
            url: baseUrl +'Bookings/deleteBookingMaterial',
            data : id_trans,
            dataType: 'json',
            data: 'id_trans='+id_trans+'&id_material='+material_id,
            success: function(result) {
                $(".close").click();
                $.sticky("Data Perubahan / Penambahan Material Telah Dihapus", {autoclose : 5000, position: "top-center", type: "st-success" });
                $('#tablesmaterial').html(displayTableMaterial(result));
                
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
 
   
