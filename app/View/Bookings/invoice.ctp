<div id="page-wrap">	
	<table id="items">
	<tr>
		<td width="200px">
			PT. Amanah Mulia Wisata<br/>
			Jl. Citarum No.3 Bandung<br/>
			Phone : 022 - 4222015, 4205971
			Fax : 022 - 4222014
		</td>
	</tr>
	</table>
	<h3 class="heading"></h3> 
	<p style="padding-right:425px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Pembayaran</p></div>
<table id="items">
	<tr>
		<td width="50px">
			Nama
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			<?php echo h($booking['Customer']['name']); ?>
		</td>	
		<td width="75px">
			&nbsp;
		</td>	
		<td>
			Nama Paket
		</td>	
		<td width="10px">
			: 
		</td>
		<td>
			<?php echo h($booking['Package']['name']); ?> - <?php if ($booking['Booking']['room_type'] == '1'):
                                echo "Quad";
                                else:
                                    if ($booking['Booking']['room_type'] == '2'):
                                        echo "Triple";
                                    else:
                                        echo "Double";
                                    endif;
                                endif;
                            ?>
		</td>
	</tr>
	<tr>
		<td width="50px">
			Alamat 
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			<?php echo h($booking['Customer']['address']); ?>
		</td>
		<td width="75px">
			&nbsp;
		</td>	
		<td>
			Harga Pemesanan
		</td>	
		<td width="10px">
			: 
		</td>
		<td>
			<?php  echo $this->Number->currency((($booking['Booking']['room_amount'] -$booking['Booking']['room_discount']) ),'$ ');  ?> 
		</td>

	</tr>
</table>
<table  id="items" border="1" width="70%">
            <thead>
                <tr>
                	<th>Tanggal</th>
                    <th>Tipe Kurs</th>
                    <th>Kurs</th>
                    <th>Amount</th>
                    <th>Keterangan</th>
                 </tr>
            </thead>
            <tbody>
                <?php  $jumlah = 0;
                $jumlah2 = 0;
                $todollar = 0;
                                ?>
              <?php foreach ($info_umrah as $row): ?>
                <tr>
                	<td><?php echo $this->Time->format( 'd M Y',$row['Jurnal']['date_trans']);?>&nbsp;</td>
                	<td><?php 

                    if ($row['Jurnal']['type_currency'] == '1'):
                            echo "Rp";
                        else:
                            echo "$";
                        endif;
                    
                    ?>&nbsp;</td>
                    <td> <?php echo $this->Number->currency(($row['Jurnal']['kurs']),'Rp. ');  ?> 
                    <td> <?php 
                      if ($row['Jurnal']['type_currency'] == '1'):
                    echo $this->Number->currency(($row['Jurnal']['amount']),'Rp. '); 
                      else:
                        echo $this->Number->currency(($row['Jurnal']['amount']),'$. '); 
                    endif;
                     ?> 
                    <td> <?php echo h($row['Jurnal']['desc_payment']); ?>&nbsp;</td>
                    
                    <input id="umrah_tipekurs" name="umrah_tipekurs" value="<?php echo h($row['Jurnal']['type_currency']); ?>" type="hidden" class="umrah_tipekurs" />
                    <input id="umrah_kurs" name="umrah_kurs" value="<?php echo h($row['Jurnal']['kurs']); ?>" type="hidden" class="umrah_kurs" />
                    <input id="umrah_amount" name="umrah_amount" value="<?php echo h($row['Jurnal']['amount']); ?>" type="hidden" class="umrah_amount" />
                    <input id="umrah_descpayment" name="umrah_descpayment" value="<?php echo h($row['Jurnal']['desc_payment']); ?>" type="hidden" class="umrah_descpayment" />
                    <input id="jurnal_id" name="jurnal_id" value="<?php echo h($row['Jurnal']['id']); ?>" type="hidden" class="jurnal_id" />
                    <input id="booking_id" name="booking_id" value="<?php echo h($row['Jurnal']['booking_id']); ?>" type="hidden" class="booking_id" />
                    <input id="umrah_cashflow" name="umrah_cashflow" value="<?php echo h($row['Jurnal']['cashflow_id']); ?>" type="hidden" class="umrah_cashflow" />
                
                </tr>
                <?php 

                    if ($row['Jurnal']['type_currency'] == '1'):
                             $jumlah += ($row['Jurnal']['amount']);
                             $todollar += ($row['Jurnal']['amount'] / $row['Jurnal']['kurs']);
                        else:
                             $jumlah2 += ($row['Jurnal']['amount']);
                        endif;
                    
                    ?>&nbsp;

                 
            <?php endforeach; ?>
            <tr>
                <td colspan="2">Jumlah Pembayaran</td>
                <td colspan="4">

                    <?php echo  $this->Number->currency(($jumlah),'Rp. ');  ?> (<?php echo  $this->Number->currency($todollar,'$. ');  ?>) <br/> <?php echo  $this->Number->currency($jumlah2,'$. ');  ?></td>
                
            </tr>
            <tr>
                <td colspan="2">Sisa Pembayaran</td>
                <td colspan="4"> <?php echo $this->Number->currency((($booking['Booking']['room_amount'] - $booking['Booking']['room_discount']) - ($jumlah2 + $todollar)),'$. '); ?></td>
            </tr>
            </tbody>
        </table> 

<br/>
<p align="left">Bandung, <?php echo date('d-m-Y H:i:s');?></p>

<span style="padding-right:425px">Jama'ah Haji/Umrah</span><span align="right">Bagian Keuangan</span>
<br/>
<br/>
<br/>
<br/>
<span style="padding-right:400px">(___________________)</span><span align="right">(___________________)</span>
</div>