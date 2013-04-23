<div class="row-fluid">
    <div class="span12">
         <h3 class="heading">Neraca Saldo <b> <?php if ($projectname['Project']['name'] != ''):
                                                        echo $projectname['Project']['name'];
                                                        else:
                                                            echo '';
                                                        endif;
                                                        ?>

                                                        <b></h3>
        <!-- <div class="row-fluid">
            <div class="span12">
                <div style="display: inline-block">
                    <?php echo $this->Form->input('date_one', array('label' => 'Periode ','type' => 'text', 'id' => 'date_neraca_1', 'style' =>'width: 80px;')); ?>
                </div> -
                <div style="display: inline-block">
                    <?php echo $this->Form->input('date_two', array('label' => '','type' => 'text', 'id' => 'date_neraca_2', 'style' => 'width: 80px;')); ?>
                </div>
                <div style="display: inline-block;">
                <input type="submit" value="Cari" style="margin-top: -12px;" class="btn">   </input>
                </div>
             </div>
        </div>
 -->
        <?php echo $this->Form->create('Neraca', array('class' => 'form_validation_ttip'));?>
        <div class="row-fluid">
            <div class="span12">
                <div style="display: inline-block">
                    <?php echo $this->Form->input('project_id', array('label' => 'Nama Project','type' => 'select', 'class' => 'chzn_master_project ')); ?>
                </div>
                <input type="submit" value="Cari" class="btn">   </input>
             </div>
        </div>
        
        <br/>
        <?php if ($results != 0):?>
        <table class="table table-bordered table-striped table_vam" id="">
             <thead>
                <tr>
                    <th>REF</th>
                    <th>Aktiva</th>
                    <th>Jumlah</th>
                    <th></th>
                    <th>REF</th>
                    <th>Pasiva</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="3">Asset Lancar</th>
                    <td></td>
                     <td>106</td>
                    <td>Modal Awal</td>
                    <td>-</td>
               </tr>
               <tr>
                    <td>100</td>
                    <td>Kas</td>
                    <td><?php echo $this->Number->currency(($results),'Rp. ');  ?></td>
                    <td></td>
                    <td></td>
                    <td>Saldo Lama</td>
                    <td><?php echo $this->Number->currency(($results),'Rp. ');  ?></td>
               </tr>
               <tr>
                    <td>109</td>
                    <td>Investasi</td>
                    <td>-</td>
                    <td></td>
                     <td>108</td>
                    <td>Modal</td>
                    <td>-</td>
                   
               </tr>
               <tr>
                    <th colspan="3">Asset Tetap</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>105</td>
                    <td>Deposito</td>
                    <td>-</td>
                    <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                   
                   
               </tr>
               <tr>
                    <th colspan="2">Jumlah</th>
                    <th><?php echo $this->Number->currency(($results),'Rp. ');  ?></th>
                    <td></td>
                    <th colspan="2">Jumlah</th>
                    <th><?php echo $this->Number->currency(($results),'Rp. ');  ?></th>
               </tr>
            </tbody>
        </table>  
    <?php else: ?>
        <i>Belum ada data, masukan Periode dan lakukan pencarian</i>
    <?php endif; ?>
    </div>
</div>  
