<?php
  class Customer extends AppModel {
    public $name = 'Customer';
  	public $hasMany = array(
        'Booking' => array(
            'className' => 'Booking',
            'foreignKey' => 'customer_id'
        )
    );
  }
?>