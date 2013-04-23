<?php
  class Cashflow extends AppModel {
    public $name = 'Cashflow';
    public $hasMany = array(
        'Jurnal' => array(
            'className' => 'Jurnal',
            'foreignKey' => 'cashflow_id'
        )
    );
  }
?>