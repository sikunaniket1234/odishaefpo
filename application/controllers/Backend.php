<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backend extends Admin_Controller {
	function __construct() 
	{
		parent::__construct();
		$this->load->model('User_m');
		
		
        $this->load->library('email');
        $this->load->library('pagination');	
        $this->data['settings'] = $x = $this->db->query('SELECT * FROM  common')->row();	
	}
	
	



	public function index()
	{
		$rules = $this->User_m->rule_login;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE)
		{
			if($this->User_m->login() == TRUE)
			{
				$typ =$this->session->userdata('user_typ');
								
				if($typ=='Admin'){
					redirect(base_url("admin/index"));
				}
				if($typ=='NGO'){
					redirect(base_url("ngo/index"));
				}
				if($typ=='FPO'){
					redirect(base_url("fpo/index"));
				}
				
			}
			else
			{				
				$this->session->set_flashdata('error','Email ID / Password Combination Doesn\'t Exist');
				redirect(base_url("backend"), "refresh");
			}
		}
		if($this->User_m->isLoggedin() == TRUE)
		{
				$typ =$this->session->userdata('user_typ');
				if($typ=='Admin'){
					redirect(base_url("admin/index"));
				}
				if($typ=='NGO'){
					redirect(base_url("ngo/index"));
				}
				if($typ=='FPO'){
					redirect(base_url("fpo/index"));
				}
		}	
		
		$this->data['sub_view']='';
		$this->load->view('backend/login',$this->data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('backend'),'refresh');
	} 
	 
	 
	  
}