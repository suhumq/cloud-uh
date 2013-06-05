<h3 class="heading">Transaksi Operasional</h3>
<div class="row-fluid">

    <div class="span10">
        <?php echo $this->Form->create('Jurnal', array('class' => 'form_validation_ttip'));?>
        <div class="row-fluid">
            <div class="span5">
                 <?php echo $this->Form->text('date_trans', array('label' => '','class' => 'span5 required','placeholder'=>'Tanggal Pembayaran','id'=>'umrah_datetrans')); ?><br/>
                <?php
                    $sizes = array('1' => 'Rp', '2' => '$');
                    echo $this->Form->input('type_currency', array('label' => '', 'options' => $sizes, 'class' => 'chzn_project'));
                 ?>
                 <?php echo $this->Form->input('package_id', array('label' => '','type' => 'select', 'class' => 'chzn_sale')); ?>
            </div>
            <div class="span3">

                 <?php echo $this->Form->input('cashflow_id', array('label' => '','type' => 'select', 'class' => 'chzn_unit', 'id'=>'umrah_cashflow')); ?>
                 <?php echo $this->Form->input('backcashflow_id', array('label' => '', 'type' => 'select', 'class' => 'chzn_project','id'=>'umrah_backcashflow')); ?>
                  <?php echo $this->Form->input('type_trans', array('label' => '','type' => 'hidden', 'value' => '2')); ?>

             </div>

             <div class="span5">
             <br/>
                <div class="input-prepend input-append input-price">
                <span class="add-on">-</span>
                 <?php echo $this->Form->text('amount', array('class' => 'span12 field-price required currency','placeholder' => 'Amount')); ?>
                <span class="add-on coma">.00</span>
                 <span class="add-on">Rp.</span>
                    <?php echo $this->Form->text('kurs', array('class' => 'span12 field-price required currency','placeholder' => 'Kurs')); ?>
               <span class="add-on coma">.00</span>
                <div class="umrahamount"></div>
                </div>

             <?php echo $this->Form->text('desc_payment', array('label' => '','class' => 'span12 required','placeholder'=>'Keterangan Pembayaran','id'=>'umrah_descpayment')); ?>
            </div>
        </div>
          <div class="span10" align="right">

            <label> &nbsp;<span class="f_req"></span></label>
            <button id="umrahLink" class="umrahLink btn btn-info" type="submit">Simpan</button>
        </div>

    </div>
</div>
<hr/>


<br/>
<br/>
        <table class="table table-bordered table-striped table_vam" id="dt_units">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>Tipe</th>
                    <th>Nama Operasional</th>
                    <th>K / D</th>
                    <th>Kurs</th>
                    <th>Kurs Value</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($jurnals as $ju): ?>
                    <tr>
                         <td width="10"><?php echo h($ju['Jurnal']['id']);  ?>&nbsp;</td>
                         <td width="150"><?php echo $this->Time->format( 'd M Y',$ju['Jurnal']['date_trans']);?>&nbsp;</td>
                         <td width="150"><?php
                         if ($ju['Jurnal']['package_id'] != '0'):
                         echo h($ju['Package']['name']);
                         else:
                            echo 'Non Paket';
                            endif;
                         ?>&nbsp;</td>

                         <td width="280"><?php echo h($ju['Jurnal']['desc_payment']);  ?>&nbsp;</td>
                         <td width="200">[<?php echo h($ju['Cashflow']['code']);   ?>] <?php echo h($ju['Cashflow']['name']);  ?>&nbsp;/ [<?php echo h($ju['Backcashflow']['code']);   ?>] <?php echo h($ju['Backcashflow']['name']);   ?></td>
                         <td  width="40"><?php
                         if ($ju['Jurnal']['type_currency'] == '1'):
                            echo 'Rp';
                         else:
                            echo '$';
                         endif;
                           ?>&nbsp;</td>
                         <td width="120"><?php echo  $this->Number->currency(($ju['Jurnal']['kurs']),'Rp. ');  ?>&nbsp;</td>
                         <td width="150">
                        <?php
                            if ($ju['Jurnal']['type_currency'] == '1'):
                                echo  $this->Number->currency(($ju['Jurnal']['amount']),'Rp. ');
                            else:
                                echo  $this->Number->currency(($ju['Jurnal']['amount']),'$. ');
                            endif;
                         ?>&nbsp;
                        </td>
                         <td  width="120">
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ju['Jurnal']['id'])); ?> |
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $ju['Jurnal']['id']), null, __('Anda yakin akan menghapus data : %s ?', $ju['Jurnal']['desc_payment'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>