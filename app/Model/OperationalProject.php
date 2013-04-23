<?php
  class OperationalProject extends AppModel {
    public $name = 'OperationalProject';
    public $belongsTo = array(
       'Project' => array(
          'className'    => 'Project',
          'foreignKey'   => 'project_id'
         )
   	);

    public $hasMany = array(
        'Jurnal' => array(
            'className' => 'Jurnal',
            'foreignKey' => 'booking_id'
        ),
        'DraftOprProject' => array(
            'className' => 'DraftOprProject',
            'foreignKey' => 'operationalproject_id'
        )
    );
  
  }
?>