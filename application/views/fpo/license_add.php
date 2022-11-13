<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>




	 <div class="page-body">                    
        <div class="row">                      
            
            <div class="col-md-12">

                <?php include 'inc/flashmsg.php'; ?>
                <div class="well with-header">
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'Add License Details'?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Apply Date</label>
                                            <input type="date" class="form-control" value="<?=@$data->apply_date  ?>" name="apply_date" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>License name</label>
                                            <select name="license_name" required class="form-control">
                                              <option <?=(@$data->license_name=="seed")?'selected':'' ?> value="seed">Seed</option>
                                              <option <?=(@$data->license_name=="fertilizer")?'selected':'' ?> value="fertilizer">Fertilizer</option>
                                              <option <?=(@$data->license_name=="pesticides")?'selected':'' ?> value="pesticides">Pesticides</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Department Name/Agency Name</label>
                                            <input type="text" class="form-control"value="<?=@$data->license_type  ?>"  name="license_type">
                                        </div>
                                        
                                        

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Licence No.</label>
                                            <input type="text" class="form-control"value="<?=@$data->license_no  ?>"  name="license_no" maxlength="30" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Valid till</label>
                                            <input type="date" class="form-control"value="<?=@$data->valid  ?>" id="valid"  name="valid" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Renew Date</label>
                                            <input type="date" class="form-control"value="<?=@$data->renew_date  ?>" id="renew_date"  name="renew_date" required>
                                        </div>

                                         <!-- <div class="col-sm-3">
                                            <label>Amount</label>
                                            <input type="number" class="form-control"value="<?=@$data->amount  ?>"  name="amount">
                                        </div> -->
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
