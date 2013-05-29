<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Jama'ah</h3>
         <div align="right">
      <?php echo $this->Html->link(__("Tambah Jama'ah Baru", true), array('controller' => 'Customers', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_customers">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($customers as $customer): ?>
					<tr>
						<td width="300"><?php echo h($customer['Customer']['name']);  ?>&nbsp;</td>
                        <td width="400"><?php echo h($customer['Customer']['address']);  ?>&nbsp;</td>
                        <td width="250"><?php echo h($customer['Customer']['phone']);  ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link(__('Print'), array('action' => 'print_cust', $customer['Customer']['id'])); ?>&nbsp;&nbsp;&nbsp;
                             <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id'])); ?>&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $customer['Customer']['id']), null, __('Anda yakin akan menghapus data : %s ?', $customer['Customer']['name'])); ?>
                        </td>

					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
