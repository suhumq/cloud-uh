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
			            	<?php foreach ($draft_data as $row): ?>
			            		<tr>
								   <td><?php echo h($row['DraftOprUnit']['no_transaction']); ?>&nbsp;</td>
			                       <td><?php echo $this->Time->format('d-M-Y',$row['DraftOprUnit']['trans_date']);?> &nbsp;</td>
			                       <td><?php echo $this->Number->currency(($row['DraftOprUnit']['amount']),'RP'); ?>&nbsp;</td>
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
			                    		<b><?php echo $this->Number->currency(($total_draft[0][0]['SUM(amount)']), 'RP'); ?></b>
			                    	</td>
			                    </tr>
			            </tbody>
			        </table>  
				</div>
			</div>
		</div>
</div>
<div class="span12">
	<h3 class="heading">Info <b>REAL COST</b> Operasional Unit</h3>
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
								   <td><?php echo h($row['Jurnal']['no_transaction']); ?>&nbsp;</td>
			                       <td><?php echo $this->Time->format('d-M-Y',$row['Jurnal']['trans_date']);?> &nbsp;</td>
			                       <td><?php echo $this->Number->currency(($row['Jurnal']['amount']),'RP'); ?>&nbsp;</td>
			                       <td><?php echo h($row['Jurnal']['description']); ?>&nbsp;</td>
			                       <td>
					                <?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['Jurnal']['id']),array('class' => 'icon-print'), null, __('Anda yakin akan menghapus data # %s?', $row['Jurnal']['id'])); ?>&nbsp;&nbsp;&nbsp;
					                <?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['Jurnal']['id']),array('class' => 'icon-pencil'), null, __('Anda yakin akan menghapus data # %s?', $row['Jurnal']['id'])); ?>&nbsp;&nbsp;&nbsp;
									<?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['Jurnal']['id']),array('class' => 'icon-trash'), null, __('Anda yakin akan menghapus data # %s?', $row['Jurnal']['id'])); ?>
 			                       </td>
			                    </tr>
			                <?php endforeach; ?>
			                	<tr>
			                    	<td colspan="2">
			                    		<b>Jumlah</b>
			                    	</td>
			                    	<td colspan="3">
			                    		<b><?php echo $this->Number->currency(($total_real[0][0]['SUM(amount)']),'RP'); ?></b>
			                    	</td>
			                    </tr>
			            </tbody>
			        </table>  
				</div>
		</div>

	<h3 class="heading">Info <b>INCOME COST</b> Unit</h3>
		<div class="formSep">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered table-striped table_vam">
			            <thead>
			                <tr>
			                    <th>No. Transaksi</th>
			                    <th>Tanggal</th>
			                    <th>Jumlah</th>
			                    <th>Keterangan</th>
			                    <th>Aksi</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php foreach ($incomes as $row): ?>
			            		<tr>
								   <td><?php echo h($row['jurnals']['no_transaction']); ?>&nbsp;</td>
			                       <td><?php echo $this->Time->format('d-M-Y',$row['jurnals']['trans_date']);?> &nbsp;</td>
			                       <td><?php echo $this->Number->currency(($row['jurnals']['amount']),'RP'); ?>&nbsp;</td>
			                       <td><?php echo h($row['jurnals']['description']); ?>&nbsp;</td>
			                       <td>
					                <?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['jurnals']['id']),array('class' => 'icon-print'), null, __('Anda yakin akan menghapus data # %s?', $row['jurnals']['id'])); ?>&nbsp;&nbsp;&nbsp;
					                <?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['jurnals']['id']),array('class' => 'icon-pencil'), null, __('Anda yakin akan menghapus data # %s?', $row['jurnals']['id'])); ?>&nbsp;&nbsp;&nbsp;
									<?php echo $this->Form->postLink(__(''), array('action' => 'deleteJurnal', $row['jurnals']['id']),array('class' => 'icon-trash'), null, __('Anda yakin akan menghapus data # %s?', $row['jurnals']['id'])); ?>
 			                       </td>
			                    </tr>
			                <?php endforeach; ?>
			                	<tr>
			                    	<td colspan="2">
			                    		<b>Jumlah</b>
			                    	</td>
			                    	<td colspan="3">
			                    		<b><?php echo $this->Number->currency(($total_income[0][0]['SUM(amount)']),'RP'); ?></b>
			                    	</td>
			                    </tr>
			            </tbody>
			        </table>  
				</div>
		</div>
</div>
