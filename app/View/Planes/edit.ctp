<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Edit Maskapai</h3>
		<?php echo $this->Form->create('Plane', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12">
						<label>Nama Maskapai <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('name', array('class' => 'span8 required', 'minlength' => '2')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span3">
						<label>Kode Maskapai <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('code', array('class' => 'span8 required', 'minlength' => '2')); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Update Maskapai</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>