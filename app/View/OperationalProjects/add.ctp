<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah Operasional Project Baru</h3>
		<?php echo $this->Form->create('OperationalProject', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
						<div class="span12">
						<?php echo $this->Form->input('project_id', array('label' => 'Nama Project','type' => 'select', 'class' => 'uni_style')); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>