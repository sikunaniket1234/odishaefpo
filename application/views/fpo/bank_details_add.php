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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'Add Bank Details'?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                
                                        <div class="col-sm-3">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control" value="<?=@$data->bank  ?>"  name="bank" required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Branch</label>
                                            <input type="text" class="form-control" value="<?=@$data->branch  ?>" name="branch" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Account Number</label>
                                            <input type="text" required class="form-control"value="<?=@$data->accountNo  ?>" name="accountNo" placeholder="Account Number" pattern="\d*" title="Only digits" maxlength="11" >
                                        </div>

                                        <div class="col-sm-2">
                                            <label>IFSC CODE</label>
                                            <input type="text" class="form-control"value="<?=@$data->ifscCode  ?>" name="ifscCode" maxlength="11" >
                                        </div>

                                        
                                       
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <label>Opening Balance</label>
                                            <input type="text" class="form-control"value="<?=@$data->opening_balance  ?>" name="opening_balance" data-behaviour="decimal" >
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Opening Date</label>
                                            <input type="date" class="form-control" value="<?=@$data->opening_date  ?>" name="opening_date" >
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Update Balance</label>
                                            <input type="text" class="form-control"value="<?=@$data->update_balance  ?>" name="update_balance" data-behaviour="decimal" >
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Balance as on reporting month</label>
                                            <input type="text" class="form-control"value="<?=@$data->balanceAsOnReportingMonth  ?>" name="balanceAsOnReportingMonth"  >
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




