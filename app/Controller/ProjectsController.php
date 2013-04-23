<?php
  App::uses('AppController', 'Controller'); 
  class ProjectsController extends AppController {

  	public $uses = array('Project');

  	// public function beforeFilter(){
   //  parent::beforeFilter();
   //  $this->Auth->allow('index', 'view');
  	// }
  	
  	public function index() {   
  		$this->set('projects', $this->Project->find('all'));
 	}

	public function view($id = null) { 
  		$this->Project->id = $id; 
 		$this->set('projects', $this->Project->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
		    $this->Project->create();
		    if ($this->Project->save($this->request->data)) {
		    $this->Session->setFlash(__('Data Project telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		      $this->Session->setFlash(__('Data Project gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
	    $this->Project->id = $id; 
	    if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->Project->save($this->request->data)) {
	        $this->Session->setFlash(__('Data Project telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data Project gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->Project->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Project->id = $id;
	  if ($this->Project->delete()) {
	    $this->Session->setFlash(__('Data Project telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Project gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>