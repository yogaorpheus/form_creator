<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template 
{
	var $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function load_view($bodyContentFolder, $bodyContentFile=null, $data=array())
	{
		if (!is_null($bodyContentFile))
		{
			$bodyContentFile = $this->ci->load->view($bodyContentFolder.'/'.$bodyContentFile, $data, TRUE);
		}
		else
		{
			$bodyContentFile = null;
		}

		if (is_null($data))
		{
			$data = array('body' => array('body' => $bodyContentFile));
		}
		else if (is_array($data))
		{
			$data['body']['body'] = $bodyContentFile;
		}

		$this->ci->load->view('base/outer', $data);
	}
}

?>