<?php

if (!defined('BASEPATH'))
  die();

class Locacao extends Main_Controller {

  public function index() {
    //carrega as views
    $this->load->view('include/header');
    $this->load->view('locacao_view');
    $this->load->view('include/footer');
  }
}

/* End of file locacao.php */
/* Location: ./application/controllers/locacao.php */
