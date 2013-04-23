<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Daftar Users</h3>
         <div align="right">
        <?php echo $this->Html->link(__('Tambah User Baru', true), array('controller' => 'Users', 'action' => 'admin_add'),array('class' => 'btn btn-info'));?>
    </div>
        <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_customers">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($users as $user): ?>
					<tr>
						<td><?php echo h($user['User']['username']);  ?>&nbsp;</td>
                        <td><?php echo h($user['User']['full_name']);  ?>&nbsp;</td>
                        <td><?php echo h($user['User']['password']);  ?>&nbsp;</td>
                         <td><?php
                        if (($user['User']['role'])  == '1'):
                            echo "Admin";
                        elseif (($user['User']['role'])  == '2'):
                            echo "Marketing";
                        else:
                            echo "Customer";
                        endif;
                         ?>&nbsp;</td>
						<td>
						    <?php echo $this->Html->link(__(''), array('action' => 'admin_edit', $user['User']['id']),array('class' => 'icon-pencil')); ?>&nbsp;&nbsp;&nbsp;
						    <?php echo $this->Form->postLink(__(''), array('action' => 'admin_delete', $user['User']['id']),array('class' => 'icon-trash'), null, __('Anda yakin akan menghapus data # %s?', $user['User']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
