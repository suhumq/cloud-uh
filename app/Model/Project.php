<?php
  class Project extends AppModel {
    public $name = 'Project';
    public $hasMany = array(
        'Unit' => array(
            'className' => 'Unit',
            'foreignKey' => 'project_id'
        ),
        'OperationalProject' => array(
            'className' => 'OperationalProject',
            'foreignKey' => 'project_id'
        ),
        'Contractor' => array(
            'className' => 'Contractor',
            'foreignKey' => 'project_id'
        )
    );
  }
?>