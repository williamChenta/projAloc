<?php

if (!defined('BASEPATH'))
  die();

class Blocos extends Main_Controller {

  public function index() {

    /***
     * verifica se quer incluir.
     * pega todos os dados post. 
     * o primeiro parâmetro indica o nome do campo post. se estiver null retorna todos os dados post
     * o segundo parâmetro indica que é para sanitizar os dados. XSS filter
     */
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'salvar' && empty($post['hdnId'])) {
      unset($post['hdnAcao']);
      unset($post['hdnId']);
      $this->incluiBloco($post);
    }

    //verifica se quer alterar
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'salvar' && !empty($post['hdnId'])) {
      unset($post['hdnAcao']);
      $this->alteraBloco($post);
    }

    //verifica se quer excluir
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'excluir') {
      $this->excluiBloco($post);
    }

    //lista os clientes cadastrados
    $data['linhas'] = $this->listaBlocos();

    //carrega as views
    $this->load->view('include/header');
    $this->load->view('blocos_view', $data);
    $this->load->view('include/footer');
  }

  public function listaBlocos() {
    $this->load->model('Blocos_model', '', TRUE);
    return $this->Blocos_model->getBlocos();
  }

  public function incluiBloco($post) {
    $this->load->model('Blocos_model', '', TRUE);
    $this->Blocos_model->setBloco($post);
  }

  public function alteraBloco($post) {
    $this->load->model('Blocos_model', '', TRUE);
    $this->Blocos_model->upBloco($post);
  }

  public function excluiBloco($post) {
    $this->load->model('Blocos_model', '', TRUE);
    $this->Blocos_model->delBloco($post['hdnId']);
  }

  public function ajxCarregaBloco() {
    $post = $this->input->post(NULL, TRUE);
    $this->load->model('Blocos_model', '', TRUE);
    $query = $this->Blocos_model->getBloco($post['hdnId']);

    foreach ($query->result() as $row) {
      $arr = array(); //Declaração da variável array
      $arr['id_bloco'] = $row->id_bloco;
      $arr['cod_bloco'] = $row->cod_bloco;
      $arr['desc_bloco'] = $row->desc_bloco;
      echo json_encode($arr);
    }
  }

}

/* End of file blocos.php */
/* Location: ./application/controllers/blocos.php */
