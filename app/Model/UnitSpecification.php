<?php
class UnitSpecification extends AppModel {
  public $name = 'UnitSpecification';
  public $belongsTo = array(
           'Booking' => array(
              'className'    => 'Booking',
              'foreignKey'   => 'booking_id' /* singular name */
             )
          );

  public function addDataUnitSpecification($data) {
  $com = array(
        'UnitSpecification' => array(
        'booking_id' => $data['Booking']['id'],
        'name' => $data['Booking']['name'],
        'description_specification' => $data['Booking']['description_specification']
      )
    );
  if(isset($data['Booking']['unitspec_id'])){
        $com['UnitSpecification']['id'] = $data['Booking']['unitspec_id'];
    }    $this->create();
    $this->save($com);
  }

  function removeDataUnitSpecification($id=null) {
    return $this->delete($id);
  }

}