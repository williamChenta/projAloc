<?php

class Departamentos_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getDepartamentos() {
    $query = $this->db->get('departamento');    
    return $query;
  }

  function setDepartamento($arrDepartamento) {
    $this->db->insert('departamento', $arrDepartamento);
  }

  function upDepartamento($arrDepartamento) {
    $this->db->where('id_departamento', $arrDepartamento['hdnId']);
    unset($arrDepartamento['hdnId']);
    $this->db->update('departamento', $arrDepartamento); 
  }

  function delDepartamento($id) {
    $this->db->delete('departamento', array('id_departamento' => $id));
  }
  
  function getDepartamento($id) {
      $query = $this->db->get_where('departamento', array('id_departamento' => $id));
      return $query;
  }
}