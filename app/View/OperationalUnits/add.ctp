<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah Operasional Unit Baru</h3>
		<?php echo $this->Form->create('OperationalUnit', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
						<div class="span12">
						<?php echo $this->Form->input('unit_id', array('label' => 'Nama Unit','type' => 'select', 'class' => 'uni_style')); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>