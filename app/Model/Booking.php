<?php
  class Booking extends AppModel {
    public $name = 'Booking';
    public $belongsTo = array(
       'Customer' => array(
          'className'    => 'Customer',
          'foreignKey'   => 'customer_id'
         ),
       'Package' => array(
          'className'    => 'Package',
          'foreignKey'   => 'package_id'
         ),
       'GroupBooking' => array(
          'className'    => 'GroupBooking',
          'foreignKey'   => 'groupbooking_id'
         )
   	);

    public $hasMany = array(
        'Jurnal' => array(
            'className' => 'Jurnal',
            'foreignKey' => 'booking_id'
        )

    );

    public $hasAndBelongsToMany = array(
    'Requirement' => array(
      'className' => 'Requirement',
      'joinTable' => 'requirement_bookings',
      'foreignKey' => 'booking_id',
      'associationForeignKey' => 'requirement_id',   
      'unique' => 'keepExisting',
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'finderQuery' => '',
      'deleteQuery' => '',
      'insertQuery' => ''
    ),
    'Equipment' => array(
      'className' => 'Equipment',
      'joinTable' => 'equipment_bookings',
      'foreignKey' => 'booking_id',
      'associationForeignKey' => 'equipment_id',   
      'unique' => 'keepExisting',
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'finderQuery' => '',
      'deleteQuery' => '',
      'insertQuery' => ''
    )
  );

  public function afterSave($data=array()){
      
      $options = array('RequirementBooking.booking_id'=>$this->data['Booking']['id'],
		);
       $options2 = array('EquipmentBooking.booking_id'=>$this->data['Booking']['id'],
    );

      $this->RequirementBooking->deleteAll($options,false);
      $booking_req =  array();
      foreach($this->data['booking']['requirement_ids'] as $key=>$val):
          if($val != 0){
            $booking_req[] = array('booking_id'=>$this->data['Booking']['id'],'requirement_id'=>$val);
          }
      endforeach;
      $this->RequirementBooking->saveAll($booking_req);

      $this->EquipmentBooking->deleteAll($options2,false);
      $booking_equ =  array();
      foreach($this->data['booking']['equipment_ids'] as $key=>$val):
          if($val != 0){
            $booking_equ[] = array('booking_id'=>$this->data['Booking']['id'],'equipment_id'=>$val);
          }
      endforeach;
      $this->EquipmentBooking->saveAll($booking_equ);
    }
  
  }
?>