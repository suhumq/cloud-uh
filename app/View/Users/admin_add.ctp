<div class="row-fluid">
    <div class="span6">
		<h3 class="heading">Tambah User Baru</h3>
		<?php echo $this->Form->create('User');?>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12">
						<label>Username <span class="f_req">*</span></label>
						<?php
						echo $this->Form->input('username', array('label' => '','class' => 'span8')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Password <span class="f_req">*</span></label>
						<?php
						echo $this->Form->input('password', array('label' => '','class' => 'span8')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php
						$sizes = array('1' => 'Admin', '2' => 'Marketing', '3' => 'Customer');
						echo $this->Form->input('role', array('label' => 'Role User', 'options' => $sizes, 'default' => 'm'));
						 ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Nama Lengkap <span class="f_req">*</span></label>
						<?php
						echo $this->Form->input('full_name', array('label' => '','class' => 'span8'));
						 ?>
					</div>
				</div>
				
			
			</div>
			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
			</div>
    </div>
</div>