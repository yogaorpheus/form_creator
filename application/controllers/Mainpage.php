<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');

		$this->load->model('tag');
		$this->load->model('attribute');
		$this->load->model('input_type');
	}

	public function index()
	{
		$resource = array();

		$resource['tags'] 		= $this->tag->get_all_tag();
		$resource['attributes'] = $this->attribute->get_all_attribute();
		$resource['input_type']	= $this->input_type->get_all_input_type();

		$this->template->load_view('main', 'form_create', $resource);
	}
}
