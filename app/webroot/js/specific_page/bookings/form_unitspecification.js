/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){              
    $('.unitspecLink').bind('click', function(){
        var type = $(this).parent().attr('id');
        var unit_name = $("#unit_name").val();
        var unit_desc = $("#unit_desc").val();
        var id_trans = $("#id_trans").val();
        $('div.unitname').html("");
        $('div.unitdesc').html("");
        $('div.alertsuccess').html("");
        if(unit_name == ""){
            $('div.unitname').html("<span class='required' style='color:red'>Nama Spesifikasi harus diisi</span>");
            return false;
        } else {
            if(unit_desc == ""){
                $('div.unitdesc').html("<span class='required' style='color:red'>Keterangan Spesifikasi harus diisi</span>");
                return false;
            } 
        }

        $.ajax({
            url: baseUrl +'Bookings/addUnitSpecification',
            dataType: 'json',
            data: 'unitspecName=' + unit_name + '&unitspecDesc=' + unit_desc+'&id_trans='+id_trans,
            // beforeSend: $('input.bank_name').html("<input id='bank_name' name='bank_name' type='text' class='span12 required' />"),
            success: function(result) {
                $("#unit_name").val("");
                $("#unit_desc").val("");
                $.sticky("Data Spec Unit Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tablespecunit').html(displayTableSpecUnit(result));
                console.log("we succeeded, man: " + result);
            }
        });
    });

});

function displayTableSpecUnit(data){
            var unitspec = data;
            var html = "<table id='tablespecunit' class='table table-bordered table-striped table_vam'><thead><tr><th>Nama Spesifikasi</th><th>Keterangan Spesifikasi</th><th>Aksi</th></tr></thead><tbody>";
            for (var index in data) {
                //console.log("User: " + index);
                for (var unitspec in data[index]) {
                  // console.log("\tService: " + unitspec + "; value: " + data[index][unitspec]['id']);
                  var namespec = data[index][unitspec]['name'];
                  var descspec = data[index][unitspec]['description_specification'];
                  var id_trans = data[index][unitspec]['booking_id'];
                  var id_unitspec = data[index][unitspec]['id'];
                  html += "<tr><td class='unit_name'>"+namespec+"</td><td class='unit_desc'>"+descspec+"&nbsp;</td>";
                  html += "<input id='unit_name' value='"+namespec+"' type='hidden' class='unit_name' />";
                  html += "<input id='unit_desc' value='"+descspec+"' type='hidden' class='unit_desc' />";
                  html += "<input id='unitspec_id' value='"+id_unitspec+"' type='hidden' class='unitspec_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                  html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditSpec' onClick='editSpec($(this))' class='label ttip_b' title='Edit Spesifikasi'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusSpec' onClick='deleteSpec($(this))' class='label ttip_b' title='Hapus Spec'>Hapus</a></td>";
                  html += "</tr>";
            }
           
           // return html;
        }
        html +=  "</tbody></table>";
       // html +=    "</div></div></div>";
        return html;
}

 
function editSpec(data){
    
    
    var row = data.parent().parent();
   
    var unit_name = $(row).find('input.unit_name').val();
    var unit_desc = $(row).find('input.unit_desc').val();
    var unitspec_id = $(row).find('input.unitspec_id').val();
    var id_trans = $(row).find('input.booking_id').val();
 
    var html = '<div class="row-fluid"><div class="span12">';
    html += '<label>Nama Spesifikasi</label>';
    html += '<input id="unit_name2" name="unit_name" type="text" class="span12 required" placeholder="Nama Spesifikasi" value="'+unit_name+'"/><div class="unitname2"></div></div>';
    html += '<label>Alamat Bank</label>';
    html += '<input id="unit_desc2" name="unit_desc" type="text" class="span12 required" placeholder="Keterangan Spesifikasi" value="'+unit_desc+'"/><div class="unitdesc2"></div></div>';
    html += '</div></div>';
    html += '<br/>';
     
   
    html += ' <input type="button" id="saveUnit" class="btn btn-info" value="Update Spesifikasi">';
    $('.editable_spec').html(html);
    
     
    $(window).bind('resize',positionPopup);
    positionPopup();
    
    $('#saveUnit').click(function(){
        
        var nunit_name = $("#unit_name2").val();
        var nunit_desc = $("#unit_desc2").val();
        
        $('div.unitname2').html("");
        $('div.unitdesc2').html("");
        
        $('div.alertsuccess').html("");
        
     

        if(nunit_name == ""){
                    $('div.unitname2').html("<span class='required' style='color:red'>Nama Spesifikasi harus diisi</span>");
                    return false;
                } else {
                    if(nunit_desc == ""){
                         $('div.unitdesc2').html("<span class='required' style='color:red'>Keterangan Spesifikasi harus diisi</span>");
                         return false;
                    } 
                }
        
        $.ajax({
                    
                    url: baseUrl +'Bookings/addUnitSpecification',
                    data : id_trans,
                    dataType: 'json',
                    data: 'unitspecName=' + nunit_name + '&unitspecDesc=' + nunit_desc+'&id_trans='+id_trans+'&id_unitspec='+unitspec_id,
            
                    // data: 'unitName=' + nunit_name + '&unitDesc=' + nunit_desc+'&bookunit_id='+bookunit_id+'&unit_id='+unit_id,
                    
                    // beforeSend: $('input.bank_name').html("<input id='bank_name' name='bank_name' type='text' class='span12 required' />"),
                    success: function(result) {
                       
                        $(".close").click();
                        $('#tablespecunit').html(displayTableSpecUnit(result));
                        $.sticky("Data Spesifikasi Berhasil Di-Update", {autoclose : 7000, position: "top-center", type: "st-success" });
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


 function deleteSpec(data){
    var row = data.parent().parent();
    var unit_name = $(row).find('input.unit_name').val();
    var unitspec_id = $(row).find('input.unitspec_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus Spesifikasi Teknis '+unit_name+' pada pemesanan unit ini ?<br/>'
    html += '</div></div></div><br/>';
   
    html += ' <div class="center"><input type="button" id="deleteUnit" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    console.log(unitspec_id);
    $('.deletable_unit').html(html);
    $('#deleteUnit').click(function(){
        $.ajax({
            url: baseUrl +'Bookings/deleteUnitSpecification',
            data : id_trans,
            dataType: 'json',
            data: 'id_trans='+id_trans+'&id_unitspec='+unitspec_id,
            success: function(result) {
                $(".close").click();
                $('#tablespecunit').html(displayTableSpecUnit(result));
                $.sticky("Data Unit Spesifikasi Telah Dihapus", {autoclose : 5000, position: "top-center", type: "st-success" });
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
 
   
   
