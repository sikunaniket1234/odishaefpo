<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>



    <div class="page-body"> 
        <?php include 'inc/flashmsg.php'; ?> 
        <form id="validationform" data-parsley-validate="" novalidate="" method="post" role="form">        
        <div class="well with-header">
            <div class="header bordered-palegreen">Edit <?=$info->page_heading ?></div>                    
                
                <br/>
                <div class="form-group row">
                    <div class="col-md-9">
                        <label class="col-form-label">Page Name*</label>
                         <input type="text" value="<?=$info->page_heading ?>" id="page_heading" name="page_heading" required placeholder="Type something" class="form-control">

                         
                         <br/>
                         <label>Overview</label>
                         <textarea required=""  name="page_txt" id="editor1" class="form-control"><?=$info->page_txt ?></textarea>

                         <br/>
                        <label>Title Banner*</label>
                        <div class="slim" style="width:100%; height:235px;" 
                            data-meta-user-id="1221" data-ratio="192:75" data-size="1920,750" >
                            <img src="<?=base_url('uploads/pages/'.$info->banner_img);?>">
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
                                <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Update</button>
                                <a href="<?php echo base_url() ?>admin/page_list" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">Featured Image / Thumbnail</div>
                          <div class="panel-body">

                                <div class="slim" style="width:100%; height:235px;"
                                     data-meta-user-id="1220"
                                     data-ratio="800:800"
                                     data-size="800,800"
                                    >
                                    <img src="<?=base_url('uploads/pages/'.$info->thumb_img);?>">
                                    <input type="file" name="thumb_img" required>
                                </div>
                                <br/>
                                <div class="text-info">
                                    <i class="fa fa-info-circle"></i> For Best Preview image size (370 x 270).
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
            
        </div>



        <section class="well with-header">
            <div class="header bordered-palegreen">
                <span class="widget-caption"><h5 style="margin-bottom: 0px; padding-bottom: 0px;">Meta Information (SEO PURPOSE ONLY. Handle with Care)</h5></span>
            </div>
            <div class="widget-body1">                
                    
                <label for="exampleInputEmail1">Meta Title (Max 100 Characters Allowed)</label>
                <input type="text" name="meta_title" value="<?=$info->meta_title ?>" class="form-control" placeholder="Meta Title"  autocomplete="off">
                <br/>

                <label for="exampleInputEmail1">Meta Keywords (Max 100 Characters Allowed)</label>
                <input type="text" name="meta_keyword" class="form-control" value="<?=$info->meta_keyword ?>" placeholder="Meta Keywords" autocomplete="off">
                <br/>

                <label for="exampleInputEmail1">Canonical Code</label>
                <input type="text" name="canonical_code" value="<?=$info->canonical_code ?>" class="form-control" placeholder="Canonical Code" autocomplete="off">
                <br/>

                <label for="exampleInputEmail1">Meta Description (Max 300 Characters Allowed)</label>
                <textarea type="text" name="meta_desc"class="form-control" placeholder="Meta Description"><?=$info->meta_desc ?></textarea>
                <br/>
           
                <label for="exampleInputEmail1">Extra Meta</label>
                <textarea name="extra_meta" class="form-control" placeholder="Extra Meta" autocomplete="off"><?=$info->extra_meta ?></textarea>
            </div>
        </section>



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
   CKEDITOR.replace( 'editor1');
</script> 