<?php
  App::uses('AppController', 'Controller'); 
  class PackagesController extends AppController {

  	public $uses = array('Package','Plane');

  	public function index() {   
  		$this->set('packages', $this->Package->find('all'));
 	}

	public function view($id = null) { 
  		$this->Package->id = $id; 
 		$this->set('packages', $this->Package->read(null, $id));
	}

	public function add() {
		$this->set('planes', $this->Plane->find('list'));
        
		if ($this->request->is('post')) {
			$quad_room = $this->params['data']['Package']['quad_room'];
            $this->request->data['Package']['quad_room'] = str_replace(',', '', $quad_room);
            $triple_room = $this->params['data']['Package']['triple_room'];
            $this->request->data['Package']['triple_room'] = str_replace(',', '', $triple_room);
			$double_room = $this->params['data']['Package']['double_room'];
            $this->request->data['Package']['double_room'] = str_replace(',', '', $double_room);

		    $this->Package->create();
		    if ($this->Package->save($this->request->data)) {
		    $this->Session->setFlash(__('Data Paket telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		      $this->Session->setFlash(__('Data Paket gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
		$this->set('planes', $this->Plane->find('list'));
        $this->Package->id = $id; 
	    if ($this->request->is('post') || $this->request->is('put')) {
	    	$quad_room = $this->params['data']['Package']['quad_room'];
            $this->request->data['Package']['quad_room'] = str_replace(',', '', $quad_room);
            $triple_room = $this->params['data']['Package']['triple_room'];
            $this->request->data['Package']['triple_room'] = str_replace(',', '', $triple_room);
			$double_room = $this->params['data']['Package']['double_room'];
            $this->request->data['Package']['double_room'] = str_replace(',', '', $double_room);

	      if ($this->Package->save($this->request->data)) {
	        $this->Session->setFlash(__('Data Paket telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        $this->Session->setFlash(__('Data Paket gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->Package->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Package->id = $id;
	  if ($this->Package->delete()) {
	    $this->Session->setFlash(__('Data Paket telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	    $this->Session->setFlash(__('Data Paket gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>