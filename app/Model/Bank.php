<?php
class Bank extends AppModel {
  public $name = 'Bank';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             )
          );

  public function addDataBank($data) {
  $com = array(
        'Bank' => array(
        'booking_id' => $data['Booking']['id'],
        'bank_name' => $data['Booking']['bank_name'],
        'bank_address' => $data['Booking']['bank_address'],
        'bank_town' => $data['Booking']['bank_town'],
        'status' => $data['Booking']['status']
         
      )
    );
   if(isset($data['Booking']['bank_id'])){
        $com['Bank']['id'] = $data['Booking']['bank_id'];
    }    $this->create();
    $this->save($com);
  }

  function removeDataBank($id=null) {
    return $this->delete($id);
  }

}
