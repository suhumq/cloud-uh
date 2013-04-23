<?php
class ContractorTask extends AppModel {
  public $name = 'ContractorTask';
  public $belongsTo = array(
            'Contractor' => array(
              'className'    => 'Contractor',
              'foreignKey'   => 'contractor_id' /* singular name */
             )
        );

  function removeData($id=null) {
    return $this->delete($id);
  }

  public function addDataContractorTask($data) {
  $com = array(
        'ContractorTask' => array(
        'contractor_id' => $data['Contractor']['id'],
        'description_task' => $data['Contractor']['description_task'],
        'volume' => $data['Contractor']['volume'],
        'price' =>  str_replace(',', '', $data['Contractor']['price'])
      )
    );
    $this->create();
    $this->save($com);
  }

  function removeDataContractorTask($id=null) {
    return $this->delete($id);
  }



}