<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecast extends CI_Controller {

	
	public function __construct()
        {
        	parent::__construct();
        	$this->load->model ('city_model','city');
            $this->load->model ('forecast_model','forecast');
            $this->load->helper('url'); 
            $this->load->library('session');
        }

    public function get($id_city)
    	{
    		if($this->session->userdata('logged')==='true')
                {
                    $data['logged']=true;
                    $user=$this->session->userdata('user');
                    if ($this->city->is_favorita($id_city,$user->id_usuario))
                        {
                            $data['butons']='<button type="button" class="btn btn-default ">
  <span class="glyphicon glyphicon-star favori" aria-hidden="true"></span> </button>  ';  
                      }
                      else
                    {
                        $data['butons']='<button type="button" class="btn btn-default " onclick="favorito('.$id_city.')" id="'.$id_city.'">
  <span class="glyphicon glyphicon-star " aria-hidden="true"></span> </button>  ';  
                    }
                }
            else
                {
                    $data['logged']=false;
                }
            $data['city']=$this->city->search_by_id($id_city);
            $data['weather']=$this->forecast->get($id_city);
            $this->load->view ('forecast',$data);
    	}


    public function set_favorito($id_city)
        {
            $user=$this->session->userdata('user');
            $this->city->set_favorito ($id_city,$user->id_usuario);
        }



}