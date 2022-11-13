<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data extends MY_Controller {
	function __construct() 
	{
		parent::__construct();
		$this->load->library('sendgridmail');

		$this->data['cmn'] = $cmn_info = $this->db->query('SELECT * FROM  common')->row();
		
	} 



	

		public function index(){
			?>
				<h1 align="center"><?php echo "Sorry!! you can't direct access this.";?> </h1>
			<?php

			exit;
		}

		

		public function reviewlist(){
			$inf = $this->db->query('SELECT over_rtng as rating,r_name as name,r_subject as heading, r_desc as Message   
				from review where status = 1 ')->result();
			echo json_encode($inf);
		}

		public function thankyou(){
			echo '<h3>Thank you for submiting your review.</h3>';
		}
		public function reviewform(){
			$this->data['rat_params'] = $x = $this->db->query('SELECT * FROM rating_params order by rp_id DESC')->result();
			$this->data['ext_params'] = $x = $this->db->query('SELECT * FROM  rating_ext_fields order by rf_id DESC')->result();

				$cmn = $this->data['cmn'];

				//print_result($cmn); exit;
				


				if($_POST){
					$f = $m  = $_POST;
					//print_result($f); 
					$f['created_on'] = date('Y-m-d H:i:s');			
					foreach($f as $kk=>$vv){
						if (strpos($kk, 'fld_') !== false) {
						    unset($f[$kk]);
						    /*$kk_v = str_replace('fld_', '', $kk);
						    $ext_rt[$rr][$kk_v]=$vv;
						    $rr++; */

						}
						if (strpos($kk, 'ext_') !== false) {
						    unset($f[$kk]);
						    /*$kk_v = str_replace('ext_', '', $kk);
						    $ext_fld[$ff][$kk]=$vv;
						    $ff++;*/
						}
					}
					unset($f['img']);
					$aa = $this->db->insert('review',$f);
					$lastid =  $this->db->insert_id();

					$flds=array();
					$i=0;
					foreach($m as $k=>$v){
						if (strpos($k, 'ext_') !== false) {				   
						    $nm = str_replace('ext_', '', $k);
						    $nmx = explode('_', $nm);

						    /////print_result($nmx); exit;



						    $flds[$i]['r_id']=$lastid;
						    $flds[$i]['tbl_nm']='rating_params';
						    $flds[$i]['tbl_id']=$nmx[1];
						    $flds[$i]['column_nm']=$nmx[0];
						    $flds[$i]['info']=$v;
						    //$flds[$i][$nm]=$v;
						    $i++;				  
						}
						if (strpos($k, 'fld_') !== false) {				   
						    $nm = str_replace('fld_', '', $k);
						    $nmxx = explode('_', $nm);

						    $flds[$i]['r_id']=$lastid;
						    $flds[$i]['tbl_nm']='rating_ext_fields';
						    $flds[$i]['tbl_id']=$nmxx[1];
						    $flds[$i]['column_nm']=$nmxx[0];
						    $flds[$i]['info']=$v;
						    //$flds[$i][$nm]=$v;
						    $i++;				  
						}
					} 
					 ///print_result($flds); exit;
					if(count($flds)>0){
						$aa = $this->db->insert_batch('extra_info',$flds);
					}
					

					
					$cust_txt = file_get_contents( base_url('data/email_template/1/'.$lastid) );

					//exit;
					$subject="We got your Review.";
					$c_eml = $_POST['r_email'];
					$vxv =  $this->sendemail($c_eml,$subject,$cust_txt);
					//$vv =  $this->sendemail("melokanath@gmail.com",$subject,$cust_txt);

					$cust_txt2 = file_get_contents( base_url('data/email_template/2/'.$lastid) );
					$subject2="Hey Admin | New Review Added on ".date('d M Y H:i:s');
					$vxv =  $this->sendemail($cmn->email,$subject2,$cust_txt2);
					$vv =  $this->sendemail("melokanath@gmail.com",$subject2,$cust_txt2);

					///print_result($vv);  exit;
					
					

					redirect(base_url('data/thankyou'));
					//exit;

				}
			$this->load->view('data/form', $this->data);
		}


		public function email_template($t_id=null,$rid=null){ 
			if($t_id==null  ||  $rid==null ){
				echo 'WRONG INPUT.'; exit;
			}

		 
			$inf = $this->db->query('SELECT * FROM  review  where r_id='.$rid)->row();

			$this->data['content'] = $this->templateconverter($t_id,$inf);

			


			$this->data['tmpl'] = $x = $this->db->query('SELECT * FROM  dynamic_script where ds_id='.$t_id)->row();


			$this->data['cmn'] = $x = $this->db->query('SELECT * FROM  common')->row();		
			$this->load->view('front/eml',$this->data);
		}
		public function templateconverter($t_id,$info)
		{
			$dv = $this->db->query('SELECT * FROM  dynamic_script where ds_id='.$t_id)->row();
			$data = $dv->info;

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


		

}