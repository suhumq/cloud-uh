<?php
  App::uses('AppController', 'Controller'); 
  class OperationalProjectsController extends AppController {

  	public $uses = array('OperationalProject','Project','Jurnal','DraftOprProject','Cashflow');
  	
  	public function index() {   
  		$this->set('operationalprojects', $this->OperationalProject->find('all'));
  	}

	public function compare($id = null) { 
  		$this->OperationalProject->id = $id; 
		$this->request->data = $this->OperationalProject->read(null, $id);

 		$this->set('operationalprojects', $this->OperationalProject->read(null, $id));

	   	$_conditions = array('conditions' => array('OperationalProject.id' => $id));
	    $jurnal_data = $this->Jurnal->find('all',$_conditions);
	    $this->set('jurnal_data',$jurnal_data);

	    $_conditions_draft = array('conditions' => array('OperationalProject.id' => $id));
	    $draft_data = $this->DraftOprProject->find('all',$_conditions_draft);
	    $this->set('draft_data',$draft_data);

	    $_xs = $this->OperationalProject->findById($id);
	    $project_id = ($_xs['OperationalProject']['project_id']);
	    // $income_data = $this->Jurnal->query("SELECT * FROM jurnals WHERE project_id = $project_id AND booking_id != 0;");
	    // $this->set('incomes',$income_data);

	    $total_draft = $this->DraftOprProject->query("SELECT SUM(amount) FROM draft_opr_projects WHERE operationalproject_id = $id;");
      	$this->set('total_draft', $total_draft);

      	$total_real = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE operationalproject_id = $id;");
      	$this->set('total_real', $total_real);

      	// $total_income = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE project_id =  $project_id AND booking_id != 0;");
      	// $this->set('total_income', $total_income);

	}

	public function add() {
		$this->set('projects', $this->Project->find('list'));
		
		if ($this->request->is('post')) {
		    $this->OperationalProject->create();
		    if ($this->OperationalProject->save($this->request->data)) {
		      $this->Session->setFlash(__('Data Operasional Project telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		    	$this->Session->setFlash(__('Data Operasional Project gagal ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function operational_project($id = null) {
		$conditions = array('account_type' => array('Cashflow.account_type' => 1));
		$this->set('cashflows', $this->Cashflow->find('list',array(
		    'conditions'=>$conditions,
		    'recursive'=>0
		)));
	
	    $this->OperationalProject->id = $id; 

	    $this->set('project', $this->Project->read(null, $id));
		$_conditions = array('conditions' => array('OperationalProject.id' => $id));
		$jurnal_data = $this->Jurnal->find('all',$_conditions);
	    $this->set('jurnal_data',$jurnal_data);

	    $nomor_opr = $this->Jurnal->query("SELECT MAX(id) FROM jurnals;");
        $invoice =  $nomor_opr;
        $this->set('invoice', $invoice); 

	    $total = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE operationalproject_id = $id;");
      	$this->set('total_real', $total);

	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->OperationalProject->save($this->request->data)) {
	      	$this->Session->setFlash(__('Data Real Operasional Project telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data Real Operasional Project telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->OperationalProject->read(null, $id);
	    }
	}

	public function draft_operational_project($id = null) {
		$conditions = array('account_type' => array('Cashflow.account_type' => 1));
		$this->set('cashflows', $this->Cashflow->find('list',array(
		    'conditions'=>$conditions,
		    'recursive'=>0
		)));

	    $this->OperationalProject->id = $id; 
	    $this->set('project', $this->Project->read(null, $id));
		
		$_conditions = array('conditions' => array('OperationalProject.id' => $id));
	    $jurnal_data = $this->DraftOprProject->find('all',$_conditions);
	    $this->set('jurnal_data',$jurnal_data);

	    $nomor_opr = $this->DraftOprProject->query("SELECT MAX(id) FROM draft_opr_projects;");
        $invoice =  $nomor_opr;
        $this->set('invoice', $invoice); 

	    $total = $this->DraftOprProject->query("SELECT SUM(amount) FROM draft_opr_projects WHERE operationalproject_id = $id;");
      	$this->set('draft_total', $total);

	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->OperationalProject->save($this->request->data)) {
	      	$this->Session->setFlash(__('Data Draft Operasional Project telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data Draft Operasional gagal ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->OperationalProject->read(null, $id);
	    }
	}

	public function addJurnal() {
	    $this->Jurnal->addData($this->data);
	    $this->Session->setFlash(__('Data Draft Operasional Project telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'transaction', $this->data['Booking']['id']));
  	}

  	public function addJurnalOprProject() {
	    $this->Jurnal->addData_oprproject($this->data);
	    $this->Session->setFlash(__('Data Operasional Project telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'operational_project', $this->data['OperationalProject']['id']));
  	}

  	public function addDraftOprProject() {
	    $this->DraftOprProject->addData_draftoprproject($this->data);
	    $this->Session->setFlash(__('Data Draft Operasional Project telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'draft_operational_project', $this->data['OperationalProject']['id']));
  	}

  	public function deleteJurnal($id) {
		$this->Jurnal->removeData($id);
		$this->Session->setFlash(__('Data Operasional telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		$this->redirect(array('action' => 'index'));	   
   	}

	public function delete($id = null) {
	  $this->OperationalProject->id = $id;
	  if ($this->OperationalProject->delete()) {
	  	$this->Session->setFlash(__('Data Operasional telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Operasional gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>