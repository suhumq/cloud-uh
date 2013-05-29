<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">List Jurnal Rupiah</h3>
        <table class="table table-bordered table-striped table_vam" id="dt_jurnals">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Nama Account</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
            	<?php
					foreach ($jurnals as $jurnal): ?>
					<tr>
                        <td width="100"><?php echo $this->Time->format('d M Y',$jurnal['Jurnal']['date_trans']);?>&nbsp;</td>
						<td width="400"><?php echo h($jurnal['Jurnal']['desc_payment']);  ?>&nbsp;</td>
                        <td width="400"><?php echo h($jurnal['Cashflow']['name']);  ?>&nbsp;<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                            if ($jurnal['Jurnal']['type_trans'] == '1'):
                                echo "Pendapatan Paket";
                            elseif ($jurnal['Jurnal']['type_trans'] == '2'):
                                 echo h($jurnal['Backcashflow']['name']);
                            else:
                                 echo "Pendapatan Non Paket";
                            endif;
                            ?>&nbsp;
                        </td>
                        <td width="120"> <?php echo $this->Number->currency(($jurnal['Jurnal']['amount']),'RP');  ?>
                            <br/>-<br/>
                        </td>
                         <td width="120">
                            -<br/>
                            <?php echo $this->Number->currency(($jurnal['Jurnal']['amount']),'RP');  ?>
                        </td>
                    </tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">List Jurnal Dollar</h3>
        <table class="table table-bordered table-striped table_vam" id="dt_neracas">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Nama Account</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($jurnals2 as $jurnal): ?>
                    <tr>
                        <td width="100"><?php echo $this->Time->format('d M Y',$jurnal['Jurnal']['created']);?>&nbsp;</td>
                        <td width="400"><?php echo h($jurnal['Jurnal']['desc_payment']);  ?>&nbsp;</td>
                        <td width="400"><?php echo h($jurnal['Cashflow']['name']);  ?>&nbsp;<br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                            if ($jurnal['Jurnal']['type_trans'] == '1'):
                                echo "Pendapatan Paket";
                            elseif ($jurnal['Jurnal']['type_trans'] == '2'):
                                echo h($jurnal['Backcashflow']['name']);
                            else:
                                 echo "Pendapatan Non Paket";
                            endif;
                            ?>&nbsp;
                        </td>
                        <td width="120"> <?php echo $this->Number->currency(($jurnal['Jurnal']['amount']),'$.');  ?>
                            <br/>-<br/>
                        </td>
                         <td width="120">
                            -<br/>
                            <?php echo $this->Number->currency(($jurnal['Jurnal']['amount']),'$.');  ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

