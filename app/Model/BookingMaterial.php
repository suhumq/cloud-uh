<?php
class BookingMaterial extends AppModel {
  public $name = 'BookingMaterial';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             )
          );

  public function addDataBookingMaterial($data) {
  $com = array(
        'BookingMaterial' => array(
        'booking_id' => $data['Booking']['id'],
        'description_material' => $data['Booking']['description_material'],
        'price_standard' =>  str_replace(',', '', $data['Booking']['price_standard']),
        'price_new' =>  str_replace(',', '', $data['Booking']['price_new']),
        'qty' => $data['Booking']['qty']
      )
    );
    if(isset($data['Booking']['material_id'])){
        $com['BookingMaterial']['id'] = $data['Booking']['material_id'];
    }    $this->create();
    $this->save($com);
  }

  function removeDataBookingMaterial($id=null) {
    return $this->delete($id);
  }

}