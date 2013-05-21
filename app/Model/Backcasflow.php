<?php
  class Backcashflow extends AppModel {
    public $name = 'Backcashflow';
    public $hasMany = array(
        'Jurnal' => array(
            'className' => 'Jurnal',
            'foreignKey' => 'backcashflow_id'
        )
    );
  }
?>