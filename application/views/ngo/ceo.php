<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>




	 <div class="page-body">                    
        <div class="row">                      
            
            <div class="col-md-12">

                <?php include 'inc/flashmsg.php'; ?>
                <div class="well with-header">
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add CEO'  ?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                       <!-- <div class="col-sm-3">
                                            <label>FPO</label>
                                            <select class="form-control" name="fpoId" required>
                                                <option value="">Select</option>
                                                <?php 
                                                    foreach ($allFpo as $ci) {
                                                ?>
                                                <option <?=(@$data->fpoId==$ci->id)?'selected':'' ?>   value="<?=$ci->id ?>"><?=$ci->name?></option>
                                                <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div> -->

                                         <div class="col-sm-2">
                                            <label>Employee Type*</label>
                                            <select required class="form-control" name="employee_type" >
                                                <option value="CEO">CEO</option>
                                                <option value="Accountant">Accountant</option>
                                                <option value="Marketing Manager">Marketing Manager</option>
                                                <option value="Office Staff">Office Staff</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Name Of Employee*</label>
                                            <input type="text" class="form-control" value="<?=@$data->name  ?>"  name="name" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Gender</label>
                                            <select name="gender" required class="form-control">
                                              <option disbled>Select</option>
                                              <option <?=(@$data->gender=="male")?'selected':'' ?> value="male">Male</option>
                                              <option <?=(@$data->gender=="female")?'selected':'' ?> value="female">Female</option>
                                              <option <?=(@$data->gender=="other")?'selected':'' ?> value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label>Age*</label>
                                            <input type="text" class="form-control age-valid" value="<?=@$data->age  ?>"  name="age" >
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Date of appointment</label>
                                            <input type="date" class="form-control" value="<?=@$data->dateOfAppointment  ?>" name="dateOfAppointment"  >
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Salary*</label>
                                            <input type="number" class="form-control" value="<?=@$data->salary  ?>"  name="salary" >
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <label>Educational Qualification*</label>
                                            <select required class="form-control" name="educationalQualification" >
                                                <option  value="" selected="selected" disabled="disabled">-- select one --</option>
                                                <option <?=(@$data->educationalQualification=="No formal education")?'selected':'' ?> value="No formal education">No formal education</option>
                                                <option <?=(@$data->educationalQualification=="Undermatric")?'selected':'' ?> value="Undermatric">Undermatric</option>
                                                <option <?=(@$data->educationalQualification=="Matric")?'selected':'' ?> value="Matric">Matric</option>
                                                <option <?=(@$data->educationalQualification=="12th")?'selected':'' ?> value="12th">12th</option>
                                                <option <?=(@$data->educationalQualification=="Graduate")?'selected':'' ?> value="Graduate">Graduate</option>
                                                <option <?=(@$data->educationalQualification=="Postgraduate")?'selected':'' ?> value="Postgraduate">Postgraduate</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Email Id</label>
                                            <input type="email" class="form-control" value="<?=@$data->email  ?>" name="email"  >
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Mobile No</label>
                                            <input type="text" class="form-control mobile-valid" value="<?=@$data->mobileNo  ?>" name="mobileNo" title="10 digit mobile number"  >
                                        </div>
                                        <div class="col-sm-2">
                                            <label>PIN</label>
                                            <input type="text" class="form-control pin-valid" name="pin" value="<?=@$data->pin  ?>" >
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Address*</label>
                                            <textarea   name="address" class="form-control"> <?=@$data->address ?></textarea>
                                        </div>

                                    </div>

                                    <!-- <div class="form-group row">
                                        

                                        <div class="col-sm-3">
                                            <label>UserName*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user darkorange"></i></span>
                                                <input type="text" class="form-control" placeholder="Username" value="<?=@$data->username  ?>"name="username" required>
                                            </div>
                                        </div>

                                         <div class="col-sm-3">
                                            <label>Password</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock circular darkorange"></i></span>
                                                <input type="password" id="password"  class="form-control" placeholder="Password" value="<?=@$data->password  ?>" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Confirm Password</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock circular darkorange"></i></span>
                                                <input type="password"  id="confirm_password" class="form-control" placeholder="Confirm Password" value="<?=@$data->password  ?>" required>
                                            </div>
                                            <span id='message'></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Address*</label>
                                            <textarea   name="address" class="form-control"> <?=@$data->address ?></textarea>
                                        </div>
                                    </div> -->

                                    <div class="form-group row">
                                        <div class="col-sm-3 col-md-3" style="float: left;">
                                                <label>Profile Image</label>
                                                
                                                    <div class="slim" style="width:180px; height:120px;"
                                                         data-meta-user-id="1230"
                                                         data-ratio="434:290"
                                                         data-size="434,290"
                                                        >
                                                        <?php
                                                            if (@$data->profileImage) {
                                                                ?>
                                                                    <img src="<?=base_url('uploads/ceo/'.@$data->profileImage);?>" alt="ceo">
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                   
                                                                <?php
                                                            }
                                                        ?>
                                                        <input type="file" name="profileImage" >
                                                    </div>
                                               
                                            </div>
                                            
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success"><?=(isset($btn_nm))?$btn_nm:'Submit'  ?></button>
                                </form>






                </div>
              
             
                

            </div> 
        </div>                   
    </div>



    <?php
        include 'inc/footer-js.php';  
    ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#page_heading").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace('/\s/g','-');
                Text = Text.replace(/ /g,'-');
                Text = Text.replace(/[^\w-]+/g,'');
                Text = Text.replace(/-{2,}/g, '-');

                $("#page_url").val(Text);    
            });
        });
    </script>

    <script>
       ///// CKEDITOR.replace( 'editor1');
        var editor = CKEDITOR.replace( 'editor1',
        {
            
            format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
           
        } );
        CKFinder.setupCKEditor( editor, { basePath : "<?=base_url()?>ckfinder/", rememberLastFolder : false } ) ;
    </script> 
    <script>
        $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


