<?php

class Requirement extends AppModel {
    public $displayField = 'name';

    public $name = 'Requirement';
    
  	public $hasMany = array(
    'RequirementBooking' => array(
      'className' => 'RequirementBooking',
      'foreignKey' => 'requirement_id',
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
