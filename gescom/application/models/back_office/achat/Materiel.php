<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materiel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function materiels() {
        $query = $this->db->get('v_materiel_detail');
        return $query->result_array();
    }
}
