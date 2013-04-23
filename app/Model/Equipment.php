<?php

class Equipment extends AppModel {
    public $displayField = 'name';

    public $name = 'Equipment';
    
  	public $hasMany = array(
    'EquipmentBooking' => array(
      'className' => 'EquipmentBooking',
      'foreignKey' => 'equipment_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    )
  );



  }
