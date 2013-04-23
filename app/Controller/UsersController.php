<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

  // public function beforeFilter() {
  //   parent::beforeFilter();
  //   $this->Auth->allow('admin_add');
  // }

  public function login() {
  	$this->layout = 'login';
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
      	$this->Session->setFlash(__('Selamat Anda telah berhasil Login!', null), 
                            'default', 
                             array('class' => 'alert alert-info'));
      	$this->redirect($this->Auth->redirect());

      } else {
      	$this->Session->setFlash(__('Maaf, Username atau Password Anda tidak sesuai.', null), 
                            'default', 
                             array('class' => 'alert alert-danger'));
      	
      }
    }
  }
  
  public function logout() {
  	$this->Session->setFlash(__('Terimakasih, Anda telah Logout!', null), 
                            'default', 
                             array('class' => 'alert alert-info'));
        
    $this->redirect($this->Auth->logout());
  }

	public function index() {
		$userId = $this->Auth->user('full_name');
		// debug($userId);
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Akun tidak ditemukan'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Akun berhasil disimpan'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Akun gagal disimpan, silahkan coba lagi!'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->User->id = $id; 
		if ($this->request->is('post') || $this->request->is('put')) {
	      if ($this->User->save($this->request->data)) {
	      		$this->Session->setFlash(__('Username berhasil di-update', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
	        $this->redirect(array('action' => 'index'));
	      } else {
	        	$this->Session->setFlash(__('Username gagal di-update', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
	      }
	    } else {
	      $this->request->data = $this->User->read(null, $id);
	    }
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Akun tidak ditemukan'));
		}
		if ($this->User->delete()) {
				$this->Session->setFlash(__('Username berhasil dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
			$this->Session->setFlash(__('Username gagal dihapus', null), 
                            'default', 
                             array('class' => 'alert alert-error'));
		$this->redirect(array('action' => 'index'));
	}
}
