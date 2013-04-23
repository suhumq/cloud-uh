<?php
class DraftOprUnit extends AppModel {
  public $name = 'DraftOprUnit';
  public $belongsTo = array(
            'OperationalUnit' => array(
              'className'    => 'OperationalUnit',
              'foreignKey'   => 'operationalunit_id' /* singular name */
             )
        );

  function removeData($id=null) {
    return $this->delete($id);
  }

  public function addData_draftoprunit($data) {
  $com = array(
        'DraftOprUnit' => array(
        'operationalunit_id' => $data['OperationalUnit']['id'],
        'no_transaction' => $data['OperationalUnit']['no_transaction'],
        'trans_date' => $data['OperationalUnit']['trans_date'],
        'description' => $data['OperationalUnit']['description'],
        'amount' => $data['OperationalUnit']['amount']
      )
    );
    $this->create();
    $this->save($com);
  }

  function removeData_oprunit($id=null) {
    return $this->delete($id);
  }



}