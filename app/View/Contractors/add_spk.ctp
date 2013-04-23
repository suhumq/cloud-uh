
<h3 class="heading">Tambah Rincian SPK</h3>
<?php echo $this->Form->create('Contractor', array('action' => 'addContractorTask', 'class' => 'form_validation_ttip')); ?>
    <div class="formSep">
        <div class="row-fluid">  
            <div class="span4">
                <label>Nama Uraian Pekerjaan <span class="f_req">*</span></label>
                <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->data['Contractor']['id'] )); ?>
                <?php echo $this->Form->input('description_task', array('label' => '', 'type' => 'text', 'class' => 'span12 required', 'minlength' => '2')); ?>
            </div>
            <div class="span2">
                <label>Jumlah Unit <span class="f_req">*</span></label>
                <?php echo $this->Form->input('volume', array('label' => '', 'type' => 'text', 'class' => 'span5 required number', 'minlength' => '1')); ?>
            </div>
            <div class="span2">
            <label>Harga Satuan <span class="f_req">*</span></label>
                <div class="input-prepend input-append input-price">
                    <span class="add-on">Rp.</span>
                    <?php echo $this->Form->input('price', array('label' => '', 'type' => 'text', 'class' => 'field-price required currency', 'minlength' => '3')); ?>
                    <span class="add-on coma">.00</span>
                </div>
               </div> 

            <div class="span1">
                <label> &nbsp;<span class="f_req"></span></label>
                <button class="btn btn-info" type="submit">Tambahkan</button>
            </div>
        </div>
    </div>

    <h3 class="heading">Info Rincian SPK</h3>
    <div class="formSep">
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-bordered table-striped table_vam">
                    <thead>
                        <tr>
                            <th>Uraian Pekerjaan</th>
                            <th>Jumlah Unit</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($info_spk as $row): ?>
                            <tr>
                                <td><?php echo h($row['ContractorTask']['description_task']); ?>&nbsp;</td>
                                <td><?php echo h($row['ContractorTask']['volume']); ?>&nbsp;</td>
                                <td><?php 
                                      echo $this->Number->currency( ($row['ContractorTask']['price']), 'Rp. '); ?>
                                </td>
                                <td>
                                <?php echo $this->Form->postLink(__('Hapus'), array('action' => 'deleteContractorTask', $row['ContractorTask']['id']), null, __('Anda yakin akan menghapus data # %s?', $row['ContractorTask']['id'])); ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;