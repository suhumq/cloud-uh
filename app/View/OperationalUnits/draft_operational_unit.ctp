<div class="span12">
	<h3 class="heading">Info Unit</h3>
	 	<div class="formSep">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered table-striped table_vam">
			            <thead>
			                <tr>
			                    <th>Info Unit</th>
			                </tr>
			            </thead>
			            <tbody>
			            		<tr>
								   <td><?php echo h($unit['Unit']['name']); ?>&nbsp;</td>
			                    </tr>
			            </tbody>
			        </table>  
					</div>
			</div>
		</div>
</div>

<div class="span12">
	<h3 class="heading">Tambah <b>DRAFT COST</b> Operasional Unit</h3>
	<?php  echo $this->Form->create('OperationalUnit', array('action' => 'addDraftOprUnit', 'class'=>'form_validation_ttip')); ?>
		<div class="formSep">
			<div class="row-fluid">  
				<div class="span2">
					<label>Nomor Operasional <span class="f_req">*</span></label>
					<?php echo $this->Form->input('id',array('type' => 'hidden', 'value' => $this->data['OperationalUnit']['id'])); ?>
					<?php echo $this->Form->input('no_transaction', array('label' => '','type' => 'text', 'class' => 'span12 required', 'readonly' => 'true' ,'minlength' => '3', 'value' => 'DOU2013' . (string)$invoice[0][0]['MAX(id)']   )); ?>
				</div>
				<div class="span2">
					<label>Tanggal <span class="f_req">*</span></label>
					<?php echo $this->Form->input('trans_date', array('label' => '','type' => 'text', 'class' => 'span12 required', 'minlength' => '3', 'id'=>'dp1')); ?>
				</div>
				<div class="span2">
					<label>Jumlah <span class="f_req">*</span></label>
					<div class="input-prepend input-append input-price">
						<span class="add-on">Rp.</span>
					<?php echo $this->Form->input('amount', array('label' => '','type' => 'text', 'class' => 'field-price required number', 'minlength' => '3')); ?>
					<span class="add-on coma">.00</span>
					</div>
				</div>
				<div class="span3">
					<label>Keterangan <span class="f_req">*</span></label>
					<?php echo $this->Form->input('description', array('label' => '','type' => 'text', 'class' => 'span12 required', 'minlength' => '3')); ?>
				</div>
				<div class="span2">
					<label> &nbsp;<span class="f_req"></span></label>
				<button class="btn btn-inverse" type="submit">Tambahkan</button>
				
				<!-- <button class="btn btn-inverse" type="submit">Tambah Transaksi</button> -->
			</div>
			</div>
		</div>
	</form>
</div>

<div class="span12">
	<h3 class="heading">Info <b>DRAFT COST</b> Operasional Unit</h3>
		<div class="formSep">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered table-striped table_vam">
			            <thead>
			                <tr>
			                    <th>No. Operasional</th>
			                    <th>Tanggal</th>
			                    <th>Jumlah</th>
			                    <th>Keterangan</th>
			                    <th>Aksi</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php foreach ($jurnal_data as $row): ?>
			            		<tr>
								   <td><?php echo h($row['DraftOprUnit']['no_transaction']); ?>&nbsp;</td>
			                       <td><?php echo $this->Time->format('d-M-Y',$row['DraftOprUnit']['trans_date']);?> &nbsp;</td>
			                       <td><?php echo $this->Number->currency(($row['DraftOprUnit']['amount']), 'RP'); ?>&nbsp;</td>
			                       <td><?php echo h($row['DraftOprUnit']['description']); ?>&nbsp;</td>
			                       <td>
					                <?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['DraftOprUnit']['id']),array('class' => 'icon-print'), null, __('Anda yakin akan menghapus data # %s?', $row['DraftOprUnit']['id'])); ?>&nbsp;&nbsp;&nbsp;
					                <?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['DraftOprUnit']['id']),array('class' => 'icon-pencil'), null, __('Anda yakin akan menghapus data # %s?', $row['DraftOprUnit']['id'])); ?>&nbsp;&nbsp;&nbsp;
									<?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['DraftOprUnit']['id']),array('class' => 'icon-trash'), null, __('Anda yakin akan menghapus data # %s?', $row['DraftOprUnit']['id'])); ?>
 			                       </td>
			                    </tr>
			                <?php endforeach; ?>
			               		 <tr>
			                    	<td colspan="2">
			                    		<b>Jumlah</b>
			                    	</td>
			                    	<td colspan="3">
			                    		<b><?php echo $this->Number->currency(($totals[0][0]['SUM(amount)']), 'RP'); ?></b>
			                    	</td>
			                    </tr>
			            </tbody>
			        </table>  
				</div>
			</div>
		</div>