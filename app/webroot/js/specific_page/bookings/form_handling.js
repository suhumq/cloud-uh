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
        var umrah_datetrans = $("#umrah_datetrans").val();
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
            url: baseUrl +'Bookings/addJurnalHandling',
            dataType: 'json',
            data: 'umrahTipekurs=' + umrah_tipekurs + '&umrahAmount=' + umrah_amount+'&umrahKurs='+umrah_kurs+'&umrahCashflow='+umrah_cashflow+'&umrahDescpayment='+umrah_descpayment+'&umrahTypetrans='+umrah_typetrans+'&umrahDatetrans='+umrah_datetrans+ '&id_trans='+id_trans,
            success: function(result) {
                $("#umrah_amount").val("");
                $("#umrah_datetrans").val("");
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
            var html = "<table id='tableumrah' class='table table-bordered table-striped table_vam'><thead><tr><th>Tanggals</th><th>Tipe Kurs</th><th>Kurs</th><th>Amount</th><th>Cashflow</th><th>Keterangan</th><th>Aksi</th></th></thead><tbody>";
            var price_brosure = $("#price_brosure").val();
            var jumlah = 0;
            var jumlah2 = 0;
            var todollar = 0;
            for (var index in data) {
                for (var jurnal in data[index]) {
                  var datetrans = data[index][jurnal]['date_trans'];
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
                  }
                  if(cashflow == 2)
                  {
                      var cashflow_name = "BMRI-USD-622";
                  }
                  if(cashflow == 6)
                  {
                      var cashflow_name = "BMRI-GIRO-758";
                  }
                  if(cashflow == 7)
                  {
                      var cashflow_name = "BMRI-ATM-921";
                  }
                  if(cashflow == 8)
                  {
                      var cashflow_name = "BNI-USD-259";
                  }
                  if(cashflow == 9)
                  {
                      var cashflow_name = "BNI-GIRO-417";
                  }
                  if(cashflow == 10)
                  {
                      var cashflow_name = "BNI-TAPLUS-233";
                  }
                  if(cashflow == 11)
                  {
                      var cashflow_name = "BSM-USD-415";
                  }
                  if(cashflow == 12)
                  {
                      var cashflow_name = "BSM-GIRO-993";
                  }
                  if(cashflow == 13)
                  {
                      var cashflow_name = "BSM-USD-005";
                  }
                  if(cashflow == 14)
                  {
                      var cashflow_name = "BSM-GIRO-988";
                  }
                  if(cashflow == 15)
                  {
                      var cashflow_name = "BCA-GIRO-997";
                  }
                  if(cashflow == 16)
                  {
                      var cashflow_name = "BUKOPIN-USD-099";
                  }
                  if(cashflow == 17)
                  {
                      var cashflow_name = "BUKOPIN-GIRO-095";
                  }
                  if(cashflow == 18)
                  {
                      var cashflow_name = "Deposito";
                  }
                  if(cashflow == 19)
                  {
                      var cashflow_name = "Kasbon";
                  }
                  if(cashflow == 20)
                  {
                      var cashflow_name = "MUAMALAT-USD-563";
                  }
                  if(cashflow == 21)
                  {
                      var cashflow_name = "MUAMALAT-IDR-224";
                  }

                  html += "<tr><td class='umrah_datetrans'>"+datetrans+"</td><td class='umrah_tipekurs'>"+currency+"</td><td class='umrah_kurs'>"+formatCurrency(kurs)+"&nbsp;</td><td class='umrah_amount'>"+formatCurrency(amount)+"&nbsp;</td><td class='umrah_cashflow'>"+cashflow_name+"&nbsp;</td><td class='umrah_descpayment'>"+keterangan+"&nbsp;</td>  ";
                  html += "<input id='umrah_datetrans' value='"+datetrans+"' type='hidden' class='umrah_datetrans' />";
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
                      if(parseFloat(kurs,2)!=0){
                             todollar += (parseFloat(amount,2) / parseFloat(kurs,2));

                         }

                  } else {
                      jumlah2 += parseFloat(amount,2);
                  }

            }

           // return html;
           console.log(price_brosure);
        }
        html += "<tr><td colspan='3'>Jumlah Pembayaran</td><td colspan='5'>"+ formatCurrency(jumlah)+ " ($."+todollar.toFixed(2)+") <br/> $.  "+ (jumlah2) +"</td></tr>";
        html +=  "</tbody></table>";
       // html +=    "</div></div></div>";
        return html;
}

function editUmrah(data){
    $("#overlay_form_bank").fadeIn(1000);
    var row = data.parent().parent();
    var umrah_datetrans = $(row).find('input.umrah_datetrans').val();
    var umrah_tipekurs = $(row).find('input.umrah_tipekurs').val();
    var umrah_kurs = $(row).find('input.umrah_kurs').val();
    var umrah_amount = $(row).find('input.umrah_amount').val();
    var umrah_cashflow = $(row).find('input.umrah_cashflow').val();
    var umrah_descpayment = $(row).find('input.umrah_descpayment').val();
    var umrah_typetrans = '4';
    var jurnal_id = $(row).find('input.jurnal_id').val();
    var id_trans = $(row).find('input.booking_id').val();
    var app = "";
    var rej = "";
    var pen = "";
    var app1 = "";
    var pen2 = "";
    var pen3 = "";
    var pen4 = "";
    var pen5 = "";
    var pen6 = "";
    var pen7 = "";
    var pen8 = "";
    var pen9 = "";
    var pen10 = "";
    var pen11 = "";
    var pen12 = "";
    var pen13 = "";
    var pen14 = "";
    var pen15 = "";
    var pen16 = "";
    var pen17 = "";
    var pen1 = "";



    if(umrah_tipekurs == 1){
        app = 'selected="selected"';
    } else
    {
        pen = 'selected="selected"';
    }

    if(umrah_cashflow == 1){
        app1 = 'selected="selected"';
    }
    if(umrah_cashflow == 2)
    {
        pen1 = 'selected="selected"';
    }
     if(umrah_cashflow == 6)
    {
        pen2 = 'selected="selected"';
    }
     if(umrah_cashflow == 7)
    {
        pen3 = 'selected="selected"';
    }
     if(umrah_cashflow == 8)
    {
        pen4 = 'selected="selected"';
    }
     if(umrah_cashflow == 9)
    {
        pen5 = 'selected="selected"';
    }
     if(umrah_cashflow == 10)
    {
        pen6 = 'selected="selected"';
    }
     if(umrah_cashflow == 11)
    {
        pen7 = 'selected="selected"';
    }
     if(umrah_cashflow == 12)
    {
        pen8 = 'selected="selected"';
    }
     if(umrah_cashflow == 13)
    {
        pen9 = 'selected="selected"';
    }
     if(umrah_cashflow == 14)
    {
        pen10 = 'selected="selected"';
    }
     if(umrah_cashflow == 15)
    {
        pen11 = 'selected="selected"';
    }
     if(umrah_cashflow == 16)
    {
        pen12 = 'selected="selected"';
    }
     if(umrah_cashflow == 17)
    {
        pen13 = 'selected="selected"';
    }
     if(umrah_cashflow == 18)
    {
        pen14 = 'selected="selected"';
    }
     if(umrah_cashflow == 19)
    {
        pen15 = 'selected="selected"';
    }
     if(umrah_cashflow == 20)
    {
        pen16 = 'selected="selected"';
    }
     if(umrah_cashflow == 21)
    {
        pen17 = 'selected="selected"';
    }


    var html = '<div class="row-fluid"><div class="span12">';
    html += '<select id="umrah_cashflow2" name="umrah_cashflow2"><option value="1" '+app1+'>Kas</option><option value="2" '+pen1+'>BMRI-USD-622</option><option value="6" '+pen2+'>BMRI-GIRO-758</option><option value="7" '+pen3+'>BMRI-ATM-921</option><option value="8" '+pen4+'>BNI-USD-259</option><option value="9" '+pen5+'>BNI-GIRO-417</option><option value="10" '+pen6+'>BNI-TAPLUS-233</option><option value="11" '+pen7+'>BSM-USD-415</option><option value="12" '+pen8+'>BSM-GIRO-993</option><option value="13" '+pen9+'>BSM-USD-005</option><option value="14" '+pen10+'>BSM-GIRO-988</option><option value="15" '+pen11+'>BCA-GIRO-997</option><option value="16" '+pen12+'>BUKOPIN-USD-099</option><option value="17" '+pen13+'>BUKOPIN-GIRO-095</option><option value="18" '+pen14+'>Deposito</option><option value="19" '+pen15+'>Kasbon</option><option value="20" '+pen16+'>MUAMALAT-USD-563</option><option value="21" '+pen17+'>MUAMALAT-IDR-224</option></select><div class="umrahcashflow2"></div></div>';
    html += '<select id="umrah_tipekurs2" name="umrah_tipekurs2"><option value="1" '+app+'>Rp</option><option value="2" '+pen+'>$</option></select><div class="umrahtipekurs2"></div></div>';
    html += '<br/>'

    html += '<input id="umrah_datetrans2" name="umrah_datetrans2" type="text" class="required" value="'+umrah_datetrans+'"/>'
    html += '<div class="input-prepend input-append input-price">';
    html += '<span class="add-on">-</span><input id="umrah_amount2" name="umrah_amount2" type="text" class="currency field-price required" minlength="1" onblur="dlor();" value="'+umrah_amount+'"/> <span class="add-on">Rp.</span><input id="umrah_kurs2" name="umrah_kurs2" type="text" class="currency field-price required" minlength="3" onblur="dlor();" value="'+umrah_kurs+'"/><span class="add-on coma">.00</span>';
    html += '<br/><br/>'
    html += '<input id="umrah_descpayment2" name="umrah_descpayment2" type="text" class="span5 required" placeholder="Keterangan Pembayaran" value="'+umrah_descpayment+'"/><div class="umrahdescpayment2"></div></div>';
    html += '</div></div>';
    html += '<br/>';


    html += ' <input type="button" id="saveJurnal" class="btn btn-info" value="Update Pembayaran">';
    $('.editable_umrah').html(html);


    $('#saveJurnal').click(function(){

        var numrah_cashflow = $("#umrah_cashflow2").val();
        var numrah_tipekurs = $("#umrah_tipekurs2").val();
        var numrah_datetrans = $("#umrah_datetrans2").val();

        var numrah_amount = $("#umrah_amount2").val();
        var numrah_kurs = $("#umrah_kurs2").val();
        var numrah_descpayment = $("#umrah_descpayment2").val();


        $('div.umrahcashflow2').html("");
        $('div.datetrans2').html("");
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
                    url: baseUrl +'Bookings/addJurnalHandling',
                    data : id_trans,
                    dataType: 'json',
                    data: 'umrahTipekurs=' + numrah_tipekurs + '&umrahAmount=' + numrah_amount+'&umrahKurs='+numrah_kurs+'&umrahCashflow='+numrah_cashflow+'&umrahDescpayment='+numrah_descpayment+'&umrahTypetrans='+umrah_typetrans+ '&umrahDatetrans='+numrah_datetrans+ '&id_trans='+id_trans+'&id_jurnal='+jurnal_id,
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
            url: baseUrl +'Bookings/deleteJurnalHandling',
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




