<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ngo extends Admin_Controller {
	function __construct() 
	{
		parent::__construct(); 

		$this->load->library('email');
        $this->load->library('Slim'); 
        $this->load->helper('string');
        $this->load->helper("file");
        $this->load->library('pagination');		

        //load Helper for Form
        // $this->load->helper('url', 'form'); 
        // $this->load->library('form_validation');  
		
		if(isset($_SESSION['id'])){
			$this->data['myId']=$this->myId=$my_id = $this->session->userdata('id');
			$this->data['myinfo']  = $this->myinfo = $inf =  
			$this->db->query('select * from user_mst where id='.$my_id)->row(); 
			$this->data['Fpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy ='.$my_id)->result();
		}
		if(isset($_SESSION['fpoid'])){
			$this->data['myfpoid']=$this->myfpoid=$my_fpoid = $this->session->userdata('fpoid');
			$this->data['fpo']  = $this->db->query('SELECT * from fpo where status = 1 AND id='.$my_fpoid)->row();
			// print_r($my_fpoid);exit();
		}
		$this->data['settings'] = $x = $this->db->query('SELECT * FROM  common')->row();
		$this->data['district'] = $x = $this->db->query('SELECT * FROM  district order by name')->result();
    	$this->data['block'] = $x = $this->db->query('SELECT * FROM  block order by name')->result();
	} 






	public function index(){

		// $this->data['newsletter']  = $this->db->query('SELECT * from newsletter ORDER BY nws_id DESC LIMIT 5')->result();

		// print_r("kuchbhi");

		$this->load->view('ngo/index',$this->data);
	}


	public function fpo_add(){
		$my_id = $this->myinfo->id;
		if($_POST)
		{

			$data = $this->input->post();

			if($_FILES  && $_FILES['doc_1']['size']>0){
        

		        $file=$_FILES['doc_1']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/doc/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['doc_1']['tmp_name'], $destination);
		        $data['doc_1']= $dnm.'.'.$ext;
	      	} 

			
			$data['createdBy']=$my_id;
			

			$r = $this->db->insert('fpo',$data);

			$lastid =  $this->db->insert_id();
			$p_data=str_replace("-","",$data['regDate']);
			$p=$p_data.'000'.$lastid;
			// print_r($p); exit;
			$this->db->query('UPDATE fpo SET registeredNo ="'.$p.'" where id='.$lastid);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/fpo_list/"));
		}


		$this->load->view('ngo/fpo_add',$this->data);
	}
	public function fpo_list(){
		$my_id = $this->myinfo->id;
	    $this->data['inf']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$my_id)->result();


		$this->load->view('ngo/fpo_list',$this->data);
	}
	public function fpo_delete($id){
		$this->db->query('UPDATE fpo SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/fpo_list'));
	}
	public function fpo_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from fpo where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit FPO';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['doc_1']['size']>0){

				//unlink file
				$doc = "uploads/fpo/doc/".$info->doc_1;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['doc_1']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/doc/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['doc_1']['tmp_name'], $destination);
		        $d['doc_1']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('fpo',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/fpo_list'));
		}

		$this->load->view('ngo/fpo_add',$this->data);
	}


	public function ceo(){
		$my_id = $this->myinfo->id;
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$my_id)->result();
		if($_POST)
		{
			$data = $this->input->post();
			$data['createdBy']=$my_id;
			$data['fpoId']=$this->myfpoid;
			$ban = Slim::getImages('profileImage');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/ceo/');
			$data['profileImage'] =$file_ban['name'];

			//////

			$r = $this->db->insert('ceo',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/ceo_list/"));
		}

		$this->load->view('ngo/ceo',$this->data);
	}
	public function ceo_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from ceo where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit CEO';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;

			unset($d['slim']);
			unset($d['profileImage']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('profileImage');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/ceo/');
			$d['profileImage'] =$file_ban['name'];
			//// THUMBNAIL //////
			
			$this->db->update('ceo',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/ceo_list'));
		}

		$this->load->view('ngo/ceo',$this->data);
	}
	public function ceo_list(){
		$my_id = $this->myinfo->id;
	    $this->data['inf']  = $this->db->query('SELECT *,(SELECT name from fpo where fpo.id=ceo.fpoId) as fpo_name from ceo where status = 1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$my_id)->result();

		$this->load->view('ngo/ceo_list',$this->data);
	}
	public function ceo_delete($id){
		$this->db->query('UPDATE ceo SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/ceo_list'));
	}


	public function bod_add(){
		$my_id = $this->myinfo->id;
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status=1 AND createdBy='.$my_id)->result();
		if($_POST)
		{
			$data = $this->input->post();
			$data['createdBy']=$my_id;
			$data['fpoId']=$this->myfpoid;
			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/bod/');
			$data['thumb'] =$file_ban['name'];
			

			$r = $this->db->insert('board_of_director',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/bod_list/"));
		}
		

		$this->load->view('ngo/bod_add',$this->data);
	}
	public function bod_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from board_of_director where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Board Of Director';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status=1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;

			unset($d['slim']);
			unset($d['thumb']);

			//// THUMBNAIL //////
			$ban = Slim::getImages('thumb');
			$name_ban= $ban[0]['input']['name'];
			$data_ban = $ban[0]['output']['data'];			
			$file_ban = Slim::saveFile($data_ban, $name_ban, 'uploads/bod/');
			$d['thumb'] =$file_ban['name'];
			//// THUMBNAIL //////
			
			$this->db->update('board_of_director',$d, array('id'=>$id));				


			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/bod_list'));
		}

		$this->load->view('ngo/bod_add',$this->data);
	}
	public function bod_list(){
		$my_id = $this->myinfo->id;
	    $this->data['inf']  = $this->db->query('SELECT *,(SELECT name from fpo where fpo.id=board_of_director.fpoId) as fpo_name from board_of_director where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$my_id)->result();

		$this->load->view('ngo/bod_list',$this->data);
	}
	public function bod_delete($id){
		$x = $this->db->query('UPDATE board_of_director SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/bod_list'));
	}
	 // done
	public function major_activity_add(){
		//major_activity_finalized
		//Major activities finalized
		$this->data['allMA']  = $this->db->query('SELECT * from major_activity where status = 1 ;')->result();
		$this->data['inf']  = $this->db->query('SELECT *,(SELECT name from major_activity where major_activity.id=major_activity_finalized.majorActivityId) as major_activity_name from major_activity_finalized where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();
		if($_POST)
		{


			if ($_POST['otherValue']) {
				print_r("------------------");
				$data['name'] = $_POST['otherValue'];
				$data['createdBy'] = $this->myId;

				$this->db->insert('major_activity',$data);
				$lastid =  $this->db->insert_id();

				$data1['fpoId'] = $this->myfpoid;
				$data1['majorActivityId'] = $lastid;
				$data1['createdBy'] = $this->myId;

				$this->db->insert('major_activity_finalized',$data1);
				redirect(base_url("ngo/major_activity_add/"));
			}else {
				$data['fpoId'] = $this->myfpoid;
				$data['majorActivityId'] = $_POST['activities'];
				$data['createdBy'] = $this->myId;

				$this->db->insert('major_activity_finalized',$data);
				redirect(base_url("ngo/major_activity_add/"));
			}
			// $data = count($_POST['activities']);
			// $data = $_POST['activities'];
			// $data1 = $_POST['otherValue'];
			// print_r($data);
			// print_r("------------------");
			// print_r($data1);
			// exit();
			// for($i = 0; $i < count($_POST['activities']); $i++){
			// 	$data['fpoId'] = $this->myfpoid;
			// 	$data['majorActivityId'] = $_POST['activities'][$i];
			// 	$data['createdBy'] = $this->myId;

			// 	$this->db->insert('major_activity_finalized',$data);
			
			// }    
			// redirect(base_url("ngo/major_activity_add/"));   
			// print_r($data);
			// exit();
		}
		
		$this->load->view('ngo/major_activity_add',$this->data);
	}
	public function major_activity_delete($id){
		$x = $this->db->query('DELETE from major_activity_finalized where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/major_activity_add'));
	}

	public function fpo_covered_area_add($id){
		$this->data['aFpo']  = $this->db->query('SELECT * from fpo where status=1 AND id='.$id)->row();
		$this->data['inf']  = $this->db->query('SELECT fpa.*,d.name as districtName,b.name as blockName, gp.name as gramPanchayatName
		from fpo_covered_area fpa
		
		JOIN district d ON fpa.districtId=d.id
		JOIN block b ON fpa.blockId=b.id
		JOIN gram_panchayat gp ON fpa.gramPanchayatId=gp.id
		
		
		
		where fpa.status=1 AND fpa.fpoId='.$id. ' AND fpa.createdBy='.$this->myId)->result();
		if($_POST)
		{
			$data = $this->input->post();
			$data['createdBy']=$this->myId;
			$data['fpoId']=$id;
			

			$r = $this->db->insert('fpo_covered_area',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/fpo_covered_area_add/".$id));
		}
		
		$this->load->view('ngo/fpo_covered_area_add',$this->data);
	}
	public function fpo_covered_area_delete($id){
		$x = $this->db->query('DELETE from fpo_covered_area where id='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/fpo_list/'));
	}

	public function turnover_add(){
		//annual_turnover
		if($_POST)
		{
			// $data = $_FILES['audit_report']['size'];
			// print_r($data);
			// exit();
			for($i = 0; $i < count($_POST['year_date']); $i++){
				$data['fpoId'] = $this->myfpoid;
				$data['createdBy'] = $this->myId;
				$data['year_date'] = $_POST['year_date'][$i];
				$data['input_sale'] = $_POST['input_sale'][$i];
				$data['output_sale'] = $_POST['output_sale'][$i];
				$data['profit'] = $_POST['profit'][$i];
				$data['loss'] = $_POST['loss'][$i];

				if($_FILES  && $_FILES['audit_report']['size'][$i]>0){

					$file=$_FILES['audit_report']['name'][$i];
					$dd = explode('.', $file);
					$ext = $dd[count($dd)-1];
					$dnm= date('Ymdhis');
	
					$destination="uploads/fpo/turnover/".$dnm.'.'.$ext;
					move_uploaded_file($_FILES['audit_report']['tmp_name'][$i], $destination);
					$data['audit_report']= $dnm.'.'.$ext;
				  } 			
	

				$this->db->insert('annual_turnover',$data);
			
			}    
			redirect(base_url("ngo/turnover_list/"));   
		}
		$this->load->view('ngo/turnover_add',$this->data);
	}
	public function turnover_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from annual_turnover where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/turnover_list',$this->data);
	}
	public function turnover_delete($id){
		$this->db->query('UPDATE annual_turnover SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/turnover_list'));
	}
	public function turnover_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from annual_turnover where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Annual Turnover Report';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['audit_report']['size']>0){

				//unlink file
				$doc = "uploads/fpo/turnover/".$info->audit_report;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['audit_report']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/turnover/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['audit_report']['tmp_name'], $destination);
		        $d['audit_report']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('annual_turnover',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/turnover_list'));
		}

		$this->load->view('ngo/turnover_add',$this->data);
	}

	public function training_add(){
		//conducted_meeting_training_exposure
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;
			$data['type'] = "Training";
			if($_FILES  && $_FILES['remarks']['size']>0){

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/conductedmte/training/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $data['remarks']= $dnm.'.'.$ext;
	      	} 			

			$r = $this->db->insert('conducted_meeting_training_exposure',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/training_list/"));
		}
		$this->load->view('ngo/training_add',$this->data);
	}
	public function training_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from conducted_meeting_training_exposure where type="Training" AND status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/training_list',$this->data);
	}
	public function training_delete($id){
		$this->db->query('UPDATE conducted_meeting_training_exposure SET status = 0  where type="Training" AND  id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/training_list'));
	}
	public function training_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from conducted_meeting_training_exposure where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Training';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['remarks']['size']>0){

				//unlink file
				$doc = "uploads/fpo/conductedmte/training/".$info->remarks;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/conductedmte/training/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $d['remarks']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('conducted_meeting_training_exposure',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/training_list'));
		}

		$this->load->view('ngo/training_add',$this->data);
	}

	public function meeting_add(){
		//conducted_meeting_training_exposure
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;
			$data['type'] = "Meeting";
			if($_FILES  && $_FILES['remarks']['size']>0){

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/conductedmte/meeting/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $data['remarks']= $dnm.'.'.$ext;
	      	} 			

			$r = $this->db->insert('conducted_meeting_training_exposure',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/meeting_list/"));
		}
		$this->load->view('ngo/meeting_add',$this->data);
	}
	public function meeting_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from conducted_meeting_training_exposure where type="Meeting" AND status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/meeting_list',$this->data);
	}
	public function meeting_delete($id){
		$this->db->query('UPDATE conducted_meeting_training_exposure SET status = 0  where type="Meeting" AND  id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/meeting_list'));
	}
	public function meeting_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from conducted_meeting_training_exposure where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Meeting';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['remarks']['size']>0){

				//unlink file
				$doc = "uploads/fpo/conductedmte/meeting/".$info->remarks;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/conductedmte/meeting/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $d['remarks']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('conducted_meeting_training_exposure',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/meeting_list'));
		}

		$this->load->view('ngo/meeting_add',$this->data);
	}

	public function credit_linkage_add(){
		//credit_linkage
		
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId']=$this->myfpoid;
			$data['createdBy']=$this->myId;
			
			

			$r = $this->db->insert('credit_linkage',$data);

			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/credit_linkage_list/"));
		}
		
		$this->load->view('ngo/credit_linkage_add',$this->data);
	}
	public function credit_linkage_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from credit_linkage where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/credit_linkage_list',$this->data);
	}
	public function credit_linkage_delete($id){
		$this->db->query('UPDATE credit_linkage SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/credit_linkage_list'));
	}
	public function credit_linkage_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from credit_linkage where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Credit linkage';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			
			$this->db->update('credit_linkage',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/credit_linkage_list'));
		}

		$this->load->view('ngo/credit_linkage_add',$this->data);
	}

	public function exposure_visit_add(){
		//conducted_meeting_training_exposure
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;
			$data['type'] = "Exposure";
			if($_FILES  && $_FILES['remarks']['size']>0){

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/conductedmte/exposure/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $data['remarks']= $dnm.'.'.$ext;
	      	} 			

			$r = $this->db->insert('conducted_meeting_training_exposure',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/exposure_visit_list/"));
		}
		$this->load->view('ngo/exposure_visit_add',$this->data);
	}
	public function exposure_visit_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from conducted_meeting_training_exposure where type="Exposure" AND status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/exposure_visit_list',$this->data);
	}
	public function exposure_visit_delete($id){
		$this->db->query('UPDATE conducted_meeting_training_exposure SET status = 0  where type="Exposure" AND  id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/exposure_visit_list'));
	}
	public function exposure_visit_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from conducted_meeting_training_exposure where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Exposure Visit';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['remarks']['size']>0){

				//unlink file
				$doc = "uploads/fpo/conductedmte/exposure/".$info->remarks;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/conductedmte/exposure/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $d['remarks']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('conducted_meeting_training_exposure',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/exposure_visit_list'));
		}

		$this->load->view('ngo/exposure_visit_add',$this->data);
	}

	public function convergence_add(){
		//convergence
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;
			if($_FILES  && $_FILES['remarks']['size']>0){

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/convergence/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $data['remarks']= $dnm.'.'.$ext;
	      	} 			

			$r = $this->db->insert('convergence',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/convergence_list/"));
		}
		$this->load->view('ngo/convergence_add',$this->data);
	}
	public function convergence_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from convergence where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/convergence_list',$this->data);
	}
	public function convergence_delete($id){
		$this->db->query('UPDATE convergence SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/convergence_list'));
	}
	public function convergence_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from convergence where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Convergence';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['remarks']['size']>0){

				//unlink file
				$doc = "uploads/fpo/convergence/".$info->remarks;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/convergence/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $d['remarks']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('convergence',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/convergence_list'));
		}

		$this->load->view('ngo/convergence_add',$this->data);
	}

	public function financial_sanction_add(){
		//financial_sanction
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;		

			$r = $this->db->insert('financial_sanction',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/financial_sanction_list/"));
		}
		$this->load->view('ngo/financial_sanction_add',$this->data);
	}
	public function financial_sanction_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from financial_sanction where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/financial_sanction_list',$this->data);
	}
	public function financial_sanction_delete($id){
		$this->db->query('UPDATE financial_sanction SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/financial_sanction_list'));
	}
	public function financial_sanction_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from financial_sanction where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Financial Sanction';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			
			$this->db->update('financial_sanction',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/financial_sanction_list'));
		}

		$this->load->view('ngo/financial_sanction_add',$this->data);
	}

	public function roc_add(){
		//roc_return
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;
			if($_FILES  && $_FILES['remarks']['size']>0){

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/roc/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $data['remarks']= $dnm.'.'.$ext;
	      	} 			

			$r = $this->db->insert('roc_return',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/roc_list/"));
		}
		$this->load->view('ngo/roc_add',$this->data);
	}
	public function roc_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from roc_return where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/roc_list',$this->data);
	}
	public function roc_delete($id){
		$this->db->query('UPDATE roc_return SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/roc_list'));
	}
	public function roc_edit($id){
		$this->data['data'] =$info= $this->db->query('SELECT * from roc_return where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Status of ROC Return Filing';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			if($_FILES  && $_FILES['remarks']['size']>0){

				//unlink file
				$doc = "uploads/fpo/roc/".$info->remarks;		
				if (file_exists($doc)) {
					unlink($doc);
				}
				//end

		        $file=$_FILES['remarks']['name'];
		        $dd = explode('.', $file);
		        $ext = $dd[count($dd)-1];
		        $dnm= date('Ymdhis');

		        $destination="uploads/fpo/roc/".$dnm.'.'.$ext;
		        move_uploaded_file($_FILES['remarks']['tmp_name'], $destination);
		        $d['remarks']= $dnm.'.'.$ext;
	      	} 		
			
			$this->db->update('roc_return',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/roc_list'));
		}

		$this->load->view('ngo/roc_add',$this->data);
	}

	public function auditing_firm_add(){
		//auditing_firm_details
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;		

			$r = $this->db->insert('auditing_firm_details',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/auditing_firm_list/"));
		}
		$this->load->view('ngo/auditing_firm_add',$this->data);
	}
	public function auditing_firm_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from auditing_firm_details where status=1 AND fpoId='.$this->myfpoid. ' AND createdBy='.$this->myId)->result();

		$this->load->view('ngo/auditing_firm_list',$this->data);
	}
	public function auditing_firm_delete($id){
		$this->db->query('UPDATE auditing_firm_details SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/auditing_firm_list'));
	}
	public function auditing_firm_edit($id){
		$this->data['data'] = $this->db->query('SELECT * from auditing_firm_details where status=1 AND id='.$id)->row();
		$this->data['pg_heading'] = 'Edit Auditing Firm Details';
		$this->data['btn_nm'] = 'Update';
		$this->data['allFpo']  = $this->db->query('SELECT * from fpo where status = 1 AND createdBy='.$this->myId)->result();
		If($_POST){
			$d = $_POST;
			
			$this->db->update('auditing_firm_details',$d, array('id'=>$id));				

			$this->session->set_flashdata('success','Record Update Successfully');
			redirect(base_url('ngo/auditing_firm_list'));
		}

		$this->load->view('ngo/auditing_firm_add',$this->data);
	}

	public function success_story_add(){
		//success_story
		if($_POST)
		{
			$data = $this->input->post();
			$data['ngoId']=$this->myId;
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
			redirect(base_url("ngo/success_story_list/"));
		}
		$this->load->view('ngo/success_story_add',$this->data);
	}
	public function success_story_list(){
	    $this->data['inf']  = $this->db->query('SELECT * from success_story where status=1 AND  createdBy='.$this->myId)->result();

		$this->load->view('ngo/success_story_list',$this->data);
	}
	public function success_story_delete($id){
		$this->db->query('UPDATE success_story SET status = 0  where id ='.$id);

		$this->session->set_flashdata('del_msg','Record Deleted Successfully.');
		redirect(base_url('ngo/success_story_list'));
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
			redirect(base_url('ngo/success_story_list'));
		}

		$this->load->view('ngo/success_story_add',$this->data);
	}

	public function nabfpo_add(){
		//nabfpo_portal
		if($_POST)
		{
			$data = $this->input->post();
			$data['fpoId'] = $this->myfpoid;
			$data['createdBy'] = $this->myId;		

			$r = $this->db->insert('nabfpo_portal',$data);
			
			if($r){

			 	$smsg= "Data created Successfully";
			 	$typ='success';
			}
			else{

			 	$smsg= "Error Occurs while adding data";
			 	$typ='error';
			}
			$this->session->set_flashdata($typ,$smsg);
			redirect(base_url("ngo/nabfpo_add/"));
		}
		$this->load->view('ngo/nabfpo_add',$this->data);
	}

	public function rating(){
		$this->data['ratings'] = $x = [];
		$this->load->view('ngo/rating',$this->data);
	}


	public function store()
    {
    	$my_id = $this->myinfo->id;
        if(!empty($this->input->post('submit'))){
            echo "<pre>";
            print_r($_POST);   
            // foreach ($_POST as $key => $value) {
            // 	print_r($values);
            //     // $this->db->insert('annual_profit_loss',$value);
            // }    



            for($i = 0; $i < count($_POST); $i++){
            		$data['ngoId'] = $my_id;
	                $data['year_date'] = $_POST['year_date'][$i];
	                $data['profit'] = $_POST['profit'][$i];
	                $data['loss'] = $_POST['loss'][$i];

	                // $this->db->insert('annual_profit_loss',$data);
	            
	        }        
        }   
    }

	public function save_popup(){
      //code goes here

		if(isset($_POST['fpoid'])){
			if ($_POST['fpoid']==0) {
				unset($_SESSION['fpoid']);
				$smsg= "FPO Not Selected Successfully";
				$typ='success';
				$this->session->set_flashdata($typ,$smsg);
				redirect(base_url('ngo'));
			}else {
				# code...
				$this->session->set_userdata($_POST);
				$smsg= "FPO Selected Successfully";
				$typ='success';
				$this->session->set_flashdata($typ,$smsg);
				redirect(base_url('ngo'));
			}
		}


      // then do whatever you want with it :)

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
		

		$this->load->view('ngo/change_password',$this->data);
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