<?php

App::uses('AppController', 'Controller');

class BookingsController extends AppController {
    // var $helpers = array('Javascript');
    public $uses = array('Customer', 'Booking','Package','Cashflow' , 'Jurnal', 'Requirement','Equipment','GroupBooking');

    function call() {

        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->set('element', $_GET['element']);
        }
    }

    public function index() {
        $this->set('booking_umrahs', $this->Booking->find('all'));
    }

     public function booklet($id = null) {
        $conditions = array('package_id' => array('Booking.package_id' => $id));
        $this->set('booking_umrahs', $this->Booking->find('all',array(
            'conditions'=>$conditions,
            'recursive'=>0
        )));
    }

    public function add_umrah() {
        $this->set('customers', $this->Customer->find('list'));

        $this->set('groupbookings', $this->GroupBooking->find('list'));
          
      
        $conditions = array('package_type' => array('Package.package_type' => 1));
        $this->set('packages', $this->Package->find('list',array(
            'conditions'=>$conditions,
            'recursive'=>0
        )));
        
        $requires = $this->Requirement->query("SELECT * FROM requirements WHERE req_type = 1;");
        $this->set('requires', $requires);    

        $equips = $this->Equipment->query("SELECT * FROM equipment WHERE equ_type = 1;");
        $this->set('equips', $equips);    

        $nomor_opr = $this->Booking->query("SELECT MAX(id) FROM bookings;");
        $invoice = $nomor_opr;
        $this->set('invoice', $invoice);

        if ($this->request->is('post')) {
            $price_room = $this->params['data']['Booking']['room_amount'];
            $this->request->data['Booking']['room_amount'] = str_replace(',', '', $price_room);
            $discount_room = $this->params['data']['Booking']['room_discount'];
            $this->request->data['Booking']['room_discount'] = str_replace(',', '', $discount_room);
            $this->Booking->create();
            if ($this->Booking->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Data Umrah telah berhasil disimpan', null), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data Umrah gagal disimpan', null), 'default', array('class' => 'alert alert-error'));
            }
        }
    }



    public function add_haji() {
        $this->set('customers', $this->Customer->find('list'));
        $this->set('groupbookings', $this->GroupBooking->find('list'));

        $conditions = array('package_type' => array('Package.package_type' => 2));
        $this->set('packages', $this->Package->find('list',array(
            'conditions'=>$conditions,
            'recursive'=>0
        )));
        
        $requires = $this->Requirement->query("SELECT * FROM requirements WHERE req_type = 1;");
        $this->set('requires', $requires);
        $equips = $this->Equipment->query("SELECT * FROM equipment WHERE equ_type = 1;");
        $this->set('equips', $equips); 

        $nomor_opr = $this->Booking->query("SELECT MAX(id) FROM bookings;");
        $invoice = $nomor_opr;
        $this->set('invoice', $invoice);
        if ($this->request->is('post')) {
            $price_room = $this->params['data']['Booking']['room_amount'];
            $this->request->data['Booking']['room_amount'] = str_replace(',', '', $price_room);
            $discount_room = $this->params['data']['Booking']['room_discount'];
            $this->request->data['Booking']['room_discount'] = str_replace(',', '', $discount_room);
            $this->Booking->create();
            if ($this->Booking->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Data Haji telah berhasil disimpan', null), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data Haji gagal disimpan', null), 'default', array('class' => 'alert alert-error'));
            }
        }
    }

    public function edit_haji($id = null) {
        $this->Booking->id = $id;
        $this->Booking->recursive = 1;
        if (!$this->Booking->exists()) {
            throw new NotFoundException(__('Invalid booking'));
        }
        
        $this->set('customers', $this->Customer->find('list'));
        $conditions = array('package_type' => array('Package.package_type' => 2));
        $this->set('packages', $this->Package->find('list',array(
            'conditions'=>$conditions,
            'recursive'=>0
        )));
        $this->set('groupbookings', $this->GroupBooking->find('list'));

        $requires = $this->Requirement->query("SELECT * FROM requirements WHERE req_type = 1;");
        $this->set('requires', $requires);
        $equips = $this->Equipment->query("SELECT * FROM equipment WHERE equ_type = 1;");
        $this->set('equips', $equips); 

        if ($this->request->is('post') || $this->request->is('put')) {
            $price_room = $this->params['data']['Booking']['room_amount'];
            $this->request->data['Booking']['room_amount'] = str_replace(',', '', $price_room);
            $discount_room = $this->params['data']['Booking']['room_discount'];
            $this->request->data['Booking']['room_discount'] = str_replace(',', '', $discount_room);

            if ($this->Booking->save($this->request->data)) {
                $this->Session->setFlash(__('Data  telah berhasil di-update', null), 'default', array('class' => 'alert alert-success'));

                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data  gagal di-update', null), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $this->data = $this->Booking->read(null, $id);
            $this->set('data', $this->data);
        }
    }


    public function edit_umrah($id = null) {
        $this->Booking->id = $id;
        $this->Booking->recursive = 1;
        if (!$this->Booking->exists()) {
            throw new NotFoundException(__('Invalid booking'));
        }

        $this->set('customers', $this->Customer->find('list'));
        $conditions = array('package_type' => array('Package.package_type' => 1));
        $this->set('packages', $this->Package->find('list',array(
            'conditions'=>$conditions,
            'recursive'=>0
        )));

        $this->set('groupbookings', $this->GroupBooking->find('list'));
        $requires = $this->Requirement->query("SELECT * FROM requirements WHERE req_type = 1;");
        $this->set('requires', $requires);
        $equips = $this->Equipment->query("SELECT * FROM equipment WHERE equ_type = 1;");
        $this->set('equips', $equips); 
        
        if ($this->request->is('post') || $this->request->is('put')) {
            $price_room = $this->params['data']['Booking']['room_amount'];
            $this->request->data['Booking']['room_amount'] = str_replace(',', '', $price_room);
            $discount_room = $this->params['data']['Booking']['room_discount'];
            $this->request->data['Booking']['room_discount'] = str_replace(',', '', $discount_room);
            if ($this->Booking->save($this->request->data)) {
                $this->Session->setFlash(__('Data  telah berhasil di-update', null), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data gagal di-update', null), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $this->data = $this->Booking->read(null, $id);
            $this->set('data', $this->data);
        }
    }

    public function transaction_umrah($id = null) {
        $this->Booking->id = $id;
        $this->set('booking', $this->Booking->read(null, $id));
        $_conditions = array('conditions' => array('Booking.id' => $id));
        $info_umrah = $this->Jurnal->find('all', $_conditions);
        $this->set('info_umrah', $info_umrah);

        $cond_cashflow = array('flag' => array('Cashflow.flag' => 1));
        $this->set('cashflows', $this->Cashflow->find('list',array(
            'conditions'=>$cond_cashflow,
            'recursive'=>0
        )));
       
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Booking->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Data Transaksi Booking telah berhasil ditambahkan', null), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data Transaksi Booking gagal ditambahkan', null), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->Booking->read(null, $id);
        }
    }


    public function transaction_haji($id = null) {
        $this->Booking->id = $id;
        $this->set('booking', $this->Booking->read(null, $id));
        $_conditions = array('conditions' => array('Booking.id' => $id));
        $info_umrah = $this->Jurnal->find('all', $_conditions);
        $this->set('info_umrah', $info_umrah);

        $cond_cashflow = array('flag' => array('Cashflow.flag' => 1));
        $this->set('cashflows', $this->Cashflow->find('list',array(
            'conditions'=>$cond_cashflow,
            'recursive'=>0
        )));
       
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Booking->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Data Transaksi Booking telah berhasil ditambahkan', null), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Data Transaksi Booking gagal ditambahkan', null), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->Booking->read(null, $id);
        }
    }


    public function invoice($id = null) {
        $this->Booking->id = $id;
        $this->set('booking', $this->Booking->read(null, $id));
        $_conditions = array('conditions' => array('Booking.id' => $id));
        $info_umrah = $this->Jurnal->find('all', $_conditions);
        $this->set('info_umrah', $info_umrah);

        
        $this->request->data = $this->Booking->read(null, $id);
        
    }


    public function deleteJurnal() {
        $jurnal = $_GET;
        $id = $jurnal['id_jurnal'];
        $data['Booking']['id'] = $jurnal['id_trans'];
        $this->Jurnal->removeData($id);
        $data = ClassRegistry::init('Jurnal')->find('all', array(
            'conditions' => array('Jurnal.booking_id' => $data['Booking']['id']),
            'recursive' => -1)
        );

        echo json_encode($data);
        die();
    }


    
    public function addJurnal($id = null) {
        $jurnal = $_GET;
        if (isset($jurnal['id_jurnal'])) {
            $data['Booking']['jurnal_id'] = $jurnal['id_jurnal'];
        }

        // debug($data['Booking']['Package']['date_going']);
            
        $data['Booking']['id'] = $jurnal['id_trans'];
        $data['Booking']['cashflow_id'] = $jurnal['umrahCashflow'];
        $data['Booking']['type_currency'] = $jurnal['umrahTipekurs'];
        $data['Booking']['kurs'] = $jurnal['umrahKurs'];
        $data['Booking']['amount'] = $jurnal['umrahAmount'];
        $data['Booking']['desc_payment'] = $jurnal['umrahDescpayment'];
        $data['Booking']['type_trans'] = $jurnal['umrahTypetrans'];
        $data['Booking']['date_trans'] = $jurnal['umrahDatetrans'];
        
        $this->Jurnal->addDataJurnal($data);
        $msg = array("username" => "Test User", "success" => true);
        $data = ClassRegistry::init('Jurnal')->find('all', array(
            'conditions' => array('Jurnal.booking_id' => $data['Booking']['id']),
            'recursive' => -1)
        );
        echo json_encode($data);
        die();
    }

   
    public function delete($id = null) {
        $this->Booking->id = $id;
        if ($this->Booking->delete()) {
            $this->Session->setFlash(__('Data telah berhasil dihapus', null), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Data gagal dihapus', null), 'default', array('class' => 'alert alert-error'));
        $this->redirect(array('action' => 'index'));
    }


}

?>
