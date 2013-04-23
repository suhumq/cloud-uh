<?php
  class Plane extends AppModel {
    public $name = 'Plane';
    public $hasMany = array(
        'Package' => array(
            'className' => 'Package',
            'foreignKey' => 'plane_id'
        )
    );
   
  }
?>