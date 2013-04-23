<?php
  App::uses('AppController', 'Controller'); 
  class PlanesController extends AppController {

  	public $uses = array('Plane');

  	// public function beforeFilter(){
   //  parent::beforeFilter();
   //  $this->Auth->allow('index', 'view');
  	// }
  	
  	public function index() {   
  		$this->set('planes', $this->Plane->find('all'));
 	}

	public function view($id = null) { 
  		$this->Plane->id = $id; 
 		$this->set('planes', $this->Plane->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
		    $this->Plane->create();
		    if ($this->Plane->save($this->request->data)) {
		    $this->Session->setFlash(__('Data Maskapai telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		      $this->Session->setFlash(__('Data Maskapai gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
	    $this->Plane->id = $id; 
	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->Plane->save($this->request->data)) {
	        $this->Session->setFlash(__('Data Maskapai telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data Maskapai gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->Plane->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Plane->id = $id;
	  if ($this->Plane->delete()) {
	    $this->Session->setFlash(__('Data Maskapai telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Maskapai gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>