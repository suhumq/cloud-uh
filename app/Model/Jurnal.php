<?php
class Jurnal extends AppModel {
  public $name = 'Jurnal';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             ),
            'Cashflow' => array(
              'className'    => 'Cashflow',
              'foreignKey'   => 'cashflow_id' /* singular name */
             ),
            'Backcashflow' => array(
              'className'    => 'Backcashflow',
              'foreignKey'   => 'backcashflow_id' /* singular name */
             ),
            'Package' => array(
              'className'    => 'Package',
              'foreignKey'   => 'package_id' /* singular name */
             )
        );

  public function addDataJurnal($data) {

    $dategoing = $this->Booking->find('all', array(
        'conditions' => array('Booking.id' => $data['Booking']['id'])
    ));

  $com = array(
        'Jurnal' => array(
        'booking_id' => $data['Booking']['id'],
        'cashflow_id' => $data['Booking']['cashflow_id'],
        'backcashflow_id' => $data['Booking']['backcashflow_id'],
        'type_currency' => $data['Booking']['type_currency'],
        'kurs' => str_replace(',', '', $data['Booking']['kurs']),
        'amount' =>  str_replace(',', '', $data['Booking']['amount']),
        'desc_payment' => $data['Booking']['desc_payment'],
        'type_trans' => $data['Booking']['type_trans'],
        'date_trans' => $data['Booking']['date_trans'],
        'date_going_package' => $dategoing['0']['Package']['date_going']
      )
      );
    if(isset($data['Booking']['jurnal_id'])){
         $com['Jurnal']['id'] = $data['Booking']['jurnal_id'];
     }    $this->create();
      $this->save($com);
  }


  public function addData($data) {
  $com = array(
        'Jurnal' => array(
        'id' => $data['Jurnal']['id'],
        'amount' => $data['Jurnal']['amount']
      )
    );
    $this->create();
    $this->save($com);
  }

  function removeData($id=null) {
    return $this->delete($id);
  }

}
