<?php
  App::uses('AppController', 'Controller'); 
  class WebsitesController extends AppController {


  	public function beforeFilter(){
    parent::beforeFilter();
    $this->layout = 'website';

    $this->Auth->allow('index', 'view');

  	}
  	
  	public function index() {   

 	}


  }
?>