<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


    <div class="page-body"> 
        <?php include 'inc/flashmsg.php'; ?>

        <form  method="post" role="form">
            <div class="container-fluid  dashboard-content">
                
                <div class="well with-header">
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'Add Shareholder / Paid up share capital '  ?></div>                
                        <div class="form-group row">
                                        
                            <div class="col-sm-2">
                                <label>Share Holder Name</label>
                                <input type="text" class="form-control"value="<?=@$data->name  ?>"  name="name" required>
                            </div>
                            <div class="col-sm-2">
                                <label>Father/Spouse Name</label>
                                <input type="text" class="form-control" value="<?=@$data->guardian_name  ?>" name="guardian_name" required>
                            </div>
                            <div class="col-sm-2">
                                <label>Caste</label>
                                <select required class="form-control" name="caste" >
                                    <option <?=(@$data->caste=="General")?'selected':'' ?> value="General">General</option>
                                    <option <?=(@$data->caste=="SC")?'selected':'' ?> value="SC">SC</option>
                                    <option <?=(@$data->caste=="ST")?'selected':'' ?> value="ST">ST</option>
                                    <option <?=(@$data->caste=="OBC")?'selected':'' ?> value="OBC">OBC</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-2">
                                <label>Gender</label>
                                <select required class="form-control" name="gender" >
                                    <option <?=(@$data->gender=="male")?'selected':'' ?> value="male">Male</option>
                                    <option <?=(@$data->gender=="female")?'selected':'' ?> value="female">Female</option>
                                    <option <?=(@$data->gender=="other")?'selected':'' ?> value="other">Other</option>
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
                                <label>Age</label>
                                <input type="text" class="form-control age-valid" value="<?=@$data->age  ?>" name="age"  required>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-sm-2">
                                <label>Phone No.</label>
                                <input type="text" class="form-control mobile-valid" value="<?=@$data->phone  ?>" name="phone" title="10 digit mobile number"  required>
                            </div>

                            <div class="col-sm-3">
                                <label>Email ID</label>
                                <input type="email" class="form-control" value="<?=@$data->email  ?>" name="email" required>
                            </div>
                            <div class="col-sm-2">
                                <label>Member with kcc</label>
                                <select required class="form-control" name="member_kcc" required>
                                    <option <?=(@$data->member_kcc=="Yes")?'selected':'' ?> value="Yes">Yes</option>
                                    <option <?=(@$data->member_kcc=="No")?'selected':'' ?> value="No">No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label>Types Of Farmer</label>
                                <select required class="form-control" name="farmer_types" >
                                    <option <?=(@$data->farmer_types=="Small")?'selected':'' ?> value="Small">Small</option>
                                    <option <?=(@$data->farmer_types=="Middle")?'selected':'' ?> value="Middle">Middle</option>
                                </select>
                            </div>

                    </div>
                        <div class="form-group row">
                            
                           
                            <div class="col-sm-3">
                                <label>Share Certificate No.</label>
                                <input type="text" class="form-control"  value="<?=@$data->certificate_number  ?>" name="certificate_number" required>
                            </div>
                            <div class="col-sm-2">
                                <label>Share Value</label>
                                <input type="text" class="form-control"  value="<?=@$data->share_value  ?>" data-behaviour="decimal"  name="share_value" id="shareValue" required>
                            </div>
                            <div class="col-sm-1">
                                <label>Quantity</label>
                                <input type="number" class="form-control"  value="<?=@$data->quantity  ?>"  name="quantity"  id="qty" required>
                            </div>                            
                            <div class="col-sm-2">
                                <label>Share Amount</label>
                                <input type="number" class="form-control"  value="<?=@$data->share_amount  ?>" name="share_amount" id="multiple" readonly required>
                            </div>
                            <div class="col-sm-2">
                                <label>Issue Date</label>
                                <input type="date" class="form-control"  value="<?=@$data->issue_date  ?>"  name="issue_date" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Nominee Name</label>
                                <input type="text" class="form-control"  value="<?=@$data->nominee_name  ?>" name="nominee_name" required>
                            </div>
                            
                            <div class="col-sm-3">
                                <label>Share Transfer</label>
                                <input type="text" class="form-control"  value="<?=@$data->share_transfer  ?>" data-behaviour="decimal" name="share_transfer" >
                            </div>
                           
                            
                        </div>
                        <div class="form-group row" >
                            <!-- <div class="col-sm-2">
                                <label>District</label>
                                    <select name="districtId" id="sel_block"  class="form-control">
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
                                <select name="blockId" id="block" class="form-control" >
                        
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
                            </div>    -->

                            <div class="col-sm-2">
                                <label>District</label>
                                <select name="districtId" class="form-control" disabled>
                                  <option disbled>Select</option>
                                  <?php
                                    foreach ($district as $value) {
                                      ?>
                                      <option <?=($info->districtId==$value->id)?'selected':''  ?> value="<?= $value->id ?>"><?= $value->name ?></option>
                                      <?php
                                    } 
                                  ?>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label>Block</label>
                                <select name="blockId" class="form-control" disabled>
                                  <option disbled>Select</option>
                                  <?php
                                    foreach ($block as $value) {
                                      ?>
                                      <option <?=($info->blockId==$value->id)?'selected':''  ?> value="<?= $value->id ?>"><?= $value->name ?></option>
                                      <?php
                                    } 
                                  ?>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label>Gram Panchayat</label>
                                <select name="gramPanchayatId"  class="form-control" >
                        
                                <option disbled>---Select---</option>
                                  <?php
                                    foreach ($gp as $value) {
                                      ?>
                                      <option  value="<?= $value->id ?>"><?= $value->name ?></option>
                                      <?php
                                    } 
                                  ?>
                                </select>
                            </div>  

                            <div class="col-sm-3">
                                <label>At/Po</label>
                                <input type="text" class="form-control"  value="<?=@$data->address  ?>" name="address">
                                <!-- <textarea class="form-control"  name="address"> <?=@$data->address  ?></textarea> -->
                            </div>
                            <div class="col-sm-2">
                                <label>PIN</label>
                                <input type="text" class="form-control pin-valid"  value="<?=@$data->pin  ?>" name="pin">
                            </div>                                     
                        </div>        
            
                    </div>
                    
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </div>
            
            
        </form>
    </div>


                
    <?php
        include 'inc/footer-js.php';  
    ?>

    <script type="text/javascript">
         $('#sel_block').change(function(){
            var getid = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>fpo/getBlock",
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
                url: "<?= base_url() ?>fpo/getGramPanchayat",
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
        $(document).ready(function() {
            //this calculates values automatically 
            multiplication();
            $("#shareValue, #qty").on("keydown keyup", function() {
                multiplication();
            });
        });

        function multiplication() {
            var shareValue = document.getElementById('shareValue').value;
            var qty = document.getElementById('qty').value;
			var result = parseInt(shareValue) * parseInt(qty);
            if (!isNaN(result)) {
                document.getElementById('multiple').value = result;
            }
        }



       ///// CKEDITOR.replace( 'editor1');
        var editor = CKEDITOR.replace( 'editor1',
        {
            
            format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
           
        } );
        CKFinder.setupCKEditor( editor, { basePath : "<?=base_url()?>ckfinder/", rememberLastFolder : false } ) ;
    </script> 