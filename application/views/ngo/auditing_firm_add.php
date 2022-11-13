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
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Auditing Firm Details'  ?> </div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">

                                        <div class="col-sm-3">
                                            <label>Auditor Name</label>
                                            <input type="text" class="form-control"  name="auditor_name" value="<?=@$data->auditor_name  ?>"  required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control mobile-valid"  name="contact_number" title="10 digit mobile number"  value="<?=@$data->contact_number  ?>"  required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Email Id</label>
                                            <input type="email" class="form-control"  name="email" value="<?=@$data->email  ?>"  required>
                                        </div>
                                        

                                        <div class="col-sm-3">
                                            <label> Audit fee </label>
                                            <input type="number" class="form-control" name="audit_fee" value="<?=@$data->audit_fee  ?>"   >
                                        </div>
                                        <div class="col-sm-3">
                                            <label> Date </label>
                                            <input type="date" class="form-control" name="afd_date" value="<?=@$data->afd_date  ?>"  >
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



