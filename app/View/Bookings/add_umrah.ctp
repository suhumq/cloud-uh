<div class="row-fluid">
    <div class="span3">
		<h3 class="heading">Tambah Transaksi Umrah Baru</h3>
		<?php echo $this->Form->create('Booking', array('class' => 'form_validation_ttip'));?>
			<div class="formSep">
				<div class="row-fluid">
					<div class="span7">
						<label>Nomor Transaksi<span class="f_req">*</span></label>
						<?php
						echo $this->Form->text('no_booking', array('class' => 'required', 'readonly' =>'true', 'minlength' => '3', 'value' => 'BO2013' . (string)$invoice[0][0]['MAX(id)']  )); ?>
					</div>
				</div>
				<div class="row-fluid">
						<div class="span12">
						<?php echo $this->Form->input('customer_id', array('label' => 'Nama Konsumen','type' => 'select', 'class' => 'chzn_project')); ?>
					</div>
				</div>
				<div class="row-fluid">
						<div class="span12">
						<?php echo $this->Form->input('package_id', array('label' => 'Nama Paket','type' => 'select', 'class' => 'chzn_unit')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php
						$sizes = array('1' => 'Quad', '2' => 'Triple', '3' => 'Double');
						echo $this->Form->input('room_type', array('label' => 'Tipe Kamar', 'options' => $sizes, 'default' => 'm'));
						 ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Harga Paket + Kamar</label>
						<div class="input-prepend input-append input-price">
						<span class="add-on">$</span>
						<?php echo $this->Form->text('room_amount', array('label' => 'Harga Paket + Kamar', 'type' => 'text', 'class' => 'span12 field-price required currency', 'minlength' => '2')); ?> 
               			<span class="add-on coma">.00</span>
                		</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<label>Diskon Paket</label>
						<div class="input-prepend input-append input-price">
						<span class="add-on">$</span>
						<?php echo $this->Form->text('room_discount', array('label' => 'Diskon Paket', 'type' => 'text', 'class' => 'span12 field-price required currency', 'minlength' => '2')); ?> 
               			<span class="add-on coma">.00</span>
                		</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php
						$sizes = array('1' => 'Pending', '2' => 'Lunas');
						echo $this->Form->input('status_trans', array('label' => 'Status Transaksi', 'options' => $sizes, 'default' => 'm'));
						 ?>
					</div>
				</div>
				<div class="row-fluid">
						<div class="span12">
						<?php echo $this->Form->input('groupbooking_id', array('label' => 'Nama Group (Jika Ada)','type' => 'select', 'class' => 'chzn_master_project')); ?>
					</div>
				</div>
				<!-- <div class="row-fluid">
					<div class="span12">
						<label>Keterangan <span class="f_req">*</span></label>
						<?php echo $this->Form->textarea('desc_booking', array( 'cols' => '40','rows' => '5', 'class' => 'required', 'minlength' => '0')); ?>
					</div>
				</div>
			</div> -->
   		</div>
	</div>
<div class="span5">
		<h3 class="heading">Persyaratan Umrah</h3>
		<table class="table table-bordered table-striped table_vam">
            <thead>
                <tr>
                	<th>Remark</th>
                    <th>Nama Persyaratan</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($requires as $row): ?>
            		<tr>
            		   <td><?php echo $this->Form->checkbox('requirement', array('name' => 'booking[requirement_ids][]','value' => $row['requirements']['id'])); ?></td>
					   <td><?php echo h($row['requirements']['name']); ?>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>           
</div>
<div class="span4">
		<h3 class="heading">Perlengkapan Umrah</h3>
		<table class="table table-bordered table-striped table_vam">
            <thead>
                <tr>
                	<th>Remark</th>
                    <th>Nama Perlengkapan</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($equips as $row): ?>
            		<tr>
            		   <td><?php echo $this->Form->checkbox('equipment', array('name' => 'booking[equipment_ids][]','value' => $row['equipment']['id'])); ?></td>
					   <td><?php echo h($row['equipment']['name']); ?>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>           
</div>

</div>
<div class="form-actions">
		<button class="btn btn-inverse" type="submit">Simpan</button>
		<button class="btn" type="reset">Cancel</button>
	</div>
</div>