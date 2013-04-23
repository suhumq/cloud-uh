<?php
  App::uses('AppController', 'Controller'); 
  class ContractorsController extends AppController {

  	public $uses = array('Contractor','Project','ContractorTask');
  	
  	public function index() {   
  		$this->set('contractors', $this->Contractor->find('all'));
  	}

  	public function add() {   
  		$this->set('projects', $this->Project->find('list'));
		  if ($this->request->is('post')) {
			$this->Contractor->create();
		    if ($this->Contractor->save($this->request->data)) {
		      $this->Session->setFlash(__('Data SPK telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		    	$this->Session->setFlash(__('Data SPK gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		  }
  	}

    public function spk($id = null) {
      $this->layout = 'letters';
      $booking = 0;
      $this->set('booking', $booking); 
      $this->set('contractor', $this->Contractor->read(null, $id));
      $info_project = $this->Project->query("SELECT * FROM projects where id = $id;");
      $this->set('info_project', $info_project);
      $_conditions = array('conditions' => array('Contractor.id' => $id));
      $info_spk = $this->ContractorTask->find('all', $_conditions);
      $this->set('info_spk', $info_spk);
    }

    public function addContractorTask() {
        $this->ContractorTask->addDataContractorTask($this->data);
        $this->Session->setFlash(__('Data Rincian SPK telah berhasil ditambahkan', null), 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('action' => 'add_spk', $this->data['Contractor']['id']));
    }

    public function deleteContractorTask($id) {
        $this->ContractorTask->removeDataContractorTask($id);
        $this->Session->setFlash(__('Data Rincian SPK telah berhasil dihapus', null), 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('action' => 'index'));
    }

    public function add_spk($id = null) {
      $this->Contractor->id = $id; 
      $this->request->data = $this->Contractor->read(null, $id);
      $_conditions = array('conditions' => array('Contractor.id' => $id));
      $info_spk = $this->ContractorTask->find('all', $_conditions);
      // debug($info_spk);
      $this->set('info_spk', $info_spk);
    }

    public function edit($id = null) {
      $this->set('projects', $this->Project->find('list'));
      $this->Contractor->id = $id; 
      if ($this->request->is('post') || $this->request->is('put')) {
        if ($this->Contractor->save($this->request->data)) {
          $this->Session->setFlash(__('Data SPK telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));

          $this->redirect(array('action' => 'index'));
        } else {
          $this->Session->setFlash(__('Data SPK gagal di-update', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
        }
      } else {
        $this->request->data = $this->Contractor->read(null, $id);
      }
  }




  }
?>
