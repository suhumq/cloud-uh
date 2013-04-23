<?php
  class EquipmentBooking extends AppModel {
    public $name = 'EquipmentBooking';
    public $belongsTo = array(
    'Equipment' => array(
      'className' => 'Equipment',
      'foreignKey' => 'equipment_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );	
  }
?>
