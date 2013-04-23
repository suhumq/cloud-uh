<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Project  </h3>
    <div align="right">
      <?php echo $this->Html->link(__('Tambah Project Baru', true), array('controller' => 'Projects', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>

        <table class="table table-bordered table-striped table_vam" id="dt_projects">
            <thead>
                <tr>
                    <th>Nama Project</th>
                    <th>Mulai Project</th>
                    <th>Selesai Project</th>
                    <th>Keterangan</th>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    <th>Aksi</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($projects as $project): ?>
					<tr>
						<td><?php echo h($project['Project']['name']);  ?>&nbsp;</td>
						<td><?php echo h($project['Project']['start_project']);  ?>&nbsp;</td>
                        <td><?php echo h($project['Project']['end_project']);  ?>&nbsp;</td>
                        <td><?php echo h($project['Project']['description']);  ?>&nbsp;</td>
                        <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                              
						<td>
						    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $project['Project']['id'])); ?>&nbsp;&nbsp;&nbsp;
						    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $project['Project']['id']), null, __('Anda yakin akan menghapus data : %s ?', $project['Project']['name'])); ?>
						</td>
                        <?php endif; ?>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
