<?php
  App::uses('AppController', 'Controller');
  class OperationalsController extends AppController {

  	public $uses = array('Package','Jurnal','Cashflow', 'Backcashflow');

  	public function index() {
  		$conditions = array('type_trans' => array('Jurnal.type_trans' => 2) );
        $this->set('jurnals', $this->Jurnal->find('all',array(
            'conditions'=>$conditions,
            'contain' => true,
            'order'=>('Jurnal.date_trans asc'),
            'recursive'=>0
        )));


        // $cond_cashflow = array('flag' => array('Cashflow.flag' => 0));
        // $this->set('cashflows', $this->Cashflow->find('list',array(
        //     'conditions'=>$cond_cashflow,
        //     'recursive'=>0
        // )));
        // $cond_cashflow2 = array('flag' => array('Cashflow.flag' => 1));
        // $this->set('cashflowss', $this->Cashflow->find('list',array(
        //     'conditions'=>$cond_cashflow2,
        //     'recursive'=>0
        // )));

        $this->set('cashflows', $this->Cashflow->find('list'));
        $this->set('backcashflows', $this->Backcashflow->find('list'));
        $this->set('packages', $this->Package->find('list'));

  		if ($this->request->is('post')) {
  			$cond_package = $this->Package->find('all', array('conditions' => array('Package.id' => ($this->params['data']['Jurnal']['package_id']))));
  			$date_going_package = $cond_package['0']['Package']['date_going'];
  			$amount = $this->params['data']['Jurnal']['amount'];
  			$kurs = $this->params['data']['Jurnal']['kurs'];

        if ($date_going_package = ''):
        $this->request->data['Jurnal']['date_going_package'] = 0;
        else:
        $this->request->data['Jurnal']['date_going_package'] = $date_going_package;
        endif;


			  $this->request->data['Jurnal']['amount'] = str_replace(',', '', $amount);
			  $this->request->data['Jurnal']['kurs'] = str_replace(',', '', $kurs);
		    $this->Jurnal->create();
		    if ($this->Jurnal->save($this->request->data)) {
          $price_amount = $this->params['data']['Jurnal']['amount'];
          $this->request->data['Jurnal']['amount'] = str_replace(',', '', $price_amount);
          $price_kurs = $this->params['data']['Jurnal']['kurs'];
          $this->request->data['Jurnal']['kurs'] = str_replace(',', '', $price_kurs);
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


        $this->Jurnal->id = $id;
        $this->Jurnal->recursive = 1;

          $this->set('cashflows', $this->Cashflow->find('list'));
        $this->set('backcashflows', $this->Backcashflow->find('list'));
        $this->set('packages', $this->Package->find('list'));

        if (!$this->Jurnal->exists()) {
            throw new NotFoundException(__('Invalid booking'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $price_amount = $this->params['data']['Jurnal']['amount'];
            $this->request->data['Jurnal']['amount'] = str_replace(',', '', $price_amount);
            $price_kurs = $this->params['data']['Jurnal']['kurs'];
            $this->request->data['Jurnal']['kurs'] = str_replace(',', '', $price_kurs);
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