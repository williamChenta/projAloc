<?php

if (!defined('BASEPATH'))
  die();

class Salas extends Main_Controller {

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
      $this->incluiSala($post);
    }

    //verifica se quer alterar
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'salvar' && !empty($post['hdnId'])) {
      unset($post['hdnAcao']);
      $this->alteraSala($post);
    }

    //verifica se quer excluir
    $post = $this->input->post(NULL, TRUE);
    if ($post && $post['hdnAcao'] == 'excluir') {
      $this->excluiSala($post);
    }

    //lista os clientes cadastrados
    $data['linhas'] = $this->listaSalas();
    
    //carrega a combo de blocos
    $data['blocos'] = $this->listaBlocos();
    
    //carrega a combo de departamentos
    $data['departamentos'] = $this->listaDepartamentos();

    //carrega as views
    $this->load->view('include/header');
    $this->load->view('salas_view', $data);
    $this->load->view('include/footer');
  }

  public function listaSalas() {
    $this->load->model('Salas_model', '', TRUE);
    return $this->Salas_model->getSalas();
  }
  
  public function listaBlocos() {
    $this->load->model('Blocos_model', '', TRUE);
    return $this->Blocos_model->getBlocos();
  }
  
  public function listaDepartamentos() {
    $this->load->model('Departamentos_model', '', TRUE);
    return $this->Departamentos_model->getDepartamentos();
  }

  public function incluiSala($post) {
    $this->load->model('Salas_model', '', TRUE);
    $this->Salas_model->setSala($post);
  }

  public function alteraSala($post) {
    $this->load->model('Salas_model', '', TRUE);
    $this->Salas_model->upSala($post);
  }

  public function excluiSala($post) {
    $this->load->model('Salas_model', '', TRUE);
    $this->Salas_model->delSala($post['hdnId']);
  }

  public function ajxCarregaSala() {
    $post = $this->input->post(NULL, TRUE);
    $this->load->model('Salas_model', '', TRUE);
    $query = $this->Salas_model->getSala($post['hdnId']);

    foreach ($query->result() as $row) {
      $arr = array(); //Declaração da variável array
      $arr['id_sala'] = $row->id_sala;
      $arr['bloco_id_bloco'] = $row->bloco_id_bloco;
      $arr['departamento_id_departamento'] = $row->departamento_id_departamento;
      $arr['cod_sala'] = $row->cod_sala;
      $arr['nom_sala'] = $row->nom_sala;
      $arr['num_capacidade'] = $row->num_capacidade;
      $arr['num_computadores'] = $row->num_computadores;
      $arr['dsc_caracteristicas'] = $row->dsc_caracteristicas;
      echo json_encode($arr);
    }
  }

}

/* End of file salas.php */
/* Location: ./application/controllers/salas.php */
