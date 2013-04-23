/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){              
    $('.letterLink').bind('click', function(){
        var type = $(this).parent().attr('id');
        var letter_ppjb = $("#letter_ppjb").val();
        var letter_spr = $("#letter_spr").val();
        var letter_spkpr = $("#letter_spkpr").val();
        var letter_spajb = $("#letter_spajb").val();
        var letter_bastr = $("#letter_bastr").val();
        var id_trans = $("#id_trans").val();
        $('div.letterspr').html("");
        $('div.letterspkpr').html("");
        $('div.letterspajb').html("");
        $('div.letter_ppjb').html("");
        $('div.letterbastr').html("");
        $('div.alertsuccess').html("");
        if(letter_ppjb == ""){
            $('div.letterppjb').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
            return false;
        } else {
            if(letter_spr == ""){
                $('div.letterspr').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                return false;
            } 
        }
        $.ajax({
            url: baseUrl +'Bookings/addLeterNumber',
            dataType: 'json',
            data: 'letterPpjb=' + letter_ppjb + '&letterSpr=' + letter_spr+ '&letterSpkpr=' + letter_spkpr+ '&letterSpajb=' + letter_spajb+ '&letterBastr=' + letter_bastr+    '&id_trans='+id_trans,
            // beforeSend: $('input.bank_name').html("<input id='bank_name' name='bank_name' type='text' class='span12 required' />"),
            success: function(result) {
                $("#letter_ppjb").val("");
                $("#letter_spr").val("");
                $("#letter_spkpr").val("");
                $("#letter_spajb").val("");
                $("#letter_bastr").val("");
                
                $.sticky("Data Pengaturan Nomor Surat Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tablesletter').html(displayTableLetter(result));
                console.log("we succeeded, man: " + result);
            }
        });
    });

});

function displayTableLetter(data){
            var letter = data;
            var html = "<table id='tablesletter' class='table table-bordered table-striped table_vam'><thead><tr><th>SPR</th><th>PPJB</th><th>SPKPR</th><th>SPAJB</th><th>BASTR</th><th>Aksi</th></tr></thead><tbody>";
            for (var index in data) {
                //console.log("User: " + index);
                for (var letter in data[index]) {
                  // console.log("\tService: " + unitspec + "; value: " + data[index][unitspec]['id']);
                  var letterppjb = data[index][letter]['ppjb'];
                  var letterspr = data[index][letter]['spr'];
                  var letterspkpr = data[index][letter]['spkpr'];
                  var letterspajb = data[index][letter]['spajb'];
                  var letterbastr = data[index][letter]['bastr'];
                  var id_trans = data[index][letter]['booking_id'];
                  var id_letter = data[index][letter]['id'];
                  html += "<tr><td class='letter_ppjb'>"+letterppjb+"</td><td class='letter_spr'>"+letterspr+"&nbsp;</td><td class='letter_spkpr'>"+letterspkpr+"&nbsp;</td><td class='letter_bastr'>"+letterbastr+"&nbsp;</td><td class='letter_spajb'>"+letterspajb+"&nbsp;</td>";
                  html += "<input id='letter_ppjb' value='"+letterppjb+"' type='hidden' class='letter_ppjb' />";
                  html += "<input id='letter_spr' value='"+letterspr+"' type='hidden' class='letter_spr' />";
                  html += "<input id='letter_spkpr' value='"+letterspkpr+"' type='hidden' class='letter_spkpr' />";
                  html += "<input id='letter_spajb' value='"+letterspajb+"' type='hidden' class='letter_spajb' />";
                  html += "<input id='letter_bastr' value='"+letterbastr+"' type='hidden' class='letter_bastr' />";
                  
                  html += "<input id='letter_id' value='"+id_letter+"' type='hidden' class='letter_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                  html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditLetter' onClick='editLetter($(this))' class='label ttip_b' title='Edit Pengaturan Surat'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusLetter' onClick='deleteLetter($(this))' class='label ttip_b' title='Hapus Pengaturan Surat'>Hapus</a></td>";
                  html += "</tr>";
            }
           
           // return html;
        }
        html +=  "</tbody></table>";
       // html +=    "</div></div></div>";
        return html;
}

 
function editLetter(data){
    var row = data.parent().parent();
    var letter_ppjb = $(row).find('input.letter_ppjb').val();
    var letter_spr = $(row).find('input.letter_spr').val();
    var letter_spkpr = $(row).find('input.letter_spkpr').val();
    var letter_spajb = $(row).find('input.letter_spajb').val();
    var letter_bastr = $(row).find('input.letter_bastr').val();
    var letter_id = $(row).find('input.letter_id').val();
    var id_trans = $(row).find('input.booking_id').val();
 
    var html = '<div class="row-fluid"><div class="span12">';
    html += '<label>PPJB</label>';
    html += '<input id="letter_ppjb2" name="letter_ppjb2" type="text" class="span12 required" placeholder="PPJB" value="'+letter_ppjb+'"/><div class="letterppjb2"></div></div>';
    html += '<label>SPR</label>';
    html += '<input id="letter_spr2" name="letter_spr2" type="text" class="span12 required" placeholder="SPR" value="'+letter_spr+'"/><div class="letterspr2"></div></div>';
    html += '<label>SPKPR</label>';
    html += '<input id="letter_spkpr2" name="letter_spkpr2" type="text" class="span12 required" placeholder="SPKPR" value="'+letter_spkpr+'"/><div class="letterspkpr2"></div></div>';
    html += '<label>SPAJB</label>';
    html += '<input id="letter_spajb2" name="letter_spajb2" type="text" class="span12 required" placeholder="SPAJB" value="'+letter_spajb+'"/><div class="letterspajb2"></div></div>';
    html += '<label>BASTR</label>';
    html += '<input id="letter_bastr2" name="letter_bastr2" type="text" class="span12 required" placeholder="SPAJB" value="'+letter_bastr+'"/><div class="letterbastr2"></div></div>';
    html += '</div></div>';
    html += '<br/>';
     
   
    html += ' <input type="button" id="saveLetter" class="btn btn-info" value="Update Pengaturan Surat">';
    $('.editable_letter').html(html);
    
     
    $(window).bind('resize',positionPopup);
    positionPopup();
    
    $('#saveLetter').click(function(){
        
        var nletter_ppjb = $("#letter_ppjb2").val();
        var nletter_spr = $("#letter_spr2").val();
        var nletter_spkpr = $("#letter_spkpr2").val();
        var nletter_spajb = $("#letter_spajb2").val();
        var nletter_bastr = $("#letter_bastr2").val();
        
        $('div.letterppjb2').html("");
        $('div.letterspr2').html("");
        $('div.letterspkpr2').html("");
        $('div.letterspajb2').html("");
        $('div.letterbastr2').html("");
        $('div.alertsuccess').html("");
        
        if(nletter_ppjb == ""){
                    $('div.letterppjb2').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                    return false;
                } else {
                    if(nletter_spr == ""){
                         $('div.letterspr2').html("<span class='required' style='color:red'>Field harus diisi</span>");
                         return false;
                    } 
                }
        
        $.ajax({
                    
                    url: baseUrl +'Bookings/addLeterNumber',
                    data : id_trans,
                    dataType: 'json',
                    data: 'letterPpjb=' + nletter_ppjb + '&letterSpr=' + nletter_spr+ '&letterSpkpr=' + nletter_spkpr+ '&letterSpajb=' + nletter_spajb+ '&letterBastr=' + nletter_bastr+    '&id_trans='+id_trans+'&id_letter='+letter_id,
           
                    success: function(result) {
                        $(".close").click();
                        $('#tablesletter').html(displayTableLetter(result));
                        $.sticky("Data Pengaturan Surat Di-Update", {autoclose : 7000, position: "top-center", type: "st-success" });
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


 function deleteLetter(data){
    var row = data.parent().parent();
    var ppjb = $(row).find('input.letter_ppjb').val();
    var letter_id = $(row).find('input.letter_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus Pengaturan Surat '+ppjb+' pada pemesanan unit ini ?<br/>'
    html += '</div></div></div><br/>';
   
    html += ' <div class="center"><input type="button" id="deleteLetter" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    // console.log(unitspec_id);
    $('.deletable_letter').html(html);
    $('#deleteLetter').click(function(){
        $.ajax({
            url: baseUrl +'Bookings/deleteLetterNumber',
            data : id_trans,
            dataType: 'json',
            data: 'id_trans='+id_trans+'&id_letter='+letter_id,
            success: function(result) {
                $(".close").click();
                $('#tablesletter').html(displayTableLetter(result));
                $.sticky("Data Pengaturan Surat Telah Dihapus", {autoclose : 5000, position: "top-center", type: "st-success" });
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
 
   
   
