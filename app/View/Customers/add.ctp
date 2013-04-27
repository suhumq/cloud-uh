<h3 class="heading">Tambah Konsumen</h3>
<?php echo $this->Form->create('Customer', array('class' => 'form_validation_ttip'));?>
<div class="row-fluid">		
    <div class="span3">
		<div class="formSep">
			<div class="row-fluid">
				<div class="span12">
					<label>Nama <span class="f_req">*</span></label>
					<?php
					echo $this->Form->text('name', array('class' => 'span8 required','minlength' => '2')); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<label>KTP <span class="f_req">*</span></label>
					<?php
					echo $this->Form->text('ktp', array('class' => 'span8 required','minlength' => '9')); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<label>Tempat Lahir <span class="f_req"></span></label>
					<?php
					echo $this->Form->text('place_birth', array('class' => 'span8', 'minlength' => '3')); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<label>Tgl Lahir <span class="f_req"></span></label>
					<?php
					echo $this->Form->text('birthday', array('class' => 'span8', 'minlength' => '3', 'id'=> 'birthday')); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<label>Alamat Sesuai KTP <span class="f_req">*</span></label>
					<?php echo $this->Form->textarea('address', array('label' => 'Alamat Surat','row' => '5', 'col' =>'5', 'type' =>'textarea', 'class' => 'span12','placeholder'=>'Alamat Sesuai KTP')); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php
					$sizes = array('1' => 'Pria', '2' => 'Wanita');
					echo $this->Form->input('jk', array('label' => 'Jenis Kelamin', 'options' => $sizes, 'default' => 'm'));
					 ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<label>Telepon <span class="f_req">*</span></label>
					<?php
					echo $this->Form->text('phone', array('class' => 'span8 required', 'minlength' => '3')); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php
					$sizes = array('PNS' => 'PNS', 'PEG.SWASTA' => 'PEG.SWASTA', 'PELAJAR/MAHASISWA' => 'PELAJAR/MAHASISWA','IBU RUMAH TANGGA' => 'IBU RUMAH TANGGA','PEDAGANG' => 'PEDAGANG', 'PETANI' => 'PETANI','PENSIUNAN' => 'PENSIUNAN','PURNAWIRAWAN' => 'PURNAWIRAWAN', 'BUMN' => 'BUMN');
					echo $this->Form->input('job', array('label' => 'Pekerjaan', 'options' => $sizes, 'default' => 'm'));
					 ?>
				</div>
			</div>
		</div>
    </div>
    <div class="span3">
     	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('no_paspor', array('label' => 'Nomor Paspor', 'class' => 'span6','placeholder'=>'Nomor Paspor')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
			<?php echo $this->Form->input('nama_ayah', array('label' => 'Nama Ayah', 'class' => 'span12','placeholder'=>'Nama Ayah')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
			<?php echo $this->Form->input('nama_ibu', array('label' => 'Nama Ibu', 'class' => 'span12','placeholder'=>'Nama Ibu')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
			<?php echo $this->Form->input('tempat_paspor_keluar', array('label' => 'Tempat Paspor Keluar', 'class' => 'span6','placeholder'=>'Tempat Paspor Keluar')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
			<?php echo $this->Form->input('tgl_keluar_paspor', array('label' => 'Tanggal Paspor Keluar', 'class' => 'span6','placeholder'=>'tgl Paspor Keluar')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
			<?php echo $this->Form->input('tgl_kadaluarsa_paspor', array('label' => 'Tanggal Kadaluarsa Paspor', 'class' => 'span6','placeholder'=>'Tgl Kadaluarsa Paspor')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'Belum Menikah', '2' => 'Menikah', '3' => 'Janda', '4' => 'Duda');
				echo $this->Form->input('status_menikah', array('label' => 'Status Menikah', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>
		
		
     </div>
     <div class="span3">
     	<div class="row-fluid">
			<div class="span12">
			<?php echo $this->Form->textarea('alamat_surat_jalan', array('row' => '20', 'col' =>'10', 'label' => 'Alamat Surat', 'class' => 'span12','placeholder'=>'Alamat Surat (Nama Jalan)')); ?>
			<?php echo $this->Form->text('alamat_surat_rtrw', array('label' => 'RT / RW', 'class' => 'span6','placeholder'=>'RT/RW')); ?>
			<?php echo $this->Form->text('alamat_surat_kelurahan', array('label' => 'Kelurahan', 'class' => 'span6','placeholder'=>'Kelurahan')); ?>
			<?php echo $this->Form->text('alamat_surat_kecamatan', array('label' => 'Kecamatan', 'class' => 'span6','placeholder'=>'Kecamatan')); ?>
			<?php echo $this->Form->text('alamat_surat_kodepos', array('label' => 'Kodepos', 'class' => 'span6','placeholder'=>'Kode Pos')); ?>
			<?php echo $this->Form->text('alamat_surat_provinsi', array('label' => 'Provinsi', 'class' => 'span6','placeholder'=>'Provinsi')); ?>
			<?php echo $this->Form->text('alamat_surat_kota', array('label' => 'Kota / Kab', 'class' => 'span6','placeholder'=>'Kota/Kab')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'A', '2' => 'B', '3' => 'O', '4' => 'AB');
				echo $this->Form->input('jk', array('label' => 'Golongan Darah', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'Sudah', '2' => 'Belum');
				echo $this->Form->input('status_berhaji', array('label' => 'Status Berhaji', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>		
     </div>
     <div class="span3">
     	<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'Oval', '2' => 'Persegi','3' => 'Bulat');
				echo $this->Form->input('bentuk_muka', array('label' => 'Bentuk Muka', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>	
		<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'Coklat', '2' => 'Hitam','3' => 'Biru','4' => 'Hijau');
				echo $this->Form->input('warna_mata', array('label' => 'Warna Mata', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>	
		<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'Lurus', '2' => 'Ikal','3' => 'Keriting');
				echo $this->Form->input('bentuk_rambut', array('label' => 'Bentuk Rambut', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>	
		<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'Tinggi', '2' => 'Sedang','3' => 'Rendah');
				echo $this->Form->input('bentuk_hidung', array('label' => 'Bentuk Hidung', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>	
		<div class="row-fluid">
			<div class="span12">
				<?php
				$sizes = array('1' => 'Tebal', '2' => 'Tipis');
				echo $this->Form->input('bentuk_alis', array('label' => 'Bentuk Alis', 'options' => $sizes, 'default' => 'm'));
				 ?>
			</div>
		</div>
				<img alt="Photo" src="/uploads/galery-nophoto.jpeg" style="width: 120px; height: 150px"/>
				<?php 
					echo $this->Form->input('image_1', array('label' => 'Photo:', 'type' => 'file'));
				?>			
     </div>

</div>     
<div class="form-actions">
	<button class="btn btn-inverse" type="submit">Update</button>
	<button class="btn" type="reset">Cancel</button>
</div>	