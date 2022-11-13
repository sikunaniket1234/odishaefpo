<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>



<link href="<?=base_url()  ?>/assets/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/assets/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>



<div class="page-body">                    
        <div class="row">                      
            
            <div class="col-md-12">

                <?php include 'inc/flashmsg.php'; ?>
                <div class="well with-header">
                    <div class="header bordered-palegreen">Add Gallery Iteam</div>
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                            <div class="form-group" style="padding:15px; clear:both;  min-height:300px;" id="foo">
                                
                                                                   
                                                                    
                                                                    
                                                                        
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Gallery Image*</label>
                                    
                                        <div class="slim" style="width:374px; height:220px;"
                                             data-meta-user-id="1220"
                                             data-ratio="881:661"
                                             data-size="881,661"
                                            >
                                            <input type="file" name="media_url" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label >Alt Text</label>
                                        <input type="text" class="form-control" name="alt" >
                                    </div>

                                    <div class="form-group">
                                        <label >Link <small class="text-info">(Optional)</small></label>
                                        <input type="text" class="form-control" name="href_link" >
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    </div>                                   
                                </div>

                                

                                                                    
                            </div>
                            
                    </form>
                    
                </div> 
            </div> 
        </div>                   
    </div>




















<?php
      include 'inc/footer-js.php';  
?>


<script>

  CKEDITOR.replace( 'editor1' );
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#bd_nm").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace('/\s/g','-');
        Text = Text.replace(/ /g,'-');
        Text = Text.replace(/[^\w-]+/g,'');
        Text = Text.replace(/-{2,}/g, '-');



        $("#bd_url").val(Text);    
    });
});

</script>