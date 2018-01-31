<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
        {
        	parent::__construct();
        	
            $this->load->helper('url'); 
            $this->load->library('session');
        }
	
	public function index()
	{
		$data="";
		if($this->session->userdata('logged')==='true')
			{
				$data['logged']=true;
				$data['user']=$this->session->userdata('user');
			}
		else{
			$data['logged']=false;
			}	
		if($this->session->userdata('msj')!==null)
			{
				$data['msj']=$this->session->userdata('msj');
			}	

		$this->load->view('head');
		$this->load->view('body',$data);
		$this->load->view('footer');

	}
}
