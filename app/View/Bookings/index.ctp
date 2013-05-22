<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Data Transaksi Paket</h3>
         <div align="right">
      <?php echo $this->Html->link(__('Tambah Umrah Baru', true), array('controller' => 'Bookings', 'action' => 'add_umrah'),array('class' => 'btn btn-info'));?>
      <?php echo $this->Html->link(__('Tambah Haji Baru', true), array('controller' => 'Bookings', 'action' => 'add_haji'),array('class' => 'btn btn-info'));?>
    </div>
    <br/>
        <table class="table table-bordered table-striped table_vam" id="dt_customers">
            <thead>
                <tr>
                    <th>Nota</th>
                    <th>Tgl Booking</th>
                    <th>Porsi Haji</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Paket</th>
                    <th>Tipe Paket</th>
                    <th>Nama Group</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($booking_umrahs as $bu): ?>
                    <tr>
                        <td><?php echo h($bu['Booking']['no_booking']);  ?></td>
                        <td><?php echo $this->Time->format( 'd M Y',$bu['Booking']['date_booking']);?>&nbsp;</td>
                        <td>
                             <?php
                                if ($bu['Package']['package_type'] == '1'):
                                    echo '-';
                                else:
                                    echo h($bu['Booking']['porsi_haji']);
                                endif;
                            ?>
                        </td>
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
                        <td><?php echo h($bu['GroupBooking']['name']);  ?>&nbsp;</td>
                        <td>
                        <?php
                        if ($bu['Package']['package_type'] == '1'):
                        if ($bu['Booking']['status_trans'] == '1'):
                            echo $this->Html->link(__('Pending'), array('action' => 'transaction_umrah', $bu['Booking']['id']),array('class' => ''));
                        else:
                              echo $this->Html->link(__('Lunas'), array('action' => 'transaction_umrah', $bu['Booking']['id']),array('class' => ''));
                        endif;
                        else:
                        if ($bu['Booking']['status_trans'] == '1'):
                            echo $this->Html->link(__('Pending'), array('action' => 'transaction_haji', $bu['Booking']['id']),array('class' => ''));
                        else:
                              echo $this->Html->link(__('Lunas'), array('action' => 'transaction_haji', $bu['Booking']['id']),array('class' => ''));
                        endif;

                        endif;
                         ?>&nbsp;|
                          <?php  echo $this->Html->link(__('Handling'), array('action' => 'transaction_handling', $bu['Booking']['id']),array('class' => ''))

                         ?>&nbsp;

                        </td>

                        <td>
                            <?php
                                if ($bu['Package']['package_type'] == '1'):
                                    echo $this->Html->link(__('Edit'), array('action' => 'edit_umrah', $bu['Booking']['id']));
                                else:
                                    echo $this->Html->link(__('Edit'), array('action' => 'edit_haji', $bu['Booking']['id']));
                                endif;
                            ?>
                            <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'delete', $bu['Booking']['id']), null, __('Anda yakin akan menghapus data : %s ?', $bu['Customer']['name'])); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
