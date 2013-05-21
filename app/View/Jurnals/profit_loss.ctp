<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Laba Rugi Paket - <?php if ($packagename != '0'):
                                                            echo $packagename;
                                                        else:
                                                            echo '';
                                                        endif;
                                                        ?>

                                                        </h3>
        <?php echo $this->Form->create('Jurnal', array('class' => 'form_validation_ttip'));?>
        <div class="row-fluid">
            <div class="span12">
                <?php
                $sizes = array('1' => 'Rp', '2' => '$');
                echo $this->Form->input('type_currency', array('label' => 'Tipe Currency', 'options' => $sizes, 'default' => 'm'));
                 ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div style="display: inline-block">
                    <?php echo $this->Form->input('package_id', array('label' => 'Nama Paket','type' => 'select', 'class' => 'chzn_master_project ')); ?>
                </div>
                <input type="submit" value="Cari" class="btn">   </input>
             </div>
        </div>
        <br/>
        <b> Laba Bersih : <?php echo $this->Number->currency(($neraca_kas),$curr);  ?> (<?php echo $this->Number->currency(($neraca_kas/9700), $curr2);  ?>)</b>
  
        <br/>
        <br/>
        
        <?php if ($neraca_kas != 0): ?>
        <table class="table table-bordered table-striped table_vam" id="">
              
             <thead>
                <tr>
                    <th>REF</th>
                    <th>Deskripsi Pemasukan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
           
            <tbody>
                <?php
                    foreach ($paket as $total): ?>
                    <tr>
                        <td>101</td>
                        <td><?php echo $descpaket1?></td>
                        <td><?php echo $this->Number->currency(($total[0]['SUM(amount)']),$curr);  ?>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="2"><b>Total Pemasukan</b></td>
                        <td><?php echo $this->Number->currency(($paket[0][0]['SUM(amount)']),$curr);  ?>&nbsp;</td>
                    </tr>
             <thead>
                <tr>
                    <th>REF</th>
                    <th>Deskripsi Pengeluaran</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
                <?php
                    foreach ($operasional_paket as $x): ?>
                    <tr>
                        <td>201</td>
                        <td><?php echo $descpaket?></td>
                        <td><?php echo $this->Number->currency(($x[0]['SUM(amount)']),$curr);  ?>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="2"><b>Total Pengeluaran</b></td>
                        <td><?php echo $this->Number->currency(($operasional_paket[0][0]['SUM(amount)']),$curr);  ?>&nbsp;</td>
                    </tr>
            </tbody>
            
                
        </table>  
        <?php else: ?>
        <?php endif; ?>
            
        
         
    </div>
</div>  
