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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add FPO'?> </div>
                    
                    <form class="form-horizontal"  method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <!-- <div class="col-sm-3">
                                            <label>Parent*</label>
                                            <select required class="form-control" name="parent_cat_id" >
                                                <option value="">Choose Parent</option>
                                                <option value="NULL">No Parent</option>
                                                <?=$lists ?>
                                            </select>
                                        </div>
                                         -->
                                        <div class="col-sm-3">
                                            <label>Name of the FPO*</label>
                                            <input type="text" class="form-control"  name="name" value="<?=@$data->name  ?>" required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Name of the POPI/CBBO*</label>
                                            <input type="text" class="form-control" name="popi" value="<?=$myinfo->user_name  ?>"  disabled>
                                            <input type="text" class="form-control" name="popi" value="<?=$myinfo->user_name  ?>"  style="display: none;">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Registered as</label>
                                            <select name="registeredAs" required class="form-control">
                                              <option <?=(@$data->registeredAs=="Company")?'selected':'' ?> value="Company">Company</option>
                                              <!-- <option <?=(@$data->registeredAs=="Cooperative")?'selected':'' ?> value="Cooperative">Cooperative</option> -->
                                              <option <?=(@$data->registeredAs=="Trust")?'selected':'' ?> value="Trust">Trust</option>
                                              <!-- <option <?=(@$data->registeredAs=="MOA")?'selected':'' ?> value="MOA">MOA</option> -->
                                              <!-- <option <?=(@$data->registeredAs=="AOA")?'selected':'' ?> value="AOA">AOA</option> -->
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Registration Date</label>
                                            <input type="date" class="form-control" name="regDate" value="<?=@$data->regDate  ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-3">
                                            <label>Registration Details (CIN)</label>
                                            <input type="text" class="form-control" name="cin" value="<?=@$data->cin  ?>" maxlength="21">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>GSTIN*</label>
                                            <input type="text" class="form-control"  name="gstin" value="<?=@$data->gstin  ?>" maxlength="15" required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>PAN*</label>
                                            <input type="text" class="form-control" name="pan" value="<?=@$data->pan  ?>" maxlength="10"  required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>TAN</label>
                                            <input type="text" class="form-control" name="tan" value="<?=@$data->tan  ?>" maxlength="10">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group row">
                                       <div class="col-sm-4">
                                            <label>Registered Office address</label>
                                            <input type="text" class="form-control" name="address" value="<?=@$data->address  ?>" >
                                        </div>
                                       <div class="col-sm-2">
                                            <label>PIN</label>
                                            <input type="text" class="form-control pin-valid" name="pin" value="<?=@$data->pin  ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>FPO Email ID*</label>
                                            <input type="email" class="form-control"  name="emailId" value="<?=@$data->emailId  ?>" required>
                                        </div>
                                        
                                        <!-- <div class="col-sm-3">
                                            <label>No. of GPs covered*</label>
                                            <input type="number" class="form-control" name="cat_url"  required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Name of GPs covered</label>
                                            <input type="text"  value="GPs" data-role="tagsinput" placeholder="Add GPs" class="form-control" name="order_no"  >
                                        </div>
                                    </div>    
                                    <div class="form-group row">    
                                        <div class="col-sm-3">
                                            <label>No. of villages covered</label>
                                            <input type="text" class="form-control" name="order_no"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Name of villages covered</label>
                                            <input type="text"  value="villages" data-role="tagsinput" placeholder="Add villages" class="form-control" name="order_no"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Block & District</label>
                                            <input type="text" class="form-control" name="order_no"  >
                                        </div> -->
                                        <div class="col-sm-3">
                                            <label>MOA, AOA, Certificate</label>
                                            <input type="file" class="form-control" name="doc_1" value="<?=@$data->doc_1  ?>"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                       <!-- <div class="col-sm-3">
                                            <label>District</label>
                                                <select name="district" id="sel_block"  class="form-control">
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
                                        <div class="col-sm-3">
                                            <label>Block</label>
                                            <select name="block" id="block" class="form-control" required>
                            	 
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
                                            <select name="gramPanchayat" id="gramPanchayat" class="form-control" required>
                            	 
                                                <option value=""></option>
                                                <?php 
                                                foreach ($gp as $g) {
                                                    echo('<option value='.$g->id.'>'.$g->name.'</option>');
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Village</label>
                                            <select name="village" id="village" class="form-control" required>
                            	 
                                                <option value=""></option>
                                                <?php 
                                                foreach ($village as $v) {
                                                    echo('<option value='.$v->id.'>'.$v->name.'</option>');
                                                }
                                                ?>
                                                
                                            </select>
                                        </div> -->
                                        
                                        <!-- <div class="col-sm-3">
                                            <label>No. of GPs covered*</label>
                                            <input type="number" class="form-control" name="cat_url"  required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Name of GPs covered</label>
                                            <input type="text"  value="GPs" data-role="tagsinput" placeholder="Add GPs" class="form-control" name="order_no"  >
                                        </div>
                                    </div>    
                                    <div class="form-group row">    
                                        <div class="col-sm-3">
                                            <label>No. of villages covered</label>
                                            <input type="text" class="form-control" name="order_no"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Name of villages covered</label>
                                            <input type="text"  value="villages" data-role="tagsinput" placeholder="Add villages" class="form-control" name="order_no"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Block & District</label>
                                            <input type="text" class="form-control" name="order_no"  >
                                        </div> -->
                                        
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>UserName*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user darkorange"></i></span>
                                                <input type="text" class="form-control" placeholder="Username"name="username" value="<?=@$data->username?>" required>
                                            </div>
                                        </div>

                                         <div class="col-sm-3">
                                            <label>Password</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock circular darkorange"></i></span>
                                                <input type="password" id="password"  class="form-control" placeholder="Password" name="password" value="<?=@$data->password  ?>" required>
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
                                    </div>
                
                                                
                                    
                                    <button type="submit" class="btn btn-success"><?=(isset($btn_nm))?$btn_nm:'Submit'?></button>
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


        $('#gramPanchayat').change(function(){
            var getid = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>ngo/getVillage",
                data: {'getid': getid},
                success: function(res)
                    {	      
                        var len = res.length;
                        if(len > 0){
                            $("#village").html(res);
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
<script>
        $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>