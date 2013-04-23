<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah Unit Baru</h3>
		<?php echo $this->Form->create('Unit', array('class' => 'form_validation_ttip' , 'type' => 'file'));?>
			<div class="formSep">
				<div class="row-fluid">
						<div class="span12">
						<?php echo $this->Form->input('project_id', array('label' => 'Nama Project','type' => 'select', 'class' => 'chzn_master_project')); ?>
					</div>
				</div>

				<div class="row-fluid">
					<div class="span12">
						<label>Nama Unit <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('name', array('class' => 'span8 required', 'minlength' => '3')); ?>
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<label>Luas Tanah / Bangunan (m2)<span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('lt', array('class' => 'span2 required number', 'minlength' => '1', 'placeholder' => 'Luas Tanah')); 
						 ?>
						 <?php echo $this->Form->text('lb', array('class' => 'span2 required number', 'minlength' => '1', 'placeholder' => 'Luas Bangunan')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Nomor Kavling <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('block_unit', array('class' => 'span5 required', 'minlength' => '3')); ?>
					</div>
				</div>	
				<div class="row-fluid">
					<div class="span12">
						<label>Nomor Sertifikat <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('certificate', array('class' => 'span5 required', 'minlength' => '3')); ?>
					</div>
				</div>	
				<div class="row-fluid">
					<div class="span12">
						<label>Harga Brosur <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('price_brochure', array('class' => 'span8 required number currency', 'minlength' => '3')); ?>
					</div>
				</div>	
				<div class="row-fluid">
					<div class="span12">
						<label>Harga Jual <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('price_sell', array('class' => 'span8 required number currency', 'minlength' => '3')); ?>
					</div>
				</div>	
				<div class="row-fluid">
					<div class="span12">
						<label>Biaya - Biaya <span class="f_req"></span></label>
						<?php
						echo $this->Form->text('charge', array('class' => 'span8 number currency', 'minlength' => '1', 'value' => '0')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Uang Muka Minimal<span class="f_req"></span></label>
						<?php
						echo $this->Form->text('downpayment', array('class' => 'span8 required number currency', 'minlength' => '1', 'value' => '0')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Booking Fee <span class="f_req"></span></label>
						<?php
						echo $this->Form->text('fee', array('class' => 'span8 required number currency', 'minlength' => '1', 'value' => '0')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>KPR (Plafond) <span class="f_req"></span></label>
						<?php
						echo $this->Form->text('plafond', array('class' => 'span8 required number currency', 'minlength' => '1', 'value' => '0')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Keterangan <span class="f_req"></span></label>
						<?php echo $this->Form->textarea('description', array( 'cols' => '40','rows' => '5', 'class' => '', 'minlength' => '0')); ?>
					</div>
				</div>

				<?php 
					echo $this->Form->input('image_1', array('label' => 'Image 1 :', 'type' => 'file'));
					echo $this->Form->input('image_2', array('label' => 'Image 2 :', 'type' => 'file'));
					echo $this->Form->input('image_3', array('label' => 'Image 3 :', 'type' => 'file'));
				?>
			
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>