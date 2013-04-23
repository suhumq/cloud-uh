<?php
class MinorAddition extends AppModel {
  public $name = 'MinorAddition';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             )
          );

  public function addDataMinorAddition($data) {
  $com = array(
        'MinorAddition' => array(
        'booking_id' => $data['Booking']['id'],
        'minor_name' => $data['Booking']['minor_name'],
        'minor_description' => $data['Booking']['minor_description']
      )
    );
   if(isset($data['Booking']['minor_id'])){
        $com['MinorAddition']['id'] = $data['Booking']['minor_id'];
    }    $this->create();
    $this->save($com);
  }

  function removeDataMinorAddition($id=null) {
    return $this->delete($id);
  }

}