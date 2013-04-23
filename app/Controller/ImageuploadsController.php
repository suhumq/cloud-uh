<?php  
class ImageuploadsController extends AppController { 

    public $name = 'Imageuploads'; 
    public $uses = array('Imageupload'); 
    public $helpers = array('Html', 'Form', 'Js', 'Number');
    // public $layout = 'public'; 

    public function admin_index() { 
      $this->set('images', 
        $this->Imageupload->readFolder(WWW_ROOT.DS.'uploads') 
      ); 
    } 

    public function admin_upload() { 
      if (!empty($this->data)) { 
        if($this->Imageupload->upload($this->data)) { 
          $this->Session->setFlash('Gambar berhasil dimasukan'); 
        } else { 
          $this->Session->setFlash('Ada masalah saat proses upload gambar, cobalah lagi!'); 
        } 
        $this->redirect(array('action' => 'index')); 
      } else { 
        $this->redirect(array('action' => 'index')); 
      } 
    } 
} 
?> 
