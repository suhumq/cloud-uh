<html> 
<header>
	<title></title>
	<?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array(
                      'letters.css'
                   ));
        echo $this->Html->script(array(
                      'terbilang.js' 
                     
                   ));
    ?>

</header>
<body onload="document.getElementById('hasil').innerHTML=toTerbilang(
 <?php echo ($booking['Unit']['price_sell']); ?>);">
	<fieldset>
	<?php echo $this->fetch('content'); ?>
	</fieldset>
</body>
</html>