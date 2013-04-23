<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Daftar Operational Units</h3>
        <table class="table table-bordered table-striped table_vam" id="dt_bookings">
            <thead>
                <tr>
                    <th>Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($operationalunits as $oprunit): ?>
					<tr>
						<td><?php echo h($oprunit['Unit']['name']);  ?>&nbsp;</td>
                        <td>
						    <?php echo $this->Html->link(__('Draft Cost'), array('action' => 'draft_operational_unit', $oprunit['OperationalUnit']['id']),array('class' => '')); ?> | 
                            <?php echo $this->Html->link(__('Real Cost'), array('action' => 'operational_unit', $oprunit['OperationalUnit']['id']),array('class' => '')); ?> | 
                            <?php echo $this->Html->link(__('Real & Draft Cost'), array('action' => 'compare', $oprunit['OperationalUnit']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp;
                            
						    <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $oprunit['OperationalUnit']['id']),array('class' => 'icon-trash'), null, __('Anda yakin akan menghapus data # %s?', $oprunit['OperationalUnit']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
