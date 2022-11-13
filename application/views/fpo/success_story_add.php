<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


    <div class="page-body"> 
        <?php include 'inc/flashmsg.php'; ?>

        <form  method="post" role="form">
            <div class="container-fluid  dashboard-content">
                
                <div class="well with-header">
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Success Story '  ?></div>                
                    <br/>                        
                    <div class="row">
                        <div class="col-md-9">
                            <label>Story Name*</label>
                             <input type="text"  name="story_name" value="<?=@$data->story_name  ?>"  required placeholder="Type something" class="form-control">

                             <br/>
                             <label>Over View</label>
                             <textarea required=""  name="page_txt" id="editor1" class="form-control"><?=@$data->page_txt  ?></textarea>

                            <br/>
                            <label>Title Banner*</label>
                            <div class="slim" style="width:100%; height:235px;" 
                                data-meta-user-id="1221" data-ratio="192:75" data-size="1920,750" >
                                <?php
                                    if (@$data->banner_img) {
                                        ?>
                                            <img src="<?=base_url('uploads/success_story/'.@$data->banner_img);?>" alt="success_story">
                                        <?php
                                    }
                                    else{
                                        ?>
                                            
                                        <?php
                                    }
                                ?>
                                <input type="file" name="banner_img" required>
                            </div>
                            <div class="text-info" style="margin-top: 5px;">
                                <i class="fa fa-info-circle"></i> <small>For Best Preview upload image size (1920 x 750).</small>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="panel panel-default">
                                <div class="panel-heading">Publish</div>
                                  <div class="panel-body">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-globe"></i> <?=(isset($btn_nm))?$btn_nm:'Submit'  ?></button>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
            
            
        </form>
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