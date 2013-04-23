<?php
  App::uses('AppController', 'Controller'); 
  class GroupBookingsController extends AppController {

  	public $uses = array('GroupBooking');
  	
  	public function index() {   
  		$this->set('groupbookings', $this->GroupBooking->find('all'));
 	}


	public function add() {
		if ($this->request->is('post')) {
		    $this->GroupBooking->create();
		    if ($this->GroupBooking->save($this->request->data)) {
		    $this->Session->setFlash(__('Data Group telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		      $this->Session->setFlash(__('Data Group gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
	    $this->GroupBooking->id = $id; 
	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->GroupBooking->save($this->request->data)) {
	        $this->Session->setFlash(__('Data Group telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data group gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->GroupBooking->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->GroupBooking->id = $id;
	  if ($this->GroupBooking->delete()) {
	    $this->Session->setFlash(__('Data Group telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Group gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>