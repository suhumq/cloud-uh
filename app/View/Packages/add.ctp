<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah Paket Perjalanan Baru</h3>
		<?php echo $this->Form->create('Package', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12">
						<label>Nama Paket <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('name', array('class' => 'span8 required', 'minlength' => '3')); ?>
					</div>
				</div>
				<div class="row-fluid">
						<div class="span12">
							<label>Nama Maskapai <span class="f_req">*</span></label>
						<?php echo $this->Form->input('plane_id', array('label' => '','type' => 'select', 'class' => 'chzn_master_project')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Tipe Paket <span class="f_req">*</span></label>
						<?php
						$sizes = array('1' => 'Umrah', '2' => 'Haji');
						echo $this->Form->input('package_type', array('label' => '', 'options' => $sizes, 'default' => 'm'));
						 ?> <?php echo $this->Form->text('desc_package', array('class' => 'span5','placeholder' => 'Reguler / + CT','minlength' => '1')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span3">
						<label>Tgl Keberangkatan <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('date_going', array('class' => 'span8 required', 'minlength' => '3','id'=> 'date_paket')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Jumlah Hari <span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('day', array('class' => 'span2 required', 'minlength' => '1')); ?>
					</div>
				</div>
				<div class="row-fluid">
		            <div class="span12">
		                <label>Quad Room <span class="f_req">*</span></label>
		                <div class="input-prepend input-append input-price">
		                <span class="add-on">$</span>
		                <?php echo $this->Form->text('quad_room', array('label' => '', 'type' => 'text', 'class' => 'span12 field-price required currency', 'minlength' => '1')); ?> 
		                <span class="add-on coma">.00</span>
		                </div>
		            </div>
		        </div>
		        <div class="row-fluid">
		            <div class="span12">
		                <label>Triple Room <span class="f_req">*</span></label>
		                <div class="input-prepend input-append input-price">
		                <span class="add-on">$</span>
		                <?php echo $this->Form->text('triple_room', array('label' => '', 'type' => 'text', 'class' => 'span12 field-price required currency', 'minlength' => '1')); ?> 
		                <span class="add-on coma">.00</span>
		                </div>
		            </div>
		        </div>
		        <div class="row-fluid">
		            <div class="span12">
		                <label>Double Room <span class="f_req">*</span></label>
		                <div class="input-prepend input-append input-price">
		                <span class="add-on">$</span>
		                <?php echo $this->Form->text('double_room', array('label' => '', 'type' => 'text', 'class' => 'span12 field-price required currency', 'minlength' => '1')); ?> 
		                <span class="add-on coma">.00</span>
		                </div>
		            </div>
		        </div>
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Simpan Paket</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>