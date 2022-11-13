<?php
   include ('inc/metaheader.php');  
   include ('inc/head2.php');  
?>

<div class="page-body"> 


    <div class="row">
    <div class="col-md-12">
        <div class="well with-header">
            <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add NGO Credential'  ?></div>

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>NGO Name*</label>
                         <input type="text" class="form-control" value="<?=@$data->user_name  ?>" name="user_name" autocomplete="off" required>
                    </div>     
                    <div class="col-sm-4">
                         <label>Email*</label>
                         <input type="email" class="form-control" value="<?=@$data->user_email  ?>" name="user_email" autocomplete="off" required>
                    </div>
                    <div class="col-sm-4">
                         <label>Password*</label>
                         <input type="password" class="form-control" value="<?=@$data->user_password  ?>" name="user_password" autocomplete="off" required>

                    </div>

                   
                </div>
            <div class="container-fluid  dashboard-content">
                <section class="well with-header">
                    <div class="header bordered-palegreen">
                        <span class="widget-caption"><h5 style="margin-bottom: 0px; padding-bottom: 0px;">NGO Details:</h5></span>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label>Type Of Organisation</label>
                            <select name="organisation_typ" required class="form-control"  >
                                <option <?=(@$ngo_data->organisation_typ=="Society")?'selected':'' ?> value="Society">Society</option>
                                <option <?=(@$ngo_data->organisation_typ=="Trust")?'selected':'' ?> value="Trust">Trust</option>
                            </select>
                        </div>               
                        <div class="col-sm-2">
                            <label>Phone No</label>
                            <input type="text" class="form-control" value="<?=@$ngo_data->phone  ?>" name="phone" >
                        </div>
                        
                        <div class="col-sm-3">
                            <label>Email ID</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->email  ?>" name="email" >
                        </div>

                        <div class="col-sm-3">
                            <label>Contact Person</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->contact_persion  ?>" name="contact_persion" >
                        </div>

                        <div class="col-sm-2">
                            <label>PAN NO.</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->pan  ?>" name="pan" >
                        </div>
                       
                    </div>
                    <div class="form-group row">
                        <!-- <div class="col-sm-3">
                            <label>Organisation Head</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->org_head  ?>" name="org_head" >
                        </div> -->
                        
                        <div class="col-sm-3">
                            <label>Registration No.</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->registration_no  ?>" name="registration_no" >
                        </div>

                        <div class="col-sm-2">
                            <label>Date Of Registration</label>
                            <input type="date" class="form-control"value="<?=@$ngo_data->date_of_registration  ?>" name="date_of_registration" >
                        </div>

                        <div class="col-sm-2">
                            <label>12A</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->twelve_a  ?>" name="twelve_a" >
                        </div>
                        <div class="col-sm-2">
                            <label>80G</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->eighty_g  ?>" name="eighty_g" >
                        </div>
                    </div> 
                    <div class="form-group row">
                        
                        
                        <div class="col-sm-4">
                            <label>BYE LAWS/MOA/AOA (PDF)</label>
                            <input type="file" class="form-control"value="<?=@$ngo_data->bylaws  ?>" name="bylaws" >
                        </div>

                        <!-- <div class="col-sm-4">
                            <label>Annual Report (PDF)</label>
                            <input type="file" class="form-control"value="<?=@$ngo_data->annual_report  ?>" name="annual_report" >
                        </div> -->

                        <div class="col-sm-3">
                            <label>Audit Report</label>
                            <input type="file" class="form-control"value="<?=@$ngo_data->audit_report  ?>" name="audit_report" >
                        </div>

                        <div class="col-sm-2">
                            <label>Grade Of NGO</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->grade  ?>" name="grade" >
                        </div>
                        <div class="col-sm-3">
                            <label>Others</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->others  ?>" name="others" >
                        </div>
                        
                    </div> 
                    <!-- <div class="form-group row">
                        <div class="col-sm-2">
                            <label>Grade Of NGO</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->grade  ?>" name="grade" >
                        </div>
                        <div class="col-sm-3">
                            <label>Others</label>
                            <input type="text" class="form-control"value="<?=@$ngo_data->others  ?>" name="others" >
                        </div>
                        <div class="col-sm-4">
                            <label>Remarks (200 Words)</label>
                            <textarea class="form-control" name="remarks"><?=@$ngo_data->remarks  ?></textarea>
                        </div>
                    </div>   -->
                </section>
            </div>
                
                <div class="clerfix"></div>

                <hr/>
                
              <div align="center">

               <button type="submit" class="btn btn-success btn-lg"><?=(isset($btn_nm))?$btn_nm:'Submit'  ?></button>
                  <a href="<?php echo base_url('admin/user') ?>" class="btn btn-danger btn-lg">Cancel</a>
              </div>

            </form>

        </div>

    </div>
</div>


  </div>

<?php
  include 'inc/footer-js.php';
?>
