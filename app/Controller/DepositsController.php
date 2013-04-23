<?php
  App::uses('AppController', 'Controller'); 
  class DepositsController extends AppController {

  	public $uses = array('Package','Jurnal','Cashflow');
  	
  	public function index() {   
  		$conditions = array('type_trans' => array('Jurnal.type_trans' => 3));
        $this->set('jurnals', $this->Jurnal->find('all',array(
            'conditions'=>$conditions,
            'recursive'=>0
        )));
        $cond_cashflow = array('flag' => array('Cashflow.flag' => 1));
        $this->set('cashflows', $this->Cashflow->find('list',array(
            'conditions'=>$cond_cashflow,
            'recursive'=>0
        )));

  		if ($this->request->is('post')) {
  			$date_going_package = 0;
  			$amount = $this->params['data']['Jurnal']['amount'];
  			$kurs = $this->params['data']['Jurnal']['kurs'];
  			$this->request->data['Jurnal']['date_going_package'] = $date_going_package;
			$this->request->data['Jurnal']['amount'] = str_replace(',', '', $amount);
			$this->request->data['Jurnal']['kurs'] = str_replace(',', '', $kurs);
		    $this->Jurnal->create();
		    if ($this->Jurnal->save($this->request->data)) {
		      $this->Session->setFlash(__('Data telah berhasil ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
		      $this->redirect(array('action' => 'index'));
		    } else {
		      $this->Session->setFlash(__('Data gagal ditambahkan', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		    }
		}
  	}


	public function edit($id = null) {

        $cond_cashflow = array('flag' => array('Cashflow.flag' => 1));
        $this->set('cashflows', $this->Cashflow->find('list',array(
            'conditions'=>$cond_cashflow,
            'recursive'=>0
        )));

        $this->Jurnal->id = $id;
        $this->Jurnal->recursive = 1;
        if (!$this->Jurnal->exists()) {
            throw new NotFoundException(__('Invalid booking'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Jurnal->save($this->request->data)) {
                $this->Session->setFlash(__('Data telah berhasil di-update', null), 'default', array('class' => 'alert alert-success'));

                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data gagal di-update', null), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $this->data = $this->Jurnal->read(null, $id);
            $this->set('data', $this->data);
        }
        //debug($this->request->data);
    }

     public function delete($id = null) {
        $this->Jurnal->id = $id;
        if ($this->Jurnal->delete()) {
            $this->Session->setFlash(__('Data telah berhasil dihapus', null), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Data gagal dihapus', null), 'default', array('class' => 'alert alert-error'));
        $this->redirect(array('action' => 'index'));
    }


  }
?>