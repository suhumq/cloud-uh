<?php
  App::uses('AppController', 'Controller'); 
  class SalesController extends AppController {

  	public function index() {   
  		$this->set('sales', $this->Sale->find('all'));
 	}

	public function view($id = null) { 
  		$this->Sale->id = $id; 
 		$this->set('sales', $this->Sale->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
		    $this->Sale->create();
		    if ($this->Sale->save($this->request->data)) {
		    	$this->Session->setFlash(__('Data Marketing telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));

		      $this->redirect(array('action' => 'index'));
		    } else {
		    	$this->Session->setFlash(__('Data Marketing gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
	    $this->Sale->id = $id; 
	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->Sale->save($this->request->data)) {
	      	$this->Session->setFlash(__('Data Marketing telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));

	        $this->redirect(array('action' => 'index'));
	      } else {
	      	$this->Session->setFlash(__('Data Marketing gagal di-update', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->Sale->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Sale->id = $id;
	  if ($this->Sale->delete()) {
	    $this->Session->setFlash(__('Data Marketing telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));

	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Marketing gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));

	    $this->redirect(array('action' => 'index'));
	}


  }
?>