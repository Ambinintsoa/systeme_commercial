<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('BaseSessionController.php');
class BesoinController extends BaseSessionController {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('back_office/achat/Materiel');
        $this->load->model('back_office/achat/Besoin');
    }

    // LISTE DES BESOINS
    public function getBesoinsCtrl(){
        $user = $this->session->userdata('user_data');

        $data['besoins'] = $this -> Besoin -> besoins($user['iddepartement']);
        $data['content'] = 'back_office/achat/liste_demandes';
        $this->load->view('back_office/main',$data);
    }

    // ENREGISTRER UN BESOIN
    public function saveBesoinCtrl(){
        $idbesoin = $this->input->post('idbesoin');
        $this -> Besoin -> saveBesoin($idbesoin);
        redirect(base_url().'back_office/BesoinController/getBesoinsCtrl');
    }

    // CREER EN PREMIER UN BESOIN
	public function createBesoinCtrl(){
        $this -> Besoin -> deleteUnsavedBesoin();

        $user = $this->session->userdata('user_data');
        $iddepartement = $user['iddepartement'];
        $idemploye = $user['idemployee'];
        
        $idBesoin = $this -> Besoin -> createBesoin($iddepartement,  $idemploye);
        $data['idBesoin'] = $idBesoin;
        redirect(base_url().'back_office/BesoinController/listeDetailBesoinCtrl/'.$idBesoin);
	}

    // LISTE DES MATERIELS POUR UN BESOIN SPECIFIC
    public function listeDetailBesoinCtrl($idbesoin){
        $data['detail_besoins'] = $this -> Besoin -> getBesoinDetail($idbesoin);
        $data['content'] = 'back_office/achat/demande_achat';
        $data['materiels'] = $this -> Materiel -> materiels();
        $data['idbesoin'] = $idbesoin;
		$this->load->view('back_office/main',$data);
    }

    // AJOUTER UN MATERIEL DANS UN BESOIN
    public function addDetailBesoinCtrl(){
        $idbesoin = $this->input->post('idbesoin');
        $idmaterial = $this->input->post('idmateriel');
        $qty = $this->input->post('quantite');

        $this -> Besoin -> addDetailBesoin($idbesoin, $idmaterial, $qty);
        redirect(base_url().'back_office/BesoinController/listeDetailBesoinCtrl/'.$idbesoin);
    }

}
