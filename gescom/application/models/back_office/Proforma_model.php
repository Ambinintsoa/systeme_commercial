<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proforma_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function getProformaById($id) {
        $query = $this->db->get_where('v_proforma_detail', array('idproforma' => $id));
        return $query->row_array();
    }

    public function getProforma() {
        $query = $this->db->get('v_proforma_detail');
        return $query->result_array();
    }

    public function getGlobal($id,$situation) {
        $query = $this->db->get_where('v_global_besoin', array('idglobal' => $id, 'situation' => $situation));
        return $query->result_array();
    }

}
?>
