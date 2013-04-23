<?php
class DraftTransaction extends AppModel {
  public $name = 'DraftTransaction';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             )
          );

  public function addDataDraftTransaction($data) {
  $com = array(
        'DraftTransaction' => array(
        'booking_id' => $data['Booking']['id'],
        'description_transdraft' => $data['Booking']['description_transdraft'],
        'price' =>  str_replace(',', '', $data['Booking']['price']),
        'date_payment' => $data['Booking']['date_payment']

      )
    );
 if(isset($data['Booking']['draft_id'])){
        $com['DraftTransaction']['id'] = $data['Booking']['draft_id'];
    }
    $this->create();
    $this->save($com);
  }

  function removeDataDraftTransaction($id=null) {
    return $this->delete($id);
  }

}
