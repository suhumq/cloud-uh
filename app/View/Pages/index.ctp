<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Monitoring</h3>
        <table class="table table-bordered table-striped table_vam" id="dt_monitorings">
            <thead>
                <tr>
                    <th>No. Booking</th>
                    <th>Tanggal</th>
                    <th>Nama Customer</th>
                    <th>Info Unit</th>
                    <th>Type Transaksi</th>
                    <th>Status Transaksi</th>
                    
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($bookings as $booking): ?>
					<tr>
						<td><?php echo h($booking['Booking']['no_booking']);  ?>&nbsp;</td>
                        <td><?php echo $this->Time->format( 'd M Y',$booking['Booking']['created']);?>&nbsp;</td>
                        <td><?php echo h($booking['Customer']['name']);  ?>&nbsp;</td>
						<td><?php echo h($booking['Unit']['name']); ?> - <?php echo h($booking['Unit']['type_unit']);  ?>&nbsp;</td>
                        <td><?php
                        if ($booking['Booking']['trans_type'] == '1'):
                            echo "KPR";
                        elseif ($booking['Booking']['trans_type'] == '2'):
                            echo "Cash Bertahap";
                        else:
                            echo "Cash";
                        endif;
                         ?>&nbsp;</td>
                         <td><?php
                        if ($booking['Booking']['trans_status'] == '1'):
                            echo "Pending";
                        else:
                            echo "Lunas";
                        endif;
                         ?>&nbsp;</td>
                   </tr>
				<?php endforeach; ?>
            </tbody>
        </table>  
    </div>
</div>  
