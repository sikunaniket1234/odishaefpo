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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'Add STORAGE FACILITIES'?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        
                                        <div class="col-sm-3">
                                            <label>TYPES OF STORAGE</label>
                                            <select name="storage_type" required class="form-control">
                                              <option <?=(@$data->storage_type=="Own Local Storage")?'selected':'' ?> value="Own Local Storage">Local Storage own</option>
                                              <option <?=(@$data->storage_type=="Rented Local Storage")?'selected':'' ?> value="Rented Local Storage">Local Storage rented</option>
                                              <option <?=(@$data->storage_type=="Cold Storage")?'selected':'' ?> value="Cold Storage">Cold Storage</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Rent per month</label>
                                            <input type="text" data-behaviour="decimal" value="<?=@$data->rent_per_month  ?>"  class="form-control"  name="rent_per_month">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Storage space available</label>
                                            <input type="number" class="form-control" value="<?=@$data->space  ?>"  name="space" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Supporting agency</label>
                                            <input type="text" class="form-control" value="<?=@$data->supporting_agency  ?>"  name="supporting_agency" >
                                        </div>
                                        

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control"value="<?=@$data->s_date  ?>"  name="s_date" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Item storage</label>
                                            <input type="text" class="form-control" value="<?=@$data->item  ?>"  name="item" required>
                                        </div>

                                         <div class="col-sm-3">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" value="<?=@$data->qty  ?>"  name="qty">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Value of item</label>
                                            <input type="text" data-behaviour="decimal"value="<?=@$data->item_value  ?>"  class="form-control"  name="item_value">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Storage charges</label>
                                            <input type="text" data-behaviour="decimal"value="<?=@$data->charges  ?>"  class="form-control" name="charges" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Dispatch date</label>
                                            <input type="date" class="form-control" value="<?=@$data->dispatch_date  ?>"  name="dispatch_date" >
                                        </div>

                                         <div class="col-sm-6">
                                            <label>Remarks</label>
                                             <textarea  name="remarks" class="form-control"><?=@$data->remarks  ?></textarea>
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




