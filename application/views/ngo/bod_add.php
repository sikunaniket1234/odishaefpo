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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Board Of Director'  ?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <!-- <div class="col-sm-2">
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
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="<?=@$data->name  ?>"  name="name" required>
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Type of director*</label>
                                            <select required class="form-control" name="director_type" >
                                                <option <?=(@$data->director_type=="Director")?'selected':'' ?> value="Director">Director</option>
                                                <option <?=(@$data->director_type=="Promoter")?'selected':'' ?> value="Promoter">Promoter</option>
                                            </select>
                                        </div>

                                       
                                        <div class="col-sm-2">
                                            <label>Nominated/Elected</label>
                                            <select name="selectionProcess" required class="form-control">
                                              <option <?=(@$data->selectionProcess=="nominated")?'selected':'' ?> value="nominated">Nominated</option>
                                              <option <?=(@$data->selectionProcess=="elected")?'selected':'' ?> value="elected">Elected</option>
                                            </select>
                                        </div>

                                         <div class="col-sm-2">
                                            <label>Farmer type</label>
                                            <select name="farmer_typ" required class="form-control">
                                              <option <?=(@$data->farmer_typ=="SF Farmer")?'selected':'' ?> value="SF Farmer">SF Farmer</option>
                                              <option <?=(@$data->farmer_typ=="MF Farmer")?'selected':'' ?> value="MF Farmer">MF Farmer</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Marital Status</label>
                                            <select required class="form-control" name="marital_status" >
                                                <option <?=(@$data->marital_status=="Married")?'selected':'' ?> value="Married">Married</option>
                                                <option <?=(@$data->marital_status=="Unmarried")?'selected':'' ?> value="Unmarried">Unmarried</option>
                                                <option <?=(@$data->marital_status=="Widowed")?'selected':'' ?> value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label>Age*</label>
                                            <input type="text" class="form-control age-valid" value="<?=@$data->age  ?>"  name="age" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        
                                         
                                        <div class="col-sm-2">
                                            <label>Caste</label>
                                            <select required class="form-control" name="caste" >
                                                <option <?=(@$data->caste=="gen")?'selected':'' ?> value="gen">General</option>
                                                <option <?=(@$data->caste=="sc")?'selected':'' ?> value="sc">SC</option>
                                                <option <?=(@$data->caste=="st")?'selected':'' ?> value="st">ST</option>
                                                <option <?=(@$data->caste=="obc")?'selected':'' ?> value="obc">OBC</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Gender</label>
                                            <select name="gender" required class="form-control">
                                              <option disbled>Select</option>
                                              <option <?=(@$data->gender=="male")?'selected':'' ?> value="male">Male</option>
                                              <option <?=(@$data->gender=="female")?'selected':'' ?> value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Members with KCC</label>
                                            <input type="text" class="form-control" value="<?=@$data->kcc  ?>"  name="kcc" >
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Paid up share capital each director</label>
                                            <input type="text" data-behaviour="decimal"  class="form-control" value="<?=@$data->share_capital  ?>"  name="share_capital" >
                                        </div>
                                        <div class="col-sm-2">
                                            <label>DIN</label>
                                            <input type="text" class="form-control" value="<?=@$data->din  ?>" name="din" pattern="\d*" title="Only digits" maxlength="7" >
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-2">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control mobile-valid" value="<?=@$data->contactNumber  ?>" name="contactNumber" title="10 digit mobile number" >
                                        </div>
                                         <div class="col-sm-3">
                                            <label>Email Id</label>
                                            <input type="email" class="form-control" value="<?=@$data->email  ?>" name="email"  >
                                        </div>

                                        <div class="col-sm-3">
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
                                        
                                        
                                    </div>

                                    <div class="form-group row" >
                                       <div class="col-sm-2">
                                            <label>District</label>
                                                <select  id="sel_block"  class="form-control">
                                                    <option value=""> -- select district -- </option>
                                                    <?php
                                                    if($district){
                                                        foreach ($district as $d) {
                                                            echo('<option value='.$d->id.'>'.$d->name.'</option>');
                                                        }
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Block</label>
                                            <select  id="block" class="form-control" >
                            	 
                                                <option value=""></option>
                                                <?php 
                                                foreach ($block as $b) {
                                                    echo('<option value='.$b->id.'>'.$b->name.'</option>');
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Gram Panchayat</label>
                                            <select name="gramPanchayatId" id="gramPanchayat" class="form-control" >
                            	 
                                                <option value=""></option>
                                                <?php 
                                                foreach ($gp as $g) {
                                                    echo('<option value='.$g->id.'>'.$g->name.'</option>');
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>  
                                        <div class="col-sm-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="<?=@$data->address  ?>" >
                                            <!-- <textarea required=""  name="address" class="form-control"> <?=@$data->address ?></textarea> -->
                                        </div> 
                                        <div class="col-sm-2">
                                            <label>PIN</label>
                                            <input type="text" class="form-control pin-valid" name="pin" value="<?=@$data->pin  ?>" >
                                        </div>                                     
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-6" style="float: left;">
                                                <label>Profile Image</label>
                                                
                                                    <div class="slim" style="width:180px; height:120px;"
                                                         data-meta-user-id="1230"
                                                         data-ratio="1:1"
                                                         data-size="220,220"
                                                        >
                                                        <?php
                                                            if (@$data->thumb) {
                                                                ?>
                                                                    <img src="<?=base_url('uploads/bod/'.@$data->thumb);?>" alt="bod">
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                   
                                                                <?php
                                                            }
                                                        ?>
                                                        <input type="file" name="thumb" required>
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

        $('#sel_block').change(function(){
            var getid = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>ngo/getBlock",
                data: {'getid': getid},
                success: function(res)
                    {	      
                        var len = res.length;
                        if(len > 0){
                            $("#block").html(res);
                        }
                    }
                });
        });

        $('#block').change(function(){
            var getid = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>ngo/getGramPanchayat",
                data: {'getid': getid},
                success: function(res)
                    {	      
                        var len = res.length;
                        if(len > 0){
                            $("#gramPanchayat").html(res);
                        }
                    }
                });
        });


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



