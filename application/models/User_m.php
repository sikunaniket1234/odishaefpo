<?php
class User_m extends MY_Model 
{
	protected $primary_key = 'id';
	protected $_table = 'user_mst';
	protected $_order_by = 'id';
	public $rule_login = array(
				'email' => array('field'=>'email','label'=>'Username','rules' => 'trim|required'),
				'password' => array('field'=>'password','label'=>'Password', 'rules'=>'trim|required')
				);
	
				
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function login()
	{
		$pass =$this->input->post('password');
		$eml =$this->input->post('email');
		
		$user = $this->db->query('select * from user_mst where user_email ="'.$eml.'"  AND user_password="'.$pass.'"  AND status = 1  ')->row();

		$bm = $this->db->query('select * from fpo where username="'.$eml.'" AND password="'.$pass.'" AND status=1;')->row();

		  print_result($bm);
		 
		  if($user)
		  {
		  	  
			
		   $data = array(
		        'id'=>$user->id, 
		        'user_id'=>$user->user_id, 
		        'user_email'=>$user->user_email,
		        'user_typ'=>$user->user_typ,
		        'user_name'=>$user->user_name,
		        'user_mname'=>$user->user_mname,
		        'user_lname'=>$user->user_lname,
		        'loggedin'=>TRUE,
		        'thumbnail'=>$user->thumbnail,
		        'session_id'=>session_id()
		        );
		   $this->session->set_userdata($data);
		   ////echo 'cxvbcxbncvmnbvm,'; 

		  
		  
		   return TRUE;
		 }

		 else if($bm)
		{
			   $data = array(
			        'id'=>$bm->id, 
			        'user_id'=>$bm->id, 
			        'user_email'=>$bm->username,
			        'user_typ'=>'FPO',
			        'user_name'=>$bm->name,
			        'user_mname'=>'',
			        'user_lname'=>'',
			        'loggedin'=>TRUE,
			        'session_id'=>session_id()
			        );
			   $this->session->set_userdata($data);
			   return TRUE;
		}
		 else{
		 	return FALSE;
		 }
		  
  }

	
	public function forgotpass()
	{
		$user = $this->get_by(array('email_id'=> $this->input->post('login_id')), TRUE);
		if(count($user))
		{
			return $user;
		}
		else
		{
			return (bool)FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		// session_write_close();
	}
	
	public function isLoggedin()
	{
		return (bool)$this->session->userdata('loggedin');
	}

	
}
?>