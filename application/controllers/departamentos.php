<?php

if (!defined('BASEPATH'))
  die();

class Departamentos extends Main_Controller {

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
      $this->incluiDepartamento($post);
    }

    //verifica se quer alterar
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'salvar' && !empty($post['hdnId'])) {
      unset($post['hdnAcao']);
      $this->alteraDepartamento($post);
    }

    //verifica se quer excluir
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'excluir') {
      $this->excluiDepartamento($post);
    }

    //lista os clientes cadastrados
    $data['linhas'] = $this->listaDepartamentos();

    //carrega as views
    $this->load->view('include/header');
    $this->load->view('departamentos_view', $data);
    $this->load->view('include/footer');
  }

  public function listaDepartamentos() {
    $this->load->model('Departamentos_model', '', TRUE);
    return $this->Departamentos_model->getDepartamentos();
  }

  public function incluiDepartamento($post) {
    $this->load->model('Departamentos_model', '', TRUE);
    $this->Departamentos_model->setDepartamento($post);
  }

  public function alteraDepartamento($post) {
    $this->load->model('Departamentos_model', '', TRUE);
    $this->Departamentos_model->upDepartamento($post);
  }

  public function excluiDepartamento($post) {
    $this->load->model('Departamentos_model', '', TRUE);
    $this->Departamentos_model->delDepartamento($post['hdnId']);
  }

  public function ajxCarregaDepartamento() {
    $post = $this->input->post(NULL, TRUE);
    $this->load->model('Departamentos_model', '', TRUE);
    $query = $this->Departamentos_model->getDepartamento($post['hdnId']);

    foreach ($query->result() as $row) {
      $arr = array(); //Declaração da variável array
      $arr['id_departamento'] = $row->id_departamento;
      $arr['nom_departamento'] = $row->nom_departamento;
      echo json_encode($arr);
    }
  }

}

/* End of file departamentos.php */
/* Location: ./application/controllers/departamentos.php */
