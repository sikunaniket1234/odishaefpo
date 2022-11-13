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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Status of ROC Return Filing'  ?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Date of Filling:</label>
                                            <input type="date" class="form-control" value="<?=@$data->filling_date  ?>"  name="filling_date" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Auditor Name</label>
                                            <input type="text" class="form-control" value="<?=@$data->appointment_auditor  ?>" name="appointment_auditor" required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Status of ROC return</label>
                                            <select name="roc_return_status" required class="form-control">
                                              <option disbled>Select</option>
                                              <option <?=(@$data->roc_return_status=="Yes")?'selected':'' ?> value="Yes">Yes</option>
                                              <option <?=(@$data->roc_return_status=="No")?'selected':'' ?> value="No">No</option>
                                            
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>DIR – 3 </label>
                                            <input type="text" class="form-control"value="<?=@$data->dir3  ?>"  name="dir3" required>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="form-group row">
                                         <div class="col-sm-4">
                                            <label>AOC – 4 (Balance Sheet & P&L data) </label>
                                            <input type="text" class="form-control"value="<?=@$data->aoc4  ?>" name="aoc4"  >
                                        </div>

                                        
                                        <div class="col-sm-4">
                                            <label>MGT – 7 (Filing of annual return)</label>
                                            <input type="text" class="form-control"value="<?=@$data->mgt7  ?>" name="mgt7"  >
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <label>INC – 22 </label>
                                            <input type="text" class="form-control"value="<?=@$data->inc22  ?>" name="inc22"  >
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>DPT – 3 </label>
                                            <input type="text" class="form-control"value="<?=@$data->dpt3  ?>" name="dpt3"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Other(if any) </label>
                                            <input type="text" class="form-control"value="<?=@$data->other  ?>" name="other"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Remarks (PDF upload)</label>
                                            <input type="file" class="form-control"value="<?=@$data->remarks  ?>" name="remarks"  >
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



