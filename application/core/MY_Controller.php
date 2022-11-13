<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		
	}


	public function sendemail($email,$subject,$text)
	{ 

		$from_Name='Pamper Treat';    
		$url = 'https://api.sendgrid.com/';    
		$user = 'melokanath';
	    $pass = 'LOK@143341';

		$styles='';
		

		$partone = file_get_contents($q1);	 		
		$parttwo = file_get_contents($q2);
		$message= $text;

		
		///$message= $text;
		$params = array(			
		'api_user'  => $user,
		'api_key'   => $pass,
		'to'        => $email,
		
		'subject'   => $subject,
		'html'      => $message,
		'fromname'	=> $from_Name,
		'text'      => '',   
		'from'      => '<noreply@pampertreat.com>',
		);
		$request =  $url.'api/mail.send.json';
		$session = curl_init($request);
		curl_setopt ($session, CURLOPT_POST, true);
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_SSLVERSION, 'CURL_SSLVERSION_TLSv1_2');
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($session);
		//print_r($response);
		curl_close($session);
	}


	public function exportcsvdata($data,$filename)
	{
        $array = array();
        

        //ADDED THIS FOR ADDING THE FIRST COLUMN
        	$po = $data[1];
        	$lineh = array();
	        foreach ($po as $k=>$v)
	        {
	            $lineh[] = $k;	
	            //echo $k; exit;		            
	        }
	        $array[] = $lineh;
	    //ADDED THIS FOR ADDING THE FIRST COLUMN


        foreach ($data as $row)
	    {
	        $line = array();
	        foreach ($row as $item)
	        {
	            $line[] =$item;  //// str_replace(",","-/",$item);	 		            
	        }
	        $array[] = $line;
	    }

	    //print_result($array); exit;

        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"$filename".".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');

        $ns = count($array);
        $t = 0;
        foreach ($array as $array) 
        {
            $t++;
            if($t==$ns){
            	echo implode(',',$array);
            }else{
            	echo implode(',',$array)."\r\n";
            }			                       
        }
        fclose($handle);
        exit;              
    }

    public function doupload($nm_of_file){
		$config['upload_path'] = './upload/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|doc|docx';
			$config['max_size']             = 10024;			
			$config['encrypt_name']           = true;
			$this->load->library('upload', $config);
			$out=array();
			if ($this->upload->do_upload($nm_of_file))
			{
				$data = array('upload_data' => $this->upload->data());
				$out=array("status"=>"Success","info"=>$data,"ext"=>$data['upload_data']['file_ext'], "fl_nm"=>$data['upload_data']['file_name']);
			}else{
				$out=array("status"=>'Err');
			}
			return $out;
	}


	public function paggination($url,$total,$per_page)
	{
		$config['base_url'] = base_url($url);
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['full_tag_open'] = "<ul class='pagerblock text-center'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='current'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
	}



}
?>