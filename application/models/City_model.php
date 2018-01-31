<?php

class City_model extends CI_Model {

	public function add ()
		{
			$jsondata = file_get_contents('./data/city.list.json');
    		$data = json_decode($jsondata, true);
    
			foreach ($data as $key => $value) {
				echo("<pre>");
				print_r($value);
				echo("</pre>"); 
			}

		}

	public function search_by_name($name)
		{

			$this->load->database();
			$name=urldecode($name);
			$name=trim($name);
			$name=ucwords ($name);
			$this->db->like('name', $name);
			$this->db->order_by('name ASC');
			$result=$this->db->get('city');

			return $result->result();
		}

	public function search_by_id($id_city)
		{
			$this->load->database();
			$this->db->where('id_city',$id_city);
			$result=$this->db->get('city');
			return $result->row();
		}

	public function get_fav_by_user($id_user)
		{
			$this->load->database();
			$this->db->where('id_usuario',$id_user);
			$result=$this->db->get('favoritos');
			return $result->result();
		}

	public function is_favorita($id_city,$id_user)
		{
			$this->load->database();
			$this->db->where('id_usuario',$id_user);
			$this->db->where('id_city',$id_city);
			$result=$this->db->get('favoritos');
			return $result->row();
		}

	public function set_favorito ($id_city,$id_user)
		{
			$this->load->database();
			$this->db->set('id_usuario',$id_user);
			$this->db->set('id_city',$id_city);
			$this->db->insert('favoritos');
		}		

}
