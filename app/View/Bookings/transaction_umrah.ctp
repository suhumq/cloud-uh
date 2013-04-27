<h3 class="heading">Info Jama'ah & Paket Umrah</h3>
<div class="row-fluid">
    <div class="span4">
        <table class="table table-bordered table-striped table_vam">
            <thead>
                <tr>
                    <th>
                        Nama
                     </th>
                     <td>
                        <?php echo h($booking['Customer']['name']); ?>
                     </td>   
                 </tr>
                  <tr>
                    <th>
                        KTP
                     </th>
                     <td>
                        <?php echo h($booking['Customer']['ktp']); ?>
                     </td>    
                 </tr>  
                 <tr>
                    <th>
                        Alamat
                     </th>
                     <td>
                        <?php echo h($booking['Customer']['address']); ?>
                     </td>    
                 </tr>   
                 <tr>
                    <th>
                        Tempat, Tgl Lahir
                     </th>
                     <td>
                        <?php echo h($booking['Customer']['place_birth']); ?>,<?php echo h($booking['Customer']['birthday']); ?>
                     </td>    
                 </tr>      
            </thead>
            <tbody>
            </tbody>
        </table> 
    </div>
    <div class="span4">
        <table class="table table-bordered table-striped table_vam">
            <thead>
                <tr>
                    <th>
                        Paket Umrah
                     </th>
                     <td>
                        <?php echo h($booking['Package']['name']); ?>
                     </td>   
                 </tr>
                 <tr>
                    <th>
                        Harga Pemesanan
                     </th>
                      <td> <?php echo $this->Number->currency(($booking['Booking']['room_amount']),'$ ');  ?> 
                           | Kamar : <?php if ($booking['Booking']['room_type'] == '1'):
                                echo "Quad";
                                else:
                                    if ($booking['Booking']['room_type'] == '2'):
                                        echo "Triple";
                                    else:
                                        echo "Double";
                                    endif;
                                endif;
                            ?>
                     </td>    
                 </tr> 
                 <tr>
                    <th>
                        Diskon Paket
                     </th>
                     <td>
                         <?php echo $this->Number->currency(($booking['Booking']['room_discount']),'$ ');  ?> -> <b> <?php echo $this->Number->currency(($booking['Booking']['room_amount'] - $booking['Booking']['room_discount']),'$ ');  ?> </b>
                     </td>    
                 </tr> 
                   <tr>
                    <td>
                          <?php echo $this->Html->link(__('Print Faktur'), array('controller' => 'Bookings', 'action' => 'invoice', $booking['Booking']['id'])); ?>
                     </td>
                      <td>   
                      <?php echo $this->Html->link(__('Lengkapi Formulir'), array('controller' => 'Customers', 'action' => 'edit', $booking['Customer']['id'])); ?>
                     </td>    
                 </tr> 
            </thead>
            <tbody>
            </tbody>
        </table> 
    </div>
</div>

<h3 class="heading">Transaksi Pembayaran Paket Umrah</h3>
<div class="row-fluid">
    <div class="span4">
        <div class="row-fluid">
            <div class="span12">
                <?php echo $this->Form->input('cashflow_id', array('label' => '','type' => 'select', 'class' => 'chzn_unit', 'id'=>'umrah_cashflow')); ?>
             <br/>
                <select id="umrah_tipekurs" name="umrah_tipekurs" class='chzn_project'>
                    <option value="1">Rp</option>
                    <option value="2">$</option>
                </select> 
              
              <input id="price_brosure" name="price_brosure" class="price_brosure" type="hidden" value=" 
               <?php echo h($booking['Booking']['room_amount'] - $booking['Booking']['room_discount']); ?>
                " />
              
              <input id="id_trans" name="id_trans" class="id_trans" type="hidden" value="<?php echo $this->data['Booking']['id'] ?>" />
              <input id="umrah_typetrans" name="umrah_typetrans" class="umrah_typetrans" type="hidden" value="1" />
              <input id="umrah_dategoing" name="umrah_dategoing" class="umrah_dategoing" type="hidden" value="<?php echo $booking['Package']['date_going'] ?>" />
              
             <br/><br/><div class="input-prepend input-append input-price">
                <span class="add-on">-</span>
                 <input id="umrah_amount" name="umrah_amount" type="text" class="span12 field-price required currency" minlength='3' placeholder="Amount"/>
                <span class="add-on coma">.00</span>
                 <span class="add-on">Rp.</span>
                  <input id="umrah_kurs" name="umrah_kurs" type="text" class="span12 field-price required currency" minlength='3' placeholder="Kurs"/>
                <span class="add-on coma">.00</span>
                <div class="umrahamount"></div>
            </div>
             <?php echo $this->Form->text('desc_payment', array('label' => '','class' => 'span12 required','placeholder'=>'Keterangan Pembayaran','id'=>'umrah_descpayment')); ?>
              <div class="umrahdescpayment"></div>
            </div>
        </div>
          <div class="span3">
            <label> &nbsp;<span class="f_req"></span></label>
            <button id="umrahLink" class="umrahLink btn btn-info" type="submit">Simpan</button>
        </div>
    </div>
    <div class="span8">
        <table id='tableumrah' class="table table-bordered table-striped table_vam">
            <thead>
                <tr>
                    <th>Tipe Kurs</th>
                    <th>Kurs</th>
                    <th>Amount</th>
                    <th>Cashflow</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                    
                 </tr>
            </thead>
            <tbody>
                <?php  $jumlah = 0;
                $jumlah2 = 0;
                $todollar = 0;
                                ?>
              <?php foreach ($info_umrah as $row): ?>
                <tr>
                    <td><?php 

                    if ($row['Jurnal']['type_currency'] == '1'):
                            echo "Rp";
                        else:
                            echo "$";
                        endif;
                    
                    ?>&nbsp;</td>
                    <td> <?php echo $this->Number->currency(($row['Jurnal']['kurs']),'Rp. ');  ?> 
                    <td> <?php 
                      if ($row['Jurnal']['type_currency'] == '1'):
                    echo $this->Number->currency(($row['Jurnal']['amount']),'Rp. '); 
                      else:
                        echo $this->Number->currency(($row['Jurnal']['amount']),'$. '); 
                    endif;
                     ?> 
                    <td> <?php echo h($row['Cashflow']['name']); ?>&nbsp;</td>
                    <td> <?php echo h($row['Jurnal']['desc_payment']); ?>&nbsp;</td>
                    <td>
                    <a data-toggle="modal" data-backdrop="static" href="#EditUmrah" onClick="editUmrah($(this))" class="label ttip_b" title="Edit Pembayaran Umrah">Edit</a>
                    <a data-toggle="modal" data-backdrop="static" href="#HapusUmrah" onClick="deleteUmrah($(this))" class="label ttip_b" title="Hapus Pembayaran Umrah">Hapus</a>
                    </td>
                    <input id="umrah_tipekurs" name="umrah_tipekurs" value="<?php echo h($row['Jurnal']['type_currency']); ?>" type="hidden" class="umrah_tipekurs" />
                    <input id="umrah_kurs" name="umrah_kurs" value="<?php echo h($row['Jurnal']['kurs']); ?>" type="hidden" class="umrah_kurs" />
                    <input id="umrah_amount" name="umrah_amount" value="<?php echo h($row['Jurnal']['amount']); ?>" type="hidden" class="umrah_amount" />
                    <input id="umrah_descpayment" name="umrah_descpayment" value="<?php echo h($row['Jurnal']['desc_payment']); ?>" type="hidden" class="umrah_descpayment" />
                    <input id="jurnal_id" name="jurnal_id" value="<?php echo h($row['Jurnal']['id']); ?>" type="hidden" class="jurnal_id" />
                    <input id="booking_id" name="booking_id" value="<?php echo h($row['Jurnal']['booking_id']); ?>" type="hidden" class="booking_id" />
                    <input id="umrah_cashflow" name="umrah_cashflow" value="<?php echo h($row['Jurnal']['cashflow_id']); ?>" type="hidden" class="umrah_cashflow" />
                
                </tr>
                <?php 

                    if ($row['Jurnal']['type_currency'] == '1'):
                             $jumlah += ($row['Jurnal']['amount']);
                             $todollar += ($row['Jurnal']['amount'] / $row['Jurnal']['kurs']);
                        else:
                             $jumlah2 += ($row['Jurnal']['amount']);
                        endif;
                    
                    ?>&nbsp;

                 
            <?php endforeach; ?>
            <tr>
                <td colspan="2">Jumlah Pembayaran</td>
                <td colspan="4">

                    <?php echo  $this->Number->currency(($jumlah),'Rp. ');  ?> (<?php echo  $this->Number->currency($todollar,'$. ');  ?>) <br/> <?php echo  $this->Number->currency($jumlah2,'$. ');  ?></td>
                
            </tr>
            <tr>
                <td colspan="2">Sisa Pembayaran</td>
                <td colspan="4"> <?php echo $this->Number->currency((($booking['Booking']['room_amount'] - $booking['Booking']['room_discount']) - ($jumlah2 + $todollar)),'$. '); ?></td>
            </tr>
            </tbody>
        </table> 
    </div>
</div>

 <div class="modal hide fade" id="EditUmrah">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit Pembayaran Umrah</h3>
            </div>
            <div class="modal-body">
                <div class="editable_umrah"></div>
            </div>
        </div>

         <div class="modal hide fade" id="HapusUmrah">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus Pembayaran Umrah</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_umrah"></div>
            </div>
        </div>

 <?php
    echo $this->Html->script('specific_page/bookings/form_umrah'); 
?> 

 <script type="text/javascript">    
        var baseUrl = "<?php echo Router::url('/', true) ?>";

        function formatCurrency(num) {
            var p = parseFloat(num).toFixed(2).split(".");
            return "Rp. " + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
                return  num + (i && !(i % 3) ? "," : "") + acc;
            }, "") + "." + p[1];
        }
</script>

