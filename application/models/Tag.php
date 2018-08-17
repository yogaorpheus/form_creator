<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_tag()
	{
		$query = $this->db->get('tag')->result_array();

		$newdata = array();
		foreach ($query as $key => $one) {
			$newdata[$one['id_tag']] = $one;
		}

		return $newdata;
	}
}
