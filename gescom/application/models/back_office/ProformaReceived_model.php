<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProformaReceived_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    // PRENDRE LE STATUS D'UN BESOIN
    public function my_status($situation){
        $donnes = array("Sent", "Received");
        $progress = (($situation + 1) / count($donnes)) * 100;
        $result = array();
        $result[] = $donnes[$situation];
        $result[] = $progress;
        return $result;
    }
    public function get_all_proformas() {
        $this->db->select('*');
        $this->db->from('v_proformacomplete');
        $query = $this->db->get();

        $data = $query->result_array();
        
        $result = array();
        for($i = 0; $i < count($data); $i++){
            $result[$i] = $data[$i];
            $result[$i]['status'] = $this -> my_status($data[$i]['status']);
        }
        return $result;
    } 
    public function getProformaDetail($idProforma){
        $this->db->select('*');
        $this->db->from('v_proformacomplete');
        $this->db->where('idproforma', $idProforma);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getupdate($idProforma){
        $this->updateProformaStatus($idProforma,1);
    }
    public function updateDetailProforma($id, $qty,$pu){
        $data['qte'] = $qty;
        $data['pu'] = $pu;
        $this->db->update('detailproforma', $data, array('iddetail' => $id));
    }
    public function deleteDetailProforma($id){
        $this->db->delete('detailproforma', array('iddetail' => $id));
    }
    public function updateProformaStatus($idproforma, $status) {
        $query = sprintf("UPDATE proforma SET status = %u  , dateproformareceived = now() WHERE idproforma = '%s'", $status, $idproforma);
        $sql = $this->db->query($query);
    }

}
?>
