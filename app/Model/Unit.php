<?php
  class Unit extends AppModel {
    public $name = 'Unit';
    public $belongsTo = array(
       'Project' => array(
          'className'    => 'Project',
          'foreignKey'   => 'project_id'
         )
   	);
   	public $hasMany = array(
        'Booking' => array(
            'className' => 'Booking',
            'foreignKey' => 'unit_id'
        ),
        'OperationalUnit' => array(
            'className' => 'OperationalUnit',
            'foreignKey' => 'unit_id'
        )
    );
  }
?>