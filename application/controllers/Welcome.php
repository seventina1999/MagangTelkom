<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view("home/header");
		$this->load->view("home/index");
		$this->load->view("home/footer");
	}
}
