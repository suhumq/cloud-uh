<?php
class DraftOprProject extends AppModel {
  public $name = 'DraftOprProject';
  public $belongsTo = array(
            'OperationalProject' => array(
              'className'    => 'OperationalProject',
              'foreignKey'   => 'operationalproject_id' /* singular name */
             ),
             'Cashflow' => array(
              'className'    => 'Cashflow',
              'foreignKey'   => 'cashflow_id' /* singular name */
             )
        );
  

  function removeData($id=null) {
    return $this->delete($id);
  }

  public function addData_draftoprproject($data) {
  $com = array(
        'DraftOprProject' => array(
        'operationalproject_id' => $data['OperationalProject']['id'],
        'cashflow_id' => $data['OperationalProject']['cashflow_id'],
        'no_transaction' => $data['OperationalProject']['no_transaction'],
        'trans_date' => $data['OperationalProject']['trans_date'],
        'description' => $data['OperationalProject']['description'],
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