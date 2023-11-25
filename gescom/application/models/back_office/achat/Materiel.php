<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materiel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    // PRENDRE LES SUPPLIERS D'UN NATURE
    public function getSuppliersOfNature($idnature){
        $this->db->select('*');
        $this->db->from('fournisseur_nature');
        $this->db->where('idnature', $idnature);
        $query = $this->db->get();

        return $query->result_array();
    }

    // PRENDRE LES NATURES D'UN FOURNISSEURES
    public function getSupplierNature($idfournisseur){
        $this->db->select('*');
        $this->db->from('fournisseur_nature');
        $this->db->where('idfournisseur', $idfournisseur);
        $query = $this->db->get();

        return $query->result_array();
    }


    // PREDNRE TOUS LES MATERIELSZ
    public function materiels() {
        $query = $this->db->get('v_materiel_detail');
        return $query->result_array();
    }

    // Get FRN per id
    public function supplierById($idfournisseur){
        $this->db->select('*');
        $this->db->from('fournisseur');
        $this->db->where('idfournisseur', $idfournisseur);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getMaterielById($idmateriel) {
        $this->db->where('idmateriel', $idmateriel);
        $query = $this->db->get('v_materiel_detail');
    
        if ($query->num_rows() == 1) {
            return $query->row_array(); // Retourne un tableau associatif pour un seul résultat
        } else {
            return null; // Aucun résultat trouvé ou plusieurs résultats (cas d'erreur)
        }
    }


}
