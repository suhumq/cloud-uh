<?php
class Package extends AppModel {
  public $name = 'Package';
  public $belongsTo = array(
       'Plane' => array(
          'className'    => 'Plane',
          'foreignKey'   => 'plane_id'
         )
   	);
  public $hasMany = array(
        'Booking' => array(
            'className' => 'Booking',
            'foreignKey' => 'package_id'
        )
    );
}