<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Edit Akun Debit</h3>
		<?php echo $this->Form->create('Cashflow', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12">
						<label>Kode Akun <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('code', array('class' => 'span8 required', 'minlength' => '2')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Nama Akun <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('name', array('class' => 'span8 required', 'minlength' => '2')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Group Akun <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('group', array('class' => 'span8 required', 'minlength' => '2')); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Update</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>