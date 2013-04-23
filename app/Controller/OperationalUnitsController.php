<?php
  App::uses('AppController', 'Controller'); 
  class OperationalUnitsController extends AppController {

  	public $uses = array('OperationalUnit','Unit','Jurnal','DraftOprUnit');
  	
  	public function index() {   
  		$this->set('operationalunits', $this->OperationalUnit->find('all'));
  	}

	public function compare($id = null) { 
  		$this->OperationalUnit->id = $id; 
 		$this->set('operationalunits', $this->OperationalUnit->read(null, $id));

 		$_conditions = array('conditions' => array('OperationalUnit.id' => $id));
	  	$jurnal_data = $this->Jurnal->find('all',$_conditions);
	    $this->set('jurnal_data',$jurnal_data);

	    $_conditions_draft = array('conditions' => array('OperationalUnit.id' => $id));
	    $draft_data = $this->DraftOprUnit->find('all',$_conditions_draft);
	    $this->set('draft_data',$draft_data);

	    $_xs = $this->OperationalUnit->findById($id);
	    $unit_id = ($_xs['OperationalUnit']['unit_id']);
	    $income_data = $this->Jurnal->query("SELECT * FROM jurnals WHERE unit_id =  $unit_id AND booking_id != 0;");
	    $this->set('incomes',$income_data);

	    $total_draft = $this->DraftOprUnit->query("SELECT SUM(amount) FROM draft_opr_units WHERE operationalunit_id = $id;");
      	$this->set('total_draft', $total_draft);

      	$total_real = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE operationalunit_id = $id;");
      	$this->set('total_real', $total_real);

      	$total_income = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE unit_id =  $unit_id AND booking_id != 0;");
      	$this->set('total_income', $total_income);
      	

	}

	public function add() {
		$this->set('units', $this->Unit->find('list'));
		
		if ($this->request->is('post')) {
		    $this->OperationalUnit->create();
		    if ($this->OperationalUnit->save($this->request->data)) {
		      $this->Session->setFlash(__('Data Operasional Unit telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      // $this->_flash(__('Success message.', true),'success');
		      $this->redirect(array('action' => 'index'));
		    } else {
		      $this->Session->setFlash(__('Data Operasional Unit gagal ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function operational_unit($id = null) {
	    $this->OperationalUnit->id = $id; 
	    $this->set('unit', $this->Unit->read(null, $id));
		$_conditions = array('conditions' => array('OperationalUnit.id' => $id));
	    $jurnal_data = $this->Jurnal->find('all',$_conditions);
	    $this->set('jurnal_data',$jurnal_data);

	    $nomor_opr = $this->Jurnal->query("SELECT MAX(id) FROM jurnals;");
        $invoice =  $nomor_opr;
        $this->set('invoice', $invoice);    

	    $total = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE operationalunit_id = $id;");
      	$this->set('totals', $total);
      

	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->OperationalUnit->save($this->request->data)) {

	        $this->Session->setFlash(__('Data Real Operasional Unit telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data Operasional Unit gagal ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->OperationalUnit->read(null, $id);
	    }
	}

	public function draft_operational_unit($id = null) {
	    $this->OperationalUnit->id = $id; 
	    $this->set('unit', $this->Unit->read(null, $id));
		$_conditions = array('conditions' => array('OperationalUnit.id' => $id));
	    $jurnal_data = $this->DraftOprUnit->find('all',$_conditions);
	    $this->set('jurnal_data',$jurnal_data);

	    $nomor_opr = $this->DraftOprUnit->query("SELECT MAX(id) FROM draft_opr_units;");
        $invoice =  $nomor_opr;
        $this->set('invoice', $invoice); 

	    $total = $this->DraftOprUnit->query("SELECT SUM(amount) FROM draft_opr_units WHERE operationalunit_id = $id;");
      	$this->set('totals', $total);
      

	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->OperationalUnit->save($this->request->data)) {
	      	$this->Session->setFlash(__('Data Draft Operasional Unit telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	      	$this->Session->setFlash(__('Data Draft Operasional Unit gagal ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->OperationalUnit->read(null, $id);
	    }
	}

	public function addJurnal() {
	    $this->Jurnal->addData($this->data);
	    $this->Session->setFlash(__('Data Operasional Unit telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'transaction', $this->data['Booking']['id']));
  	}

  	public function addJurnalOprUnit() {
	    $this->Jurnal->addData_oprunit($this->data);
	    $this->Session->setFlash(__('Data Real Operasional Unit telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'operational_unit', $this->data['OperationalUnit']['id']));
  	}

  	public function addDraftOprUnit() {
	    $this->DraftOprUnit->addData_draftoprunit($this->data);
	    $this->Session->setFlash(__('Data Draft Operasional Unit telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'draft_operational_unit', $this->data['OperationalUnit']['id']));
  	}

  	public function deleteJurnal($id) {
		$this->Jurnal->removeData($id);
		$this->Session->setFlash(__('Transaksi Berhasil Dihapus'));
		$this->redirect(array('action' => 'index'));	   
   	}

	public function delete($id = null) {
	  $this->OperationalUnit->id = $id;
	  if ($this->OperationalUnit->delete()) {
	  	$this->Session->setFlash(__('Data Operasional Unit telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Operasional Unit gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>