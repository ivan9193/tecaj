<?php 
	Class User_model extends CI_Model 
	{
	
		public function __construct() 
		{ 
			parent::__construct(); 
			$this->load->library('session');
		} 
		public function insert()
		{
			$cc = $_GET["cc"];
			$br = $_GET["br"];
			$mr = $_GET["mr"];
			$sr = $_GET["sr"];
			$date = $_GET["date"];
			$user = $this->session->userdata('user');
			
			$this->db->insert("tecaj", array('currency_code'=>$cc, 'buying_rate'=>$br, 'median_rate'=>$mr, 'selling_rate'=>$sr, 'date'=>$date, 'user'=>$user));
			header('Location: /tecaj');
		}
		public function register()
		{
			$username = $_POST["username"];
			$password = $_POST["password"];
			$this->db->insert("users", array('username'=>$username, 'password'=>$password));
			header('Location: /tecaj/index.php/tecaj/');
		}
		public function login()
		{
			$userlogin = $_POST["userlogin"];
			$passwordlogin = $_POST["passwordlogin"];
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where("username", $userlogin);
			$this->db->where("password", $passwordlogin);
			$query = $this->db->get();
			if ($query->num_rows() == 0)
				header('Location: /tecaj/index.php/tecaj');
			else
			{
				$this->load->library('session');
				$this->session->set_userdata(array('user'=>$userlogin));
				header('Location: /tecaj/index.php/tecaj/a');
			}
		}
		
   } 
?>