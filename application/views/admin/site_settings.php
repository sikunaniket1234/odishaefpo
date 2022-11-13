<?php
   include ('inc/metaheader.php');  
   include ('inc/head2.php');  
?>

<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


<div class="page-body"> 

  <form class="form-horizontal" method="post" enctype="multipart/form-data">

    <?php if($this->session->flashdata('del_msg') != ''): ?>
         <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('del_msg'); ?>
          </div>
      <?php endif; ?> 

      
      <?php if($this->session->flashdata('success') != ''): ?>
         <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
      <?php endif; ?>

      
    <div class="row">

      <div class="col-md-12">
        <div class="well with-header">
            <div class="header bordered-palegreen">
              <div class="row">
                <div class="col-md-9">
                  <h5 style="margin-bottom: 0;"><strong>Settings </strong></h5>
                </div>
                <div class="col-md-3 text-right">
                 <!--  <button type="submit" class="btn btn-success btn-sm" name=""><i class="fa fa-save"></i> Save</button> -->
                </div>
              </div>
            </div>
            

            
           

             <div class="row">
              <div class="col-md-9">
                  

                  <div class="widget">
                    <div class="widget-header bordered-bottom bordered-green">
                      <i class="widget-icon fa fa-align-justify green"></i>
                      <span class="widget-caption "><h4 style="margin-top:7px;">General Settings</h4></span>
                        

                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            
                        </div>
                    </div>

                    <div class="widget-body no-paddingXX">
                        <div class="widget-main ">
                            <div class="horizontal-space"></div>
                              <div class="row">
                                                  
                                                  <div class="col-md-4">
                                                      
                                                      <h5 class="row-title before-darkorange">Organization Logo</h5>

                                                      <?php
                                                        $companylogo = base_url().'uploads/'.$settings->company_logo;                        
                                                      ?> 
                                                      <div align="center"  style="background: #074f71; padding:30px 10px; border-radius: 3px;">
                                                      <img src="<?php echo $companylogo; ?>" width= "100%">
                                                      </div>
                                                      <br/>
                                                      
                                                          <div class="input-icon inverted">
                                                              <input type="file" class="form-control" name="company_logo" value="<?=$settings->company_logo?>">
                                                              <i class="fa fa-upload bg-sky"></i>
                                                          </div>
                                                      

                                                      
                                                      <p class="text-info">Logo Size : (300 x 64)px, .png Only.</p>
                                                      <br/>
                                                    
                                                  </div>
                                                  <div class="col-md-8">
                                                    <div class="form-group row">
                                                      <div class="col-md-12 col-sm-12">
                                                         <label>Organization Name</label>
                                                         <input type="text" class="form-control" name="company_name" value="<?=@$settings->company_name ?>" autocomplete="off" required>
                                                      </div>
                                                    </div>
                                                    <div class="form-group row">
                                                      <div class="col-md-12 col-sm-12">
                                                         <label>Email</label>
                                                         <input type="email" class="form-control" name="email" value="<?=@$settings->email ?>" autocomplete="off" required>
                                                      </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <div class="col-md-12 col-sm-12">
                                                         <label>Website </label>
                                                         <input type="text" class="form-control" name="web" value="<?=@$settings->web ?>" autocomplete="off" required>
                                                      </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <div class="col-md-6 col-sm-6">
                                                         <label>Phone (Primary)</label>
                                                         <input type="text" class="form-control" name="phone" value="<?=$settings->phone?>"  autocomplete="off" required>
                                                      </div>
                                                      <div class="col-md-6 col-sm-6">
                                                         <label>Phone (Secondary)</label>
                                                         <input type="text" class="form-control" name="sec_phone"  value="<?=$settings->sec_phone?>" autocomplete="off" >
                                                      </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <div class="col-md-12 col-sm-12">
                                                         <label>Address</label>
                                                         <textarea class="form-control" rows="7" name="address"><?=$settings->address?></textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                            
                        </div>
                    </div>
                </div>



               




              </div>


              <div class="col-md-3">               
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-sky">
                      <i class="widget-icon fa fa-align-justify sky"></i>
                      <span class="widget-caption sky"><h4 style="margin-top:7px;">Email & Social Media</h4></span>
                        

                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <!-- <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a> -->
                        </div>
                    </div>

                    <div class="widget-body no-padding">
                        <div class="widget-main ">
                            <div class="panel-group accordion" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                Email Template Styles
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body border-red">



                                            <a href="<?=base_url('admin/email_template')  ?>"><i class="menu-icon fa fa-eye"></i> Preview Email Template</a><br/>
                                            
                                            <label>Primary Color</label>
                                            <input type="color" class="form-control" name="nwsltr_col1" value="<?=@$settings->nwsltr_col1 ?>" placeholder="Primary Color" >
                                            <br/>
                                            <label>Secondary Color</label>
                                            <input type="color" class="form-control" name="nwsltr_col2" value="<?=@$settings->nwsltr_col2 ?>" placeholder="Secondery Color" >

                                            <br/>
                                            <label>Background Color</label>
                                            <input type="color" class="form-control" name=" nwsltr_colbg" value="<?=@$settings->nwsltr_colbg ?>" placeholder="Background Color" >

                                            <br/>
                                            <div class="form-group row">
                                              <div class="col-md-12 col-sm-12">
                                                 <label>General TNC (for Newsletter) </label>
                                                 <textarea  class="form-control" style="height: 200px;" 
                                                    name="nsw_tnc"><?=@$settings->nsw_tnc ?></textarea>
                                              </div>
                                            </div>

                                            

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Social Settings
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div class="panel-body border-palegreen">
                                            
                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="facebook" value="<?=@$settings->facebook ?>">
                                                      <i class="fa fa-facebook bg-blue"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="twitter" value="<?=@$settings->twitter ?>">
                                                      <i class="fa fa-twitter bg-sky"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="linkedin" value="<?=@$settings->linkedin ?>">
                                                      <i class="fa fa-linkedin bg-blue"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="pinterest" value="<?=@$settings->pinterest ?>">
                                                      <i class="fa fa-pinterest bg-red"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="instagram" value="<?=@$settings->instagram ?>">
                                                      <i class="fa fa-instagram bg-maroon"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="youtube" value="<?=@$settings->youtube ?>">
                                                      <i class="fa fa-youtube bg-danger"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="vimeo" value="<?=@$settings->vimeo?>">
                                                      <i class="fa fa-vimeo bg-blue"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="snapchat" value="<?=@$settings->snapchat ?>">
                                                      <i class="fa fa-snapchat bg-yellow"></i>
                                                  </span>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                  <span class="input-icon inverted">
                                                      <input type="text" class="form-control" name="yelp" value="<?=@$settings->yelp ?>">
                                                      <i class="fa fa-yelp bg-danger"></i>
                                                  </span>
                                                </div>
                                              </div>
                                             
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


              </div>
              
            </div>                        
              
           <hr class="wide">
           
          <div align="center">
            <button type="submit" class="btn btn-success btn-lg" name=""><i class="fa fa-save"></i> Save</button>
            <a href="<?=base_url('admin/index');?>" class="btn btn-danger btn-lg" name=""><i class="fa fa-times"></i> Cancel</a>
          </div>



        </div>

      </div>
      
  


    </div>

    </div>


    </form>

  </div>

<?php
  include 'inc/footer-js.php';
?>
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
</script>



