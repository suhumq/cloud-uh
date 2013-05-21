<?php
  App::uses('AppController', 'Controller');
  class BackcashflowsController extends AppController {

  	public $uses = array('Backcashflow');

  	// public function beforeFilter(){
   //  parent::beforeFilter();
   //  $this->Auth->allow('index', 'view');
  	// }

  	public function index() {
  		$this->set('backcashflows', $this->Backcashflow->find('all'));
 	}

	public function view($id = null) {
  		$this->Backcashflow->id = $id;
 		$this->set('backcashflows', $this->Backcashflow->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
		    $this->Backcashflow->create();
		    if ($this->Backcashflow->save($this->request->data)) {
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
	    $this->Backcashflow->id = $id;
	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->Backcashflow->save($this->request->data)) {
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
	      $this->request->data = $this->Backcashflow->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Backcashflow->id = $id;
	  if ($this->Backcashflow->delete()) {
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