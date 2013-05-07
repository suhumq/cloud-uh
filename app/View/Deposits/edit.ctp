<h3 class="heading">Edit Transaksi Deposit (Pemasukan diluar Paket)</h3>
<div class="row-fluid">

    <div class="span4">
        <?php echo $this->Form->create('Jurnal', array('class' => 'form_validation_ttip'));?>
        <div class="row-fluid">
            <div class="span12">
                <?php
                    $sizes = array('1' => 'Rp', '2' => '$');
                    echo $this->Form->input('type_currency', array('label' => '', 'options' => $sizes, 'class' => 'chzn_project'));
                 ?>
                <?php echo $this->Form->input('cashflow_id', array('label' => '','type' => 'select', 'class' => 'chzn_unit', 'id'=>'umrah_cashflow')); ?>
                 <?php echo $this->Form->input('type_trans', array('label' => '','type' => 'hidden', 'value' => '3')); ?>
                                            
                <br/><div class="input-prepend input-append input-price">
                <span class="add-on">$</span>
                 <?php echo $this->Form->text('amount', array('class' => 'span12 field-price required currency','placeholder' => 'Amount')); ?>
                <span class="add-on coma">.00</span>
                 <span class="add-on">Rp.</span>
                    <?php echo $this->Form->text('kurs', array('class' => 'span12 field-price required currency','placeholder' => 'Kurs')); ?>
               <span class="add-on coma">.00</span>
                <div class="umrahamount"></div>
            </div>
             <?php echo $this->Form->text('date_trans', array('label' => '','class' => 'span5 required','placeholder'=>'Tanggal Pembayaran','id'=>'umrah_datetrans')); ?>
             <?php echo $this->Form->text('desc_payment', array('label' => '','class' => 'span12 required','placeholder'=>'Keterangan Pembayaran','id'=>'umrah_descpayment')); ?>
            </div>
        </div>
          <div class="span3">
            <label> &nbsp;<span class="f_req"></span></label>
            <button id="umrahLink" class="umrahLink btn btn-info" type="submit">Simpan</button>
        </div>
    </div>
</div>