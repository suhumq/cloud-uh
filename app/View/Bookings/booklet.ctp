<?php foreach ($booking_umrahs as $bu): ?>
        <table border="1" width="50%">
                <tr>
                   <td rowspan="3" width="25%">
                    <?php if ($bu['Customer']['image_1']):?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img alt="<?php echo $bu['Customer']['image_1']; ?>" src="/uploads/<?php echo $bu['Customer']['image_1'];?>" style="width: 100px; height: 100px"/>
                    <?php else:?>
                    <img alt="<?php echo $bu['Customer']['image_1']; ?>" src="/uploads/galery-nophoto.jpeg" style="width: 100px; height: 100px"/>
                    <?php endif;?>
                   </td>
                   <td width="75%">
                    <br/><br/><br/>
                    &nbsp;&nbsp;<?php echo h($bu['Customer']['name']);  ?>&nbsp;<br/>
                    &nbsp;&nbsp;<?php echo h($bu['Customer']['address']);  ?><?php echo h($bu['Customer']['alamat_surat_kecamatan']);  ?>

                    &nbsp;<br/>
                    &nbsp;&nbsp;<?php echo h($bu['Customer']['phone']);  ?>&nbsp;<br/><br/><br/><br/>
                   </td>
                </tr>
            </table>  
            <br/>
<?php endforeach; ?>
