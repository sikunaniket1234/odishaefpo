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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Meeting'?></div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Meetings Date</label>
                                            <input type="date" class="form-control"value="<?=@$data->conducted_date  ?>"  name="conducted_date" required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Type of Meetings</label>
                                            <select name="typ_conduct" required class="form-control">
                                              <option disbled>Select</option>
                                              <option <?=(@$data->typ_conduct=="BOD-1")?'selected':'' ?> value="BOD-1">BOD-1</option>
                                              <option <?=(@$data->typ_conduct=="BOD-2")?'selected':'' ?> value="BOD-2">BOD-2</option>
                                              <option <?=(@$data->typ_conduct=="BOD-3")?'selected':'' ?> value="BOD-3">BOD-3</option>
                                              <option <?=(@$data->typ_conduct=="BOD-4")?'selected':'' ?> value="BOD-4">BOD-4</option>
                                              <option <?=(@$data->typ_conduct=="BOD-5")?'selected':'' ?> value="BOD-5">BOD-5</option>
                                              <option <?=(@$data->typ_conduct=="BOD-6")?'selected':'' ?> value="BOD-6">BOD-6</option>
                                              <option <?=(@$data->typ_conduct=="BOD-7")?'selected':'' ?> value="BOD-7">BOD-7</option>
                                              <option <?=(@$data->typ_conduct=="BOD-8")?'selected':'' ?> value="BOD-8">BOD-8</option>
                                              <option <?=(@$data->typ_conduct=="BOD-9")?'selected':'' ?> value="BOD-9">BOD-9</option>
                                              <option <?=(@$data->typ_conduct=="BOD-10")?'selected':'' ?> value="BOD-10">BOD-10</option>
                                              <option <?=(@$data->typ_conduct=="BOD-11")?'selected':'' ?> value="BOD-11">BOD-11</option>
                                              <option <?=(@$data->typ_conduct=="BOD-12")?'selected':'' ?> value="BOD-12">BOD-12</option>
                                              <option <?=(@$data->typ_conduct=="AGM-1")?'selected':'' ?> value="AGM-1">AGM-1</option>
                                              <option <?=(@$data->typ_conduct=="AGM-2")?'selected':'' ?> value="AGM-2">AGM-2</option>
                                              <option <?=(@$data->typ_conduct=="PMRC-1")?'selected':'' ?> value="PMRC-1">PMRC-1</option>
                                              <option <?=(@$data->typ_conduct=="PMRC-2")?'selected':'' ?> value="PMRC-2">PMRC-2</option>
                                              <option <?=(@$data->typ_conduct=="PMRC-3")?'selected':'' ?> value="PMRC-3">PMRC-3</option>
                                              <option <?=(@$data->typ_conduct=="PMRC-4")?'selected':'' ?> value="PMRC-4">PMRC-4</option>

                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Location </label>
                                            <input type="text" class="form-control" value="<?=@$data->location  ?>" name="location" required>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Number of participants</label>
                                            <input type="number" class="form-control"value="<?=@$data->participants_number  ?>" name="participants_number"  >
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Expenditure Amount </label>
                                            <input type="text" data-behaviour="decimal"  class="form-control"value="<?=@$data->expenditure_amount  ?>" name="expenditure_amount"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Remarks (PDF upload)</label>
                                            <input type="file" class="form-control"value="<?=@$data->remarks  ?>" name="remarks"  >
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <label>Purpose/Meetings topic</label>
                                            <textarea required name="topic"  class="form-control"><?=@$data->topic  ?></textarea>
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



