<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_type extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function insert ($data)
	{
		$query = $this->db->insert('input_type', $data);

		return $query;
	}

	public function get_all_input_type ()
	{
		$query = $this->db->get('input_type');

		return $query->result_array();
	}
}
