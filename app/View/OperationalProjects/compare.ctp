<div class="span12">
	<h3 class="heading">Info <b>DRAFT & REAL COST</b> Operasional Project</h3>
		<div class="formSep">
			<div class="row-fluid">
				<div class="span6">
					<h4>DRAFT COST:</h4>
					<table class="table table-bordered table-striped table_vam">
			            <thead>
			                <tr>
			                	<th>CashFlow</th>
			                    <th>Jumlah</th>
			                    <th>Keterangan</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php foreach ($draft_data as $row): ?>
			            		<tr>
			            		   <td><?php echo h($row['Cashflow']['name']); ?>&nbsp;</td>
			                  	   <td><?php echo $this->Number->currency(($row['DraftOprProject']['amount']),'RP'); ?>&nbsp;</td>
			                       <td><?php echo h($row['DraftOprProject']['description']); ?>&nbsp;</td>
			                    </tr>
			                <?php endforeach; ?>
			                	<tr>
			                    	<td>
			                    		<b>Jumlah</b>
			                    	</td>
			                    	<td colspan='2'>
			                    		<b><?php echo $this->Number->currency(($total_draft[0][0]['SUM(amount)']),'RP'); ?></b>
			                    	</td>
			                    </tr>
			            </tbody>
			        </table>  
				</div>
				<div class="span6">
					<h4>REAL COST:</h4>
					<table class="table table-bordered table-striped table_vam">
			            <thead>
			                <tr>
			                    <th>CashFlow</th>
			                    <th>Jumlah</th>
			                    <th>Keterangan</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php foreach ($jurnal_data as $row): ?>
			            		<tr>
							  	   <td><?php echo h($row['Cashflow']['name']); ?>&nbsp;</td>
							  	   <td><?php echo $this->Number->currency(($row['Jurnal']['amount']),'RP'); ?>&nbsp;</td>
			                       <td><?php echo h($row['Jurnal']['description']); ?>&nbsp;</td>
			                    </tr>
			                <?php endforeach; ?>
			                	<tr>
			                    	<td>
			                    		<b>Jumlah</b>
			                    	</td>
			                    	<td colspan="3">
			                    		<b><?php echo $this->Number->currency(($total_real[0][0]['SUM(amount)']), 'RP'); ?></b>
			                    	</td>
			                    </tr>
			            </tbody>
			        </table>  
				</div>
			</div>
		</div>
</div>