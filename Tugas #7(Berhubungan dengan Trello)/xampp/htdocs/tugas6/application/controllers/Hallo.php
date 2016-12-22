<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hallo extends CI_Controller {

	
	public function index()
	{
		$this->load->view('hallo_dunia');
	}
}
