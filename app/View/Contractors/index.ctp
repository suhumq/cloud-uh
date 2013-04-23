<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data SPK</h3>
         <div align="right">
      <?php echo $this->Html->link(__('Tambah SPK Baru', true), array('controller' => 'Contractors', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_contractors">
            <thead>
                <tr>
                    <th>Nomor SPK</th>
                    <th>Nama Project</th>
                    <th>Mulai Project</th>
                    <th>Selesai Project</th>
                    <th>Pemilik Project</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($contractors as $contractor): ?>
					<tr>
						<td><?php echo h($contractor['Contractor']['spk_number_1']);  ?>&nbsp;</td>
                        <td><?php echo h($contractor['Project']['name']);  ?>&nbsp;</td>
                        <td><?php echo h($contractor['Project']['start_project']);  ?>&nbsp;</td>
						<td><?php echo h($contractor['Project']['end_project']);  ?>&nbsp;</td>
                        <td><?php echo h($contractor['Project']['owner']);  ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link(__('SPK'), array('action' => 'spk', $contractor['Contractor']['id'])); ?>&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Html->link(__('Rincian SPK'), array('action' => 'add_spk', $contractor['Contractor']['id'])); ?>&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contractor['Contractor']['id'])); ?>&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $contractor['Contractor']['id']), null, __('Anda yakin akan menghapus data : %s ?', $contractor['Contractor']['spk_number_1'])); ?>
						</td>
                        
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
