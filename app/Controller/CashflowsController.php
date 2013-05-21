<?php
  App::uses('AppController', 'Controller');
  class CashflowsController extends AppController {

  	public $uses = array('Cashflow');

  	// public function beforeFilter(){
   //  parent::beforeFilter();
   //  $this->Auth->allow('index', 'view');
  	// }

  	public function index() {
  		$this->set('cashflows', $this->Cashflow->find('all'));
 	}

	public function view($id = null) {
  		$this->Cashflow->id = $id;
 		$this->set('cashflows', $this->Cashflow->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
		    $this->Cashflow->create();
		    if ($this->Cashflow->save($this->request->data)) {
		    $this->Session->setFlash(__('Data Cashflow telah berhasil disimpan', null),
                            'default',
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		      $this->Session->setFlash(__('Data Cashflow gagal disimpan', null),
                            'default',
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
	    $this->Cashflow->id = $id;
	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->Cashflow->save($this->request->data)) {
	        $this->Session->setFlash(__('Data Cashflow telah berhasil di-update', null),
                            'default',
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data Cashflow gagal disimpan', null),
                            'default',
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->Cashflow->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Cashflow->id = $id;
	  if ($this->Cashflow->delete()) {
	    $this->Session->setFlash(__('Data Cashflow telah berhasil dihapus', null),
                            'default',
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Cashflow gagal dihapus', null),
                            'default',
                             array('class' => 'alert alert-error'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>