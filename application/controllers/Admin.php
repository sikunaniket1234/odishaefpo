<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends Admin_Controller {
	function __construct() 
	{
		parent::__construct(); 


		$this->load->library('email');
        $this->load->library('Slim'); 
        $this->load->helper('string');
        $this->load->helper("file");
        $this->load->library('pagination');		
		
		if(isset($_SESSION['id'])){
			$my_id = $this->session->userdata('id');
			$this->data['myinfo']  = $this->myinfo = $inf =  
			$this->db->query('select * from user_mst where id='.$my_id)->row(); 
		}
		$this->data['settings'] = $x = $this->db->query('SELECT * FROM  common')->row();
	} 






	public function index(){

		$this->data['newsletter']  = $this->db->query('SELECT * from newsletter ORDER BY nws_id DESC LIMIT 5')->result();

		$this->data['settings'] = $x = $this->db->query('SELECT * FROM  common')->row();

		$this->load->view('admin/index',$this->data);
	}
	public function site_settings(){
		
		$this->data['settings'] = $x = $this->db->query('SELECT * FROM  common')->row();

		if($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['company_logo']['size']>0){
				

				$file=$_FILES['company_logo']['name'];
				$dd = explode('.', $file);
				$ext = $dd[count($dd)-1];
				$dnm= date('Ymdhis');

				$destination="uploads/".$dnm.'.'.$ext;
				move_uploaded_file($_FILES['company_logo']['tmp_name'], $destination);
				$d['company_logo']= $dnm.'.'.$ext;
			}	
			

			$this->db->update('common',$d);

			$this->session->set_flashdata('success','Record update Successfully!!');	
			redirect(base_url('admin/site_settings'));
		}
		

		$this->load->view('admin/site_settings', $this->data);
	}




	public function script_page()  
	{
		if($_POST){
			$data=$this->input->post();
			$data['insert_date']=date('Y-m-d');			 
			$i=strip_tags($_POST['info']);
			$i = str_replace("&nbsp;"," ",$i);
			$data['info']=$i;
			$this->db->insert('dynamic_script', $data);

			$this->session->set_flashdata('success','Data added successfully');
			redirect(base_url('admin/scriptlist/'),'refresh');
		}
		
		$this->data['dynafld']=$dynafld= $this->db->query('SELECT * from dynamic_fields')->result();
		$this->load->view('admin/script_page',$this->data);
	}
	public function scriptedit($id)  
	{
		$this->data['cmn'] = $x = $this->db->query('SELECT * FROM  common')->row();	
		if($_POST){
			$vvv = $_POST;

			print_result($vvv);  exit;
					 
			$i=strip_tags($_POST['info']);
			$i = str_replace("&nbsp;"," ",$i);
			$info=$i;
			$heading=$_POST['heading'];
			$this->db->set('heading', $heading);
			$this->db->set('info', $info);
			$this->db->where('ds_id', $id);
			$this->db->update('dynamic_script');

			$this->session->set_flashdata('success','Data updated successfully');
			redirect(base_url('admin/scriptlist/'),'refresh');
		}

		$this->data['info'] = $info = $this->db->get_where('dynamic_script', array('ds_id' => $id))->row();		
		$this->data['dynafld']=$dynafld= $this->db->query('SELECT * from dynamic_fields')->result();	

		$this->load->view('admin/scriptedit',$this->data);
	}
	public function scriptlist()  
	{
		$dynafld= $this->db->get('dynamic_script')->result();
		
		$m='';
		$i=1;
		foreach($dynafld as $d){
			$m .='<tr>
                    <th>'.$i.'</th>
                    <th>'.$d->heading.'</th>
                    <th>'.$d->info.'</th>                                
                    <th><a class="btn btn-info" href="'.base_url('admin/scriptedit/'.$d->ds_id).'">Edit</a>
                    </th>                                                
                </tr>';

             $i++;
       	}

		$this->data['alldata']=$m;

		$this->load->view('admin/scriptlist',$this->data);
	}


	public function email_template(){ 
		 

		$this->data['cmn'] = $x = $this->db->query('SELECT * FROM  common')->row();	
		$this->load->view('admin/eml',$this->data);
	}


	public function media_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from media_box  WHERE typ="homeban" ORDER BY m_id DESC ')->result();
		$this->load->view('admin/media_list',$this->data);
	}

	public function media(){		
		if($_POST)
		{
			$data = $this->input->post();

			unset($data['slim']);
			unset($data['media_thumb']);

			$data['typ']='homeban';

			
				$ban = Slim::getImages('media_thumb');
				$name_ban= $ban[0]['input']['name'];
				$data_ban = $ban[0]['output']['data'];
				$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/home/banner');
				$data['media_thumb'] =$file_ban['name'];
			//////
			//print_result($data); exit;

			$r = $this->db->insert('media_box',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/media_list/"));
		}
		
		

		$this->load->view('admin/media',$this->data);
	}


	public function media_edit($id){	

		$this->data['info']  = $info = $this->db->query('SELECT * from media_box where typ="homeban" AND m_id='.$id)->row();
		//print_result($info); exit;

		if($_POST)
		{
			$data = $this->input->post();

			unset($data['slim']);
			unset($data['media_thumb']);

					
			$ban = Slim::getImages('media_thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/home/banner/');
			$data['media_thumb'] =$file_ban['name'];
			//////
			//print_result($data); exit;

			$r = $this->db->update('media_box',$data, array('m_id' => $id ));

			//$r = $this->db->insert('media_box',$data);

			if($r)
			{
			 	$smsg= "Data Update Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/media_list/"));
		}
		
		

		$this->load->view('admin/media_edit',$this->data);
	}








	
	public function media_list_delete($x){

		$mdeia_all = $this->db->query('SELECT * from media_box  WHERE typ="homeban" ORDER BY m_id DESC ')->row();	

		$media_thumb = "uploads/home/banner/".$mdeia_all->media_thumb;
		if (file_exists($media_thumb)) {
			unlink($media_thumb);
		}

		$this->db->query('DELETE from media_box where m_id='.$x);
		
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/media_list'));
	}

	public function portfolio_list(){
		

	    $this->data['portf_all']  = $xxf = $this->db->query('SELECT * from portfolio ORDER BY pf_id DESC')->result();
	    //print_result($xxf); exit;

		$this->load->view('admin/portfolio_list',$this->data);
	}


	public function portfolio_add(){

		$this->data['service_lst']  = $xx = $this->db->query('SELECT * from services ORDER BY sid DESC')->result();
		//print_result($xx); exit;

		if($_POST)
		{
			$data = $mm = $this->input->post();	
			$mm['event_date']=date('Y-m-d', strtotime($data['event_date']));

			$data['event_date']=date('Y-m-d', strtotime($data['event_date']));	
			
			unset($mm['sid']);				

			$ban = Slim::getImages('thumbnail');
			$name_ban = $ban[0]['input']['name'];  //////$this->jag_slim_pic_renam($ban[0]['input']['name'])
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/portfolio/');
			$mm['thumbnail'] =$file_ban['name'];


			$ban2 = Slim::getImages('banner_img');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/portfolio/');
			$mm['banner_img'] =$file_ban2['name'];

			$vv = $this->db->insert('portfolio',$mm);


			$mmj = $this->db->insert_id();			

			$services = $data['sid'];			
			$newarr= array();
			$k =0;
			foreach($services as $s){
				$newarr[$k]['pf_id']=$mmj;
				$newarr[$k]['sid']=$s;
				$k++;
			}
			//print_result($newarr);

			$pp = $this->db->insert_batch('portfolio_service',$newarr);

			
			if($pp)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/portfolio_list/"));
		}
		
		

		$this->load->view('admin/portfolio_add',$this->data);
	}


	public function portfolio_edit($id){		
		
		$this->data['portf_all']  = $xxf = $this->db->query('SELECT * from portfolio WHERE pf_id='.$id)->row();

		#print_result($xxf); exit();
		
		$this->data['service_lst']  = $xx = $this->db->query('SELECT * from services ORDER BY sid DESC')->result();

		$MMM = $this->db->query('SELECT sid from portfolio_service WHERE pf_id='.$id)->result();


		$sd = array();
		foreach($MMM as $m){
			array_push($sd, $m->sid);
		}
		$this->data['sel_serv']  = $sd;

		

		
		if($_POST)
		{
			$data = $mm = $this->input->post();	
			$data['event_date']=date('Y-m-d', strtotime($data['event_date']));

			unset($mm['sid']);				

			$ban = Slim::getImages('thumbnail');
			$name_ban = $ban[0]['input']['name'];  //////$this->jag_slim_pic_renam($ban[0]['input']['name'])
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/portfolio/');
			$mm['thumbnail'] =$file_ban['name'];


			$ban2 = Slim::getImages('banner_img');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/portfolio/');
			$mm['banner_img'] =$file_ban2['name'];

			$vv = $this->db->update('portfolio',$mm, array('pf_id' => $id ));
			

			$gf = $this->db->query('DELETE FROM portfolio_service WHERE pf_id='.$id);
			//////////////////////////////////////////////
			$services = $data['sid'];			
			$newarr= array();
			$k =0;
			foreach($services as $s){
				$newarr[$k]['pf_id']=$id;
				$newarr[$k]['sid']=$s;
				$k++;
			}
			$pp = $this->db->insert_batch('portfolio_service',$newarr);
			//////////////////////////////////////////////

			
			if($vv)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/portfolio_list/"));
		}


		$this->load->view('admin/portfolio_edit',$this->data);
	}



	
	public function portfolio_delete($id){
		$this->data['portf_all']  = $portf_all = $this->db->query('SELECT * from portfolio WHERE pf_id='.$id)->row();

		$thumbnail = "uploads/portfolio/".$portf_all->thumbnail;		
		$banner_img = "uploads/portfolio/".$portf_all->banner_img;

		if (file_exists($thumbnail)) {
			unlink($thumbnail);
		}

		if (file_exists($banner_img)) {
			unlink($banner_img );
		}
		

		$this->db->query('DELETE from portfolio where pf_id='.$id);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/portfolio_list'));
	}



	public function portfolio_gallery($id){

		$this->data['portfolio_info'] = $portfolio_info = $this->db->query('SELECT * from portfolio WHERE pf_id='.$id  )->row();

		if($_POST)
		{
			$data = $this->input->post();
			//print_result($data); exit;

			$ban = Slim::getImages('media_thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/portfolio/');
			$data['media_thumb'] =$file_ban['name'];
			
			$data['typ_id'] = $id;
			$data['typ'] = 'PORTFOLIO';
			
			//print_result($data); exit;
			

			$r = $this->db->insert('media_box',$data);
			if($r)
			{
			 	$smsg= "Item added Successfully!!";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/portfolio_gallery/".$id));
		}



		$this->data['portgal_info']  = $portgal_info = $this->db->query('SELECT * from media_box WHERE typ="PORTFOLIO" AND typ_id='.$id  )->result();
		//print_result($portgal_info); exit;
		$this->data['pid']  = $id;
		

		//print_result($gal_info); exit();


		$this->load->view('admin/portfolio_gallery',$this->data);
	}



	public function portfgal_delete($id,$pid){
		
		$this->data['portgal_info']  = $portgal_info = $this->db->query('SELECT * from media_box WHERE typ="PORTFOLIO" AND m_id='.$id  )->row();		

		$file = $portgal_info->media_thumb;
		$prev_file_path = FCPATH."uploads/portfolio/".$file;  
		if(file_exists($prev_file_path )){
			unlink($prev_file_path );
			//echo "if case";

		}
		else{
			//echo "Elase";
		}
    

		//exit;


		$xx = $this->db->query('DELETE from media_box where m_id='.$id);


		$this->session->set_flashdata('suc_del','Record Deleted Successfully');
		redirect(base_url('admin/portfolio_gallery/'.$pid));
	}


	public function newsletter()
	{
		$this->data['newsletter']  = $this->db->query('SELECT * from newsletter ORDER BY nws_id DESC')->result();
		$this->load->view('admin/newsletter',$this->data);
	}

	public function newsletter_delete($id){
		$this->db->query('DELETE from newsletter where nws_id='.$id);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/newsletter'));
	}


	public function service_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from services ORDER BY sid DESC')->result();

		$this->load->view('admin/service_list',$this->data);
	}


	public function service(){		
		if($_POST)
		{
			$data = $this->input->post();

			unset($data['slim']);
			unset($data['service_img']);


			
				$ban = Slim::getImages('service_img');
				$name_ban= $ban[0]['input']['name'];
				$data_ban = $ban[0]['output']['data'];
				$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/services');
				$data['service_img'] =$file_ban['name'];
			//////

			$r = $this->db->insert('services',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/service_list/"));
		}
		
		

		$this->load->view('admin/service',$this->data);
	}


	public function service_edit($id){		
		
		$this->data['info'] =$info= $this->db->query('SELECT * from services where sid='.$id)->row();
		
		
		if($_POST)
		{
			$data = $this->input->post();

			unset($data['slim']);
			unset($data['service_img']);

			
			$ban = Slim::getImages('service_img');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/services');
			$data['service_img'] =$file_ban['name'];
			//////

			$this->db->where('sid',$id);	
			$r = $this->db->update('services', $data);

			if($r)
			{
			 	$smsg= "Data Update Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}

			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/service_list/"));
		}


		$this->load->view('admin/service_edit',$this->data);
	}

	public function service_list_delete($id){
		$this->db->query('DELETE from services where sid='.$id);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/service_list'));
	}


	




	public function service_gallery($id){

		if($_POST)
		{
			$data = $this->input->post();
			//print_result($data); exit;
				unset($data['service_img']);

				$ban = Slim::getImages('media_url');
				$name_ban= $ban[0]['input']['name'];
				$data_ban = $ban[0]['output']['data'];
				$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/gallery');
				$data['media_url'] =$file_ban['name'];

				$data['typ'] ='services';
				$data['typ_id'] = $id;
				$data['media_typ'] ='GAL';

				
				//print_result($data); exit;
			//////

			$r = $this->db->insert('gallery',$data);
			if($r)
			{
			 	$smsg= "Image added Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/service_gallery/".$id));
		}



		$this->data['serv_gal']  = $gal_info = $this->db->query('SELECT * from gallery WHERE typ="services" AND typ_id='.$id )->result();
		$this->data['pid']  = $id;
		

		//print_result($gal_info); exit();


		$this->load->view('admin/service_gallery',$this->data);
	}



	public function servgal_delete($id,$pid){
		$xx = $this->db->query('DELETE from gallery where m_id='.$id);


		$this->session->set_flashdata('suc_del','Record Deleted Successfully');
		redirect(base_url('admin/service_gallery/'.$pid));
	}




	public function gallery(){		
		if($_POST)
		{
			$data = $this->input->post();

			unset($data['slim']);
			unset($data['media_url']);


			
				$ban = Slim::getImages('media_url');
				$name_ban= $ban[0]['input']['name'];
				$data_ban = $ban[0]['output']['data'];
				$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/gallery');
				$data['media_url'] =$file_ban['name'];
			//////

			$r = $this->db->insert('gallery',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/gallery_list/"));
		}
		
		

		$this->load->view('admin/gallery',$this->data);
	}
	public function gallery_list(){
	    $this->data['inf']  = $df = $this->db->query('select * from gallery ORDER BY m_id DESC')->result();
	    //print_result($df); exit;
		$this->load->view('admin/gallery_list',$this->data);
	}
	public function gallery_item_delete($x){
		$this->db->query('DELETE from gallery where m_id='.$x);

		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/gallery_list'));
	}

	public function tree(){
	    $this->data['inf']  = $df = $this->db->query('select * from user_mst ORDER BY id DESC')->result();
	    //print_result($df); exit;
		$this->load->view('admin/tree',$this->data);
	}
	public function ngo_list(){
	    $this->data['ngo_list']  = $df = $this->db->query('select * from ngo_details ORDER BY id DESC')->result();
		$this->load->view('admin/ngo_list',$this->data);
	}
	public function fpo_list(){
	    $this->data['fpo_list']  = $df = $this->db->query('select * from fpo ORDER BY id DESC')->result();
	    //print_result($df); exit;
		$this->load->view('admin/fpo_list',$this->data);
	}


	public function seo_list(){

		//echo "Hello"; exit;
		$this->data['seoies'] = $data = $this->db->query('SELECT * from seo_inputs')->result();

		$this->load->view('admin/seo_list',$this->data);
	}
	public function seo_delete($x){
		$this->db->query('DELETE from seo_inputs where si_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/seo_list'));
	}
	public function seo(){
		if($_POST)
		{
			$data = $this->input->post();
			$data['insert_date']=date('Y-m-d H:i:s');
			/*$data['added_by']=$this->session->userdata('id');
			$data['added_on']=date('Y-m-d H:i:s');
			*/
				$r = $this->db->insert('seo_inputs',$data);
			
			 	if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/seo_list/"));
		}

		$this->load->view('admin/seo',$this->data);
	}
	public function seo_edit($id){
		$this->data['info']  =$info= $this->db->query('select * from seo_inputs where si_id='.$id)->row();
		if($_POST)
	    { 
   	        $data = $this->input->post();

	        $this->db->where('si_id', $id);
	        $m = $this->db->update('seo_inputs',$data);
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/seo_list'));
	    }
		$this->load->view('admin/seo_edit.php',$this->data);
	}

	public function msi(){
		$this->data['info']  =$info= $this->db->query('select * from common where id=1')->row();
		//print_result($info); exit;

		if($_POST)
	    { 
   	        $data = $this->input->post();

	        $this->db->where('id', 1);
	        $m = $this->db->update('common',$data);
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/msi'));
	    }
		$this->load->view('admin/msi.php',$this->data);
	}








	public function reviews(){
		$this->data['allreview'] = $x = $this->db->query('SELECT * FROM review  order by r_id desc')->result();
		//$output['allreview'] = $x;
		$this->load->view('admin/reviews',$this->data);
	}

	public function add_reviewsXXX(){	


		if($_POST)
		{
			$d = $this->input->post();

			
			$ban = Slim::getImages('auth_thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/review');


			$data['auth_thumb'] =$file_ban['name'];

			//print_result($d); exit;
			//////			
			$r = $this->db->insert('review',$d);

			if($r)
			{
			 	$smsg= "Data created Successfully!!";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/reviews/"));
		}

		$this->load->view('admin/add_reviews',$this->data);
	}


	public function reviews_add(){		
		if($_POST)
		{
			$data = $this->input->post();
			
			$ban = Slim::getImages('auth_thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/review/');
			$data['auth_thumb'] =$file_ban['name'];

			//////

			$r = $this->db->insert('review',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/reviews/"));
		}
		
		

		$this->load->view('admin/reviews_add',$this->data);
	}


	public function reviews_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from review where r_id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Reviews';
		$this->data['btn_nm'] = 'Update';

		If($_POST){
			$d = $_POST;
			
			$i = $this->db->update('review',$d, array('r_id'=>$id));	

			if($i){

				if($_FILES){
					$file=$_FILES['r_thumb']['name'];
					$destination="uploads/".$file;
					move_uploaded_file($_FILES['r_thumb']['tmp_name'], $destination);

					$this->db->update("review",array('r_thumb'=>$file),array("r_id"=>$id));

				}

				$this->session->set_flashdata('success','Record updated Successfully');			
			    redirect(base_url('admin/reviews'));

			}	else{
				$this->session->set_flashdata('error','Error found');			
			    redirect(base_url('admin/edit_reviews/'.$id));
			}	


			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('admin/reviews'));
		}

		$this->load->view('admin/reviews_edit',$this->data);
	}


	public function reviews_del($id){
		$x = $this->db->query('DELETE FROM review  where  r_id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('admin/reviews'));
	}





	public function faq(){
		$this->data['faqs'] = $x = $this->db->query('SELECT * FROM faq_tbl  order by f_id desc')->result();
		//$output['allreview'] = $x;
		$this->load->view('admin/faq',$this->data);
	}

	public function faq_add(){	
		
		if($_POST){
			$d = $_POST;
			$this->db->insert('faq_tbl',$d);

			$this->session->set_flashdata('success','Record added Successfully');			
		    redirect(base_url('admin/faq'));
		}

		$this->load->view('admin/faq_add',$this->data);
	}


	public function faq_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from faq_tbl where f_id='.$id)->row();
		$this->data['pg_heading'] = 'Edit FAQ';
		$this->data['btn_nm'] = 'Update';

		If($_POST){
			$d = $_POST;
			
			$i = $this->db->update('faq_tbl',$d, array('f_id'=>$id));				


			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('admin/faq'));
		}

		$this->load->view('admin/faq_add',$this->data);
	}


	public function faq_del($id){
		$x = $this->db->query('DELETE FROM faq_tbl  where  f_id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('admin/faq'));
	}

	// function generateRandomString($length = 25) {
	//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	//     $charactersLength = strlen($characters);
	//     $randomString = '';
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     return $randomString;
	// }
	
	public function user(){
		$this->data['users'] = $x = $this->db->query('SELECT * FROM user_mst where user_typ="NGO"  order by id desc')->result();
		//$output['allreview'] = $x;
		$this->load->view('admin/user',$this->data);
	}

	public function user_add(){	
		
		if($_POST){
			$d_post = $_POST;
			// print_result($d['user_name']);exit();
			$d['user_typ'] ="NGO";
			$d['user_name'] =$d_post['user_name'];
			$d['user_email'] =$d_post['user_email'];
			$d['user_password'] =$d_post['user_password'];
			
			// $myRandomString = generateRandomString(5);
			// $d_post['user_id'] =$myRandomString;
			$this->db->insert('user_mst',$d);

			$insert_id = $this->db->insert_id();

			$f['user_id'] =$insert_id;
			$f['name'] =$d_post['user_name'];
			$f['organisation_typ'] =$d_post['organisation_typ'];
			$f['phone'] =$d_post['phone'];
			$f['email'] =$d_post['email'];
			$f['contact_persion'] =$d_post['contact_persion'];
			$f['pan'] =$d_post['pan'];
			// $f['org_head'] =$d_post['org_head'];
			$f['registration_no'] =$d_post['registration_no'];
			$f['date_of_registration'] =$d_post['date_of_registration'];
			$f['twelve_a'] =$d_post['twelve_a'];
			$f['eighty_g'] =$d_post['eighty_g'];
			// $f['bylaws'] =$d_post['bylaws'];
			// $f['annual_report'] =$d_post['annual_report'];
			// $f['audit_report'] =$d_post['audit_report'];
			$f['grade'] =$d_post['grade'];
			$f['others'] =$d_post['others'];
			// $f['remarks'] =$d_post['remarks'];
			$f['createdBy'] =1;

			if($_FILES  && $_FILES['bylaws']['size']>0){

		        $file=$_FILES['bylaws']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/admin/bylaws/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['bylaws']['tmp_name'], $destination);
		        $f['bylaws']= $dnm.'.'.$ext;
	      	} 		
			// if($_FILES  && $_FILES['annual_report']['size']>0){

		    //     $file=$_FILES['annual_report']['name'];
		    //     $dd = explode('.', $file);
		    //     $ext = $dd[count($dd)-1];
		    //     $dnm= date('Ymdhis');

		    //     $destination="uploads/admin/annual_report/".$dnm.'.'.$ext;
		    //     move_uploaded_file($_FILES['annual_report']['tmp_name'], $destination);
		    //     $f['annual_report']= $dnm.'.'.$ext;
	      	// } 		
			if($_FILES  && $_FILES['audit_report']['size']>0){

		        $file=$_FILES['audit_report']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/admin/audit_report/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['audit_report']['tmp_name'], $destination);
		        $f['audit_report']= $dnm.'.'.$ext;
	      	} 		


			$this->db->insert('ngo_details',$f);


			$this->session->set_flashdata('success','Record added Successfully');			
		    redirect(base_url('admin/user'));
		}

		$this->load->view('admin/user_add',$this->data);
	}


	public function user_del($id){
		$this->db->query('DELETE FROM user_mst  where id ='.$id);
		$this->db->query('DELETE FROM ngo_details  where user_id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('admin/user'));
	}

	public function user_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from user_mst where user_typ="NGO" AND id='.$id)->row();
		$this->data['ngo_data'] = $this->db->query('SELECT * from ngo_details where user_id='.$id)->row();
		$this->data['pg_heading'] = 'Edit NGO Credential';
		$this->data['btn_nm'] = 'Update';

		If($_POST){
			$d = $_POST;
			unset($d['user_name']);
			unset($d['user_email']);
			unset($d['user_password']);
			// unset($d['user_name']);
			// $d['user_typ'] ="NGO";
			// $d['user_name'] =$d_post['user_name'];
			// $d['user_email'] =$d_post['user_email'];
			// $d['user_password'] =$d_post['user_password'];

			$i = $this->db->update('ngo_details',$d, array('id'=>$id));				


			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('admin/user'));
		}

		$this->load->view('admin/user_add',$this->data);
	}

		
	public function rating(){
		$this->data['ratings'] = $x = [];
		$this->load->view('admin/rating',$this->data);
	}
	

	public function blog_cat(){	
		
		$this->data['blogcat'] = $x = $this->db->query('SELECT * FROM page_cat  order by pcat_id desc')->result();

		if($_POST){

			$d = $_POST;
			$d['created_on'] = date('Y-m-d H:i:s');
			$this->db->insert('page_cat',$d);

			$this->session->set_flashdata('success','Record added Successfully');			
			redirect(base_url('admin/blog_cat'));						
		}

		$this->load->view('admin/blog_cat',  $this->data);
	}
	
	public function edit_blog_cat($id){			
		
		$this->data['data'] =$this->db->query('SELECT * from page_cat where pcat_id='.$id)->row();
		$this->data['btn_nm'] = 'Save';

		if($_POST){

			$d = $_POST;
			//$d['created_on'] = date('Y-m-d H:i:s');
			$this->db->update('page_cat',$d, array('pcat_id'=>$id));

			$this->session->set_flashdata('success','Record Update Successfully');			
			redirect(base_url('admin/blog_cat'));						
		}			
			
		$this->load->view('admin/blog_cat_edit', $this->data);
	}
	public function del_blog_cat($id){	
		
		$x = $this->db->query('DELETE FROM page_cat  where pcat_id ='. $id );

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('admin/blog_cat'));
	}


	

	
	public function blog_list(){

		$this->data['vfnies'] = $data = $this->db->query('SELECT * from pages  WHERE PAGE_TYPE="Blog"')->result();


		
		$this->load->view('admin/blog_list.php',$this->data);
	}
	public function blog(){

		$this->data['allcat'] = $allcat = $this->db->query('SELECT * FROM page_cat  order by pcat_id desc')->result();
		//print_result($allcat); exit;

		if($_POST)
		{ 
			$data = $this->input->post();
			$data['page_type']='Blog';

			$ban = Slim::getImages('thumb_img');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/pages/');
			$data['thumb_img'] =$file_ban['name'];

			$ban2 = Slim::getImages('banner_img');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/pages/');
			$data['banner_img'] =$file_ban2['name'];


				$r = $this->db->insert('pages',$data);
			

			 	if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/blog_list/"));
		}


		$this->load->view('admin/blog',$this->data);
	}

	public function blog_edit($id){
		$this->data['allcat'] = $allcat = $this->db->query('SELECT * FROM page_cat  order by pcat_id desc')->result();

		$this->data['info']  =$info= $this->db->query('SELECT * from pages where PAGE_TYPE="Blog" AND page_id='.$id)->row();
		
		if($_POST)
	    { 
   	        $data = $this->input->post();

   	        unset($data['slim']);
			unset($data['thumb_img']);
			unset($data['banner_img']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('thumb_img');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/pages/');
			$data['thumb_img'] =$file_ban['name'];
			//// THUMBNAIL //////

			//// TITILE BANNER //////
			$ban2 = Slim::getImages('banner_img');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/pages/');
			$data['banner_img'] =$file_ban2['name'];
			//// TITILE BANNER //////

	        $this->db->where('page_id', $id);
	        $m = $this->db->update('pages',$data);
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/blog_list'));
	    }
		$this->load->view('admin/blog_edit',$this->data);
	}


	public function blog_editXXX($id){
		$this->data['info']  =$info= $this->db->query('select * from pages where PAGE_TYPE="Blog" AND page_id='.$id)->row();
		if($_POST)
	    { 
   	        $data = $this->input->post();

   	        

			unset($data['slim']);
			unset($data['thumb_img']);
			unset($data['banner']);

			$th = Slim::getImages('thumb_img');
			$name_th = $th[0]['input']['name'];
			if($name_th == $info->thumbnail)
			{
			}else{
				$data_th = $th[0]['output']['data'];
				$file_th = Slim::saveFile($data_th, $name_th, 'uploads/vfn/thumb');
				$data['thumbnail'] =$file_th['name'];
			}

			

	        $this->db->where('page_id', $id);
	        $m = $this->db->update('pages',$data);
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/blog_list'));
	    }
		$this->load->view('admin/blog_edit.php',$this->data);
	}
	public function blog_delete($x){

		$this->data['info']  =$info= $this->db->query('select * from pages where PAGE_TYPE="Blog" AND page_id='.$x)->row();
		$thumbnail = "uploads/pages/".$info->thumb_img;		
		$banner_img = "uploads/pages/".$info->banner_img;

		if (file_exists($thumbnail)) {
			unlink($thumbnail);
		}

		if (file_exists($banner_img)) {
			unlink($banner_img );
		}

		$this->db->query('DELETE from pages where page_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/blog_list'));
	}






	public function page(){
		

		if($_POST)
		{
			$data = $this->input->post();
			$data['page_type']='Page';

			$ban = Slim::getImages('thumb_img');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/pages/');
			$data['thumb_img'] =$file_ban['name'];

			$ban2 = Slim::getImages('banner_img');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/pages/');
			$data['banner_img'] =$file_ban2['name'];


			//////

			$r = $this->db->insert('pages',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/page_list/"));
		}


		$this->load->view('admin/page',$this->data);
	}

	public function page_list(){

		$this->data['vfnies'] = $data = $this->db->query('SELECT * from pages  
			WHERE PAGE_TYPE="Page"
			ORDER BY page_id desc')->result();

		
		$this->load->view('admin/page_list.php',$this->data);
	}


	public function page_edit($id){
		$this->data['info']  =$info= $this->db->query('select * from pages where PAGE_TYPE="Page" AND page_id='.$id)->row();
		if($_POST)
	    { 
   	        $data = $this->input->post();

   	        unset($data['slim']);
			unset($data['thumb_img']);
			unset($data['banner_img']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('thumb_img');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/pages/');
			$data['thumb_img'] =$file_ban['name'];
			//// THUMBNAIL //////

			//// TITILE BANNER //////
			$ban2 = Slim::getImages('banner_img');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/pages/');
			$data['banner_img'] =$file_ban2['name'];
			//// TITILE BANNER //////

	        $this->db->where('page_id', $id);
	        $m = $this->db->update('pages',$data);
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/page_list'));
	    }
		$this->load->view('admin/page_edit',$this->data);
	}
	public function page_delete($x){

		$this->data['info']  =$info= $this->db->query('select * from pages where PAGE_TYPE="Page" AND page_id='.$x)->row();

		$thumbnail = "uploads/pages/".$info->thumb_img;		
		$banner_img = "uploads/pages/".$info->banner_img;

		if (file_exists($thumbnail)) {
			unlink($thumbnail);
		}

		if (file_exists($banner_img)) {
			unlink($banner_img );
		}
		$this->db->query('DELETE from pages where page_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/page_list'));
	}

	public function change_password(){
		$myinfo = $this->myinfo ;
		$id=$myinfo->id;
		$ps=$myinfo->user_password;
		if($_POST)
	    { 
	    	$pdata = $_POST;

	    	if ($ps == $pdata['old_password'] ) {
	    		
	    		$data['user_password']=$pdata['new_password'];
		        $this->db->where('id',$id);
		        $m = $this->db->update('user_mst',$data);

		        $this->session->set_flashdata('success','Password update successfully !!!');
		        redirect(base_url($this->uri->segment(1).'/change_password'),'refresh');
		        
	    	}
	    	else{


	    		$this->session->set_flashdata('error','Your new and Retype Password is not match !!!');
		        redirect(base_url($this->uri->segment(1).'/change_password'),'refresh');

	    	}
   	        

   	        
	    }
		

		$this->load->view('admin/change_password',$this->data);
	}



	public function change_password_old(){
		$myinfo = $this->myinfo ;
		$id=$myinfo->id;
		$ps=$myinfo->user_password;
		if($_POST)
	    { 
   	        $pdata = $_POST;

   	        $data['user_password']=$pdata['new_password'];
	        $this->db->where('id',$id);
	        $m = $this->db->update('user_mst',$data);
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url($this->uri->segment(1).'/change_password'));
	    }
		

		$this->load->view('admin/change_password',$this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}


	public function category_list($id=NULL){

		if ($id==NULL){
			$whe='where parent_cat_id is NULL';
			$this->data['spl_heading']='';
		}
		else{
			$id=base64_decode($id);

			$info = $this->db->query('SELECT * FROM category where cat_id ='.$id)->row();

			$whe='where parent_cat_id ='.$id;
			$catlink=base_url('admin/category_list');
			$this->data['spl_heading']=' Under '.$info->cat_nm
								.'(<a href="'.$catlink.'">Back</a>)';


		}

	    $a=$this->data['inf']  = $this->db->query('select c.*, (select count(*) from category where parent_cat_id=c.cat_id ) as noms  from category c '.$whe.' 
	    	  ORDER BY order_no DESC,  cat_nm asc ')->result();
	   

		$this->load->view('admin/category_list',$this->data);
	} 
	public function category(){	
		if($_POST)
		{
			$data = $this->input->post();

			

			//print_result($data); exit;
			unset($data['slim']);
			unset($data['thumb_img']);
			unset($data['banner']);
			$data['ref_no']= random_string('nozero', 6);

				
			
			if($data['parent_cat_id']=='NULL'){
				$data['parent_cat_id']=null;
			}




			

			/////
				/*$th = Slim::getImages('thumb_img');
				//print_result($th); exit;
				$name_th = $th[0]['input']['name']; 
				$data_th = $th[0]['output']['data'];
				$file_th = Slim::saveFile($data_th, $name_th, 'uploads/cat/thumb');
				$data['thumb'] =$file_th['name'];
				
			
				$ban = Slim::getImages('banner');
				$name_ban= $ban[0]['input']['name'];
				$data_ban = $ban[0]['output']['data'];
				$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/cat/banner');
				$data['banner'] =$file_ban['name'];*/
			//////

			$r = $this->db->insert('category',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/category/"));
		}
		$parents	=$this->db->query('select cat_id, cat_nm from category where parent_cat_id is null order by cat_nm asc')->result();
		$m ='';
		foreach($parents as $p){
        	$m .='<option value="'.$p->cat_id.'" >'.$p->cat_nm.'</option>';

        	$vv  =$this->db->query('select cat_id, cat_nm from category 
        					where parent_cat_id='.$p->cat_id .' order by cat_nm asc')->result();
        		foreach($vv as $v){
		        	$m .='<option value="'.$v->cat_id.'" >----'.$v->cat_nm.'</option>';
		        }

        }
        $this->data['lists'] = $m;

		$this->load->view('admin/category',$this->data);
	}
	public function category_list_delete($x){
		$this->db->query('DELETE from category where cat_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/category_list'));
	}
	public function category_list_edit($id){
		$this->data['info']  =$info= $this->db->query('select * from category where cat_id='.$id)->row();


		if($_POST)
	    { 
   	        $data = $this->input->post();

   	        $data['ref_no']= random_string('nozero', 6);
				

			if($data['specification_arr']!=''){
					$m = $data['specification_arr'];
					$m = trim($m);
					$m = ltrim($m,',');
					$m = rtrim($m,',');
					$m = explode(',', $m);
					$f=0;
					$x = array();
					//print_result($m);
					foreach($m as $m){
						$x[$f]=trim($m);
						$x[$f]= ltrim($x[$f],',');
						$x[$f]= rtrim($x[$f],',');
						$f++;
					}
					//print_result($x);
					$x = json_encode($x);
					$data['specification_arr']=$x;
			}else{
				$data['specification_arr']=NULL;
			}


			unset($data['slim']);
			unset($data['thumb_img']);
			unset($data['banner']);



			/*$th = Slim::getImages('thumb_img');
			$name_th = $th[0]['input']['name'];
			if($name_th == $info->thumb)
			{
			}else{
				$data_th = $th[0]['output']['data'];
				$file_th = Slim::saveFile($data_th, $name_th, 'uploads/cat/thumb');
				$data['thumb'] =$file_th['name'];
			}

			$ban = Slim::getImages('banner');
			$name_ban= $ban[0]['input']['name'];
			if($name_ban == $info->banner)
			{
			}else{
				$data_ban = $ban[0]['output']['data'];
				$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/cat/banner');
				$data['banner'] =$file_ban['name'];
			}*/
				


			if($data['parent_cat_id']=='NULL'){
				$data['parent_cat_id']=null;
			}



	        $this->db->where('cat_id', $id);
	        $m = $this->db->update('category',$data);
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/category_list'));
	    }
	    
	   
	   
	  $this->data['parents']	=$g=$this->db->query('select cat_id,cat_nm from category where parent_cat_id is null')->result();
	  /*print_result($g);
	  exit;*/






		
	    
		$this->load->view('admin/category_list_edit',$this->data);
	}




	public function city(){
		if($_POST)
	    {
	        $data = $_POST;

	        //print_result($data); exit;
			unset($data['slim']);
			unset($data['banner']);
			/////
				$ban = Slim::getImages('banner');
				$name_ban= $ban[0]['input']['name'];
				$data_ban = $ban[0]['output']['data'];
				$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/city');
				$data['banner'] =$file_ban['name'];
			//////




	        $data['country_id']=1;
	        $data['city_url']= preg_replace('/\W+/', '-', strtolower($data['city_name']));
	        $m = $this->db->insert('city',$data);
	        redirect(base_url('admin/city'));
	    }
	    $this->data['inf']  = $o = $this->db->query('select * from city ct')->result();
	    
	    
		$this->load->view('admin/city',$this->data);
	}
	public function city_edit($id){
		if($_POST)
	    { 
   	        $data = $_POST;

   	        //print_result($data); exit;
			unset($data['slim']);
			unset($data['banner']);
			/////
				$ban = Slim::getImages('banner');
				$name_ban= $ban[0]['input']['name'];
				if($name_ban )
				{
				}else{
					$data_ban = $ban[0]['output']['data'];
					$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/city');
					$data['banner'] =$file_ban['name'];
				}
			//////

	        $m = $this->db->update('city',$data, array('city_id'=>$id) );
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/city'));
	    }
		

	    $this->data['info']  = $info = $this->db->query('select * from city where city_id='.$id)->row();
		$this->data['inf']  = $o = $this->db->query('select * from city ct')->result();
	    
	    
		$this->load->view('admin/city',$this->data);
	}
	public function city_delete($x){
		$this->db->query('DELETE from city where city_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/city'));
	}
	// public function country(){
	// 	if($_POST)
	//     {
	//         $data = $_POST;
	//         $data['inserted_on']=date('Y-m-d H:i:s');
	//         $m = $this->db->insert('country',$data);
	//         redirect(base_url('admin/country'));
	//     }
	//     $output['inf']  = $this->db->query('select c.*,
	//     	(SELECT count(*) from state s  where s.country_id=c.country_id)as noms
	//     	from country c')->result();
	// 	$this->load->view('admin/country',$output);
	// }
	// public function country_delete($x){
	// 	$this->db->query('DELETE from country where country_id='.$x);
	// 	$this->session->set_flashdata('success','Record Deleted Successfully');
	// 	redirect(base_url('admin/country'));
	// }
	// public function country_edit($id){
	// 	if($_POST)
	//     { 
 //   	        $data = $_POST;
	//         $data['inserted_on']=date('Y-m-d H:i:s');
	//         $this->db->where('country_id', $id);
	//         $m = $this->db->update('country',$data);
	//         $this->session->set_flashdata('success','Record Upadated Successfully');
	//         redirect(base_url('admin/country'));
	//     }
	//     /*$output['inf']  =$i= $this->db->query('SELECT * FROM country')->result();*/
	//     $output['info']  = $this->db->query('select * from country where country_id='.$id)->row();
	// 	$this->load->view('admin/country_edit',$output);
	// }





	//Add Country
	public function country(){

		if($_POST)
		{
			$data = $this->input->post();


			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/country/thumb');
			$data['thumb'] =$file_ban['name'];

			$ban2 = Slim::getImages('banner');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/country/banner');
			$data['banner'] =$file_ban2['name'];

			$r = $this->db->insert('country',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/country_list/"));
		}

		$this->load->view('admin/country',$this->data);
	}

	//countryList
	public function country_list(){ 


		if(isset($_POST['srch_term'])){
			$this->session->set_userdata($_POST);
			redirect(base_url('admin/country_list'));
		}

		$sq="";
		$this->data['srch_term'] = '';
		$srch_term = $this->session->userdata('srch_term');
		if(isset($srch_term)){
			$this->data['srch_term'] = $srch_term;
			$sq=" AND (  country_name like'%".$srch_term."%'  OR country_utl like'%".$srch_term."%'   )";
		}


		///pagination start//

		$offset=0;
	    if(isset($_GET['pgs']) && $_GET['pgs']>0 ){
	      	$offset=$_GET['pgs'];
	    }
	    $this->data['offset']  =$offset;
	    $perpg=10;
	    $limit_q = ' LIMIT '.$offset.' ,    '.$perpg;






	    							//where status=1 '.$sq.'
		$mq = 'select * from country where status=1 '.$sq.'
	    		    	
	    	ORDER BY country_id desc ';
	    	
	    $this->data['inf']  = $this->db->query($mq.$limit_q)->result();

	    $cou = $this->db->query('select count(*) as num from country ')->row();
	  	


	  	$this->load->library('pagination');
		//////////////////////////////////////////////////////////
        $config['base_url'] = base_url('admin/country_list/'); 
        $config['total_rows'] = $cou->num;
        $config['per_page'] = $perpg;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'pgs';
        $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        ///////////////////////////////////////////////////////////


		$this->load->view('admin/country_list.php',$this->data);
	}

	//Delete Country By id
	public function country_delete($x){
		$this->db->query('DELETE from country where country_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/country_list/'));
	}

	//Edit Country
	public function country_edit($id){
		$this->data['info']  =$info= $this->db->query('select * from country where 
			country_id='.$id)->row();
		if($_POST)
	    { 
   	        $data = $this->input->post();

   	        unset($data['slim']);
			unset($data['thumb']);
			unset($data['banner']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/country/thumb/');
			$data['thumb'] =$file_ban['name'];
			//// THUMBNAIL //////

			//// TITILE BANNER //////
			$ban2 = Slim::getImages('banner');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/country/banner/');
			$data['banner'] =$file_ban2['name'];
			//// TITILE BANNER //////

   	        $m = $this->db->update('country',$data, array('country_id'=>$id) );
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/country_list'));
	    }
		$this->load->view('admin/country_edit',$this->data);
	}



	//Add University
	public function university(){
		$this->data['allcont'] = $allcont = $this->db->query('SELECT * FROM country  order by country_id desc')->result();

		if($_POST)
		{
			$data = $this->input->post();


			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/university/thumb');
			$data['thumb'] =$file_ban['name'];

			$ban2 = Slim::getImages('banner');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/university/banner');
			$data['banner'] =$file_ban2['name'];

			$r = $this->db->insert('university',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/university_list/"));
		}

		$this->load->view('admin/university',$this->data);
	}

	//University List
	public function university_list(){ 


		if(isset($_POST['srch_term'])){
			$this->session->set_userdata($_POST);
			redirect(base_url('admin/university_list'));
		}

		$sq="";
		$this->data['srch_term'] = '';
		$srch_term = $this->session->userdata('srch_term');
		if(isset($srch_term)){
			$this->data['srch_term'] = $srch_term;
			$sq=" AND (  university_name like'%".$srch_term."%'  OR university_url like'%".$srch_term."%'   )";
		}

		///pagination start//

		$offset=0;
	    if(isset($_GET['pgs']) && $_GET['pgs']>0 ){
	      	$offset=$_GET['pgs'];
	    }
	    $this->data['offset']  =$offset;
	    $perpg=10;
	    $limit_q = ' LIMIT '.$offset.' ,    '.$perpg;


	    							//where status=1 '.$sq.'
		$mq = 'select u.*,(select country_name from country c where c.country_id=u.c_id) as cnty from university u where status=1 '.$sq.'
	    		    	
	    	ORDER BY university_id desc ';
	    	
	    $this->data['inf']  = $this->db->query($mq.$limit_q)->result();

	    $cou = $this->db->query('select count(*) as num from university ')->row();
	  	


	  	$this->load->library('pagination');
		//////////////////////////////////////////////////////////
        $config['base_url'] = base_url('admin/university_list/'); 
        $config['total_rows'] = $cou->num;
        $config['per_page'] = $perpg;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'pgs';
        $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        ///////////////////////////////////////////////////////////

		$this->load->view('admin/university_list.php',$this->data);
	}

	//Delete University By id
	public function university_delete($x){
		$this->db->query('DELETE from university where university_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/university_list/'));
	}

	//Edit University
	public function university_edit($id){
		$this->data['info']  =$info= $this->db->query('select * from university where 
			university_id='.$id)->row();

		$this->data['allcont'] = $allcont = $this->db->query('SELECT * FROM country  order by country_id desc')->result();

		if($_POST)
	    { 
   	        $data = $this->input->post();

   	        unset($data['slim']);
			unset($data['thumb']);
			unset($data['banner']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/university/thumb/');
			$data['thumb'] =$file_ban['name'];
			//// THUMBNAIL //////

			//// TITILE BANNER //////
			$ban2 = Slim::getImages('banner');
			$name_ban2= $ban2[0]['input']['name'];
			$data_ban2 = $ban2[0]['output']['data'];			
			$file_ban2 = Slim::saveFile($data_ban2, $name_ban2, 'uploads/university/banner/');
			$data['banner'] =$file_ban2['name'];
			//// TITILE BANNER //////

   	        $m = $this->db->update('university',$data, array('university_id'=>$id) );
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/university_list'));
	    }
		$this->load->view('admin/university_edit',$this->data);
	}


	//Add Course
	public function course(){
		$this->data['allun'] = $allcont = $this->db->query('SELECT * FROM university  order by university_id desc')->result();

		if($_POST)
		{
			$data = $this->input->post();


			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/course/thumb');
			$data['thumb'] =$file_ban['name'];


			$r = $this->db->insert('course',$data);
			if($r)
			{
			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			 else
			{
			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("admin/course_list/"));
		}

		$this->load->view('admin/course',$this->data);
	}

	//Course List
	public function course_list(){ 


		if(isset($_POST['srch_term'])){
			$this->session->set_userdata($_POST);
			redirect(base_url('admin/course_list'));
		}

		$sq="";
		$this->data['srch_term'] = '';
		$srch_term = $this->session->userdata('srch_term');
		if(isset($srch_term)){
			$this->data['srch_term'] = $srch_term;
			$sq=" AND (  course_name like'%".$srch_term."%'  OR course_url like'%".$srch_term."%'   )";
		}

		///pagination start//

		$offset=0;
	    if(isset($_GET['pgs']) && $_GET['pgs']>0 ){
	      	$offset=$_GET['pgs'];
	    }
	    $this->data['offset']  =$offset;
	    $perpg=10;
	    $limit_q = ' LIMIT '.$offset.' ,    '.$perpg;


	    							//where status=1 '.$sq.'
		$mq = 'select c.*,(select university_name from university u where u.university_id=c.un_id) as unty from course c where status=1 '.$sq.'
	    		    	
	    	ORDER BY course_id desc ';
	    	
	    $this->data['inf']  = $this->db->query($mq.$limit_q)->result();

	    $cou = $this->db->query('select count(*) as num from course ')->row();
	  	


	  	$this->load->library('pagination');
		//////////////////////////////////////////////////////////
        $config['base_url'] = base_url('admin/course_list/'); 
        $config['total_rows'] = $cou->num;
        $config['per_page'] = $perpg;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'pgs';
        $config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        ///////////////////////////////////////////////////////////

		$this->load->view('admin/course_list.php',$this->data);
	}

	//Delete Course By id
	public function course_delete($x){
		$this->db->query('DELETE from course where course_id='.$x);
		$this->session->set_flashdata('success','Record Deleted Successfully');
		redirect(base_url('admin/course_list/'));
	}

	//Edit Course
	public function course_edit($id){
		$this->data['info']  =$info= $this->db->query('select * from course where 
			course_id='.$id)->row();

		$this->data['allunt'] = $allcont = $this->db->query('SELECT * FROM university  order by university_id desc')->result();

		if($_POST)
	    { 
   	        $data = $this->input->post();

   	        unset($data['slim']);
			unset($data['thumb']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/course/thumb/');
			$data['thumb'] =$file_ban['name'];
			//// THUMBNAIL //////


   	        $m = $this->db->update('course',$data, array('course_id'=>$id) );
	        $this->session->set_flashdata('success','Record Upadated Successfully');
	        redirect(base_url('admin/course_list'));
	    }
		$this->load->view('admin/course_edit',$this->data);
	}








	public function update_content(){
		if($_POST){
			$dd = $_POST;
			$ed_id = $dd['ed_id'];

			$content = $dd['content'];
			$cf = $this->db->query('SELECT * FROM page_contents where ed_id="'.$ed_id.'"  ')->row();

			$cfz= (array) $cf;

			if(count($cfz)>0){
				$p_data['content']=$content;
				$upd = array('ed_id'=>$ed_id);
				$vv = $this->db->update('page_contents',$p_data,$upd);
				if($vv){
					echo 'Updated Successfully';
				}else{
					echo 'Could Not Update. Contact Web master';
				}
			}else{
				$p_data['content']=$content;
				$p_data['ed_id']=$ed_id;
				$vv = $this->db->insert('page_contents',$p_data);
				if($vv){
					echo 'Inserted Successfully';
				}else{
					echo 'Could Not inserted. Contact Web master';
				}
			}
		}else{
			echo 'NIKAAAL';
		}
	}








	
}