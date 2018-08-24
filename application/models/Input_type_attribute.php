<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_type_attribute extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function insert ($id_type, $id_attr)
	{
		$data = array(
			'id_input_type'	=> $id_type,
			'id_attribute'	=> $id_attr
			);

		$query = $this->db->insert('input_type_attribute', $data);
		return $query;
	}

	public function check_exist($id_type, $id_attr)
	{
		$this->db->where('id_input_type', $id_type);
		$this->db->where('id_attribute', $id_attr);
		$query = $this->db->get('input_type_attribute');

		return $query->row_array();
	}
}
