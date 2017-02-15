<?php 
   class Tecaj extends CI_Controller 
   {
	   
		public function index() 
		{ 
			$this->load->library('session');
			if (isset($this->session->user))
				$this->load->view('tecaj');
			else
				$this->load->view('start');
		}
		public function a()
		{
			$this->load->library('session');
			if (isset($this->session->user))
				$this->load->view('tecaj');
			else
				$this->load->view('start');
		}
		public function register()
		{
			$this->load->view('register');
		}
		public function login()
		{
			$this->load->view('login');
		}
		public function api()
		{
			$this->load->library('session');
			if (isset($this->session->user))
				$this->load->view('api');
			else
				$this->load->view('start');
		}
		public function db()
		{
			$this->load->model('user_model');
			$this->user_model->insert();
		}
		public function register_model()
		{
			$this->load->model('user_model');
			$this->user_model->register();
		}
		public function login_model()
		{
			$this->load->model('user_model');
			$this->user_model->login();
		}
		public function logout()
		{
			$this->load->library('session');
			$this->session->unset_userdata('user');
			header('Location: /tecaj');
		}
   } 
?>