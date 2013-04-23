<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Formulir <?php if ($this->data['Package']['package_type'] == '1'):
		echo 'Umrah';
		else:
		echo 'Haji';
		endif;
		?></h3>
		<?php echo $this->Form->create('Booking', array('action' => 'addFormulir','class' => 'form_validation_ttip'));?>	
			<div class="formSep">
				<?php echo $this->Form->text('booking_id', array('label' => '','class' => 'span12 required','type' => 'hidden','placeholder'=>'','id'=>'umrah_descpayment', 'value'=> $this->data['Booking']['id'] )); ?>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('no_paspor', array('label' => 'Nomor Paspor', 'class' => 'span6','placeholder'=>'Nomor Paspor')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('nama_ayah', array('label' => 'Nama Ayah', 'class' => 'span12','placeholder'=>'Nama Ayah')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('nama_ibu', array('label' => 'Nama Ibu', 'class' => 'span12','placeholder'=>'Nama Ibu')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('tempat_paspor_keluar', array('label' => 'Tempat Paspor Keluar', 'class' => 'span6','placeholder'=>'Tempat Paspor Keluar')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('tgl_keluar_paspor', array('label' => 'Tanggal Paspor Keluar', 'class' => 'span6','placeholder'=>'Tanggal Paspor Keluar')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('tgl_kadaluarsa_paspor', array('label' => 'Tanggal Paspor Keluar', 'class' => 'span6','placeholder'=>'Tanggal Kadaluarsa Paspor Keluar')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('alamat_surat_jalan', array('label' => '', 'class' => 'span12','placeholder'=>'Alamat Surat (Nama Jalan)')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('alamat_surat_rtrw', array('label' => '', 'class' => 'span6','placeholder'=>'Alamat Surat (RT/RW)')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('alamat_surat_kelurahan', array('label' => '', 'class' => 'span6','placeholder'=>'Alamat Surat (Kelurahan)')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('alamat_surat_kecamatan', array('label' => '', 'class' => 'span6','placeholder'=>'Alamat Surat (Kecamatan)')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('alamat_surat_kodepos', array('label' => '', 'class' => 'span6','placeholder'=>'Alamat Surat (Kode Pos)')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('alamat_surat_provinsi', array('label' => '', 'class' => 'span6','placeholder'=>'Alamat Surat (Provinsi)')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
					<?php echo $this->Form->text('alamat_surat_kota', array('label' => '', 'class' => 'span6','placeholder'=>'Alamat Surat (Kota/Kab)')); ?>
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
   		<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Simpan Formulir</button>
				<button class="btn" type="reset">Back</button>
			</div>
         </div>
</div>