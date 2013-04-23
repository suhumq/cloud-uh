<?php
class Formulir extends AppModel {
  public $name = 'Formulir';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             )
          );

  public function addDataFormulir($data) {
  $com = array(
        'Formulir' => array(
        'booking_id' => $data['Booking']['booking_id'],
        'no_paspor' => $data['Booking']['no_paspor'],
        'nama_ayah' => $data['Booking']['nama_ayah'],
        'nama_ibu' => $data['Booking']['nama_ibu'],
        'tempat_paspor_keluar' => $data['Booking']['tempat_paspor_keluar'],
        'tgl_keluar_paspor' => $data['Booking']['tgl_keluar_paspor'],
        'tgl_kadaluarsa_paspor' => $data['Booking']['tgl_kadaluarsa_paspor'],
        'alamat_surat_jalan' => $data['Booking']['alamat_surat_jalan'],
        'alamat_surat_rtrw' => $data['Booking']['alamat_surat_rtrw'],
        'alamat_surat_kelurahan' => $data['Booking']['alamat_surat_kelurahan'],
        'alamat_surat_kecamatan' => $data['Booking']['alamat_surat_kecamatan'],
        'alamat_surat_provinsi' => $data['Booking']['alamat_surat_provinsi'],
        'alamat_surat_kodepos' => $data['Booking']['alamat_surat_kodepos'], 
        'alamat_surat_kota' => $data['Booking']['alamat_surat_kota'],
        'status_menikah' => $data['Booking']['status_menikah']
      )
    );
    $this->create();
    $this->save($com);
  }

  function removeDataFormulir($id=null) {
    return $this->delete($id);
  }

}
