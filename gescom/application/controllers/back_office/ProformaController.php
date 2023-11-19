<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('BaseSessionController.php');
class ProformaController extends BaseSessionController {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('back_office/Fournisseur_model');
    }

	public function proforma(){
		$data['content'] = 'back_office/proforma/addproforma';
        $data['fournisseur'] = $this->Fournisseur_model->get_all_fournisseurs();
		$this->load->view('back_office/main',$data);
	}

    public function facture(){
		$data['content'] = 'back_office/facture';
		$this->load->view('back_office/main',$data);
	}
}
