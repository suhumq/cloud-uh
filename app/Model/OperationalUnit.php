<?php
  class OperationalUnit extends AppModel {
    public $name = 'OperationalUnit';
    public $belongsTo = array(
       'Unit' => array(
          'className'    => 'Unit',
          'foreignKey'   => 'unit_id'
         )
   	);

    public $hasMany = array(
        'Jurnal' => array(
            'className' => 'Jurnal',
            'foreignKey' => 'booking_id'
        ),
        'DraftOprUnit' => array(
            'className' => 'DraftOprUnit',
            'foreignKey' => 'operationalunit_id'
        )
    );
  
  }
?>