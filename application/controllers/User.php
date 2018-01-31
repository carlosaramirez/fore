<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
        {
        	parent::__construct();
        	$this->load->model ('city_model','city');
            $this->load->model ('forecast_model','forecast');
            $this->load->model ('user_model','user');
            $this->load->helper('url'); 
            $this->load->library('session');
        }

    public function vtnlogin ()
        {
            $this->load->view('login');
        }    

    public function get($id_city)
    	{
    		//$data['city']=$this->city->search_by_id($id_city);
            //$data['weather']=$this->forecast->get($id_city);
            $this->load->view ('forecast',$data);
    	}


        

    public function frmregister()
        {
            $this->load->view('form_register');
        }

    public function frmlogin()
        {
            $this->load->view('form_login');
        }    
          
    public function guardar_usuario()
        {
            
            $usuario=$this->user->get($this->input->post('email'));
            if(count($usuario)=='0')
                {
                    $this->user->add($this->input->post('nombre'),$this->input->post('apellido'),$this->input->post('email'));
                    $msj="<p class=\"alert alert-success\" role=\"alert\">Los datos se guardaron con exito!!!!</p>"; 
                    $this->session->set_userdata('logged','true');
                    $this->session->set_userdata('user',$user); 
                }
            else
                {
                    $msj="<p class=\"alert alert-danger\" role=\"alert\">El usuario ya existe</p>"; 
                }
           
                    $this->session->set_userdata('msj',$msj);
                    redirect(base_url(''),'refresh');
        }  

    public function login()
        {
            $user=$this->user->get($this->input->post('email'));
           // print_r($user);
            if (count($user)>0)
                {
                    $this->session->set_userdata('logged','true');
                    $this->session->set_userdata('user',$user);
                    redirect(base_url(''),'refresh');
                }
        } 



}