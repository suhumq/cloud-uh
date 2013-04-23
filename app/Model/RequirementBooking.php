<?php
  class RequirementBooking extends AppModel {
    public $name = 'RequirementBooking';
    public $belongsTo = array(
    'Requirement' => array(
      'className' => 'Requirement',
      'foreignKey' => 'requirement_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );	
  }
?>
