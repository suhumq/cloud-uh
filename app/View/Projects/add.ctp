<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah Project Baru</h3>
		<?php echo $this->Form->create('Project', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12">
						<label>Nama Project <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('name', array('class' => 'span8 required', 'minlength' => '3', 'id'=> 'field1')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span3">
						<label>Mulai Project <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('start_project', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_start')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span3">
						<label>Selesai Project <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('end_project', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_end')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Kecamatan <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('kecamatan', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_end')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Kelurahan <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('kelurahan', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_end')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Kota <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('town', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_end')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Pemilik Project <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('owner', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_end')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Alamat Pemilik Project <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('address_owner', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_end')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Pekerjaan Pemilik Project <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('job_owner', array('class' => 'span8 required', 'minlength' => '3','id'=> 'project_date_end')); ?>
					</div>
				</div>
			</div>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12">
						<label>Keterangan <span class="f_req">*</span></label>
						<?php echo $this->Form->textarea('description', array( 'cols' => '20','rows' => '5', 'class' => 'required', 'minlength' => '3',)); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>