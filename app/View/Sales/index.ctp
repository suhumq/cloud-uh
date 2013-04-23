<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Marketing</h3>
         <div align="right">
      <?php echo $this->Html->link(__('Tambah Marketing Baru', true), array('controller' => 'Sales', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_customers">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    <th>Aksi</th>
                <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($sales as $sale): ?>
					<tr>
						<td><?php echo h($sale['Sale']['name']);  ?>&nbsp;</td>
                        <td><?php echo h($sale['Sale']['address']);  ?>&nbsp;</td>
                        <td><?php echo h($sale['Sale']['phone']);  ?>&nbsp;</td>
                        <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                        <td>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sale['Sale']['id'])); ?>&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $sale['Sale']['id']), null, __('Anda yakin akan menghapus data : %s ?', $sale['Sale']['name'])); ?>
						</td>
                        <?php endif; ?>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
