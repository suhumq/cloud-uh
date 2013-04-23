<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Unit</h3>
         <div align="right">
         <?php echo $this->Html->link(__('Tambah Unit Baru', true), array('controller' => 'Units', 'action' => 'add'),array('class' => 'btn btn-info'));?>
        </div>
        <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_units">
            <thead>
                <tr>
                    <th>Nama Project</th>
                    <th>Nama Unit</th>
                    <th>Tipe Rumah</th>
                    <th>Nomor Kavling</th>
                    <th>Harga Brosur</th>
                    <th>Harga Jual</th>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    
                    <th>Aksi</th>
                <?php endif;?>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($units as $unit): ?>
					<tr>
                        <td><?php echo h($unit['Project']['name']);  ?>&nbsp;</td>
						<td><?php echo h($unit['Unit']['name']);  ?>&nbsp;</td>
                        <td><?php echo h($unit['Unit']['lb']);  ?> / <?php echo h($unit['Unit']['lt']);  ?> &nbsp;</td>
						<td><?php echo h($unit['Unit']['block_unit']);  ?>&nbsp;</td>
                        <td><?php echo $this->Number->currency(($unit['Unit']['price_brochure']), 'RP');   ?>&nbsp;</td>
                        <td><?php echo $this->Number->currency(($unit['Unit']['price_sell']), 'RP');   ?>&nbsp;</td>
                        <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    
                        <td>
                             <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unit['Unit']['id'])); ?>&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $unit['Unit']['id']), null, __('Anda yakin akan menghapus data : %s ?', $unit['Unit']['name'])); ?>

						</td>
                    <?php endif; ?>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
