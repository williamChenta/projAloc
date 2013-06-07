<?php

if (!defined('BASEPATH'))
  die();

class Locacao extends Main_Controller {

  public function index() {
    
    //lista todas as salas (temporário)
    $data['linhas'] = $this->listaSalas();
    
    //carrega as views
    $this->load->view('include/header');
    $this->load->view('locacao_view', $data);
    $this->load->view('include/footer');
  }
  
  public function listaSalas(){
    $this->load->model('Salas_model', '', TRUE);
    return $this->Salas_model->getSalas();
  }  
}

/* End of file locacao.php */
/* Location: ./application/controllers/locacao.php */
