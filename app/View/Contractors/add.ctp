<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah SPK Baru</h3>
		<?php echo $this->Form->create('Contractor', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
						<div class="span12">
						<?php echo $this->Form->input('project_id', array('label' => 'Nama Project','type' => 'select', 'class' => 'uni_style')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Nomor SPK <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('spk_number_1', array('class' => 'span8')); ?>
					</div>
				</div>
				<div class="row-fluid">
				<div class="span12">
						<label>Nomor Rujukan <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('spk_number_2', array('class' => 'span8')); ?>
					</div>
				</div>	
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>