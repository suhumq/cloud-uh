<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Paket Perjalanan</h3>
    <div align="right">
      <?php echo $this->Html->link(__('Tambah Perjalanan Baru', true), array('controller' => 'Packages', 'action' => 'add'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_projects">
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Program</th>
                    <th>Quad</th>
                    <th>Triple</th>
                    <th>Double</th>
                    <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                    <th>Aksi</th>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($packages as $package): ?>
					<tr>
						<td><?php echo h($package['Package']['name']);  ?>&nbsp;</td>
						<?php if ($package['Package']['name'] != "Non Paket"): ?>
                        <td><?php if ($package['Package']['package_type'] == '1'):
                                    echo 'Umrah';
                                else:
                                    echo 'Haji';
                                endif;
                                ?>&nbsp;<?php echo h($package['Package']['desc_package']);  ?>&nbsp;<?php echo h($package['Package']['day']);  ?> Hari&nbsp;by <?php echo h($package['Plane']['code']);  ?>&nbsp;
                        </td>
                      <?php else:?>
                        <td>Non Paket</td>
                      <?php endif;?>
                      <?php if ($package['Package']['name'] != "Non Paket"): ?>
                        <td><?php echo  $this->Number->currency(($package['Package']['quad_room']),'$. ');  ?>&nbsp;</td>
                        <td><?php echo  $this->Number->currency(($package['Package']['triple_room']),'$. ');  ?>&nbsp;</td>
                        <td><?php echo  $this->Number->currency(($package['Package']['double_room']),'$. ');  ?>&nbsp;</td>
                       <?php else:?>
                        <td>Non Paket</td>
                        <td>Non Paket</td>
                        <td>Non Paket</td>
                      <?php endif;?>
                      <?php if ($package['Package']['name'] != "Non Paket"): ?>
                        <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                        <td>
						    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $package['Package']['id'])); ?>&nbsp;&nbsp;&nbsp;
						    <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $package['Package']['id']), null, __('Anda yakin akan menghapus data : %s ?', $package['Package']['name'])); ?>
						</td>
                        <?php endif; ?>
                        <?php else:?>
                        <td>Non Paket</td>
                      <?php endif;?>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
