<div class="span12">
	<h3 class="heading">Info Project</h3>
	 	<div class="formSep">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered table-striped table_vam">
			            <thead>
			                <tr>
			                    <th>Info Project</th>
			                </tr>
			            </thead>
			            <tbody>
			            		<tr>
								   <!-- <td><?php echo h($project['Project']['name']); ?>&nbsp;</td> -->
								    <td><?php echo h($this->data['Project']['name']); ?>&nbsp;</td>
								   
			                    </tr>
			            </tbody>
			        </table>  
					</div>
			</div>
		</div>
</div>

<div class="span12">
	<h3 class="heading">Tambah <b>REAL COST</b> Operasional Project</h3>
	<?php  echo $this->Form->create('OperationalProject', array('action' => 'addJurnalOprProject', 'class'=>'form_validation_ttip')); ?>
		<div class="formSep">
			<div class="row-fluid">  
					<?php echo $this->Form->input('id',array('type' => 'hidden', 'value' => $this->data['OperationalProject']['id'])); ?>
					<?php echo $this->Form->input('account_credit', array('label' => '','type' => 'hidden', 'value' => 'Kas','class' => 'span12')); ?>
					<?php echo $this->Form->input('no_transaction', array('label' => '','type' => 'hidden', 'class' => 'span12 required',  'readonly' =>'true', 'minlength' => '3', 'value' => 'ROP2013' . (string)$invoice[0][0]['MAX(id)']  )); ?>
					<?php echo $this->Form->input('project_id', array('label' => '','type' => 'hidden', 'class' => 'span12' )); ?>
				<div class="span2">
					<label>Tanggal <span class="f_req">*</span></label>
					<?php echo $this->Form->input('trans_date', array('label' => '','type' => 'text', 'class' => 'span12 required', 'minlength' => '3', 'id'=>'date_neraca_2')); ?>
				</div>
				<div class="span2">
					<label>Jumlah <span class="f_req">*</span></label>
					<div class="input-prepend input-append input-price">
						<span class="add-on">Rp.</span>
					<?php echo $this->Form->input('amount', array('label' => '','type' => 'text', 'class' => 'field-price required currency', 'minlength' => '3')); ?>
					<span class="add-on coma">.00</span>
					</div>
				</div>
				<div class="span3">
						<?php echo $this->Form->input('cashflow_id', array('label' => 'CashFlow','type' => 'select', 'class' => 'chzn_cashflow')); ?>
					</div>
				<div class="span3">
					<label>Keterangan <span class="f_req">*</span></label>
					<?php echo $this->Form->input('description', array('label' => '','type' => 'text', 'class' => 'span12 required', 'minlength' => '3')); ?>
				</div>
				<div class="span1">
					<label> &nbsp;<span class="f_req"></span></label>
				<button class="btn btn-inverse" type="submit">Tambahkan</button>
				
				<!-- <button class="btn btn-inverse" type="submit">Tambah Transaksi</button> -->
			</div>
			</div>
		</div>
</div>

<div class="span12">
	<h3 class="heading">Info <b>REAL COST</b> Operasional Project</h3>
		<div class="formSep">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered table-striped table_vam">
			            <thead>
			                <tr>
			                    <th>No. Operasional</th>
			                    <th>Tanggal</th>
			                    <th>Jumlah</th>
			                    <th>CashFlow</th>
			                    <th>Keterangan</th>
			                    <th>Aksi</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php foreach ($jurnal_data as $row): ?>
			            		<tr>
								   <td><?php echo h($row['Jurnal']['no_transaction']); ?>&nbsp;</td>
			                       <td><?php echo $this->Time->format('d M Y',$row['Jurnal']['trans_date']);?> &nbsp;</td>
			                       <td><?php echo $this->Number->currency(($row['Jurnal']['amount']), 'RP'); ?>&nbsp;</td>
			                       <td><?php echo h($row['Cashflow']['name']); ?>&nbsp;</td>
			                       <td><?php echo h($row['Jurnal']['description']); ?>&nbsp;</td>
			                       <td>
					               <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'deleteJurnal', $row['Jurnal']['id']), null, __('Anda yakin akan menghapus data # %s?', $row['Jurnal']['id'])); ?>
 			                       </td>
			                    </tr>
			                <?php endforeach; ?>
			                	<tr>
			                    	<td colspan="2">
			                    		<b>Jumlah</b>
			                    	</td>
			                    	<td colspan="4">
			                    		<b><?php echo $this->Number->currency(($total_real[0][0]['SUM(amount)']), 'RP'); ?></b>
			                    	</td>
			                    </tr>
			            </tbody>
			        </table>  
				</div>
			</div>
		</div>