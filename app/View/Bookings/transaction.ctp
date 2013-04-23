<h3 class="heading">Info Konsumen dan Unit yang dipesan</h3>
<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped table_vam">
            <thead>
                <tr>
                    <th>No. Pemesanan</th>
                    <th>Tanggal</th>
                    <th>Nama Konsumen</th>
                    <th>Info Unit</th>
                    <th>Total Harga Jual Unit</th>
                    <th>Telah Dibayar</th>
                    <th>Sisa Pembayaran</th>
                    <th>Cara Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $this->Html->link(__($booking['Booking']['no_booking']), array('action' => 'edit', $booking['Booking']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo h($booking['Booking']['created']); ?>&nbsp;</td>
                    <td><?php echo h($booking['Customer']['name']); ?>&nbsp;</td>
                    <td><?php echo h($booking['Unit']['name']); ?> - <?php echo h($booking['Unit']['lb']);  ?> / <?php echo h($booking['Unit']['lt']);  ?>
                    </td>
                    <td>
                        <?php echo $this->Number->currency(($booking['Unit']['price_sell'] + $booking['Unit']['charge']), 'RP'); ?>
                    </td>
                    <td><?php echo $this->Number->currency(($sum_payment[0][0]['SUM(amount)']), 'RP'); ?></td>
                    <td><?php
                        echo $this->Number->currency(( ($booking['Unit']['price_sell'] + $booking['Unit']['charge']) -
                                $sum_payment[0][0]['SUM(amount)']), 'RP');
                        ?>
                    </td>
                    <td><?php
                        if ($booking['Booking']['trans_type'] == '1'):
                            echo "KPR";
                        elseif ($booking['Booking']['trans_type'] == '2'):
                            echo "Cash Bertahap";
                        else:
                            echo "Cash";
                        endif;
                        ?>&nbsp;</td>
                    <td><?php
                        if ($booking['Booking']['trans_status'] == '1'):
                            echo "Pending";
                        else:
                            echo "Lunas";
                        endif;
                        ?>&nbsp;
                    </td>
                </tr>
            </tbody>
        </table> 

    </div></div>
<!-- <div>
    <form id="overlay_form_bank" style="display:none">

        <div class="editable_bank"></div>
    </form>
    </div>


   <div>
    <form id="overlay_form_ppjb" style="display:none">
    <div class="editable_ppjb"></div>
    </form>
    </div>

    <div>
    <form id="overlay_form_del" style="display:none">

        <div class="deletable_bank"></div>
    </form>
    </div>-->

    <div class="row-fluid">
        <div class="span12">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li><a href="#tab6" data-toggle="tab">Bank KPR</a></li>
                    <li><a href="#tab2" data-toggle="tab">Spesifikasi Teknis</a></li>
                    <li><a href="#tab3" data-toggle="tab">Cara Pembayaran PPJB</a></li>
                    <li><a href="#tab4" data-toggle="tab">Rencana Pembayaran (SPR)</a></li>
                    <li><a href="#tab5" data-toggle="tab">Penambahan / Perubahan Spesifikasi</a></li>
                    <li><a href="#tab8" data-toggle="tab">Perbaikan Minor</a></li>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    <li><a href="#tab7" data-toggle="tab">Pengaturan Surat</a></li>
                    <li><a href="#tab1" data-toggle="tab">Cetak Surat - Surat</a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab2">
                        <h3 class="heading">Tentukan Spesifikasi Teknis yang Dipesan</h3>
                        <div class="formSep">
                            <div class="row-fluid">  
                                <div class="span4">
                                    <label>Nama Spesifikasi <span class="f_req">*</span></label>
                                    <input id="id_trans" name="id_trans" class="id_trans" type="hidden" value="<?php echo $this->data['Booking']['id'] ?>" />
                                    <input id="unit_name" name="unit_name" type="text" class="span12 required" minlength='3'/>
                                     <div class="unitname"></div>
                                </div>
                                <div class="span5">
                                    <label>Keterangan Spesifikasi <span class="f_req">*</span></label>
                                    <input id="unit_desc" name="unit_desc" type="text" class="span12 required" minlength='3'/>
                                    <div class="unitdesc"></div>
                                </div>
                                <div class="span3">
                                    <label> &nbsp;<span class="f_req"></span></label>
                                    <button id="unitspecLink" class="unitspecLink btn btn-info" type="submit">Tambah Spesifikasi</button>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading">Info Spesifikasi Teknis yang Dipesan</h3>
                        <div class="formSep">
                            <div class="row-fluid">
                                <div class="span12">
                                    <table id= "tablespecunit" class="table table-bordered table-striped table_vam">
                                        <thead>
                                            <tr>
                                                <th>Nama Spesifikasi</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($unitspecification_data as $row): ?>
                                                <tr>
                                                    <td><?php echo h($row['UnitSpecification']['name']); ?>&nbsp;</td>
                                                    <td><?php echo h($row['UnitSpecification']['description_specification']); ?>&nbsp;</td>
                                                    <td>
                                                       <a data-toggle="modal" data-backdrop="static" href="#EditSpec" onClick="editSpec($(this))" class="label ttip_b" title="Edit Spesifikasi">Edit</a>
                                                        <a data-toggle="modal" data-backdrop="static" href="#HapusSpec" onClick="deleteSpec($(this))" class="label ttip_b" title="Hapus Spesifikasi">Hapus</a>
                                                    </td>

                                                    <input id="unit_name" name="unit_name" value="<?php echo h($row['UnitSpecification']['name']); ?>" type="hidden" class="unit_name" />
                                                    <input id="unit_desc" name="unit_desc" value="<?php echo h($row['UnitSpecification']['description_specification']); ?>" type="hidden" class="unit_desc" />
                                                    <input id="unitspec_id" name="unitspec_id" value="<?php echo h($row['UnitSpecification']['id']); ?>" type="hidden" class="unitspec_id" />
                                                    <input id="booking_id" name="booking_id" value="<?php echo h($row['UnitSpecification']['booking_id']); ?>" type="hidden" class="booking_id" />
                                                </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <h3 class="heading">Tambah Cara Pembayaran PPJB</h3>
                        <?php //echo $this->Form->create('Booking', array('action' => 'addDraftTransaction', 'class' => 'form_validation_ttip')); ?>
                        <div class="formSep">
                            <div class="row-fluid">  
                                <div class="span5">
                                    <label>Pembayaran <span class="f_req">*</span></label>
                                    <input id="id_trans" name="id_trans" class="id_trans" type="hidden" value="<?php echo $this->data['Booking']['id'] ?>" />
                                    <input id="description_transdraft" name="description_transdraft" type="text" class="span12 required" minlength='3'/>
                                    <div class="description_transdraft"></div>
                                    
                                    <?php //echo $this->Form->input('description_transdraft', array('label' => '', 'type' => 'text', 'class' => 'span12 required', 'minlength' => '3')); ?>
                                </div>

                                <div class="span2">
                                    <label>Jumlah <span class="f_req">*</span></label>
                                    <div class="input-prepend input-append input-price">
                                        <span class="add-on">Rp.</span>
                                       
                                        <?php echo $this->Form->input('price', array('label' => '', 'type' => 'text', 'class' => 'field-price required currency', 'minlength' => '3', 'id'=>'price')); ?>
                                        <span class="add-on coma">.00</span>
                                        <div class="price"></div>
                                    </div>
                                </div>
                                <div class="span2">
                                    <label>Tgl Jatuh Tempo<span class="f_req">*</span></label>
                                      
                                    <?php echo $this->Form->input('date_payment', array('label' => '', 'type' => 'text', 'class' => 'span12 required', 'minlength' => '3', 'id' => 'date_deadline')); ?>
                                     <div class="date_payment"></div>
                                </div>

                                <div class="span3">
                                    <label> &nbsp;<span class="f_req"></span></label>
                                    <button id="ppjbLink" class="ppjbLink btn btn-info" type="submit">Tambah PPJB</button>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading">Info Cara Pembayaran PPJB</h3>
                        <div class="formSep">
                            <div class="row-fluid">
                                <div class="span12">
                                    <table id="tableppjb" class="table table-bordered table-striped table_vam">
                                        <thead>
                                            <tr>
                                                <th>Pembayaran</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal Jatuh Tempo</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($draftTransaction_data as $row): ?>
                                                <tr>
                                                    <td><?php echo h($row['DraftTransaction']['description_transdraft']); ?>&nbsp;</td>
                                                    <td><?php echo $this->Number->currency(($row['DraftTransaction']['price']), 'RP'); ?>&nbsp;</td>
                                                    <td><?php echo $this->Time->format('d-M-Y', $row['DraftTransaction']['date_payment']); ?> &nbsp;</td>
                                                    <td>
                                                         <a data-toggle="modal" data-backdrop="static" href="#EditPPJB" onClick="editPpjb($(this))" class="label ttip_b" title="Edit PPJB">Edit</a>
                                                        <a data-toggle="modal" data-backdrop="static" href="#HapusPPJB" onClick="deletePpjb($(this))" class="label ttip_b" title="Hapus PPJB">Hapus</a>
                                                    </td>
                                                <input id="description_transdraft" name="description_transdraft" value="<?php echo h($row['DraftTransaction']['description_transdraft']); ?>" type="hidden" class="description_transdraft" />
                                                <input id="price" name="price" value="<?php echo h($row['DraftTransaction']['price']); ?>" type="hidden" class="price" />
                                                <input id="date_payment" name="date_payment" value="<?php echo h($row['DraftTransaction']['date_payment']); ?>" type="hidden" class="date_payment" />
                                               
                                                <input id="draft_id" name="draft_id" value="<?php echo h($row['DraftTransaction']['id']); ?>" type="hidden" class="draft_id" />
                                                <input id="booking_id" name="booking_id" value="<?php echo h($row['DraftTransaction']['booking_id']); ?>" type="hidden" class="booking_id" />
                                                </tr>

                                          <?php endforeach; ?>
                                            <tr>
                                                <td colspan="1">
                                                    <b>Jumlah</b>
                                                </td>
                                                <td colspan="3"> 
                                                    <b><?php echo $this->Number->currency(($sum_ppjb[0][0]['SUM(price)']), 'RP'); ?></b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <h3 class="heading">Tambah Transaksi Pembayaran</h3>
                        <div class="formSep">
                            <div class="row-fluid">  
                                    <?php echo $this->Form->input('id', array('id'=>'id','type' => 'hidden', 'value' => $this->data['Booking']['id'])); ?>
                                    
                                    <?php echo $this->Form->input('account_debet', array('id'=>'account_debet','label' => '', 'type' => 'hidden', 'value' => 'Kas/Bank', 'class' => 'span12')); ?>
                                    <?php echo $this->Form->input('account_credit', array('id'=>'account_credit','label' => '', 'type' => 'hidden', 'value' => 'Penjualan', 'class' => 'span12')); ?>
                                    
                                    <?php echo $this->Form->input('no_transaction', array('id'=>'no_transaction','label' => '', 'type' => 'hidden', 'class' => 'span12 required', 'readonly' => 'true', 'minlength' => '3', 'value' => 'T2013' . (string) $invoice[0][0]['MAX(id)'])); ?>
                                    <div class="no_transaction"></div>
                                    <?php echo $this->Form->input('project_id', array('id'=>'project_id','label' => '', 'type' => 'hidden', 'class' => 'span12', 'value' => $this->data['Unit']['project_id'])); ?>
                                    <?php echo $this->Form->input('unit_id', array('id'=>'unit_id','label' => '', 'type' => 'hidden', 'class' => 'span12')); ?>
                                <div class="span3">
                                    <label>Cicilan Pembayaran <span class="f_req">*</span></label>
                                    <?php echo $this->Form->input('description', array('id'=>'description','label' => '', 'type' => 'text', 'class' => 'span12 required', 'minlength' => '3')); ?>
                                     <div class="description"></div>
                                      <input id="cashflow_id" name="cashflow_id" value="45" type="hidden" class="cashflow_id" />
                                </div>
                                <div class="span2">
                                    <label>Tanggal <span class="f_req">*</span></label>
                                    <?php echo $this->Form->input('trans_date', array('label' => '', 'type' => 'text', 'class' => 'span12 required', 'minlength' => '3', 'id' => 'trans_date')); ?>
                                     <div class="trans_date"></div>
                                </div>
                                <div class="span2">
                                    <label>Jumlah <span class="f_req">*</span></label>
                                    <div class="input-prepend input-append input-price">
                                        <span class="add-on">Rp.</span>
                                        <?php echo $this->Form->input('amount', array('id'=>'amount','label' => '', 'type' => 'text', 'class' => 'field-price required currency', 'minlength' => '3')); ?>
                                        <span class="add-on coma">.00</span>
                                         <div class="amount"></div>
                                    </div>
                                </div>

                                <div class="span3">
                                    <label> &nbsp;<span class="f_req"></span></label>
                                    <button id="jurnalLink" class="jurnalLink btn btn-info" type="submit">Tambah Transaksi</button>
                                </div>
                            </div>
                        </div>
                        <h3 class="heading">Info Transaksi Pembayaran</h3>
                        <div class="formSep">
                            <div class="row-fluid">
                                <div class="span12">
                                    <table id="tablejurnal" class="table table-bordered table-striped table_vam">
                                        <thead>
                                            <tr>
                                                <th>Nomor Transaksi</th>
                                                <th>Cicilan Pembayaran</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($jurnal_data as $row): ?>
                                                <tr>
                                                    <td><?php echo h($row['Jurnal']['no_transaction']); ?>&nbsp;</td>
                                                    <td><?php echo h($row['Jurnal']['description']); ?>&nbsp;</td>
                                                    <td><?php echo $this->Time->format('d-M-Y', $row['Jurnal']['trans_date']); ?> &nbsp;</td>
                                                    <td><?php echo $this->Number->currency(($row['Jurnal']['amount']), 'RP'); ?>&nbsp;</td>
                                                    <td>
                                                        <a data-toggle="modal" data-backdrop="static" href="#EditSPR" onClick="editJurnal($(this))" class="label ttip_b" title="Edit Pembayaran">Edit</a>
                                                        <a data-toggle="modal" data-backdrop="static" href="#HapusSPR" onClick="deleteJurnal($(this))" class="label ttip_b" title="Hapus Pembayaran">Hapus</a>

                                                    </td>
                                                    <input id="no_transaction" name="no_transaction" value="<?php echo h($row['Jurnal']['no_transaction']); ?>" type="hidden" class="no_transaction" />
                                                    <input id="description" name="price" value="<?php echo h($row['Jurnal']['description']); ?>" type="hidden" class="description" />
                                                    <input id="trans_date" name="trans_date" value="<?php echo h($row['Jurnal']['trans_date']); ?>" type="hidden" class="trans_date" />
                                                    <input id="amount" name="trans_date" value="<?php echo h($row['Jurnal']['amount']); ?>" type="hidden" class="amount" />
                                                    <input id="project_id" name="project_id" value="<?php echo $row['Jurnal']['project_id']?>" type="hidden" class="project_id" />
                                                    <input id="unit_id" name="unit_id" value="<?php echo $row['Jurnal']['unit_id']?>" type="hidden" class="unit_id" />
                                                    <input id="account_debet" name="account_debet" value="Kas/Bank" type="hidden" class="account_debet" />
                                                    <input id="account_credit" name="account_credit" value="Penjualan" type="hidden" class="account_credit" />
                                                    <input id="jurnal_id" name="jurnal_id" value="<?php echo h($row['Jurnal']['id']); ?>" type="hidden" class="jurnal_id" />
                                                    <input id="booking_id" name="booking_id" value="<?php echo h($row['Jurnal']['booking_id']); ?>" type="hidden" class="booking_id" />
                                                    <input id="cashflow_id" name="cashflow_id" value="45" type="hidden" class="cashflow_id" />
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="3">
                                                    <b>Jumlah</b>
                                                </td>
                                                <td colspan="3"> 
                                                    <b><?php echo $this->Number->currency(($sum_payment[0][0]['SUM(amount)']), 'RP'); ?></b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <h3 class="heading">Tambah Penambahan / Perubahan Spesifikasi</h3>
                            <div class="formSep">
                                <div class="row-fluid">  
                                    <div class="span3">
                                        <label>Penambahan/Perubahan <span class="f_req">*</span></label>
                                        <input id="id_trans" name="id_trans" class="id_trans" type="hidden" value="<?php echo $this->data['Booking']['id'] ?>" />
                                        <input id="material_name" name="material_name" type="text" class="span12 required" minlength='3'/>
                                         <div class="materialname"></div>
                                    </div>
                                   <div class="span2">
                                        <label>Harga Material Standard <span class="f_req">*</span></label>
                                        <div class="input-prepend input-append input-price">
                                            <span class="add-on">Rp.</span>
                                            <input id="material_standard" name="material_standard" type="text" class="field-price required currency" minlength='3'/>
                                            <span class="add-on coma">.00</span>
                                        </div>
                                        <div class="materialstandard"></div>
                                    </div>
                                    <div class="span2">
                                        <label>Harga Material Baru <span class="f_req">*</span></label>
                                        <div class="input-prepend input-append input-price">
                                            <span class="add-on">Rp.</span>
                                            <input id="material_new" name="material_new" type="text" class="field-price required currency" minlength='3'/>
                                            <span class="add-on coma">.00</span>
                                        </div>
                                         <div class="materialnew"></div>
                                    </div>
                                   
                                    <div class="span2">
                                        <label>Satuan Perubahan <span class="f_req">*</span></label>
                                        <input id="material_qty" name="material_qty" type="text" class="span9 required" minlength='3'/>
                                    </div>
                                     <div class="materialqty"></div>
                                    <div class="span3">
                                        <label> &nbsp;<span class="f_req"></span></label>
                                        <button id="cspLink" class="cspLink btn btn-info" type="submit">Tambah Material</button>
                                    </div>
                                </div>
                            </div>
                             <h3 class="heading">Info Penambahan / Perubahan Spesifikasi</h3>
                            <div class="formSep">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <table id= "tablesmaterial" class="table table-bordered table-striped table_vam">
                                            <thead>
                                                <tr>
                                                    <th>Penambahan / Perubahan</th>
                                                    <th>Harga Material Standard</th>
                                                    <th>Harga Material Baru</th>
                                                    <th>Satuan Perubahan</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  $jumlah = 0;
                                            $jumlah2 = 0;
                                            $jumlah3 = 0;
                                            $qty = 0;
                                            ?>
                                            <?php foreach ($booking_material as $row): ?>
                                                <tr>
                                                    <td><?php echo h($row['BookingMaterial']['description_material']); ?>&nbsp;</td>
                                                    <td><?php echo $this->Number->currency(($row['BookingMaterial']['price_standard']), 'RP'); ?>&nbsp;</td>
                                                    <td><?php echo $this->Number->currency(($row['BookingMaterial']['price_new']), 'RP'); ?>&nbsp;</td>
                                                    <td><?php echo h($row['BookingMaterial']['qty']); ?>&nbsp;</td>
                                                    <td><?php echo $this->Number->currency(($row['BookingMaterial']['qty'] * $row['BookingMaterial']['price_new']),'Rp.'); ?>&nbsp;</td>
                                                    <td>
                                                      <a data-toggle="modal" data-backdrop="static" href="#EditMaterial" onClick="editMaterial($(this))" class="label ttip_b" title="Edit">Edit</a>
                                                        <a data-toggle="modal" data-backdrop="static" href="#HapusMaterial" onClick="deleteMaterial($(this))" class="label ttip_b" title="Hapus">Hapus</a>

                                                    </td>
                                                      <input id="material_name" name="material_name" value="<?php echo h($row['BookingMaterial']['description_material']); ?>" type="hidden" class="material_name" />
                                                    <input id="material_standard" name="material_standard" value="<?php echo h($row['BookingMaterial']['price_standard']); ?>" type="hidden" class="material_standard" />
                                                    <input id="material_new" name="material_new" value="<?php echo h($row['BookingMaterial']['price_new']); ?>" type="hidden" class="material_new" />
                                                      <input id="material_qty" name="material_qty" value="<?php echo h($row['BookingMaterial']['qty']); ?>" type="hidden" class="material_qty" />
                                                   
                                                    <input id="material_id" name="material_id" value="<?php echo h($row['BookingMaterial']['id']); ?>" type="hidden" class="material_id" />
                                                    <input id="booking_id" name="booking_id" value="<?php echo h($row['BookingMaterial']['booking_id']); ?>" type="hidden" class="booking_id" />
                                                </tr>
                                                <?php $qty += ($row['BookingMaterial']['qty']); ?>
                                                <?php $jumlah += ($row['BookingMaterial']['price_new']); ?>
                                                <?php $jumlah2 += ($row['BookingMaterial']['price_standard']); ?>
                                                <?php $jumlah3 += ($row['BookingMaterial']['price_new'] * $row['BookingMaterial']['qty'] ); ?>
                                            <?php endforeach; ?>
                                                <tr>
                                                    <td><b>Jumlah</b></td>
                                                    <td><b><?php echo $this->Number->currency($jumlah2,'Rp.'); ?></b></td>
                                                    <td><b><?php echo $this->Number->currency($jumlah,'Rp.'); ?></b></td>
                                                    <td><b><?php echo $qty; ?></b></td>
                                                    <td colspan="2"><b><?php echo $this->Number->currency($jumlah3,'Rp.'); ?></b></td>
                                                </tr>
                                                  
                                            </tbody>
                                        </table>  
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane" id="tab1">
                        <ul class="list_a">
                            <li><?php echo $this->Html->link(__('Surat Pemesanan Rumah (SPR)'), array('action' => 'spr', $booking['Booking']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp; </li><br/>
                            <li><?php echo $this->Html->link(__('Surat Permohonan Proses KPR (SP-KPR)'), array('action' => 'spkpr', $booking['Booking']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp; </li><br/>
                            <li><?php echo $this->Html->link(__('PERJANJIAN PENGIKATAN JUAL BELI (PPJB)'), array('action' => 'ppjb', $booking['Booking']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp;</li><br/>
                            <li><?php echo $this->Html->link(__('Surat Permohonan Proses AJB (SP-AJBN)'), array('action' => 'spajbn', $booking['Booking']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp;</li><br/>
                            <li><?php echo $this->Html->link(__('BERITA ACARA SERAH TERIMA RUMAH (BA-STR)'), array('action' => 'bastr', $booking['Booking']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp;
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="tab6">
                        <h3 class="heading">Tambah Bank Pengajuan KPR</h3>
                        <div class="formSep">
                            <div class="row-fluid">  
                                <div class="span2">
                                    <label>Nama Bank <span class="f_req">*</span></label>
                                    <input id="id_trans" name="id_trans" class="id_trans" type="hidden" value="<?php echo $this->data['Booking']['id'] ?>" />
                                    <input id="bank_name" name="bank_name" type="text" class="span12 required" />
                                    <div class="bankname"></div>
                                    
                                </div>
                                <div class="span3">
                                    <label>Alamat Bank <span class="f_req">*</span></label>
                                    <input id="bank_address" name="bank_address" type="text" class="span12 required"/>
                                    <div class="bankadd"></div>
                                    
                                </div>
                                <div class="span2">
                                    <label>Kota <span class="f_req">*</span></label>
                                    <input id="bank_town" name="bank_town" type="text" class="span12 required"/>  
                                    <div class="banktown"></div>
                                    
                                </div>
                                <div class="span1">
                                    <label>Status <span class="f_req">*</span></label>

                                    <select id="status" name="status">
                                        <option value="1">Approved</option>
                                        <option value="2">Rejected</option>
                                        <option value="3">Pending</option>
                                    </select> 
                                </div>
                                <div class="span3">
                                    <label> &nbsp;<span class="f_req"></span></label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button id="sortingLink" class="sortingLink btn btn-info" type="submit">Tambahkan Bank</button>
                                </div>
                            </div>
                        </div>
                
                        <h3 class="heading">Info Bank Pengajuan KPR</h3>
                        <div class="formSep">
                            <div class="row-fluid">
                                <div class="span12bank">
                                    <table id="tablebank" class="table table-bordered table-striped table_vam">
                                        <thead>
                                            <tr>
                                                <th>Nama Bank</th>
                                                <th>Alamat Bank</th>
                                                <th>Kota</th>
                                                <th>Status Pengajuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($bank as $row): ?>
                                                <tr>
                                                    <td class="bank_name"><?php echo h($row['Bank']['bank_name']); ?>&nbsp;</td>
                                                    <td class="bank_add"><?php echo h($row['Bank']['bank_address']); ?>&nbsp;</td>
                                                    <td class="bank_town"><?php echo h($row['Bank']['bank_town']); ?>&nbsp;</td>
                                                    <td>
                                                        <?php
                                                        if ($row['Bank']['status'] == '1'):
                                                            echo "Approved";
                                                        elseif ($row['Bank']['status'] == '2'):
                                                            echo "Rejected";
                                                        else:
                                                            echo "Pending";
                                                        endif;
                                                        ?>
                                                        
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-backdrop="static" href="#EditBank" onClick="editBank($(this))" class="label ttip_b" title="Edit Bank">Edit</a>
                                                        <a data-toggle="modal" data-backdrop="static" href="#HapusBank" onClick="deleteBank($(this))" class="label ttip_b" title="Hapus Bank">Hapus</a>
                                                    </td>
                                                    <input id="bank_name" name="bank_name" value="<?php echo h($row['Bank']['bank_name']); ?>" type="hidden" class="bank_name" />
                                                    <input id="bank_add" name="bank_add" value="<?php echo h($row['Bank']['bank_address']); ?>" type="hidden" class="bank_add" />
                                                    <input id="bank_town" name="bank_town" value="<?php echo h($row['Bank']['bank_town']); ?>" type="hidden" class="bank_town" />
                                                    <input id="bank_status" name="bank_status" value="<?php echo h($row['Bank']['status']); ?>" type="hidden" class="bank_status" />
                                                    <input id="bank_id" name="bank_id" value="<?php echo h($row['Bank']['id']); ?>" type="hidden" class="bank_id" />
                                                    <input id="booking_id" name="booking_id" value="<?php echo h($row['Bank']['booking_id']); ?>" type="hidden" class="booking_id" />
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab7">
                        <h3 class="heading">Pengaturan Nomor dan Tanggal Surat</h3>
                        <div class="formSep">
                            <div class="row-fluid">  
                                <div class="span2">
                                    <label>Nomor PPJB <span class="f_req">*</span></label>
                                      <input id="id_trans" name="id_trans" class="id_trans" type="hidden" value="<?php echo $this->data['Booking']['id'] ?>" />
                                        <input id="letter_ppjb" name="letter_ppjb" type="text" class="span12 required" />
                                        <div class="letterppjb"></div>
                                </div>
                                <div class="span2">
                                    <label>Nomor SPR <span class="f_req">*</span></label>
                                   <input id="letter_spr" name="letter_spr" type="text" class="span12 required" />
                                        <div class="letterspr"></div>
                                </div>
                                <div class="span2">
                                    <label>Nomor SPKPR <span class="f_req">*</span></label>
                                    <input id="letter_spkpr" name="letter_spkpr" type="text" class="span12 required" />
                                        <div class="letterspkpr"></div>
                                </div>
                                <div class="span2">
                                    <label>Nomor SPAJB <span class="f_req">*</span></label>
                                   <input id="letter_spajb" name="letter_spajb" type="text" class="span12 required" />
                                        <div class="letterspajb"></div>
                                </div>
                                <div class="span2">
                                    <label>Nomor BASTR <span class="f_req">*</span></label>
                                    <input id="letter_bastr" name="letter_bastr" type="text" class="span12 required" />
                                        <div class="letterbastr"></div>
                                </div>
                                
                                <div class="span1">
                                    <label> &nbsp;<span class="f_req"></span></label>
                                    <button id='letterLink' class="letterLink btn btn-info" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                         <h3 class="heading">Info Pengaturan Nomor dan Tanggal Surat</h3>
                        <div class="formSep">
                            <div class="row-fluid">
                                <div class="span12">
                                    <table id="tablesletter" class="table table-bordered table-striped table_vam">
                                        <thead>
                                            <tr>
                                                <th>SPR</th>
                                                <th>PPJB</th>
                                                <th>SPKPR</th>
                                                <th>SPAJB</th>
                                                <th>BASTR</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($letter_number as $row): ?>
                                                <tr>
                                                    <td><?php echo h($row['LetterNumber']['spr']); ?>&nbsp;</td>
                                                    <td><?php echo h($row['LetterNumber']['ppjb']); ?>&nbsp;</td>
                                                    <td><?php echo h($row['LetterNumber']['spkpr']); ?>&nbsp;</td>
                                                    <td><?php echo h($row['LetterNumber']['spajb']); ?>&nbsp;</td>
                                                    <td><?php echo h($row['LetterNumber']['bastr']); ?>&nbsp;</td>
                                                    <td>
                                                         <a data-toggle="modal" data-backdrop="static" href="#EditLetter" onClick="editLetter($(this))" class="label ttip_b" title="Edit Pengaturan Surat">Edit</a>
                                                        <a data-toggle="modal" data-backdrop="static" href="#HapusLetter" onClick="deleteLetter($(this))" class="label ttip_b" title="Hapus Pengaturan Surat">Hapus</a>
                                                    </td>
                                                     <input id="letter_ppjb" name="letter_ppjb" value="<?php echo h($row['LetterNumber']['ppjb']); ?>" type="hidden" class="letter_ppjb" />
                                                     <input id="letter_spr" name="letter_spr" value="<?php echo h($row['LetterNumber']['spr']); ?>" type="hidden" class="letter_spr" />
                                                     <input id="letter_spkpr" name="letter_spkpr" value="<?php echo h($row['LetterNumber']['spkpr']); ?>" type="hidden" class="letter_spkpr" />
                                                     <input id="letter_spajb" name="letter_spajb" value="<?php echo h($row['LetterNumber']['spajb']); ?>" type="hidden" class="letter_spajb" />
                                                     <input id="letter_bastr" name="letter_bastr" value="<?php echo h($row['LetterNumber']['bastr']); ?>" type="hidden" class="letter_bastr" />
                                                    <input id="letter_id" name="letter_id" value="<?php echo h($row['LetterNumber']['id']); ?>" type="hidden" class="letter_id" />
                                                    <input id="booking_id" name="booking_id" value="<?php echo h($row['LetterNumber']['booking_id']); ?>" type="hidden" class="booking_id" />
                                                </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab8">
                        <h3 class="heading">Info Daftar Perbaikan Minor</h3>
                            <div class="formSep">
                                <div class="row-fluid">  
                                    <div class="span4">
                                        <label>Nama Perbaikan Minor <span class="f_req">*</span></label>
                                         <input id="id_trans" name="id_trans" class="id_trans" type="hidden" value="<?php echo $this->data['Booking']['id'] ?>" />
                                        <input id="minor_name" name="minor_name" type="text" class="span12 required" />
                                        <div class="minorname"></div>
                                    </div>
                                    <div class="span4">
                                        <label>Jenis Perbaikan Minor <span class="f_req">*</span></label>
                                        <input id="minor_desc" name="minor_desc" type="text" class="span12 required" />
                                        <div class="minordesc"></div>
                                    </div>
                                    <div class="span1">
                                        <label> &nbsp;<span class="f_req"></span></label>
                                        <button id="minorLink" class="minorLink btn btn-info" type="submit">Tambahkan</button>
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading">Info Perbaikan Minor</h3>
                            <div class="formSep">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <table id="tablesminor" class="table table-bordered table-striped table_vam">
                                            <thead>
                                                <tr>
                                                    <th>Nama Perbaikan Minor</th>
                                                    <th>Jenis Perbaikan Minor</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($info_minor as $row): ?>
                                                    <tr>
                                                        <td><?php echo h($row['MinorAddition']['minor_name']); ?>&nbsp;</td>
                                                        <td><?php echo h($row['MinorAddition']['minor_description']); ?>&nbsp;</td>
                                                        <td>
                                                        <a data-toggle="modal" data-backdrop="static" href="#EditMinor" onClick="editMinor($(this))" class="label ttip_b" title="Edit Perbaikan Minor">Edit</a>
                                                        <a data-toggle="modal" data-backdrop="static" href="#HapusMinor" onClick="deleteMinor($(this))" class="label ttip_b" title="Hapus Perbaikan">Hapus</a>
                                                        </td>
                                                          <input id="minor_name" name="minor_name" value="<?php echo h($row['MinorAddition']['minor_name']); ?>" type="hidden" class="minor_name" />
                                                           <input id="minor_desc" name="minor_desc" value="<?php echo h($row['MinorAddition']['minor_description']); ?>" type="hidden" class="minor_desc" />
                                                        
                                                    <input id="minor_id" name="minor_id" value="<?php echo h($row['MinorAddition']['id']); ?>" type="hidden" class="minor_id" />
                                                    <input id="booking_id" name="booking_id" value="<?php echo h($row['MinorAddition']['booking_id']); ?>" type="hidden" class="booking_id" />
                                                    </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>  
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="modal hide fade" id="EditBank">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit Bank</h3>
            </div>
            <div class="modal-body">
                <div class="editable_bank"></div>
            </div>
        </div>

         <div class="modal hide fade" id="EditPPJB">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit PPJB</h3>
            </div>
            <div class="modal-body">
                <div class="editable_ppjb"></div>
            </div>
        </div>

         <div class="modal hide fade" id="EditSPR">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit Rencana Pembayaran (SPR)</h3>
            </div>
            <div class="modal-body">
                <div class="editable_jurnal"></div>
            </div>
        </div>


        <div class="modal hide fade" id="EditSpec">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit Spesifikasi Teknis</h3>
            </div>
            <div class="modal-body">
                <div class="editable_spec"></div>
            </div>
        </div>


        <div class="modal hide fade" id="EditMaterial">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit Penambahan/Perubahan Spesifikasi</h3>
            </div>
            <div class="modal-body">
                <div class="editable_material"></div>
            </div>
        </div>

        <div class="modal hide fade" id="EditMinor">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit Perbaikan Spesifikasi</h3>
            </div>
            <div class="modal-body">
                <div class="editable_minor"></div>
            </div>
        </div>

        <div class="modal hide fade" id="EditLetter">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Edit Pengaturan Surat</h3>
            </div>
            <div class="modal-body">
                <div class="editable_letter"></div>
            </div>
        </div>

        <div class="modal hide fade" id="HapusBank">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus Bank</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_bank"></div>
            </div>
        </div>

        <div class="modal hide fade" id="HapusPPJB">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus PPJB</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_ppjb"></div>
            </div>
        </div>

         <div class="modal hide fade" id="HapusSPR">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus Rencana Pembayaran (SPR)</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_spr"></div>
            </div>
        </div>

        <div class="modal hide fade" id="HapusSpec">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus Spesifikasi Teknis</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_unit"></div>
            </div>
        </div>

        <div class="modal hide fade" id="HapusMaterial">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus Penambahan/Perubahan Spesifikasi</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_material"></div>
            </div>
        </div>

        <div class="modal hide fade" id="HapusMinor">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus Perbaikan Minor</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_minor"></div>
            </div>
        </div>

         <div class="modal hide fade" id="HapusLetter">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Hapus Pengaturan Surat</h3>
            </div>
            <div class="modal-body">
                 <div class="deletable_letter"></div>
            </div>
        </div>




         
    
    <?php
	echo $this->Html->script('specific_page/bookings/form_jurnal');
	echo $this->Html->script('specific_page/bookings/form_bank');
    echo $this->Html->script('specific_page/bookings/form_ppjb');
    echo $this->Html->script('specific_page/bookings/form_unitspecification');
    echo $this->Html->script('specific_page/bookings/form_changespecification');
    echo $this->Html->script('specific_page/bookings/form_minoraddition');
    echo $this->Html->script('specific_page/bookings/form_letter');
    
?>   
    <script type="text/javascript">
    
        var baseUrl = "<?php echo Router::url('/', true) ?>";
    
        
            //position the popup at the center of the page
        function positionPopup(){
            if(!$("#overlay_form").is(':visible')){
                return;
            }
            $("#overlay_form").css({
                left: ($(window).width() - $('#overlay_form').width()) / 2,
                top: ($(window).width() - $('#overlay_form').width()) / 7,
                position:'absolute'
            });
        }
        
        function positionPopupDel(){

            $("#overlay_form_del").css({
                left: ($(window).width() - $('#overlay_form_del').width()) / 2,
                top: ($(window).width() - $('#overlay_form_del').width()) / 7,
                position:'absolute'
            });
   }
   
   
 function formatCurrency(num) {
    var p = parseFloat(num).toFixed(2).split(".");
    return "Rp. " + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "") + "." + p[1];
}
   

        //maintain the popup at center of the page when browser resized
        $(window).bind('resize',positionPopup);
    
//        Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
//            var n = this,
//            decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
//            decSeparator = decSeparator == undefined ? "." : decSeparator,
//            thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
//            sign = n < 0 ? "-" : "",
//            i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
//            j = (j = i.length) > 3 ? j % 3 : 0;
//        return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
//};

    Date.prototype.formatDate = function(date) {
        var m_names = new Array("January", "February", "March", 
                    "April", "May", "June", "July", "August", "September", 
                    "October", "November", "December");

        var d = date;
        var curr_date = d.getDate();
        var curr_month = d.getMonth();
        var curr_year = d.getFullYear();
        return curr_date + "-" + m_names[curr_month] + "-" + curr_year;

    }
   
    </script>
    
    <style>
        
#overlay_form_bank{
position: absolute;
border: 5px solid gray;
padding: 10px;
background: white;
width: 750px;
height: 250px;
}
#overlay_form_ppjb{
position: absolute;
border: 5px solid gray;
padding: 10px;
background: white;
width: 1100px;
height: 350px;
}
#overlay_form_del{
position: absolute;
border: 5px solid gray;
padding: 10px;
background: white;
width: 340px;
height: 150px;
}
#pop{
display: block;
border: 1px solid gray;
width: 65px;
text-align: center;
padding: 6px;
border-radius: 5px;
text-decoration: none;
margin: 0 auto;
}

        </style>



