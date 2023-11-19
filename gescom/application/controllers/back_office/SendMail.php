<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Anchorage');
        $this->load->library('email');
    }

    public function sendEmail()
	{
        $this->load->library('email');

		$config = array(
			'protocol' =>'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_timeout' => 30,
			'smtp_port' => 465,
			'smtp_user' => 'marcus.rgb@gmail.com',
			'smtp_pass' =>  'fctr ajbi mmid uvvy',
			'charset' => 'utf-8',
            'mailtype' =>'html',
			'newline' => '\r\n'
		);

		$this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
		$this->email->to('marcus.rgb@gmail.com');
        $this->email->from('marcus.rgb@gmail.com');
		$this->email->subject('re');
		$this->email->message('mess');
        $pdfFilePath = FCPATH . 'assets\back_office\pdf\BE3.pdf';
        $this->email->attach($pdfFilePath);
		//$this->email->attach(base_url($file));//'assets\document\Proformat_20231116234236.pdf'
		if($this->email->send()) 
		{
			echo 'successfully Sent Email';
		}
		else 
		{
			echo 'Email Sending Error!';
            show_error($this->email->print_debugger());
		}
	}
}
