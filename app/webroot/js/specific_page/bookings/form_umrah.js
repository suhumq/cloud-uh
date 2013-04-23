/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

  function dlor(){
   $('#umrah_amount2').formatCurrency();
   $('#umrah_kurs2').formatCurrency();                                 
  }

$(document).ready(function(){              
    $('.umrahLink').bind('click', function(){
        var type = $(this).parent().attr('id');
        var umrah_tipekurs = $("#umrah_tipekurs").val();
        var umrah_amount = $("#umrah_amount").val();
        var umrah_kurs = $("#umrah_kurs").val();
        var umrah_cashflow = $("#umrah_cashflow").val();
        var umrah_descpayment = $("#umrah_descpayment").val();
         var umrah_typetrans = $("#umrah_typetrans").val();

        
        var id_trans = $("#id_trans").val();
        $('div.umrahamount').html("");
        if(umrah_amount == ""){
            $('div.umrahamount').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
            return false;
        } else {
            if(umrah_descpayment == ""){
                $('div.umrahdescpayment').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                return false;
            }
        }

        $.ajax({
            url: baseUrl +'Bookings/addJurnal',
            dataType: 'json',
            data: 'umrahTipekurs=' + umrah_tipekurs + '&umrahAmount=' + umrah_amount+'&umrahKurs='+umrah_kurs+'&umrahCashflow='+umrah_cashflow+'&umrahDescpayment='+umrah_descpayment+'&umrahTypetrans='+umrah_typetrans+'&id_trans='+id_trans,
            success: function(result) {
                $("#umrah_amount").val("");
                $("#umrah_kurs").val("");
                $("#umrah_descpayment").val("");
                $.sticky("Data Berhasil Ditambahkan", {autoclose : 5000, position: "top-center" , type: "st-success"});
                $('#tableumrah').html(displayTableUmrah(result));
                console.log("we succeeded, man: " + result);
            }
        });
    });

});



function displayTableUmrah(data){
            var jurnal = data;
            console.log(jurnal);
            var html = "<table id='tableumrah' class='table table-bordered table-striped table_vam'><thead><tr><th>Tipe Kurs</th><th>Kurs</th><th>Amount</th><th>Cashflow</th><th>Keterangan</th><th>Aksi</th></th></thead><tbody>";
            var price_brosure = $("#price_brosure").val();
            var jumlah = 0;
            var jumlah2 = 0;
            var todollar = 0;
            for (var index in data) {
                for (var jurnal in data[index]) {
                  var tipekurs = data[index][jurnal]['type_currency'];
                  var kurs = data[index][jurnal]['kurs'];
                  var amount = data[index][jurnal]['amount'];
                  var cashflow = data[index][jurnal]['cashflow_id'];
                  var keterangan = data[index][jurnal]['desc_payment'];
                  var id_trans = data[index][jurnal]['booking_id'];
                  var id_jurnal = data[index][jurnal]['id'];
                  if(tipekurs == 1){
                      var currency = "Rp";
                  } else {
                      var currency = "$";
                  }

                  if(cashflow == 1){
                      var cashflow_name = "Kas";
                  }else {
                      var cashflow_name = "Bank";
                  }
                  
                  html += "<tr><td class='umrah_tipekurs'>"+currency+"</td><td class='umrah_kurs'>"+formatCurrency(kurs)+"&nbsp;</td><td class='umrah_amount'>"+formatCurrency(amount)+"&nbsp;</td><td class='umrah_cashflow'>"+cashflow_name+"&nbsp;</td><td class='umrah_descpayment'>"+keterangan+"&nbsp;</td>  ";
                  html += "<input id='umrah_tipekurs' value='"+tipekurs+"' type='hidden' class='umrah_tipekurs' />";
                  html += "<input id='umrah_kurs' value='"+kurs+"' type='hidden' class='umrah_kurs' />";
                  html += "<input id='umrah_amount' value='"+amount+"' type='hidden' class='umrah_amount' />";
                  html += "<input id='umrah_cashflow' value='"+cashflow+"' type='hidden' class='umrah_cashflow' />";
                  html += "<input id='umrah_descpayment' value='"+keterangan+"' type='hidden' class='umrah_descpayment' />";
                  html += "<input id='jurnal_id' value='"+id_jurnal+"' type='hidden' class='jurnal_id' />";
                  html += "<input id='booking_id' value='"+id_trans+"' type='hidden' class='booking_id' />";
                  html += "<td><a data-toggle='modal' data-backdrop='static' href='#EditUmrah' onClick='editUmrah($(this))' class='label ttip_b' title='Edit Pembayaran'>Edit</a> <a data-toggle='modal' data-backdrop='static' href='#HapusUmrah' onClick='deleteUmrah($(this))' class='label ttip_b' title='Hapus Pembayaran'>Hapus</a></td>";
                  html += "</tr>";

                  if(tipekurs == 1){
                      jumlah += parseFloat(amount,2);
                      todollar += (parseFloat(amount,2) / parseFloat(kurs,2));
                  } else {
                      jumlah2 += parseFloat(amount,2);
                  }
                  
            }
           
           // return html;
           console.log(price_brosure);
        }
        html += "<tr><td colspan='2'>Jumlah Pembayaran</td><td colspan='4'>Rp. "+ formatCurrency(jumlah)+ " ($."+todollar.toFixed(2)+") <br/> $.  "+ formatCurrency(jumlah2) +"</td></tr>";
        html += "<tr><td colspan='2'>Sisa Pembayaran</td><td colspan='4'>$. "+(parseFloat(price_brosure,2) - (todollar + jumlah2)).toFixed(2)+"</td></tr>"
        html +=  "</tbody></table>";
       // html +=    "</div></div></div>";
        return html;
}

function editUmrah(data){
    $("#overlay_form_bank").fadeIn(1000);
    var row = data.parent().parent();
    
    var umrah_tipekurs = $(row).find('input.umrah_tipekurs').val();
    var umrah_kurs = $(row).find('input.umrah_kurs').val();
    var umrah_amount = $(row).find('input.umrah_amount').val();
    var umrah_cashflow = $(row).find('input.umrah_cashflow').val();
    var umrah_descpayment = $(row).find('input.umrah_descpayment').val();
    var umrah_typetrans = '1';
    var jurnal_id = $(row).find('input.jurnal_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var app = "";
    var rej = "";
    var pen = "";
    var app1 = "";
    var pen1 = "";
    if(umrah_tipekurs == 1){
        app = 'selected="selected"';
    } else
    {
        pen = 'selected="selected"';
    }

    if(umrah_cashflow == 1){
        app1 = 'selected="selected"';
    } else
    {
        pen1 = 'selected="selected"';
    }
     

    var html = '<div class="row-fluid"><div class="span12">';
    html += '<select id="umrah_cashflow2" name="umrah_cashflow2"><option value="1" '+app1+'>Kas</option><option value="2" '+pen1+'>Bank</option></select><div class="umrahcashflow2"></div></div>';
    html += '<select id="umrah_tipekurs2" name="umrah_tipekurs2"><option value="1" '+app+'>Rp</option><option value="2" '+pen+'>$</option></select><div class="umrahtipekurs2"></div></div>';
    html += '<br/>'
    html += '<div class="input-prepend input-append input-price">';
    html += '<span class="add-on">-</span><input id="umrah_amount2" name="umrah_amount2" type="text" class="currency field-price required" minlength="3" onblur="dlor();" value="'+umrah_amount+'"/> <span class="add-on">Rp.</span><input id="umrah_kurs2" name="umrah_kurs2" type="text" class="currency field-price required" minlength="3" onblur="dlor();" value="'+umrah_kurs+'"/><span class="add-on coma">.00</span>';
    html += '<br/><br/>'
    html += '<input id="umrah_descpayment2" name="umrah_descpayment2" type="text" class="span5 required" placeholder="Keterangan Pembayaran" value="'+umrah_descpayment+'"/><div class="umrahdescpayment2"></div></div>';
    html += '</div></div>';
    html += '<br/>';
     
   
    html += ' <input type="button" id="saveJurnal" class="btn btn-info" value="Update Pembayaran">';
    $('.editable_umrah').html(html);
    
     
    $('#saveJurnal').click(function(){
        
        var numrah_cashflow = $("#umrah_cashflow2").val();
        var numrah_tipekurs = $("#umrah_tipekurs2").val();
        var numrah_amount = $("#umrah_amount2").val();
        var numrah_kurs = $("#umrah_kurs2").val();
        var numrah_descpayment = $("#umrah_descpayment2").val();
         
       
        $('div.umrahcashflow2').html("");
        $('div.umrahtipekurs2').html("");
        $('div.umrahamount2').html("");
        $('div.umrahkurs2').html("");
        $('div.umrahdescpayment2').html("");
        
        if(numrah_amount == ""){
                    $('div.umrahamount2').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                    return false;
                } else {
                    if(numrah_kurs == ""){
                        $('div.umrahkurs2').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                        return false;
                    } else {
                        if(numrah_descpayment == ""){
                            $('div.umrahdescpayment2').html("<span class='required' style='color:red'>Field ini harus diisi</span>");
                            return false;
                        }
                    }
                }
                
        
        $.ajax({
                    url: baseUrl +'Bookings/addJurnal',
                    data : id_trans,
                    dataType: 'json',
                    data: 'umrahTipekurs=' + numrah_tipekurs + '&umrahAmount=' + numrah_amount+'&umrahKurs='+numrah_kurs+'&umrahCashflow='+numrah_cashflow+'&umrahDescpayment='+numrah_descpayment+'&umrahTypetrans='+umrah_typetrans+'&id_trans='+id_trans+'&id_jurnal='+jurnal_id,
                    success: function(result) {
                        $(".close").click();
                        $('#tableumrah').html(displayTableUmrah(result));
                        $.sticky("Data Pembayaran Berhasil Di-Update", {autoclose : 7000, position: "top-center", type: "st-success" });
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
 
 function deleteUmrah(data){
    var row = data.parent().parent();
    var description_name = $(row).find('input.umrah_descpayment').val();
    var jurnal_id = $(row).find('input.jurnal_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var html = '<div class="formSep"><div class="row-fluid"> <div class="span2">';
    html = 'Apa Anda yakin akan menghapus Pembayaran '+description_name+' ?<br/>'
    html += '</div></div></div><br/>';
   
    html += ' <div class="center"><input type="button" id="deleteJurnal" class="btn btn-danger" value="Ya">&nbsp;&nbsp;<input type="button" id="close_del" class="btn btn-info" value="Tidak"></div>';
    $('.deletable_umrah').html(html);

    $('#deleteJurnal').click(function(){
        $.ajax({
            url: baseUrl +'Bookings/deleteJurnal',
            data : id_trans,
            dataType: 'json',
            data: 'id_trans='+id_trans+'&id_jurnal='+jurnal_id,
            success: function(result) {
                $(".close").click();
                 $('#tableumrah').html(displayTableUmrah(result));
                $.sticky("Data Pembayaran Telah Dihapus", {autoclose : 5000, position: "top-center", type: "st-success" });
                console.log("we succeeded, man: " + result);
            }
        }); 
    }); 
    
    $("#close_del").click(function(){
       $("#overlay_form_del").fadeOut(500);
              $(".close").click();
    });
  
 }
 
 
   
   
