<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

	
	public function __construct()
        {
        	parent::__construct();
        	$this->load->model ('city_model','city');
        	$this->load->helper('url'); 
            $this->load->library('session');
        }

	public function index()
		{
			
			$this->city->add();
		}

	public function opciones($search)
		{
			$result=$this->city->search_by_name($search);
			foreach ($result as $value) {
				echo '<div class="opc text-left" ><a data="'.$value->id_city.'" id="'.$value->id_city.'">'.utf8_encode($value->name ).', '.utf8_encode($value->country ).'</a></div>';
			}

		}

	public function menu_favoritos()
		{
			echo '<ul class="dropdown-menu">';
			$user=$this->session->userdata('user');
			$f=$this->city->get_fav_by_user($user->id_usuario);
			foreach ($f as $key => $value) {
				$city=$this->city->search_by_id($value->id_city);
				echo '<li class="opc text-left" ><a data="'.$city->id_city.'" id="'.$city->id_city.'" onclick="item_menu('.$city->id_city.')">'.utf8_encode($city->name ).', '.utf8_encode($city->country ).'</a></li>';
				# code...
			}
			echo '</ul>';
		}	


		
}
