<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('BaseSessionController.php');
class HomeController extends BaseSessionController
{
    public function index()
    {
        $data['content'] = 'back_office/home';
        $user = $this->session->userdata('user_data');
        if($user['iddepartement'] == "DEP3"){
            $this->load->view('back_office/main_achat',$data);
        } else {
            $this->load->view('back_office/main',$data);
        }
    }
}
