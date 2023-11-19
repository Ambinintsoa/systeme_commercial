<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // public function insert_employee($data) {
    //     $this->db->insert('employee', $data);
    //     return $this->db->insert_id();
    // }

    // public function get_employee($idemployee) {
    //     $query = $this->db->get_where('employee', array('idemployee' => $idemployee));
    //     return $query->row_array();
    // }

    public function check_credentials($email, $password) {
        $query = $this->db->get_where('v_employee_detail', array('email' => $email, 'pwd' => $password));
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
