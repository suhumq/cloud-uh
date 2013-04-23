<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Maskapai </h3>
    <div align="right">
      <?php echo $this->Html->link(__('Tambah Maskapai Baru', true), array('controller' => 'Planes', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_projects">
            <thead>
                <tr>
                    <th>Nama Maskapai</th>
                    <th>Kode Maskapai</th>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    <th>Aksi</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($planes as $plane): ?>
					<tr>
						<td><?php echo h($plane['Plane']['name']);  ?>&nbsp;</td>
						<td><?php echo h($plane['Plane']['code']);  ?>&nbsp;</td>
                        <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    	<td>
						    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $plane['Plane']['id'])); ?>&nbsp;&nbsp;&nbsp;
						    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $plane['Plane']['id']), null, __('Anda yakin akan menghapus data : %s ?', $plane['Plane']['name'])); ?>
						</td>
                        <?php endif; ?>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
