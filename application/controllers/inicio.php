<?php

if (!defined('BASEPATH'))
  die();

class Inicio extends Main_Controller {

  public function index() {
    $this->load->view('include/header');
    $this->load->view('alocacao');
    $this->load->view('include/footer');
  }

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */
