<?php
  App::uses('AppController', 'Controller'); 
  class UnitsController extends AppController {

  	public $uses = array('Project','Unit');
  	
  	public function index() {   
  		$this->set('units', $this->Unit->find('all'));
 	}

	public function view($id = null) { 
  		$this->Unit->id = $id; 
 		$this->set('units', $this->Unit->read(null, $id));
	}

	public function add() {
		$this->set('projects', $this->Project->find('list'));
		if ($this->request->is('post')) {

			$filename1 =isset($this->data['Unit']['image_1']['name']) ? $this->data['Unit']['image_1']['name'] : NULL;
			$filename2 =isset($this->data['Unit']['image_2']['name']) ? $this->data['Unit']['image_2']['name'] : NULL;
			$filename3 =isset($this->data['Unit']['image_3']['name']) ? $this->data['Unit']['image_3']['name'] : NULL;
			
			//debug($this->data);
			if($filename1!=NULL){
				copy($this->data['Unit']['image_1']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename1); 	   
			
			}
			if ($filename2!=NULL){
				copy($this->data['Unit']['image_2']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename2); 
			}
			if ($filename3!=NULL){
				copy($this->data['Unit']['image_3']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename3); 
			}
			$this->request->data['Unit']['image_1']= "galery-".$filename1;
			$this->request->data['Unit']['image_2']= "galery-".$filename2;
			$this->request->data['Unit']['image_3']= "galery-".$filename3;

			$price_brochure = $this->params['data']['Unit']['price_brochure'];
			$price_sell = $this->params['data']['Unit']['price_sell'];
			$charge = $this->params['data']['Unit']['charge'];
			$downpayment = $this->params['data']['Unit']['downpayment'];
			$fee = $this->params['data']['Unit']['fee'];
			$plafond = $this->params['data']['Unit']['plafond'];
			
			$this->request->data['Unit']['price_brochure']= str_replace(',', '', $price_brochure);
			$this->request->data['Unit']['price_sell']= str_replace(',', '', $price_sell);
			$this->request->data['Unit']['charge']= str_replace(',', '', $charge);
			$this->request->data['Unit']['downpayment']= str_replace(',', '', $downpayment);
			$this->request->data['Unit']['fee']= str_replace(',', '', $fee);
			$this->request->data['Unit']['plafond']= str_replace(',', '', $plafond);



		    $this->Unit->create();
		    if ($this->Unit->save($this->request->data)) {
		      $this->Session->setFlash(__('Data Unit telah berhasil disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      // $this->_flash(__('Success message.', true),'success');
		      $this->redirect(array('action' => 'index'));
		    } else {
		    	$this->Session->setFlash(__('Data Unit gagal disimpan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
	}

	public function edit($id = null) {
	    $this->Unit->id = $id; 
	    $_xs = $this->Unit->findById($id);
	    $this->set('photo',$_xs);

	    if (!$this->Unit->exists()) {
			throw new NotFoundException(__('Unit tidak ada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {		
			$filename1 =isset($this->data['Unit']['image_1']['name']) ? $this->data['Unit']['image_1']['name'] : NULL;
			$filename2 =isset($this->data['Unit']['image_2']['name']) ? $this->data['Unit']['image_2']['name'] : NULL;
			$filename3 =isset($this->data['Unit']['image_3']['name']) ? $this->data['Unit']['image_3']['name'] : NULL;
			
			if($filename1!=NULL){
				copy($this->data['Unit']['image_1']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename1); 	   
			
			}
			if ($filename2!=NULL){
				copy($this->data['Unit']['image_2']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename2); 
			}
			if ($filename3!=NULL){
				copy($this->data['Unit']['image_3']['tmp_name'],WWW_ROOT.DS.'uploads/galery-'.$filename3); 
			}
			$this->request->data['Unit']['image_1']= "galery-".$filename1;
			$this->request->data['Unit']['image_2']= "galery-".$filename2;
			$this->request->data['Unit']['image_3']= "galery-".$filename3;

			$price_brochure = $this->params['data']['Unit']['price_brochure'];
			$price_sell = $this->params['data']['Unit']['price_sell'];
			$charge = $this->params['data']['Unit']['charge'];
			$downpayment = $this->params['data']['Unit']['downpayment'];
			$fee = $this->params['data']['Unit']['fee'];
			$plafond = $this->params['data']['Unit']['plafond'];
			
			$this->request->data['Unit']['price_brochure']= str_replace(',', '', $price_brochure);
			$this->request->data['Unit']['price_sell']= str_replace(',', '', $price_sell);
			$this->request->data['Unit']['charge']= str_replace(',', '', $charge);
			$this->request->data['Unit']['downpayment']= str_replace(',', '', $downpayment);
			$this->request->data['Unit']['fee']= str_replace(',', '', $fee);
			$this->request->data['Unit']['plafond']= str_replace(',', '', $plafond);

		}



	    $this->set('projects', $this->Project->find('list'));
		if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->Unit->save($this->request->data)) {
	        $this->Session->setFlash(__('Data Unit telah berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	      	$this->Session->setFlash(__('Data Unit gagal di-update', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->Unit->read(null, $id);
	    }
	}

	public function delete($id = null) {
	  $this->Unit->id = $id;
	  if ($this->Unit->delete()) {
	    $this->Session->setFlash(__('Data Unit telah berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	    $this->redirect(array('action' => 'index'));
	  }
	  	$this->Session->setFlash(__('Data Unit gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	    $this->redirect(array('action' => 'index'));
	}


  }
?>