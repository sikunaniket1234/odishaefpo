<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {
	function __construct() 
	{
		  

		parent::__construct();
		$this->load->library('pagination');
		// $this->load->library('sendgridmail');


		
	}
	
	public function index($paramone=NULL,$paramtwo=NULL,$paramthree=NULL,$paramfour=NULL ){

		
	        $url=$paramone;
	       	$qq = 'SELECT * FROM pages where page_url="'.$url.'" and page_type="Page" ';
	         $ispg = $this->db->query($qq)->row(); 
	         $ispgx = (array) $ispg; 

	        $is_cn = array();
	        if (strpos($url, 'study-in-') !== false) {
				  $cnt_u = str_replace('study-in-', '', $url);
				  $iscountry = $this->db->query('SELECT * FROM country 
				  	where country_utl="'.$cnt_u.'" ')->row(); 
				  $is_cn = (array) $iscountry;
			}

			
	        $pages= array('about','privacyPolicy','studentsResources','study','contact','services','cont_mail','cont_mail_BCP','newsletters','blog','blogSingle','faq','gallery');	       

	        $crURL = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";	       
	        $bs = base_url();
	        $vurl = str_replace($bs, '', $crURL);
	        if($vurl=='index.php'){
				redirect(base_url());
			}

			if($paramone==NULL)
			{
				$this->home(); 	
			}
			elseif (in_array($paramone, $pages))
			{
			  	$this->{$paramone}($paramtwo,$paramthree,$paramfour);
			}
			// elseif (count($is_cn)>0)
			// {
			//   	$this->study($iscountry);
			// }
			// elseif (count($ispgx)>0)
			// {
			//   	$this->innerpage($ispg);
			// }
			else{
		 		$this->error404();
	  		}



	}
	




	public function home(){



		$this->data['pg_id']  = 1;


		
		
		if(isset($seo)){
		    $this->data['title']=$seo->meta_title;
		    $this->data['meta_key']=$seo->meta_keyword;
		    $this->data['meta_desc']=$seo->meta_desc;
	    }
		$this->load->view('front/index',$this->data);
	}
	public function about(){
		
		// $this->data['page_info'] = $seo = $this->db->query('SELECT * from pages WHERE PAGE_TYPE="Page" AND 
		// 	page_id="4" ')->row();

		// $this->data['allreview'] =$zzx= $this->db->query('SELECT * FROM review  order by r_id desc')->result();

		// if($seo){
		//     $this->data['title']=$seo->meta_title;
		//     $this->data['meta_key']=$seo->meta_keyword;
		//     $this->data['meta_desc']=$seo->meta_desc;
	 //    }

		// $this->data['service_list']  = $this->db->query('select * from services  LIMIT 6 ')->result();

		$this->data['page_info'] = [];



		$this->load->view('front/about',$this->data);
	}

	public function privacyPolicy(){
		
		$this->load->view('front/privacyPolicy',$this->data);
	}
	public function contact(){
		$this->data['page_info'] = [];
		$this->load->view('front/contact',$this->data);
	}
	public function blog(){

		 $this->data['vfnies'] = $data = $this->db->query('SELECT * from pages  WHERE PAGE_TYPE="Blog"')->result();
		
		$this->load->view('front/blog',$this->data);
	}
	
	public function blogSingle(){
		
		$this->load->view('front/blogSingle',$this->data);
	}

	

	public function newsletters()
	{


		$email = $_REQUEST['email']; 

		$q = $this->db->query("SELECT count(nws_id) as `cnt` FROM newsletter where email = '".$email."'")->row();

		#print_result($q); exit();

		if($q->cnt == 0)
		{
			$data['email'] = $email;
			$this->db->insert('newsletter',$data);
			$str = '2';			
		}
		else
		{
			$str = '1';
		}

		echo $str;
	}




	public function cont_mail(){
		$this->data['settings'] = $settings = $this->db->query('SELECT * FROM  common')->row();
		//print_result($settings); exit;

		if($_POST){
			$data=$_POST;
	     	
	     	/////// THIS IS GOOGLE V3 /////////
	     	// if(isset($_POST['token'])){
	      //       unset($data['token']);
	      //     	$vv = g_captcha_validate($_POST['token']);
	      //   	if($vv->success!=1){
		     //    	echo '<h2>Looks like a spammer to us.BYE BYE!.</h2>';exit;
		     //    }
	      //   }else{
	      //   	echo '<h2>Looks like a spammer to us.BYE BYE!.</h2>';exit;
	      //   }
	       	/////// THIS IS GOOGLE V3 ///////// 	

	        if($data){ 
	          $name=$_POST['name'];

	          $body = nl2br("Dear Admin,             	
	          	You have new contact request below:
	          	------
	          	Name : ".$data['name']."

	          	Email : ".$data['email']."

	          	Phone : ".$data['phone']."

	          	Message : 	          	
	          	".$data['message']."

	          ");


	          $q_body = $this->email_template($body);
	        
	          $subject='New Contact Request By : '.$name;

	          	$EmailUser['from_email'] = 'noreply@peternguyenstudio.com';
				$EmailUser['from_name']= 'Studio';
				$EmailUser['to_name'] = 'Jaggu';				
				$EmailUser['subject'] = $subject;
				$EmailUser['to_email'] = "jangya.seoinfotechsolution@gmail.com";
				$EmailUser['content'] = $body; 

	          //$pp = $this->sendgridmail->mail($EmailUser);
	          $pp = $this->sendgridmail->mail($settings->email,$subject,$body);

	          //print_result($pp);  exit;
	                  

	          $this->session->set_flashdata('success','Thank you for contact us.');	         
	          redirect(base_url('thanks'));
	        } 
			
		}

	}
	


	/*public function innerpage($data){
		
		$this->data['page_info']=$data;
		$this->data['title']=$data->meta_title;
		$this->data['key']=$data->meta_keyword;
		$this->data['descp']=$data->meta_desc;

	    $this->load->view('front/innerpage',$this->data);
	}*/
	


	public function aerial(){
	    // $this->data['portf_all']  = $xxf = $this->db->query('select * from portfolio ORDER BY pf_id DESC')->result();
	    //print_result($xxf); exit;

		$this->load->view('front/aerial',$this->data);
	}
	


	public function portfolio($url = NULL)
	{
		//echo 'TEST'; exit;

		if($url == NULL)
		{
			echo 'Wrong URL'; exit;
		}
		else if($url != NULL)
		{
			$this->data['port']  = $port = $this->db->query('SELECT * FROM portfolio WHERE portfolio_url="'.$url.'"')->row();
			//print_result($port); exit;


			$prt = (array) $port;
			if(count($prt)){
				$this->data['media']  = $media = $this->db->query('SELECT * FROM media_box WHERE 
					typ ="PORTFOLIO" and typ_id = "'.$port->pf_id.'"
					 ')->result();

				//print_result($media);
			}
			

			//exit;

			$this->load->view('front/portfolio_single',$this->data);	
		}

			
	}

	public function gallery(){
		// $this->data['page_info'] = $xn = $seo = $this->db->query('SELECT * from pages WHERE PAGE_TYPE="Page" AND 
		// 	page_id="5" ')->row();
	

		// $this->data['gallery']  = $this->db->query('select * from gallery ')->result();
		

	 //    if($seo){
		//     $this->data['title']=$seo->meta_title;
		//     $this->data['meta_key']=$seo->meta_keyword;
		//     $this->data['meta_desc']=$seo->meta_desc;
	 //    }
		$this->data['page_info'] = [];
		
		$this->load->view('front/gallery',$this->data);
	}






	public function cont_mail_BCP(){ 

		//echo 'TEst'; exit;
			
		$this->data['settings'] = $stg= $this->settings = $this->db->query('SELECT * FROM  common')->row();

		$header = file_get_contents(base_url().'email/header.html');
		$footer = file_get_contents(base_url().'email/footer.html');




		if($_POST){
		    // if(isset($_POST['sendrequest'])){
		      
		      $data=$_POST;

		      //print_result($data); exit;
		     	
		     	if($data){ 
		          $name=$_POST['name'];
		          $email=$_POST['email'];
		          $phone=$_POST['phone'];
		          $subject=$_POST['subject'];
		          $msgz=$_POST['message'];	          


		          $body = '<tr>
						  <td align="center" valign="top">
						   <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
						     <tbody><tr>
							  <td align="center" valign="top">
							   <table border="0" cellpadding="0" cellspacing="0" width="650">
							    <tbody><tr>
							     <td align="center" valign="top" width="650" class="flexibleContainerCell">
								     <table border="0" cellpadding="20" cellspacing="0" width="100%">
								     <tbody><tr>
									  <td align="center" valign="top">
	 								   <table border="0" cellpadding="0" cellspacing="0" width="100%">
									    <tbody><tr>
									     <td valign="top">
										   <h3 mc:edit="header" style="color:#3E3D3D;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:15px;font-weight:bold;margin-top:0;margin-bottom:3px;text-align:left;">Dear Sir/Madam</h3>
										   <div style="text-align:left;font-family:Helvetica,sans-serif;font-size:14px;margin-bottom:0;color:#423f3f;line-height:135%; margin-top: 15px;">
										     Thanks, We have received your request.</strong>
										    <br>
										    <p>Name : '.$name.'</p>
										    <p>Email : '.$email.'</p>
										    <p>Subject : '.$subject.'</p>
										    <p>Message :</p>						 									   					   	  
										   <p style="color:#9b9898; font-size: 13px; line-height:22px;">
										      '.$msgz.'
										    </p>									    
										   </div>
									   	 </td>
										</tr>
									   </tbody></table>
									  </td>
									 </tr>
									</tbody></table>
								   </td>
								  </tr>
								 </tbody></table>
							   </td>
							 </tr>
						   <tr>
						    <td align="center" valign="top">
						     <table border="0" cellpadding="0" cellspacing="0" width="100%">
						      <tbody><tr>
						      <td align="center" valign="top">
							   <table border="0" cellpadding="20" cellspacing="0" width="650">
							    <tbody><tr>
							      <td style="padding-top:0;" align="center" valign="top" width="650">
								   <table align="left" border="0" cellpadding="0" cellspacing="0">
								   <tbody><tr>
								     <td align="left" valign="top">							   
								      <h4 style="color:#333;line-height:125%;font-family:Arial,sans-serif;font-size:14px;font-weight:bold;margin-top:3px;margin-bottom:3px;text-align:left;">Thanks</h4>
									
									  <h5 style="color:#333;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-weight:bold;margin-top:2px;margin-bottom:3px;text-align:left;"><i>Peter Nguyen Studio</i></h5>
								     </td>
								  </tr>
								 </tbody></table>
								</td>
							   </tr>
							  </tbody></table>												
							 </td>
						    </tr>
						   </tbody></table>
						  </td>
						 </tr>';


		           	$msgz = $header.$body.$footer;

		           	//echo $msgz; exit();

					$sub='Your Request Details ad below';

		 	 		$EmailUser['from_email'] = config_item('sender_email');
					$EmailUser['from_name']= config_item('sender_name');
					$EmailUser['to_name'] = $name;				
					$EmailUser['subject'] = $sub;
					$EmailUser['to_email'] = $data['email'];
					$EmailUser['content'] = $msgz; 
					$x = $this->sendgridmail->mail($EmailUser);

					



					$admin_sub='New Contact Request By : '.$name;

		 	 		$EmailAdmin['from_email'] = config_item('sender_email');
					$EmailAdmin['from_name']= config_item('sender_name');
					$EmailAdmin['to_name'] = 'Admin';
					$EmailAdmin['subject'] = $admin_sub;
					$EmailAdmin['to_email'] = $this->settings->email;				
					$EmailAdmin['content'] = $msgz; 			
					$y =  $this->sendgridmail->mail($EmailAdmin);

					//print_result($x); 
					//print_result($y); exit;
		                  

		          $this->session->set_flashdata('success','We have received your request.');	         
		          redirect(base_url('thanks'));

		        } 

	        

	       
	    }



		
		
		//$this->load->view('front/contact',$this->data);
	}





	public function faq(){
		// Sidebar All Cat
		$this->data['allcat'] = $allcat = $this->db->query('SELECT * FROM page_cat  order by pcat_id desc')->result();		

		// Sidebar Recent Posts
		$this->data['recent_post'] = $x = $this->db->query('SELECT * FROM pages WHERE page_type="blog"  order by page_id desc limit 3')->result();

		$this->data['rec_portfol'] = $rf = $this->db->query('SELECT * FROM portfolio order by pf_id desc limit 9')->result();

		
		
		$this->data['faqs'] = $x = $this->db->query('SELECT * FROM faq_tbl  order by f_id desc')->result();	
		
		$this->load->view('front/faq',$this->data);
	}
	


	public function contactus_backup(){ 

		$this->data['page_info'] = $xn = $this->db->query('SELECT * from pages WHERE PAGE_TYPE="Page" AND 
			page_id="9" ')->row();

		$this->data['title']=$xn->meta_title;
		$this->data['key']=$xn->meta_keyword;
		$this->data['descp']=$xn->meta_desc;
		


	    if($_POST){
	    // if(isset($_POST['sendrequest'])){
	      
	      $data=$_POST;
	     	
	     	///////// THIS IS GOOGLE V3 /////////
	     	if(isset($_POST['token'])){
	            unset($data['token']);
	          	$vv = g_captcha_validate($_POST['token']);
	        	if($vv->success!=1){
		        	echo '<h2>Looks like a spammer to us.BYE BYE!.</h2>';exit;
		        }
	        }else{
	        	echo '<h2>Looks like a spammer to us.BYE BYE!.</h2>';exit;
	        }
	       	///////// THIS IS GOOGLE V3 ///////// 	

	        if($data){ 
	          $name=$_POST['name'];

	          $body = nl2br("Dear Admin,             	
	          	You have new contact request below:
	          	------
	          	Name : ".$data['name']."
	          	Email : ".$data['email']."
	          	Subject : ".$data['subject']."
	          	Message : ".$data['message']."

	          ");


	          $q_body = $this->email_template($body);
	        
	          $subject='New Contact Request By : '.$name;
	          $pp = $this->sendemail("jangya.seoinfotechsolution@gmail.com",$subject,$body);
	          //$this->sendgridmail->mail($this->page_info->email,$subject,$body);

	         // print_result($pp);  exit;
	                  

	          $this->session->set_flashdata('success','Thank you for contact us.');	         
	          redirect(base_url('thanks'));

	        } 

	       
	    }

		
		
		$this->load->view('front/contactus',$this->data);
	}


	public function contacts(){ 

		$this->data['page_info'] = $seo = $this->db->query('SELECT * from pages WHERE PAGE_TYPE="Page" AND 
			page_id="9" ')->row();
		
		//print_result($seo); exit;


		//print_result($x); exit;
		$this->data['title']=$seo->meta_title;
		$this->data['meta_key']=$seo->meta_keyword;
		$this->data['meta_desc']=$seo->meta_desc;




	    if($_POST){
	    // if(isset($_POST['sendrequest'])){
	      
	      $data=$_POST;
	     	
	     	///////// THIS IS GOOGLE V3 /////////
	     	if(isset($_POST['token'])){
	            unset($data['token']);
	          	$vv = g_captcha_validate($_POST['token']);
	        	if($vv->success!=1){
		        	echo '<h2>Looks like a spammer to us.BYE BYE!.</h2>';exit;
		        }
	        }else{
	        	echo '<h2>Looks like a spammer to us.BYE BYE!.</h2>';exit;
	        }
	       	///////// THIS IS GOOGLE V3 ///////// 	

	        if($data){ 
	          $name=$_POST['name'];

	          $body = nl2br("Dear Admin,             	
	          	You have new contact request below:
	          	------
	          	Name : ".$data['name']."

	          	Email : ".$data['email']."

	          	Subject : ".$data['subject']."

	          	Message : 	          	
	          	".$data['message']."

	          ");


	          $q_body = $this->email_template($body);
	        
	          $subject='New Contact Request By : '.$name;
	          //$pp = $this->sendgridmail->mail("info@shreeatozsolution.in",$subject,$body);
	          $pp = $this->sendgridmail->mail($this->settings->email,$subject,$body);

	          //print_result($pp);  exit;
	                  

	          $this->session->set_flashdata('success','Thank you for contact us.');	         
	          redirect(base_url('thanks'));

	        } 

	       
	    }



		
		
		$this->load->view('front/contactus',$this->data);
	}



	public function thanks(){ 

		$this->load->view('front/thanks',$this->data);
	}



	public function email_template($info){ 
		$this->data['content']=$info;


		$this->data['cmn'] = $x = $this->db->query('SELECT * FROM  common')->row();		
		$this->load->view('front/eml',$this->data);
	}

	public function partone(){ 
		$this->data['cmn'] = $x = $this->db->query('SELECT * FROM  common')->row();		
		$this->load->view('front/p1',$this->data);
	}
	public function parttwo(){ 
		$this->data['cmn'] = $cmn = $this->db->query('SELECT * FROM  common')->row();	
		echo'<hr /><p style="font-size: 12px;">'.nl2br($cmn->nsw_tnc).'</p>';	
		$this->load->view('front/p2',$this->data);
	}

	public function pnrtomessage($r_id=1,$script_id=1)
	{
		$dv = $this->db->query('SELECT info from dynamic_script where ds_id='.$script_id)->row();
		$data = $dv->info;

		preg_match_all("'{{%(.*?)%}}'si", $data, $matches);
		$uniq = array_unique($matches[0]);   /// remove repeated ones and make unique

		
		$i = $this->db->query('SELECT * from dynamic_script where ds_id='.$script_id)->row();

		foreach($uniq as $u){
			$pp = $u;
			$u = str_replace('{{%', '', $u);
			$u = str_replace('%}}', '', $u);  
			$orgdata = $i->$u;
			if($u=='jorney_date'){
				$orgdata =   date('d-m-Y',strtotime($i->$u));
			}else{
				$orgdata = $i->$u;
			}			
			$data =  str_replace($pp, $orgdata, $data);
		}

		

		return $data;
	}


	public function templateconverter($t_id,$info)
	{
		$dv = $this->db->query('SELECT * FROM  ns_template 
									where nst_id='.$t_id)->row();
		$data = $dv->content;

		preg_match_all("'{{%(.*?)%}}'si", $data, $matches);
		$uniq = array_unique($matches[0]);   /// remove repeated ones and make unique

		 
		$i = $info;

		foreach($uniq as $u){
			$pp = $u;
			$u = str_replace('{{%', '', $u);
			$u = str_replace('%}}', '', $u);  
			$orgdata = $i->$u;
			if($u=='jorney_date'){
				$orgdata =   date('d-m-Y',strtotime($i->$u));
			}else{
				$orgdata = $i->$u;
			}			
			$data =  str_replace($pp, $orgdata, $data);
		}
		return $data;
	}
	
	public function error404(){

		$this->load->view('front/404',$this->data);
		//echo 'ERR 404!!!!';
	}











		public function sendemail($email,$subject,$text){ 
	   
			  $from_Name='A to Z Solution';    
			  $url = 'https://api.sendgrid.com/';    
			  $user = 'subhadipta'; //subha
			  $pass = 'Emails@2017'; //subha@123
			  	$partone = file_get_contents(base_url().'partone');	  
			 	$parttwo = file_get_contents(base_url().'parttwo');
			 	$message= $partone.$text.$parttwo; 
			 	//$message= $text; 
			  	$params = array(   
			    'api_user'  => $user,
			    'api_key'   => $pass,
			    'to'        => $email,			    
			    'subject'   => $subject,
			    'html'      => $message,
			    'fromname'  => $from_Name,
			    'text'      => '',   
			    'from'      => '<info@shreeatozsolution.in>',
			    );
			    $request =  $url.'api/mail.send.json';
			    $session = curl_init($request);
			    curl_setopt ($session, CURLOPT_POST, true);
			    curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
			    curl_setopt($session, CURLOPT_HEADER, false);
			    curl_setopt($session, CURLOPT_SSLVERSION, 'CURL_SSLVERSION_TLSv1_2');
			    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
			    $response = curl_exec($session);
			    
			    curl_close($session);			    
			    return $response;
	}



}