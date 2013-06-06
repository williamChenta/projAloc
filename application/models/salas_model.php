<?php

class Salas_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getSalas() {
    $this->db->select('*');
    $this->db->from('sala');
    $this->db->join('bloco', 'sala.bloco_id_bloco = bloco.id_bloco','left');
    $this->db->join('departamento', 'sala.departamento_id_departamento = departamento.id_departamento','left');

    $query = $this->db->get();

// Produces: 
// SELECT * FROM blogs
// JOIN comments ON comments.id = blogs.id

    return $query;
  }

  function setSala($arrSala) {
    $this->db->insert('sala', $arrSala);
  }

  function upSala($arrSala) {
    $this->db->where('id_sala', $arrSala['hdnId']);
    unset($arrSala['hdnId']);
    $this->db->update('sala', $arrSala);
  }

  function delSala($id) {
    $this->db->delete('sala', array('id_sala' => $id));
  }

  function getSala($id) {
    $this->db->select('*');
    $this->db->from('sala');
    $this->db->join('bloco', 'sala.bloco_id_bloco = bloco.id_bloco','left');
    $this->db->join('departamento', 'sala.departamento_id_departamento = departamento.id_departamento','left');
    $this->db->where('sala.id_sala',$id);    
    $query = $this->db->get();
    return $query;
  }

}