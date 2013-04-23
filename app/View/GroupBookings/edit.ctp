<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Edit Group</h3>
		<?php echo $this->Form->create('GroupBooking', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12">
						<label>Nama Group <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('name', array('class' => 'span8 required', 'minlength' => '2')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Keterangan <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('desc_group', array('class' => 'span8 required', 'minlength' => '2')); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Update</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>