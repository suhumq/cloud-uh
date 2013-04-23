<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Group </h3>
    <div align="right">
      <?php echo $this->Html->link(__('Tambah Grup Baru', true), array('controller' => 'GroupBookings', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_projects">
            <thead>
                <tr>
                    <th>Nama Group</th>
                    <th>Keterangan</th>
                    <th>Tanggal Dibuat</th>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    <th>Aksi</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($groupbookings as $gr): ?>
					<tr>
						<td><?php echo h($gr['GroupBooking']['name']);  ?>&nbsp;</td>
						<td><?php echo h($gr['GroupBooking']['desc_group']);  ?>&nbsp;</td>
                        <td><?php echo $this->Time->format( 'd M Y',$gr['GroupBooking']['created']);?>&nbsp;</td>
                        <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    	<td>
						    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gr['GroupBooking']['id'])); ?>&nbsp;&nbsp;&nbsp;
						    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $gr['GroupBooking']['id']), null, __('Anda yakin akan menghapus data : %s ?', $gr['GroupBooking']['name'])); ?>
						</td>
                        <?php endif; ?>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
