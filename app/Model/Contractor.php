<?php
  class Contractor extends AppModel {
    public $name = 'Contractor';
    public $belongsTo = array(
       'Project' => array(
          'className'    => 'Project',
          'foreignKey'   => 'project_id'
         )
   	);

   	 public $hasMany = array(
        'ContractorTask' => array(
            'className' => 'ContractorTask',
            'foreignKey' => 'contractor_id'
        ),
      );
  
  }
?>