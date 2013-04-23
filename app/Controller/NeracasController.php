<?php
  App::uses('AppController', 'Controller'); 
  class NeracasController extends AppController {

  	public $uses = array('Jurnal','Project');

  	
  	public function index() {  
      $this->set('projects', $this->Project->find('list'));
      
      $projectname = 0;
      $this->set('projectname', $projectname);

      $cp = $this->request->is('post');
      if ($cp == true)
      {
        // $date_one = $this->params['data']['Neraca']['date_one'];
        // $date_two = $this->params['data']['Neraca']['date_two'];
        $a = $this->params['data']['Neraca']['project_id']; 
        $projectname = $this->Project->findById($a);
        $this->set('projectname', $projectname);
      
        $project_id = $this->params['data']['Neraca']['project_id'];
        $kas = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE cashflow_id = 45 AND project_id = $project_id;");
        $opr = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE operationalproject_id AND project_id = $project_id;");
        $results = ($kas[0][0]['SUM(amount)'] - $opr[0][0]['SUM(amount)']);
        $this->set('results', $results);
      }
      else
      {
        $results = 0;
        $this->set('results', $results);
      }
    }
  }
?>