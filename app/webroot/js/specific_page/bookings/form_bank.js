/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){              
    $('.sortingLink').bind('click', function(){
        var type = $(this).parent().attr('id');
        var bank_name = $("#bank_name").val();
        var bank_add = $("#bank_address").val();
        var bank_town = $("#bank_town").val();
        var status = $("#status").val();
        var id_trans = $("#id_trans").val();
        $('div.bankname').html("");
        $('div.bankadd').html("");
        $('div.banktown').html("");
        $('div.alertsuccess').html("");
        if(bank_name == ""){
            $('div.bankname').html("<span class='required' style='color:red'>Nama Bank harus diisi</span>");
            return false;
        } else {
            if(bank_add == ""){
                $('div.bankadd').html("<span class='required' style='color:red'>Alamat Bank harus diisi</span>");
                return false;
            } else {
                if(bank_town == ""){
                    $('div.banktown').html("<span class='required' style='color:red'>Kota harus diisi</span>");
                    return false;
                }
            }
        }

        $.ajax({
            url: baseUrl +'Bookings/addBank',
            dataType: 'json',
            data: 'bankName=' + bank_name + '&bankAdd=' + bank_add+'&bankTown='+bank_town+'&status='+status+'&id_trans='+id_trans,
            // beforeSend: $('input.bank_name').html("<input id='bank_name' name='bank_name' type='text' class='span12 required' />"),
            success: function(result) {
                $("#bank_name").val("");
                $("#bank_address").val("");
                $("#bank_town").val("");
                $.sticky("Data Bank Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tablebank').html(displayTableBank(result));
                console.log("we succeeded, man: " + result);
            }
        });
    });

});



function displayTableBank(data){
          
            var bank = data;
            var html = "<table id='tablebank' class='table table-bordered table-striped table_vam'><thead><tr><th>Nama</th><th>Alamat</th><th>Kota</th><th>Status Pengajuan</th><th>Aksi</th></th></thead><tbody>";
            for (var index in data) {
                //console.log("User: " + index);
                for (var bank in data[index]) {
                  //console.log("\tService: " + bank + "; value: " + data[index][bank]['id']);
                  var namabank = data[index][bank]['bank_name'];
                  var alamatbank = data[index][bank]['bank_address'];
                  var kotabank = data[index][bank]['bank_town'];
                  var status = data[index][bank]['status'];
                  var id_trans = data[index][bank]['booking_id'];
                  var id_bank = data[index][bank]['id'];
                  if(status == 1){
                      var approval = "Approve";
                  } else {
                      if(status == 2){
                          var approval = "Rejected";
                      } else {
                          var approval = "Pending"
                      }
                  }
                  
                  
                  var stat = "second";
                  html += "<tr><td class='bank_name'>"+namabank+"</td><td class='bank_add'>"+alamatbank+"&nbsp;</td><td class='bank_town'>"+kotabank+"&nbsp;</td><td class='status'>"+approval+"</td>";
                  html += "<input id='bank_name' value='"+namabank+"' type='hidden' class='bank_name' />";
                  html += "<input id='bank_add' value='"+alamatbank+"' type='hidden' class='bank_add' />";
                  html += "<input id='bank_town' value='"+kotabank+"' type='hidden' class='bank_town' />";
                  html += "<input id='status' value='"+status+"' type='hidden' class='bank_status' />";
                  
                  html += "<input id='bank_id' value='"+id_bank+"' type='hidden' class='bank_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                                                
                  html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditBank' onClick='editBank($(this))' class='label ttip_b' title='Edit Bank'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusBank' onClick='deleteBank($(this))' class='label ttip_b' title='Hapus Bank'>Hapus</a></td>";
                  html += "</tr>";
            }
           
           // return html;
        }
        html +=  "</tbody></table>";
       // html +=    "</div></div></div>";
        return html;
}

function editBank(data){
    
    
    $("#overlay_form_bank").fadeIn(1000);
    var row = data.parent().parent();
    
    var bank_name = $(row).find('input.bank_name').val();
    var bank_add = $(row).find('input.bank_add').val();
    var bank_town = $(row).find('input.bank_town').val();
    var bank_status = $(row).find('input.bank_status').val();
    var bank_id = $(row).find('input.bank_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var app = "";
    var rej = "";
    var pen = "";
   
    if(bank_status == 1){
        app = 'selected="selected"';
    } else {
        if(bank_status == 2){
            rej = 'selected="selected"'
        } else {
            pen = 'selected="selected"';
        }
    }
    var html = '<div class="row-fluid"><div class="span12">';
    html += '<label>Nama Bank</label>';
    html += '<input id="bank_name2" name="bank_name" type="text" class="span12 required" placeholder="Nama Bank" value="'+bank_name+'"/><div class="bankname2"></div></div>';
    html += '<label>Alamat Bank</label>';
    html += '<input id="bank_address2" name="bank_address" type="text" class="span12 required" placeholder="Alamat Bank" value="'+bank_add+'"/><div class="bankadd2"></div></div>';
    html += '<label>Kota</label>';
    html += '<input id="bank_town2" name="bank_town" type="text" class="required" placeholder="Kota"  value="'+bank_town+'"/><div class="banktown2"></div></div>';
    html += '<label>Status</label>';
    html += '<select id="status2" name="status2"><option value="1" '+app+'>Approved</option><option value="2" '+rej+'>Rejected</option><option value="3" '+pen+'>Pending</option></select><div class="status_approve2"></div></div>';
    html += '</div></div>';
   html += '<br/>';
     
   
    html += ' <input type="button" id="saveBank" class="btn btn-info" value="Update Bank">';
    $('.editable_bank').html(html);
    
     
    $(window).bind('resize',positionPopup);
    positionPopup();
    
    $('#saveBank').click(function(){
        
        var nbank_name = $("#bank_name2").val();
        var nbank_add = $("#bank_address2").val();
        var nbank_town = $("#bank_town2").val();
        var nstatus = $("#status2").val();
       
        $('div.bankname2').html("");
        $('div.bankadd2').html("");
        $('div.banktown2').html("");
        $('div.status_approve2').html("");
        
        $('div.alertsuccess').html("");
        
        if(nbank_name == ""){
                    $('div.bankname2').html("<span class='required' style='color:red'>Nama Bank harus diisi</span>");
                    return false;
                } else {
                    if(nbank_add == ""){
                        $('div.bankadd2').html("<span class='required' style='color:red'>Alamat Bank harus diisi</span>");
                        return false;
                    } else {
                        if(nbank_town == ""){
                            $('div.banktown2').html("<span class='required' style='color:red'>Kota harus diisi</span>");
                            return false;
                        }
                    }
                }
                
        console.log(bank_name);
        
        $.ajax({
                    
                    url: baseUrl +'Bookings/addBank',
                    data : id_trans,
                    dataType: 'json',
                    data: 'bankName=' + nbank_name + '&bankAdd=' + nbank_add+'&bankTown='+nbank_town+'&status='+nstatus+'&id_trans='+id_trans+'&id_bank='+bank_id,
                    
                    // beforeSend: $('input.bank_name').html("<input id='bank_name' name='bank_name' type='text' class='span12 required' />"),
                    success: function(result) {
                       
                        $(".close").click();
                        $('#tablebank').html(displayTableBank(result));
                        $.sticky("Data Bank Berhasil Di-Update", {autoclose : 7000, position: "top-center", type: "st-success" });
                        console.log("we succeeded, man: " + result);
                    }
                });
        
        
        $("#overlay_form_bank").fadeOut(500);
      });
    //close popup
    $("#close").click(function(){
       $("#overlay_form_bank").fadeOut(500);
       $(".close").click();
        // <button class="close" data-dismiss="modal">×</button>
    });
 }
 
 function deleteBank(data){
    $("#overlay_form_del").fadeIn(1000);
    positionPopupDel();
    $(window).bind('resize',positionPopupDel);
    var row = data.parent().parent();
    console.log(row);
    var bank_name = $(row).find('input.bank_name').val();

    var bank_id = $(row).find('input.bank_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus Bank '+bank_name+' pada pemesanan unit ini?<br/>'
    html += '</div></div></div><br/>';
   
    html += ' <div class="center"><input type="button" id="deleteBank" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    $('.deletable_bank').html(html);
    $('#deleteBank').click(function(){
        $.ajax({
            url: baseUrl +'Bookings/deleteBank',
            data : id_trans,
            dataType: 'json',
            data: 'id_trans='+id_trans+'&id_bank='+bank_id,
            success: function(result) {
                $(".close").click();
                $('#tablebank').html(displayTableBank(result));
                $.sticky("Data Bank Telah Dihapus", {autoclose : 5000, position: "top-center", type: "st-success" });
                console.log("we succeeded, man: " + result);
            }
        });
        $("#overlay_form_del").fadeOut(500);
    }); 
    
    $("#close_del").click(function(){
       $("#overlay_form_del").fadeOut(500);
              $(".close").click();
    });
  
 }
 
 
   
   
