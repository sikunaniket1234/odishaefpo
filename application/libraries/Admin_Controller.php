<?php

class Admin_Controller extends MY_Controller {
	
	
	function __construct() {
		parent::__construct();
		$this->load->model('User_m');
		$exception_url=array("backend/login","backend","backend/register","backend/forget_password","backend/reset_password");
		
		
		
		if(($this->User_m->isLoggedin() == FALSE))
		{
			if((in_array(uri_string(),$exception_url) == FALSE) ){
				redirect(base_url("backend"), "refresh");
			}
				
		}
		
	    $typ =$this->session->userdata('user_typ');
		if($typ=='Admin' && $this->uri->segment(1) !='admin'){
			redirect(base_url("admin/index"));
		}

		if($typ=='DDM' && $this->uri->segment(1) !='ddm'){
			redirect(base_url("ddm/index"));
		}


		if($typ=='NGO' && $this->uri->segment(1) !='ngo'){
			redirect(base_url("ngo/index"));
		}

		if($typ=='FPO' && $this->uri->segment(1) !='fpo'){
			redirect(base_url("fpo/index"));
		}


		
			
	}	
}
?>