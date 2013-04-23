<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Daftar Operational Projects</h3>
        <table class="table table-bordered table-striped table_vam" id="dt_bookings">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($operationalprojects as $oprproject): ?>
					<tr>
						<td><?php echo h($oprproject['Project']['name']);  ?>&nbsp;</td>
                        <td><?php echo $this->Time->format('d M Y',$oprproject['Project']['created']);?>&nbsp;</td>
                        <td>
						    <?php echo $this->Html->link(__('Draft Cost'), array('action' => 'draft_operational_project', $oprproject['OperationalProject']['id']),array('class' => '')); ?> | 
                            <?php echo $this->Html->link(__('Real Cost'), array('action' => 'operational_project', $oprproject['OperationalProject']['id']),array('class' => '')); ?> | 
                            <?php echo $this->Html->link(__('Real & Draft Cost'), array('action' => 'compare', $oprproject['OperationalProject']['id']),array('class' => '')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $oprproject['OperationalProject']['id']),null, __('Anda yakin akan menghapus data # %s?', $oprproject['OperationalProject']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
