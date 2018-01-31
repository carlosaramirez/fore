<?php

class User_model extends CI_Model {

	public function add($nombre, $apellido, $mail)
		{
			$this->load->database();
			$this->db->set('nombre',$nombre);
			$this->db->set('apellido',$apellido);
			$this->db->set('mail', $mail);
			$this->db->insert('usuarios');
		}

	public function get($mail)
		{
			$this->load->database();
			$this->db->where('mail',$mail);
			$result=$this->db->get('usuarios');
			return $result->row();
		}
}
