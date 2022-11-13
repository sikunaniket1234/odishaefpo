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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'Add Business Plan'?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                             
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>PDF uploading</label>
                                            <input type="file" class="form-control" name="bp_pdf" value="<?=@$data->bp_pdf  ?>"  >
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control" value="<?=@$data->bp_date  ?>" name="bp_date" required>
                                        </div>

                                         <div class="col-sm-6">
                                            <label>Business Plan (200 words)</label>
                                            <textarea type="text"  name="business_plan" class="form-control"  required=""><?=@$data->business_plan  ?></textarea>
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




