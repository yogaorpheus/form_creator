<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_attribute()
	{
		$query = $this->db->get('attribute')->result_array();

		$newdata = array();
		foreach ($query as $key => $one) {
			$newdata[$one['id_attribute']] = $one;
		}

		return $newdata;
	}
}
