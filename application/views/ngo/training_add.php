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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Training'?> </div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Training Start Date</label>
                                            <input type="date" class="form-control" value="<?=@$data->conducted_date  ?>"  name="conducted_date" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>End date of training</label>
                                            <input type="date" class="form-control"  name="end_date" value="<?=@$data->end_date  ?>"required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Type of training</label>
                                            <select name="typ_conduct" required class="form-control">
                                              <option disbled>Select</option>
                                              <option <?=(@$data->typ_conduct=="BOD")?'selected':'' ?> value="BOD">BOD</option>
                                              <option <?=(@$data->typ_conduct=="CEO")?'selected':'' ?> value="CEO">CEO</option>
                                              <option <?=(@$data->typ_conduct=="Members")?'selected':'' ?> value="Members">Members</option>
                                              <option <?=(@$data->typ_conduct=="Farmers")?'selected':'' ?> value="Farmers">Farmers</option>
                                              <option <?=(@$data->typ_conduct=="Promoters")?'selected':'' ?> value="Promoters">Promoters</option>
                                              <option <?=(@$data->typ_conduct=="AGM")?'selected':'' ?> value="AGM">AGM</option>
                                              <option <?=(@$data->typ_conduct=="PMRC")?'selected':'' ?> value="PMRC">PMRC</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Location </label>
                                            <input type="text" class="form-control"  name="location" value="<?=@$data->location  ?>"required>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="form-group row">
                                         <div class="col-sm-3">
                                            <label>Resource person </label>
                                            <input type="text" class="form-control" name="resource_person"value="<?=@$data->resource_person  ?>" >
                                        </div>

                                        
                                        <div class="col-sm-3">
                                            <label>Number of participants</label>
                                            <input type="number" class="form-control" name="participants_number"value="<?=@$data->participants_number  ?>"  >
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Expenditure amount </label>
                                            <input type="text" data-behaviour="decimal"  class="form-control" name="expenditure_amount"value="<?=@$data->expenditure_amount  ?>"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Remarks (PDF upload)</label>
                                            <input type="file" class="form-control" name="remarks" value="<?=@$data->remarks  ?>" >
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <label>Purpose/Training topic</label>
                                            <textarea name="topic" required class="form-control"><?=@$data->topic  ?></textarea>
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



