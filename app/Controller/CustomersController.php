<?php
  App::uses('AppController', 'Controller'); 
  class CustomersController extends AppController {

  	public function index() {   
  		$this->set('customers', $this->Customer->find('all'));
 	}

	public function print_cust($id = null) { 
  		$this->Customer->id = $id; 
 		$this->set('customers', $this->Customer->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$filename1 =isset($this->data['Customer']['image']['name']) ? $this->data['Customer']['image']['name'] : NULL;
			
			//debug($this->data);
			if($filename1!=NULL){
				copy($this->data['Customer']['image']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename1); 	   
			
			}
			
			$this->request->data['Customer']['image']= "galery-".$filename1;


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
	    $photo = $this->Customer->findById($id);
	    $this->set('photo',$photo);

	    if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Unit tidak ada'));
		}


	    if ($this->request->is('post') || $this->request->is('put')) {

	    	$filename =isset($this->data['Customer']['image_1']['name']) ? $this->data['Customer']['image_1']['name'] : NULL;
			if($filename!=NULL){
				copy($this->data['Customer']['image_1']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename); 	   
			}
			$this->request->data['Customer']['image_1']= "galery-".$filename;

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