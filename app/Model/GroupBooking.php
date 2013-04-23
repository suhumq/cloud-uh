<?php
class GroupBooking extends AppModel {
  public $name = 'GroupBooking';
  
  public $hasMany = array(
        'Booking' => array(
            'className' => 'Booking',
            'foreignKey' => 'groupbooking_id'
        )
    );
}