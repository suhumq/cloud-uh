<?php
  App::uses('AppController', 'Controller'); 
  class CustomersController extends AppController {

  	public function index() {   
  		$this->set('customers', $this->Customer->find('all'));
 	}

	public function view($id = null) { 
  		$this->Customer->id = $id; 
 		$this->set('customers', $this->Customer->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
		    $this->Customer->create();
		    if ($this->Customer->save($this->request->data)) {
		    	$this->Session->setFlash(__('Data Customer telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));

		      $this->redirect(array('action' => 'index'));
		    } else {
		    	$this->Session->setFlash(__('Data Customer gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
	    $this->Customer->id = $id; 
	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->Customer->save($this->request->data)) {
	      	$this->Session->setFlash(__('Data Customer telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));

	        $this->redirect(array('action' => 'index'));
	      } else {
	      	$this->Session->setFlash(__('Data Customer gagal di-update', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->Customer->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Customer->id = $id;
	  if ($this->Customer->delete()) {
	    $this->Session->setFlash(__('Data Customer telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));

	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Customer gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));

	    $this->redirect(array('action' => 'index'));
	}


  }
?>