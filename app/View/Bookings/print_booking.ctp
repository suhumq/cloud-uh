<br/>
<br/>
<br/>
<br/>
<div id="page-wrap">
<h3 class="heading">Info Jama'ah dan Unit yang dipesan</h3>   
<table id="items" border="1">
	<tr>
		<th>No.</th>
                            <th>Tanggal</th>
                            <th>Konsumen</th>
                            <th>Unit</th>
                            <th>Harga Jual</th>
                            <th>Telah Dibayar</th>
                            <th>Sisa Bayar</th>
                            <th>Cara Bayar</th>
                            <th>Status</th>
	</tr>
	 <tr>
                            <td><?php echo h($booking['Booking']['no_booking']); ?>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo $this->Time->format( 'd M Y',$booking['Booking']['created']);?>&nbsp;</td>
                            <td><?php echo h($booking['Customer']['name']); ?>&nbsp;</td>
                            <td><?php echo h($booking['Unit']['name']); ?> - <?php echo h($booking['Unit']['lb']);  ?> / <?php echo h($booking['Unit']['lt']);  ?>
                            </td>
                            <td>
                                <?php echo $this->Number->currency(($booking['Unit']['price_sell'] + $booking['Unit']['charge']), 'RP'); ?>
                            </td>
                            <td><?php echo $this->Number->currency(($sum_payment[0][0]['SUM(amount)']), 'RP'); ?></td>
                            <td><?php
                                echo $this->Number->currency(( ($booking['Unit']['price_sell'] + $booking['Unit']['charge']) -
                                        $sum_payment[0][0]['SUM(amount)']), 'RP');
                                ?>
                            </td>
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
                                ?>&nbsp;
                            </td>
                        </tr>
                </table>  

<br/>
<br/>
<h3 class="heading">Info Spesifikasi Teknis yang Dipesan</h3>
<table id="items" border="1">
                        <tr>
                            <th>Nama Spesifikasi</th>
                            <th>Keterangan</th>
                        </tr>
                    <?php foreach ($unitspecification_data as $row): ?>
                            <tr>
                                <td><?php echo h($row['UnitSpecification']['name']); ?>&nbsp;</td>
                                <td><?php echo h($row['UnitSpecification']['description_specification']); ?>&nbsp;</td>
                            </tr>
                    <?php endforeach; ?>
                </table>  

<br/>
<br/>
<h3 class="heading">Info Cara Pembayaran PPJB</h3>
    <table id="items" border="1">
                    <thead>
                        <tr>
                            <th>Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Tanggal Jatuh Tempo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($draftTransaction_data as $row): ?>
                            <tr>
                                <td><?php echo h($row['DraftTransaction']['description_transdraft']); ?>&nbsp;</td>
                                <td><?php echo $this->Number->currency(($row['DraftTransaction']['price']), 'RP'); ?>&nbsp;</td>
                                <td><?php echo $this->Time->format('d M Y', $row['DraftTransaction']['date_payment']); ?> &nbsp;</td>
                            </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan="1">
                                <b>Jumlah</b>
                            </td>
                            <td colspan="3"> 
                                <b><?php echo $this->Number->currency(($sum_ppjb[0][0]['SUM(price)']), 'RP'); ?></b>
                            </td>
                        </tr>
                    </tbody>
                </table>
<br/>
<br/>
<h3 class="heading">Info Transaksi Pembayaran</h3>
  <table id="items" border="1">
                    <thead>
                        <tr>
                            <th>Nomor Transaksi</th>
                            <th>Cicilan Pembayaran</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($jurnal_data as $row): ?>
                            <tr>
                                <td><?php echo h($row['Jurnal']['no_transaction']); ?>&nbsp;</td>
                                <td><?php echo h($row['Jurnal']['description']); ?>&nbsp;</td>
                                <td><?php echo $this->Time->format('d M Y', $row['Jurnal']['trans_date']); ?> &nbsp;</td>
                                <td><?php echo $this->Number->currency(($row['Jurnal']['amount']), 'RP'); ?>&nbsp;</td>
                            </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan="3">
                                <b>Jumlah</b>
                            </td>
                            <td colspan="3"> 
                                <b><?php echo $this->Number->currency(($sum_payment[0][0]['SUM(amount)']), 'RP'); ?></b>
                            </td>
                        </tr>
                    </tbody>
                </table> 
<br/>
<br/>
 <h3 class="heading">Info Penambahan / Perubahan Spesifikasi</h3>
 <table id="items" border="1">
                    <thead>
                        <tr>
                            <th>Penambahan / Perubahan</th>
                            <th>Harga Material Standard</th>
                            <th>Harga Material Baru</th>
                            <th>Satuan Perubahan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($booking_material as $row): ?>
                            <tr>
                                <td><?php echo h($row['BookingMaterial']['description_material']); ?>&nbsp;</td>
                                <td><?php echo $this->Number->currency(($row['BookingMaterial']['price_standard']), 'RP'); ?>&nbsp;</td>
                                <td><?php echo $this->Number->currency(($row['BookingMaterial']['price_new']), 'RP'); ?>&nbsp;</td>
                                <td><?php echo h($row['BookingMaterial']['qty']); ?>&nbsp;</td>
                                <td><?php echo $this->Number->currency(($row['BookingMaterial']['qty'] * $row['BookingMaterial']['price_new']),'Rp.'); ?>&nbsp;</td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table> 
  <br/>
  <br/>
  <h3 class="heading">Info Bank Pengajuan KPR</h3>
   <table id="items" border="1">
                    <thead>
                        <tr>
                            <th>Nama Bank</th>
                            <th>Alamat Bank</th>
                            <th>Kota</th>
                            <th>Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($bank as $row): ?>
                            <tr>
                                <td><?php echo h($row['Bank']['bank_name']); ?>&nbsp;</td>
                                <td><?php echo h($row['Bank']['bank_address']); ?>&nbsp;</td>
                                <td><?php echo h($row['Bank']['bank_town']); ?>&nbsp;</td>
                                <td>
                                    <?php
                                        if ($row['Bank']['status'] == '1'):
                                            echo "Approved";
                                        elseif ($row['Bank']['status'] == '2'):
                                            echo "Rejected";
                                        else:
                                            echo "Pending";
                                        endif;
                                         ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table> 

                <br/>
                <br/>
                <h3 class="heading">Info Daftar Perbaikan Minor</h3>
                <table id="items" border="1">
                    <thead>
                        <tr>
                            <th>Nama Perbaikan Minor</th>
                            <th>Jenis Perbaikan Minor</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($info_minor as $row): ?>
                            <tr>
                                <td><?php echo h($row['MinorAddition']['minor_name']); ?>&nbsp;</td>
                                <td><?php echo h($row['MinorAddition']['minor_description']); ?>&nbsp;</td>
                             </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table> 
                <br/>
                <br/>
                <br/>
                
            </div>     
