<?php

class Blocos_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getBlocos() {
    $query = $this->db->get('bloco');    
    return $query;
  }

  function setBloco($arrBloco) {
    $this->db->insert('bloco', $arrBloco);
  }

  function upBloco($arrBloco) {
    $this->db->where('id_bloco', $arrBloco['hdnId']);
    unset($arrBloco['hdnId']);
    $this->db->update('bloco', $arrBloco); 
  }

  function delBloco($id) {
    $this->db->delete('bloco', array('id_bloco' => $id));
  }
  
  function getBloco($id) {
      $query = $this->db->get_where('bloco', array('id_bloco' => $id));
      return $query;
  }
}