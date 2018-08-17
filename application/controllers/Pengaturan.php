<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');

		$this->load->model('tag');
		$this->load->model('attribute');
		$this->load->model('input_type');
	}

	public function buka_setting_input_type ()
	{
		$data = array();

		$data['tags']		= $this->tag->get_all_tag();
		$data['attributes']	= $this->attribute->get_all_attribute();

		$this->template->load_view('main', 'atur_input_type', $data);
	}

	public function insert_input_type ()
	{
		$input = $this->input->post();

		$data = array(
			'id_tag'			=> $input['tag'],
			'code_input_type'	=> $input['code_input_type'],
			'show_input_type'	=> $input['show_input_type']
			);

		$result = $this->input_type->insert($data);

		if ($result)
			redirect ('pengaturan/buka_setting_input_type');
		else
			redirect ('/');
	}
}
