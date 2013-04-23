<?php

ob_end_clean();
error_reporting(0);
App::import('Vendor', 'xtcpdf');
$pdf = new XTCPDF();

$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'

$pdf->SetAuthor("Copyright © 2013 Cloud Property. All rights reserved.");
$pdf->SetAutoPageBreak(false);
$pdf->setHeaderFont(array($textfont, '', 10));
//$pdf->xheadercolor = array(239,239,239);
//$pdf->xheadertext = __('Laporan Transaksi Uang Masuk', true);
$pdf->xfootertext = 'Copyright © 2013 Cloud Property. All rights reserved.';
// add a page (required with recent versions of tcpdf)
$pdf->AddPage();

//to fix TCPDF ERROR: Some data has already been output, can't send PDF file
ob_clean();
if (empty($booking)) {
    $tbl = __('Kosong', true);
} else {
// -----------------------------------------------------------------------------
     if ($booking['Booking']['trans_type'] == '1'):
        $trans_type =  "KPR";
    elseif ($booking['Booking']['trans_type'] == '2'):
        $trans_type = "Cash Bertahap";
    else:
        $trans_type = "Cash";
    endif;
    if ($booking['Booking']['trans_status'] == '1'):
        $trans_status =  "Pending";
    else:
        $trans_status =  "Lunas";
    endif;
    $tbl = '';
    $tbl .='<h3>' . __('Info Customer & Unit Booking', true) . '</h3>';
    $tbl .= '
<table border="1" cellpadding="1" cellspacing="1" align="center" width="100%">
 <tr>
    <td width="10%">'.__('No. Booking', true).'</td>
    <td width="10%">'.__('Tanggal', true).'</td>
    <td width="15%">'.__('Nama Customer', true).'</td>
    <td width="10%">'.__('Info Unit', true).'</td>
    <td width="20%">'.__('Total Harga Jual Unit', true).'</td>
    <td width="10%">'.__('Telah Dibayar', true).'</td>
    <td width="10%">'.__('Sisa Pembayaran', true).'</td>
    <td width="8%">'.__('Status Transaksi', true).'</td>
    <td width="7%">'.__('Type Transaksi', true).'</td>    
 </tr>
';
    

    
        $tbl .= '
    <tr>
    <td>' . __($booking['Booking']['no_booking'], true) . '</td>
    <td>' . __($booking['Booking']['date_booking'], true) . '</td>
    <td>' . __($booking['Customer']['name'], true) . '</td>
    <td>' . __($booking['Unit']['name'], true).''. __(' - '.$booking['Unit']['type_unit'], true). '</td>
    <td>' . __($this->Number->currency($booking['Unit']['price_sell'] + $booking['Unit']['charge'], 'Rp '), true) . '</td>
    <td>' . __($this->Number->currency($sum_payment[0][0]['SUM(amount)'], 'Rp '), true) . '</td>
    <td>' . __($booking['Unit']['price_sell'], true) . '</td>
    <td>' . __($trans_type, true). '</td>
    <td>' . __($trans_status, true) . '</td>
    </tr>';
    //}
    $tbl .= '
</table>
';
}

if (empty($jurnal_data)) {
    $tbl .= __('Kosong', true);
} else {
// -----------------------------------------------------------------------------
    $tbl .= '';
    $tbl .='<h3>' . __('Info Transaksi', true) . '</h3>';
    $tbl .= '
<table border="1" cellpadding="1" cellspacing="1" align="center" width="100%">
 <tr>
    <td width="5%">'.__('No', true).'</td>
    <td width="20%">'.__('No. Transaksi', true).'</td>
    <td width="25%">'.__('Tanggal Angsuran', true).'</td>
    <td width="20%">'.__('Jumlah', true).'</td>
    <td width="30%">'.__('Keterangan', true).'</td>
    
 </tr>
';
    $i=0;
foreach($jurnal_data as $row)
{
    $i++;
    $tbl .= '
    <tr>
    <td>'.$i.'</td>
    <td>'.__($row['Jurnal']['no_transaction'], true).'</td>
    <td>'.__($this->Time->format('d-M-Y', $row['Jurnal']['trans_date']), true).'</td>
    <td>'.__($this->Number->currency(($row['Jurnal']['amount']), 'Rp '), true).'</td>
    <td>'.__($row['Jurnal']['description'], true).'</td>
   
    </tr>';
}
    $tbl .= '
        <tr>
             <td colspan="3">
               <b>Jumlah</b>
              </td>
              <td colspan="2" class="left"> 
                    <b>'.__($this->Number->currency(($sum_payment[0][0]['SUM(amount)']), 'Rp '),true).'</b>
               </td>
        </tr>'; 
    $tbl .= '
</table>
';
}

$tbl .= '<br>'.__("Notes : ", true).'<br>
            <table >
                <tr>
                    <td></td>
                    
                </tr>
                <tr>

                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>

            </table>
';   
$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
//Close and output PDF document
$pdf->Output('cloudproperty_trans_' . date('dmyhis') . '.pdf', 'I');