<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Umrah</h3>
         <div align="right">
      <?php echo $this->Html->link(__('Tambah Umrah Baru', true), array('controller' => 'Bookings', 'action' => 'add_umrah'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_customers">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Paket</th>
                    <th>Tipe Paket</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($booking_umrahs as $bu): ?>
                    <tr>
                        <td><?php echo h($bu['Customer']['name']);  ?>&nbsp;</td>
                        <td><?php echo h($bu['Customer']['phone']);  ?>&nbsp;</td>
                        <td><?php echo h($bu['Package']['name']);  ?>&nbsp;</td>
                        <td><?php 
                            if ($bu['Package']['package_type'] == '1'):
                            echo "Umrah";
                        else:
                            echo "Haji";
                        endif;

                          ?>&nbsp;</td>
                        
                        <td><?php
                        if ($bu['Booking']['status_trans'] == '1'):
                            echo "Pending";
                        else:
                            echo "Lunas";
                        endif;
                         ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bu['Customer']['id'])); ?>&nbsp;&nbsp;&nbsp;
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $bu['Customer']['id']), null, __('Anda yakin akan menghapus data : %s ?', $bu['Customer']['name'])); ?>
                        </td>
                      
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
