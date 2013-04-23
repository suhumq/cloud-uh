/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){              
    $('.minorLink').bind('click', function(){
        var type = $(this).parent().attr('id');
        var minor_name = $("#minor_name").val();
        var minor_desc = $("#minor_desc").val();
        var id_trans = $("#id_trans").val();
        $('div.minorname').html("");
        $('div.minordesc').html("");
        $('div.alertsuccess').html("");
        if(unit_name == ""){
            $('div.minorname').html("<span class='required' style='color:red'>Nama Perbaikan Minor harus diisi</span>");
            return false;
        } else {
            if(unit_desc == ""){
                $('div.minordesc').html("<span class='required' style='color:red'>Jenis Perbaikan Minor harus diisi</span>");
                return false;
            } 
        }
        $.ajax({
            url: baseUrl +'Bookings/addMinorAdditon',
            dataType: 'json',
            data: 'minorName=' + minor_name + '&minorDesc=' + minor_desc+'&id_trans='+id_trans,
            // beforeSend: $('input.bank_name').html("<input id='bank_name' name='bank_name' type='text' class='span12 required' />"),
            success: function(result) {
                $("#minor_name").val("");
                $("#minor_desc").val("");
                $.sticky("Data Perbaikan Minor Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tablesminor').html(displayTableMinor(result));
                console.log("we succeeded, man: " + result);
            }
        });
    });

});

function displayTableMinor(data){
            var minor = data;
            var html = "<table id='tablesminor' class='table table-bordered table-striped table_vam'><thead><tr><th>Nama Perbaikan Minor</th><th>Jenis Perbaikan Minor</th><th>Aksi</th></tr></thead><tbody>";
            for (var index in data) {
                //console.log("User: " + index);
                for (var minor in data[index]) {
                  // console.log("\tService: " + unitspec + "; value: " + data[index][unitspec]['id']);
                  var minorname = data[index][minor]['minor_name'];
                  var minordesc = data[index][minor]['minor_description'];
                  var id_trans = data[index][minor]['booking_id'];
                  var id_minor = data[index][minor]['id'];
                  html += "<tr><td class='minor_name'>"+minorname+"</td><td class='minor_desc'>"+minordesc+"&nbsp;</td>";
                  html += "<input id='minor_name' value='"+minorname+"' type='hidden' class='minor_name' />";
                  html += "<input id='minor_desc' value='"+minordesc+"' type='hidden' class='minor_desc' />";
                  html += "<input id='minor_id' value='"+id_minor+"' type='hidden' class='minor_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                  html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditMinor' onClick='editMinor($(this))' class='label ttip_b' title='Edit Perbaikan Minor'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusMinor' onClick='deleteMinor($(this))' class='label ttip_b' title='Hapus Perbaikan Minor'>Hapus</a></td>";
                  html += "</tr>";
            }
           
           // return html;
        }
        html +=  "</tbody></table>";
       // html +=    "</div></div></div>";
        return html;
}

 
function editMinor(data){
    
    
    var row = data.parent().parent();
   
    var minor_name = $(row).find('input.minor_name').val();
    var minor_desc = $(row).find('input.minor_desc').val();
    var minor_id = $(row).find('input.minor_id').val();
    var id_trans = $(row).find('input.booking_id').val();
 
    var html = '<div class="row-fluid"><div class="span12">';
    html += '<label>Nama Perbaikan Minor</label>';
    html += '<input id="minor_name2" name="minor_name2" type="text" class="span12 required" placeholder="Nama Perbaikan Minor" value="'+minor_name+'"/><div class="minorname2"></div></div>';
    html += '<label>Jenis Perbaikan Minor</label>';
    html += '<input id="minor_desc2" name="minor_desc2" type="text" class="span12 required" placeholder="Jenis Perbaikan Minor" value="'+minor_desc+'"/><div class="minordesc2"></div></div>';
    html += '</div></div>';
    html += '<br/>';
     
   
    html += ' <input type="button" id="saveMinor" class="btn btn-info" value="Update Perbaikan Minor">';
    $('.editable_minor').html(html);
    
     
    $(window).bind('resize',positionPopup);
    positionPopup();
    
    $('#saveMinor').click(function(){
        
        var nminor_name = $("#minor_name2").val();
        var nminor_desc = $("#minor_desc2").val();
        
        $('div.minorname2').html("");
        $('div.minordesc2').html("");
        
        $('div.alertsuccess').html("");
        
     

        if(nminor_name == ""){
                    $('div.minorname2').html("<span class='required' style='color:red'>Nama Perbaikan Minor harus diisi</span>");
                    return false;
                } else {
                    if(nminor_desc == ""){
                         $('div.minordesc2').html("<span class='required' style='color:red'>Jenis Perbaikan Minor harus diisi</span>");
                         return false;
                    } 
                }
        
        $.ajax({
                    
                    url: baseUrl +'Bookings/addMinorAdditon',
                    data : id_trans,
                    dataType: 'json',
                    data: 'minorName=' + nminor_name + '&minorDesc=' + nminor_desc+'&id_trans='+id_trans+'&id_minor='+minor_id,
                    success: function(result) {
                        $(".close").click();
                        $('#tablesminor').html(displayTableMinor(result));
                        $.sticky("Data Perbaikan Minor Berhasil Di-Update", {autoclose : 7000, position: "top-center", type: "st-success" });
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


 function deleteMinor(data){
    var row = data.parent().parent();
    var minor_name = $(row).find('input.minor_name').val();
    var minor_id = $(row).find('input.minor_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus Perbaikan Minor '+minor_name+' pada pemesanan unit ini ?<br/>'
    html += '</div></div></div><br/>';
   
    html += ' <div class="center"><input type="button" id="deleteMinor" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    // console.log(unitspec_id);
    $('.deletable_minor').html(html);
    $('#deleteMinor').click(function(){
        $.ajax({
            url: baseUrl +'Bookings/deleteMinorAddition',
            data : id_trans,
            dataType: 'json',
            data: 'id_trans='+id_trans+'&id_minor='+minor_id,
            success: function(result) {
                $(".close").click();
                $('#tablesminor').html(displayTableMinor(result));
                $.sticky("Data Perbaikan Minor Telah Dihapus", {autoclose : 5000, position: "top-center", type: "st-success" });
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
 
   
   
