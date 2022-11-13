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
        <div class="container-fluid  dashboard-content">
            
            <div class="well with-header">
                <div class="header bordered-palegreen">Edit Blog </div>                
                <br/>                        
                <div class="row">
                    <div class="col-md-9">
                        <label>Page Name*</label>
                         <input type="text" id="page_heading" value="<?=$info->page_heading ?>" name="page_heading" required placeholder="Type something" class="form-control">

                         

                         <br/>
                         <label>Over View</label>
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
                            <div class="panel-heading">Update.</div>
                              <div class="panel-body">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                <a href="<?php echo base_url() ?>admin/blog_list" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </div>

                        <div class="well with-header">
                          <div class="header bg-green bordered-palegreen"><h5 style="margin-bottom: 0; padding-bottom: 0;">PAGE ATTRIBUTES</h5></div>
                          
                            <label >Choose Category*</label>
                            <select name="pcat_id" required style="width:100%; margin-bottom: 15px;">
                              <option disbled>Select</option>
                              <?php
                                foreach ($allcat as $value) {
                                  ?>
                                  <option <?=($info->pcat_id==$value->pcat_id)?'selected':''  ?> value="<?= $value->pcat_id ?>"><?= $value->pcat_name ?></option>
                                  <?php
                                } 
                              ?>
                            </select>
                           
                            <div class="clear"></div>

                            <label>Thumbnail</label>
                            <div class="slim" style="width:100%; height:210px;"
                                 data-meta-user-id="1230"
                                 data-ratio="800:600"
                                 data-size="800,600">

                                <img src="<?=base_url('uploads/pages/'.$info->thumb_img);?>">
                                <input type="file" name="thumb_img" required>
                            </div>
                            <br/>
                            <div class="text-info">
                                <i class="fa fa-info-circle"></i> For Best Preview image size (800 x 600).
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid  dashboard-content">
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

        </div>
    </form>                  
</div>

<?php
      include 'inc/footer-js.php';  
?>

<script>

    var editor = CKEDITOR.replace( 'editor1',
    {
        format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
    });
    CKFinder.setupCKEditor( editor, { basePath : "<?=base_url()?>ckfinder/", rememberLastFolder : false } ) ;
</script> 