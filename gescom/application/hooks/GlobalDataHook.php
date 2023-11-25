

<?php

class GlobalDataHook
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }

    public function load_global_data()
    {
        $CI =& get_instance();      
        $data['user_session'] = $CI->session->userdata('user_data');
        $data['dep_achat_id'] = $CI->session->userdata('dep_achat');
        $CI->load->vars($data);
    }
}