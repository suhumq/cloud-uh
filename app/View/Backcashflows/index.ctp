<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Akun Kredit</h3>
    <div align="right">
      <?php echo $this->Html->link(__('Tambah Akun Kredit Baru', true), array('controller' => 'backcashflows', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_projects">
            <thead>
                <tr>
                    <th>Kode Akun</th>
                    <th>Nama Akun</th>
                    <th>Group Akun</th>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    <th>Aksi</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($backcashflows as $cashflow): ?>
					<tr>
						<td><?php echo h($cashflow['Backcashflow']['code']);  ?>&nbsp;</td>
						<td><?php echo h($cashflow['Backcashflow']['name']);  ?>&nbsp;</td>
                        <td><?php echo h($cashflow['Backcashflow']['group']);  ?>&nbsp;</td>
                        <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    	<td>
						    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cashflow['Backcashflow']['id'])); ?>&nbsp;&nbsp;&nbsp;

						</td>
                        <?php endif; ?>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
