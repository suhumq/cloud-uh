<?php
  App::uses('AppController', 'Controller'); 
  class JurnalsController extends AppController {

  	public $uses = array('Jurnal','Package');
  	
  	public function index() {   
  		// $this->set('jurnals', $this->Jurnal->find('all'));

        $conditions = array('type_currency' => array('Jurnal.type_currency' => 1));
        $conditions2 = array('type_currency' => array('Jurnal.type_currency' => 2));
        
        $this->set('jurnals', $this->Jurnal->find('all',array(
            'conditions'=>$conditions,
            'recursive'=>0
        )));

         $this->set('jurnals2', $this->Jurnal->find('all',array(
            'conditions'=>$conditions2,
            'recursive'=>0
        )));


      
 	}

      function search() { 
                    $this->set('projects', $this->Project->find('list'));

            $a = $this->params['data']; 
            debug($a);
            debug($a);
             
        } 
 	
  public function profit_loss() {
      $this->set('packages', $this->Package->find('list'));
      $this->set('jurnals', $this->Jurnal->find('all'));

      $packagename = 0;
      $this->set('packagename', $packagename);

      $paket = 0;
      $this->set('paket', $paket);

      $operasional_paket = 0;
      $this->set('operasional_paket', $operasional_paket);
      
      $curr = 'Rp.';
      $this->set('curr', $curr);

      
      $cp = $this->request->is('post');
      if ($cp == true)
      {      

      $b_currency = $this->params['data']['Jurnal']['type_currency'];
      if ($b_currency == '1'):
        $curr = 'Rp.';
        $this->set('curr', $curr);
      else:
        $curr = '$.';
        $this->set('curr', $curr);
      endif;

      $a = $this->params['data']['Jurnal']['package_id']; 
      $package = $this->Package->findById($a);
      $a_result = $package['Package']['date_going'];
      $packagename = $package['Package']['name'];
      $this->set('packagename', $packagename);
      
      //Pemasukan
      if ($packagename == 'Non Paket'):
        $paket = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE date_going_package = 0 AND type_currency = $b_currency AND type_trans = 3;");
        $this->set('paket', $paket);   
        $descpaket1 = 'Pemasukan Non Paket';
        $this->set('descpaket1', $descpaket1); 
      else:
        $paket = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE date_going_package = '$a_result' AND type_currency = $b_currency AND type_trans = 1;");
        $this->set('paket', $paket);
        $descpaket1 = 'Pemasukan Paket';
        $this->set('descpaket1', $descpaket1);
      endif;

      //Pengeluaran
      if ($packagename == 'Non Paket'):
        $operasional_paket = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE date_going_package = 0 AND type_currency = $b_currency AND type_trans = 2;");
        $this->set('operasional_paket', $operasional_paket);
        $descpaket = 'Operasional Non Paket';
        $this->set('descpaket', $descpaket);
      else:
        $operasional_paket = $this->Jurnal->query("SELECT SUM(amount) FROM jurnals WHERE date_going_package = '$a_result' AND type_currency = $b_currency AND type_trans = 2;");
        $this->set('operasional_paket', $operasional_paket);
        $descpaket = 'Operasional Paket';
        $this->set('descpaket', $descpaket);
      endif;

       $neraca_kas = ($paket[0][0]['SUM(amount)'] - $operasional_paket[0][0]['SUM(amount)']);
       $this->set('neraca_kas', $neraca_kas);
      }
      else
      {
       $neraca_kas = 0;
       $this->set('neraca_kas', $neraca_kas); 
      }

  }
	

	
  }
?>