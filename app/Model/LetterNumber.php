<?php
class LetterNumber extends AppModel {
  public $name = 'LetterNumber';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             )
          );

  public function addDataLetterNumber($data) {
  $com = array(
        'LetterNumber' => array(
        'booking_id' => $data['Booking']['id'],
        'ppjb' => $data['Booking']['ppjb'],
        'spr' => $data['Booking']['spr'],
        'spkpr' => $data['Booking']['spkpr'],
        'spajb' => $data['Booking']['spajb'],
        'bastr' => $data['Booking']['bastr']
      )
    );
   if(isset($data['Booking']['letter_id'])){
        $com['LetterNumber']['id'] = $data['Booking']['letter_id'];
    }    $this->create();
    $this->save($com);
  }

  function removeDataLetterNumber($id=null) {
    return $this->delete($id);
  }

}