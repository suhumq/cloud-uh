<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah Marketing Baru</h3>
		<?php echo $this->Form->create('Sale', array('class' => 'form_validation_ttip'));?>
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
						<label>Alamat <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('address', array('class' => 'span8 required', 'minlength' => '3')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Telepon <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('phone', array('class' => 'span8 required', 'minlength' => '3')); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>