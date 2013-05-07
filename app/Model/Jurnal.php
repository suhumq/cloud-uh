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

  public function addData_oprunit($data) {
  $com = array(
        'Jurnal' => array(
        'operationalunit_id' => $data['OperationalUnit']['id'],
        'unit_id' => $data['OperationalUnit']['unit_id'],
        'cashflow_id' => $data['OperationalUnit']['cashflow_id'],
        'no_transaction' => $data['OperationalUnit']['no_transaction'],
        'trans_date' => $data['OperationalUnit']['trans_date'],
        'description' => $data['OperationalUnit']['description'],
        'account_debet' => $data['OperationalUnit']['account_debet'],
        'account_credit' => $data['OperationalUnit']['account_credit'],
        'amount' => $data['OperationalUnit']['amount']
      )
    );
    $this->create();
    $this->save($com);
  }

  function removeData_oprunit($id=null) {
    return $this->delete($id);
  }
  public function addData_oprproject($data) {
  $com = array(
        'Jurnal' => array(
        'operationalproject_id' => $data['OperationalProject']['id'],
        'project_id' => $data['OperationalProject']['project_id'],
        'cashflow_id' => $data['OperationalProject']['cashflow_id'],
        'no_transaction' => $data['OperationalProject']['no_transaction'],
        'trans_date' => $data['OperationalProject']['trans_date'],
        'description' => $data['OperationalProject']['description'],
        'account_debet' => $data['OperationalProject']['account_debet'],
        'account_credit' => $data['OperationalProject']['account_credit'],
        'amount' =>  str_replace(',', '', $data['OperationalProject']['amount'])
      )
    );
    $this->create();
    $this->save($com);
  }

  function removeData_oprproject($id=null) {
    return $this->delete($id);
  }
  
}
