<br/>
<br/>
<br/>
<br/>
<div id="page-wrap">
	<br/>
	
<textarea id="header">SURAT PERINTAH KERJA</textarea>
<p align="center">Nomor : <?php echo h($contractor['Contractor']['spk_number_1']); ?></p>
<br/>
<br/>
<table id="items" style="border:0px solid !important;">
	<tr>
		<td width="150px">
			Menunjuk Perjanjian Kerjasama Nomor <?php echo h($contractor['Contractor']['spk_number_2']); ?>, Tanggal <input type="text" placeholder="18 November 2013" style="border: 0px;
font-family: Times;
width: 130px;
font-size: 15px;"> dengan ini kami sampaikan Surat Perintah Kerja (SPK) untuk pembangunan Perumahan <?php echo $info_project[0]['projects']['name'] ?>  kepada
		</td>
	</tr>
</table>

<table id="items" style="border:0px solid !important;">
	<tr>
		<td width="150px">
			Nama 
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			<?php echo $info_project[0]['projects']['owner'] ?>
		</td>	
	</tr>
	<tr>
		<td width="150px">
			Alamat 
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			<?php echo $info_project[0]['projects']['address_owner'] ?>
		</td>	
	</tr>
</table>
<table id="items" style="border:0px solid !important;">
	<tr>
		<td width="150px">
			Dengan rincian sebagai berikut :
		</td>
	</tr>
</table>
<table id="items" border="1px">
	<tr>
		<th>
			No
		</th>
		<th>
			Uraian Pekerjaan
		</th>
		<th>
			Jumlah Unit
		</th>
		<th>
			Harga Satuan
		</th>
		<th>
			Jumlah Harga
		</th>
		
	</tr>
	<?php
		 $i=1; ?>
	<?php foreach ($info_spk as $row): ?>
	<tr>
		<td><?php echo h($i++);?>.</td>
		<td><?php echo h($row['ContractorTask']['description_task']); ?></td>
		<td><?php echo h($row['ContractorTask']['volume']); ?></td>
		<td><?php echo $this->Number->currency(($row['ContractorTask']['price']), 'Rp. '); ?></td>
		<td><?php echo $this->Number->currency(($row['ContractorTask']['volume'] * $row['ContractorTask']['price']),'Rp. '); ?></td>
		
	</tr>
	<?php endforeach; ?>
</table>
<p>
<table id="items" style="border:0px solid !important;">
	<tr>
		<td width="150px">
			Tanggal Mulai Proyek 
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			<?php echo $info_project[0]['projects']['start_project'] ?>
		</td>	
	</tr>
	<tr>
		<td width="150px">
			Tanggal Serah Terima 
		</td>
		<td width="10px">
			: 
		</td>
		<td>
			<?php echo $info_project[0]['projects']['end_project'] ?>
		</td>	
	</tr>
</table>
<table id="items" style="border:0px solid !important;">
	<tr>
		<td width="150px">
			SYARAT - SYARAT :
		</td>
	</tr>
</table>

<table id="items" style="border:0px solid !important;">
	<tr>
		<td>
		  1. 
		</td>
		<td>
		  	Setiap peralatan kerja yang sudah menjadi kebiasaan pekerja menjadi tanggung jawab sendiri. 
		</td>
	</tr>
	<tr>
		<td>
		  2. 
		</td>
		<td>
		  Bertanggung jawab kepada keselamatan para pekerja. 
		</td>
	</tr>
	<tr>
		<td>
		  3. 
		</td>
		<td>
		  Bertanggung jawab kepada barang-barang/material yang akan digunakan. 
		</td>
	</tr>	
	<tr>
		<td>
		  4. 
		</td>
		<td>
		  Bertanggung jawab kepada pelaksanaan pekerjaan terutama mengenai mutu pekerjaan.
		</td>
	</tr>
	<tr>
		<td>
		  5. 
		</td>
		<td>
		  Harus selalu siap dilokasi pekerjaan.
		</td>
	</tr>	
	<tr>
		<td>
		  6. 
		</td>
		<td>
		  Disiplin kerja / patuh kepada peraturan - peraturan  perusahaan dan perintah – perintah para petugas di lapangan.
		</td>
	</tr>
	<tr>
		<td>
		  7. 
		</td>
		<td>
		  Tidak diperkenankan melaksanakan pekerjaan tambahan rumah tanpa surat resmi dari Pengembang Amaya Residence.
		</td>
	</tr>
	<tr>
		<td>
		  8. 
		</td>
		<td>
		  Hal – hal lain sesuai perjanjian kerja harus dipenuhi.
		</td>
	</tr>
	<tr>
		<td>
		  9. 
		</td>
		<td>
		  Hal – hal yang belum termasuk pada butir – butir di atas dan akan ditentuakan kemudian.
		</td>
	</tr>

</table>
<table id="items" style="border:0px solid !important;">
	<tr>
		<td width="150px">
			PEMBAYARAN : Disesuaikan dengan Perjanjian Kerjasama Nomor <?php echo h($contractor['Contractor']['spk_number_2']); ?>, Tanggal <input type="text" placeholder="18 November 2013" style="border: 0px;
font-family: Times;
width: 130px;
font-size: 15px;">
		</td>
	</tr>
</table>
<br/>
<br/>
<p align="left">Bandung, <input type="text" placeholder="18 November 2013" style="border: 0px;
font-family: Times;
width: 130px;
font-size: 15px;"></p>
<br/>
<br/>
<span style="padding-right:400px">Yang Menerima Penyerahan</span><span align="right"><?php echo $info_project[0]['projects']['name'] ?></span>
<br/>
<br/>
<br/>
<br/>
<br/>
<span style="padding-right:400px">(___________________)</span><span align="right">(___________________)</span>
<br/>
<br/>
</div>