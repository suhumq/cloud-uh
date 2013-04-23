
<div class="frm-popup" style="padding:10px 10px !important;"><!--
--><fieldset style="margin: 0pt;" class="fm-table"><!--
<br>
--><legend>Konfirmasi pencairan giro</legend><!--
<div class="box-form">
-->

<div style="width: 700px; min-height:100px;">
<form class="deleteActionForm">
<legend><?php __('Daftar Giro'); ?></legend>
			  <table class="daftar-giro">
			    <thead>
			      <tr>
					<th>No Giro</th>
					<th class="center-text">Jumlah</th>
					<th class="center-text">Cairkan ke Bank</th>
		          </tr>
		        </thead>
			    <tbody class="table-giro">
				  <tr class="empty">
					<td colspan="3">Belum ada data</td>
				  </tr>
		        </tbody>
			
		      </table>    
</form>
</div>
<div class="center">
    <p style="width:auto !important;">Anda yakin akan mencairkan giro yang dipilih?</p>
<p style="width:auto !important;"><strong>Note:</strong> Jika Anda memilih Ya, aksi ini tidak dapat di batalkan.</p>
	<div class="buttonHolder">
<input id="cancelDeleteButton" onclick="$.colorbox.close()" type="reset" value="Tidak" class="grey_button" style="
    cursor: hand; cursor: pointer; -moz-border-radius: 4px 4px 4px 4px;
    background: url(&lt;?php echo Router::url('/'); ?&gt;img/bg_white.png) repeat-x scroll 0 0 #F1F1F1;
    border: 1px solid #c0c0c0;
    color: #006CB9;
    font-size: 14px;
    font-weight: bold;
    height: 30px;
    letter-spacing: -1px;
    margin: 10px 5px;
    padding: 5px 15px 10px;
    position: relative;
    text-transform: capitalize;">
<input onclick="Submition.multipleDelete('Pencairan giro telah berhasil')" type="button" value="Ya" class="blue_button" style="
    cursor: hand; cursor: pointer; -moz-border-radius: 4px 4px 4px 4px;
    background: url(&lt;?php echo Router::url('/'); ?&gt;img/blue_button.png) repeat-x scroll 0 -2px #F1F1F1;
    border: 1px solid #c0c0c0;
    color: #F5F5F5;
    font-size: 14px;
    font-weight: bold;
    height: 30px;
    letter-spacing: -1px;
    margin: 10px 5px;
    padding: 5px 15px 10px;
    position: relative;
    text-transform: capitalize;">
    </div>
	<div id="loading" class="loadingHolder loading-btn" style="display:none">
		<img src="<?php echo PLATFORM_URL ?>images/ajax-loader.gif"/>
		<span class="message">Processing ...</span>
	</div>
</div><!--
</div>
--></fieldset><!--
--></div>
<script>


var Submition = {};
Submition.multipleDelete = function(msg) {
	loading('show');
    $.post( $('.deleteActionForm').attr('action'), $('.deleteActionForm').serialize(), function(data){
       if( data == 'success' ) {
            $('.ajaxedContent').load($('.giroRow').attr('data-refresh'),function(){
                loading('hide');
                showTopYellowMessage(msg);
            });
            $.colorbox.close();
       }else {
            loading('hide');
            showTopYellowMessage(msg);
            $.colorbox.close();
       } 
    });
}

//$(document).ready(function(){
//   $('a.colorbox').colorbox({width:"auto",height:"auto"});
//});
</script>
