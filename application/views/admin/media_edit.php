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
                    <div class="header bordered-palegreen">Edit Slider </div>
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group" style="padding:15px; clear:both;  min-height:300px;" id="foo">
                                                                    
                            <div class="col-sm-9 col-md-9">
                                
                                <label>Title* <small><em>(Max 50 Caharcter.)</em></small></label>
                                <input type="text" value="<?=$info->media_title;?>" maxlength="50" name="media_title" class="form-control" required>
                                <br/>

                                <label>Description* <small><em>(Max 100 Caharcter.)</em></small></label>
                                <textarea rows="4" type="text" maxlength="100" class="form-control" name="media_desc" required><?=$info->media_title;?></textarea>
                                <br/>

                                <label  >Banner* (1920 x 962) PX</label>                                    
                                <div class="slim" style="width:100%; height:200px;"
                                     data-meta-user-id="1220"
                                     data-ratio="1920:962"
                                     data-size="1920,962">
                                      <img src="<?=base_url('uploads/home/banner/'.$info->media_thumb);?>">
                                    <input type="file" name="media_thumb" required>
                                </div>                              

                            </div>
                            
                            <div class="col-sm-3 col-md-3">
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">Publish</div>
                                      <div class="panel-body">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                        <a href="<?php echo base_url() ?>admin/media_list" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                                    </div>
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
