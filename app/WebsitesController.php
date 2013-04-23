<?php
  App::uses('AppController', 'Controller'); 
  class ProjectsController extends AppController {

  	$this->layout = 'websites';

  	public function beforeFilter(){
    parent::beforeFilter();
    $this->Auth->allow('index', 'view');
  	}
  	
  	public function index() {   
  		$this->set('projects', $this->Project->find('all'));
 	}


  }
?>