<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fpo extends Admin_Controller {
	function __construct() 
	{
		parent::__construct(); 


		$this->load->library('email');
        $this->load->library('Slim'); 
        $this->load->helper('string');
        $this->load->helper("file");
        $this->load->library('pagination');		
		
		if(isset($_SESSION['id'])){
			$this->myId=$my_id = $this->session->userdata('id');
			$this->data['myinfo']  = $this->myinfo = $inf =$this->db->query('select * from fpo where id='.$my_id)->row(); 
		}
		$this->data['settings'] = $x = $this->db->query('SELECT * FROM  common')->row();
		$this->data['district'] = $x = $this->db->query('SELECT * FROM  district order by name')->result();
    	$this->data['block'] = $x = $this->db->query('SELECT * FROM  block order by name')->result();
	} 






	public function index(){

		// $this->data['newsletter']  = $this->db->query('SELECT * from newsletter ORDER BY nws_id DESC LIMIT 5')->result();

		// print_r("kuchbhi");

		$this->load->view('fpo/index',$this->data);
	}


	

	public function bank_details_add(){
		if($_POST)
		{
			$data = $this->input->post();
			$data['createdBy']=$this->myId;
			$data['fpoId']=$this->myinfo->id;
			
			$r = $this->db->insert('bank_details',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/bank_details_list/"));
		}
		
		$this->load->view('fpo/bank_details_add',$this->data);
	}
	public function bank_details_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from bank_details where status = 1 AND createdBy='.$this->myId)->result();

		$this->load->view('fpo/bank_details_list',$this->data);
	}
	public function bank_details_delete($id){
		$x = $this->db->query('DELETE from bank_details where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/bank_details_list/'));
	}
	public function bank_details_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from bank_details where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Bank Details';
		$this->data['btn_nm'] = 'Update';
		If($_POST){
			$d = $_POST;
			
			$this->db->update('bank_details',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('fpo/bank_details_list'));
		}

		$this->load->view('fpo/bank_details_add',$this->data);
	}

	public function product_add(){

		if($_POST)
		{
			for($i = 0; $i < count($_POST['product_name']); $i++){
				$data['fpoId'] = $this->myId;
				$data['createdBy'] = $this->myId;
				$data['product_name'] = $_POST['product_name'][$i];
				$data['stock'] = $_POST['stock'][$i];
				$data['season'] = $_POST['season'][$i];
				$data['harvest_month_one'] = $_POST['harvest_month_one'][$i];
				$data['harvest_month_two'] = $_POST['harvest_month_two'][$i];
				$data['harvest_month_three'] = $_POST['harvest_month_three'][$i];

				$this->db->insert('product',$data);
			
			}    
			redirect(base_url("fpo/product_list/"));
		}

		$this->load->view('fpo/product_add',$this->data);
	}
	public function product_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from product where createdBy='.$this->myId)->result();

		$this->load->view('fpo/product_list',$this->data);
	}
	public function product_delete($id){
		$x = $this->db->query('DELETE from product where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/product_list/'));
	}


	public function share_holder_capital_add(){
		$this->data['info']  =$s= $this->db->query('SELECT * from fpo_covered_area where fpoId='.$this->myId.' Limit 1')->row();
		$this->data['gp']  =$gp= $this->db->query('SELECT * from gram_panchayat where block_id='.$s->blockId)->result();
		// print_r($s);exit();
		if($_POST)
		{
			$data = $this->input->post();
			$data['createdBy']=$this->myId;
			$data['fpoId']=$this->myId;
			$data['districtId']=$s->districtId;
			$data['blockId']=$s->blockId;


			$r = $this->db->insert('share_holder_capital',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/share_holder_capital_list/"));
		}

		$this->load->view('fpo/share_holder_capital_add',$this->data);
	}
	public function share_holder_capital_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from share_holder_capital where createdBy='.$this->myId)->result();

		$this->load->view('fpo/share_holder_capital_list',$this->data);
	}
	public function share_holder_capital_delete($id){
		$this->db->query('DELETE from share_holder_capital where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/share_holder_capital_list/'));
	}
	public function share_holder_capital_edit($id){
		$this->data['info']  =$s= $this->db->query('SELECT * from fpo_covered_area where fpoId='.$this->myId.' Limit 1')->row();
		$this->data['gp']  =$gp= $this->db->query('SELECT * from gram_panchayat where block_id='.$s->blockId)->result();
		$this->data['data'] = $this->db->query('SELECT * from share_holder_capital where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Shareholder';
		$this->data['btn_nm'] = 'Update';
		If($_POST){
			$d = $_POST;
			$d['districtId']=$s->districtId;
			$d['blockId']=$s->blockId;
			$this->db->update('share_holder_capital',$d, array('id'=>$id));				


			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('fpo/share_holder_capital_list'));
		}

		$this->load->view('fpo/share_holder_capital_add',$this->data);
	}

	public function marketing_agency_add(){
		if($_POST)
		{
			for($i = 0; $i < count($_POST['agency_name']); $i++){
				$data['createdBy']=$this->myId;
				$data['fpoId']=$this->myId;
				$data['agency_name'] = $_POST['agency_name'][$i];
				$data['product_procured'] = $_POST['product_procured'][$i];
				$data['contact'] = $_POST['contact'][$i];
				$data['contact_persion'] = $_POST['contact_persion'][$i];
				$data['email'] = $_POST['email'][$i];

				$this->db->insert('marketing_agency',$data);
			
			}    
			redirect(base_url("fpo/marketing_agency_list/"));
		}
		
		$this->load->view('fpo/marketing_agency_add',$this->data);
	}
	public function marketing_agency_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from marketing_agency where createdBy='.$this->myId)->result();

		$this->load->view('fpo/marketing_agency_list',$this->data);
	}
	public function marketing_agency_delete($id){
		$x = $this->db->query('DELETE from marketing_agency where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/marketing_agency_list/'));
	}

	public function license_add(){
		if($_POST)
		{
			$data = $this->input->post();
			$data['createdBy']=$this->myId;
			$data['fpoId']=$this->myId;
			
			$r = $this->db->insert('license_details',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/license_list/"));
		}
		
		$this->load->view('fpo/license_add',$this->data);
	}
	public function license_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from license_details where createdBy='.$this->myId)->result();

		$this->load->view('fpo/license_list',$this->data);
	}
	public function license_delete($id){
		$x = $this->db->query('DELETE from license_details where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/license_list/'));
	}
	public function license_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from license_details where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit License Details';
		$this->data['btn_nm'] = 'Update';
		If($_POST){
			$d = $_POST;
			
			$this->db->update('license_details',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('fpo/license_list'));
		}

		$this->load->view('fpo/license_add',$this->data);
	}

	public function success_story_add(){
		//success_story
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId']=$this->myId;
			$data['createdBy']=$this->myId;
			$ban = Slim::getImages('banner_img');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/success_story/');
			$data['banner_img'] =$file_ban['name'];

			$r = $this->db->insert('success_story',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/success_story_list/"));
		}
		$this->load->view('fpo/success_story_add',$this->data);
	}
	public function success_story_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from success_story where status=1 AND createdBy='.$this->myId)->result();

		$this->load->view('fpo/success_story_list',$this->data);
	}
	public function success_story_delete($id){
		$this->db->query('DELETE from success_story where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/success_story_list'));
	}
	public function success_story_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from success_story where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Success Story'; 
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status=1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;

			unset($d['slim']);
			unset($d['banner_img']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('banner_img');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/success_story/');
			$d['banner_img'] =$file_ban['name'];
			//// THUMBNAIL //////
			
			$this->db->update('success_story',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('fpo/success_story_list'));
		}

		$this->load->view('fpo/success_story_add',$this->data);
	}

	public function registered_maintenance_add(){
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myId;
			$data['createdBy'] = $this->myId;
			if($_FILES  && $_FILES['membership_register']['size']>0){

		        $file=$_FILES['membership_register']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/membership_register/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['membership_register']['tmp_name'], $destination);
		        $data['membership_register']= $dnm.'.'.$ext;
	      	} 			
			if($_FILES  && $_FILES['certificate_issuing']['size']>0){

		        $file=$_FILES['certificate_issuing']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/certificate_issuing/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['certificate_issuing']['tmp_name'], $destination);
		        $data['certificate_issuing']= $dnm.'.'.$ext;
	      	} 			
			if($_FILES  && $_FILES['meeting']['size']>0){

		        $file=$_FILES['meeting']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/meeting/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['meeting']['tmp_name'], $destination);
		        $data['meeting']= $dnm.'.'.$ext;
	      	} 			
			if($_FILES  && $_FILES['stock']['size']>0){

		        $file=$_FILES['stock']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/stock/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['stock']['tmp_name'], $destination);
		        $data['stock']= $dnm.'.'.$ext;
	      	} 			
			if($_FILES  && $_FILES['sales']['size']>0){

		        $file=$_FILES['sales']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/sales/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['sales']['tmp_name'], $destination);
		        $data['sales']= $dnm.'.'.$ext;
	      	} 			

			$r = $this->db->insert('registered_maintenance',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/registered_maintenance_list/"));
		}
		$this->load->view('fpo/registered_maintenance_add',$this->data);
	}
	public function registered_maintenance_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from registered_maintenance where createdBy='.$this->myId)->result();

		$this->load->view('fpo/registered_maintenance_list',$this->data);
	}
	public function registered_maintenance_delete($id){
		$this->db->query('DELETE from registered_maintenance where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/registered_maintenance_list/'));
	}
	public function registered_maintenance_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from registered_maintenance where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Registered Maintenance';
		$this->data['btn_nm'] = 'Update';
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['membership_register']['size']>0){

				//unlink file
				$doc = "uploads/fpo/registeredMaintenance/membership_register/".$info->membership_register;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['membership_register']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/membership_register/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['membership_register']['tmp_name'], $destination);
		        $d['membership_register']= $dnm.'.'.$ext;
	      	} 		
			if($_FILES  && $_FILES['certificate_issuing']['size']>0){

				//unlink file
				$doc = "uploads/fpo/registeredMaintenance/certificate_issuing/".$info->certificate_issuing;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['certificate_issuing']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/certificate_issuing/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['certificate_issuing']['tmp_name'], $destination);
		        $d['certificate_issuing']= $dnm.'.'.$ext;
	      	} 		
			if($_FILES  && $_FILES['meeting']['size']>0){

				//unlink file
				$doc = "uploads/fpo/registeredMaintenance/meeting/".$info->meeting;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['meeting']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/meeting/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['meeting']['tmp_name'], $destination);
		        $d['meeting']= $dnm.'.'.$ext;
	      	} 		
			if($_FILES  && $_FILES['stock']['size']>0){

				//unlink file
				$doc = "uploads/fpo/registeredMaintenance/stock/".$info->stock;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['stock']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/stock/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['stock']['tmp_name'], $destination);
		        $d['stock']= $dnm.'.'.$ext;
	      	} 		
			if($_FILES  && $_FILES['sales']['size']>0){

				//unlink file
				$doc = "uploads/fpo/registeredMaintenance/sales/".$info->sales;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['sales']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/registeredMaintenance/sales/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['sales']['tmp_name'], $destination);
		        $d['sales']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('registered_maintenance',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('fpo/registered_maintenance_list'));
		}

		$this->load->view('fpo/registered_maintenance_add',$this->data);
	}

	public function equipment_add(){
		if($_POST)
		{
			for($i = 0; $i < count($_POST['bill_number']); $i++){
				$data['createdBy']=$this->myId;
				$data['fpoId']=$this->myId;
				$data['bill_number'] = $_POST['bill_number'][$i];
				$data['purchase_date'] = $_POST['purchase_date'][$i];
				$data['purchase_from'] = $_POST['purchase_from'][$i];
				$data['item_name'] = $_POST['item_name'][$i];
				$data['qty'] = $_POST['qty'][$i];
				$data['rate'] = $_POST['rate'][$i];
				$data['tax'] = $_POST['tax'][$i];
				$data['amount'] = $_POST['amount'][$i];
				$data['item_typ'] = $_POST['item_typ'][$i];
				$data['present_condition'] = $_POST['present_condition'][$i];
				$data['depreciation_value'] = $_POST['depreciation_value'][$i];

				$this->db->insert('equipment',$data);
			
			}    
			redirect(base_url("fpo/equipment_list/"));
		}
		
		$this->load->view('fpo/equipment_add',$this->data);
	}
	public function equipment_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from equipment where createdBy='.$this->myId)->result();

		$this->load->view('fpo/equipment_list',$this->data);
	}
	public function equipment_delete($id){
		$this->db->query('DELETE from equipment where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/equipment_list/'));
	}

	public function storage_facilities_add(){
		if($_POST)
		{
			$data = $this->input->post();
			$data['createdBy']=$this->myId;
			$data['fpoId']=$this->myId;
			
			$r = $this->db->insert('storage_facility',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/storage_facilities_list/"));
		}
	
		$this->load->view('fpo/storage_facilities_add',$this->data);
	}
	public function storage_facilities_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from storage_facility where createdBy='.$this->myId)->result();

		$this->load->view('fpo/storage_facilities_list',$this->data);
	}
	public function storage_facilities_delete($id){
		$this->db->query('DELETE from storage_facility where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/storage_facilities_list/'));
	}
	public function storage_facilities_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from storage_facility where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit STORAGE FACILITIES';
		$this->data['btn_nm'] = 'Update';
		If($_POST){
			$d = $_POST;
			
			$this->db->update('storage_facility',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('fpo/storage_facilities_list'));
		}

		$this->load->view('fpo/storage_facilities_add',$this->data);
	}

	public function market_outlet_add(){
		$this->data['inf']  = $this->db->query('SELECT * from market_outlet where createdBy='.$this->myId)->result();

		if($_POST)
		{
			for($i = 0; $i < count($_POST['location']); $i++){
				$data['fpoId'] = $this->myId;
				$data['createdBy'] = $this->myId;
				$data['location_name'] = $_POST['location'][$i];
				
				$this->db->insert('market_outlet',$data);
			
			}    
			redirect(base_url("fpo/market_outlet_add/"));  
		}

		$this->load->view('fpo/market_outlet_add',$this->data);
	}
	public function market_outlet_delete($id){
		$this->db->query('DELETE from market_outlet where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/market_outlet_add/'));
	}

	public function business_plan_add(){
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myId;
			$data['createdBy'] = $this->myId;
			if($_FILES  && $_FILES['bp_pdf']['size']>0){

		        $file=$_FILES['bp_pdf']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/businessPlan/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['bp_pdf']['tmp_name'], $destination);
		        $data['bp_pdf']= $dnm.'.'.$ext;
	      	} 			

			$r = $this->db->insert('business_plan',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/business_plan_list/"));
		}	
		$this->load->view('fpo/business_plan_add',$this->data);
	}
	public function business_plan_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from business_plan where createdBy='.$this->myId)->result();

		$this->load->view('fpo/business_plan_list',$this->data);
	}
	public function business_plan_delete($id){
		$this->db->query('DELETE from business_plan where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/business_plan_list/'));
	}
	public function business_plan_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from business_plan where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Business Plan';
		$this->data['btn_nm'] = 'Update';
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['bp_pdf']['size']>0){

				//unlink file
				$doc = "uploads/fpo/businessPlan/".$info->bp_pdf;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['bp_pdf']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/businessPlan/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['bp_pdf']['tmp_name'], $destination);
		        $d['bp_pdf']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('business_plan',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('fpo/business_plan_list'));
		}

		$this->load->view('fpo/business_plan_add',$this->data);
	}

	public function value_addition_of_products(){
		$this->data['inf']  = $this->db->query('SELECT * from value_addition where createdBy='.$this->myId)->result();

		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myId;
			$data['createdBy'] = $this->myId;

			$r = $this->db->insert('value_addition',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("fpo/value_addition_of_products/"));
		}	
		
		$this->load->view('fpo/value_addition_of_products',$this->data);
	}
	public function value_addition_of_products_delete($id){
		$this->db->query('DELETE from value_addition where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('fpo/value_addition_of_products/'));
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
		

		$this->load->view('fpo/change_password',$this->data);
	}
	public function getBlock(){
		$postData = $this->input->post();
		if(isset($postData['getid']) ){
			$get = $this->db->query('SELECT * from block where district_id='.$postData['getid'])->result();
			$m='';
		if(count($get)>0)
		{
		   $m= $m. '<option value="" >-- select block--</option>';
		   foreach($get as $g)
		   {
		   $m= $m. '<option value="'.$g->id.'" >'.$g->name.'</option>';
		   }
		}
		else
		{
		 $m= $m. '<option value="" >-- select block--</option>';
		}
		
		 echo $m;
		}
	  }

	public function getGramPanchayat(){
		$postData = $this->input->post();
		if(isset($postData['getid']) ){
			$get = $this->db->query('SELECT * from gram_panchayat where block_id='.$postData['getid'])->result();
			$m='';
		if(count($get)>0)
		{
		   $m= $m. '<option value="" >-- select gram panchayat--</option>';
		   foreach($get as $g)
		   {
		   $m= $m. '<option value="'.$g->id.'" >'.$g->name.'</option>';
		   }
		}
		else
		{
		 $m= $m. '<option value="" >-- select gram panchayat--</option>';
		}
		
		 echo $m;
		}
	  }

	public function getVillage(){
		$postData = $this->input->post();
		if(isset($postData['getid']) ){
			$get = $this->db->query('SELECT * from village where panchayat_id='.$postData['getid'])->result();
			$m='';
		if(count($get)>0)
		{
		   $m= $m. '<option value="" >-- select village --</option>';
		   foreach($get as $g)
		   {
		   $m= $m. '<option value="'.$g->id.'" >'.$g->name.'</option>';
		   }
		}
		else
		{
		 $m= $m. '<option value="" >-- select village --</option>';
		}
		
		 echo $m;
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
	
}