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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Credit linkage'  ?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control"  name="cl_date" value="<?=@$data->cl_date  ?>" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Name of the financial institution</label>
                                            <input type="text" class="form-control"  name="financial_institution_name" value="<?=@$data->financial_institution_name ?>" required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Type of loan</label>
                                            <select name="loan_type" required class="form-control">
                                              <option disbled>Select</option>
                                              <option <?=(@$data->loan_type=="working capital")?'selected':'' ?>  value="working capital">WORKING CAPITAL</option>
                                              <option <?=(@$data->loan_type=="term loan")?'selected':'' ?> value="term loan">TERM LOAN</option>
                                              <option <?=(@$data->loan_type=="equipment loan")?'selected':'' ?> value="equipment loan">EQUIPMENT LOAN</option>
                                              <option <?=(@$data->loan_type=="others loan")?'selected':'' ?> value="others loan">OTHERS LOAN</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Apply Amount </label>
                                            <input type="text" data-behaviour="decimal"  class="form-control"  name="apply_amount" value="<?=@$data->apply_amount  ?>" required>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="form-group row">
                                         <div class="col-sm-3">
                                            <label>Sanction Amount </label>
                                            <input type="text" data-behaviour="decimal"  class="form-control" name="sanction_amount" value="<?=@$data->sanction_amount  ?>"  >
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>ROI</label>
                                            <input type="text" class="form-control" name="roi" value="<?=@$data->roi  ?>" >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Amount Released</label>
                                            <input type="text" data-behaviour="decimal"  class="form-control" name="amount_released"value="<?=@$data->amount_released  ?>"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Receive Date</label>
                                            <input type="date" class="form-control" name="receive_date"value="<?=@$data->receive_date  ?>"  >
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Installment per month </label>
                                            <input type="text" data-behaviour="decimal"  class="form-control" name="installment_per_month" value="<?=@$data->installment_per_month  ?>" >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Loan Time period</label>
                                            <input type="number" class="form-control" name="loan_time_period" value="<?=@$data->loan_time_period  ?>" >
                                        </div>
                                       <div class="col-sm-3">
                                            <label>Number of installment</label>
                                            <input type="number" class="form-control" name="number_of_installment" value="<?=@$data->number_of_installment  ?>" >
                                            
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



