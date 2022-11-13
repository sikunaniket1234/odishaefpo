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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'Add Registered Maintenance'?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control" value="<?=@$data->rm_date  ?>" name="rm_date" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Membership Register</label>
                                            <input type="file" class="form-control" value="<?=@$data->membership_register  ?>" name="membership_register">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Share Certificate Issuing Register</label>
                                            <input type="file" class="form-control" value="<?=@$data->certificate_issuing  ?>" name="certificate_issuing">
                                        </div>
                                        
                                        

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Meeting Register</label>
                                            <input type="file" class="form-control" value="<?=@$data->meeting  ?>" name="meeting" >
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Stock Register</label>
                                            <input type="file" class="form-control" value="<?=@$data->stock  ?>" name="stock" >
                                        </div>

                                         <div class="col-sm-3">
                                            <label>Sales Register</label>
                                            <input type="file" class="form-control" value="<?=@$data->sales  ?>" name="sales">
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




