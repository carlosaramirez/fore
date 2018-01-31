<?php

class Forecast_model extends CI_Model {

	public function get($id_city)
		{
			$this->load->database();
			$this->db->where('id_city',$id_city);
			$fecha = date_create();
 			$this->db->where('date>=',date_timestamp_get($fecha)-600);
 			$result=$this->db->get('forecast');
 			if ($result->num_rows()>0)
	 			{
	 				return $result->row();
	 			}
	 		else
	 			{
	 				if($this->get_datos_api($id_city))
		 				{
		 					return $this->get($id_city);
		 				}
		 			else
		 				{
		 					return false;
		 				}	
	 			}	
		}

	public function get_datos_api($id_city)
		{
			
			$res = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id='.$id_city.'&APPID=12f23c4937da195816f2033d7883d667&units=metric');
			$resul= json_decode($res);
			//var_dump($resul);

			//print_r($resul);
			if (isset($resul->list[0]->main))
			{
				$t=$resul->list[0]->main;
				$this->load->database();
				$this->db->set('id_city',$id_city);
				$fecha = date_create();
 				$this->db->set('date',date_timestamp_get($fecha));
 				$this->db->set('temperature',$t->temp);
 				$this->db->set('pressure',$t->pressure);
 				$this->db->set('humidity',$t->humidity);
 				$this->db->set('min_temperature',$t->temp_min);
 				$this->db->set('max_temperature',$t->temp_max);
 				$this->db->insert('forecast');
 				return true;
			} else
			{
				return false;
			}

		}


}