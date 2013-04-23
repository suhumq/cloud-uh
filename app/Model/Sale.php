<?php
  class Sale extends AppModel {
    public $name = 'Sale';
  	public $hasMany = array(
        'Booking' => array(
            'className' => 'Booking',
            'foreignKey' => 'sale_id'
        )
    );
  }
?>