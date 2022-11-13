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
                    <div class="header bordered-palegreen">Edit <?=@$ext_hd ?> Category</div>
                    
                    
                     <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                          <label  >Parent*</label>
                                            <select required class="form-control" name="parent_cat_id" >
                                                <option value="">Choose Parent</option>
                                                <option <?=($info->parent_cat_id==NULL)?'selected':'' ?>  value="NULL">No Parent</option>
                                                <?php
                                                foreach($parents as $p){
                                                  
                                  if(isset($url_prefix) && $url_prefix=='p'){
                                      $dk= $p->pcat_id;                          
                                  }else{
                                     $dk= $p->cat_id;
                                  }
                                                ?>
                                                <option   
                                                <?=($info->parent_cat_id==$dk)?'selected':'' ?> 


                                                value="<?=$dk  ?>"><?=$p->cat_nm  ?></option>
                                                <?php
                                                }
                                                ?>

                                               
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label  >Category Name*</label>
                                            <input type="text" class="form-control" id="cat_nm" name="cat_nm" required value="<?=$info->cat_nm ?>">
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Category url*</label>
                                            <input type="text" class="form-control" name="cat_url" id="cat_url" required value="<?=$info->cat_url ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Top Index No (Higher or TOP)</label>
                                            <input type="text" class="form-control" name="order_no" id="order_no" value="<?=$info->order_no ?>" >
                                        </div>
                                    </div>
                                   
                                <div class="form-group" style="padding-left:15px; background: #fcffe9; border-top:2px dashed #ccc; border-bottom:2px dashed #ccc; margin-left:0; width:99%;clear:both;  min-height:150px;" id="foo">    
                                    <h3 class="page-title">SEO INFORMATION</h3>  

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Meta Title</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="meta_title"  value="<?=$info->meta_title ?>">
                                        </div>

                                        <label class="col-sm-2 col-form-label">Meta Keyword</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="meta_keyword"  value="<?=$info->meta_keyword ?>">  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Meta Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="meta_desc"   value="<?=$info->meta_desc ?>" >
                                        </div>
                                    </div>
                                    
                                    
                                </div>    
                                    
                                    

                                    





<div class="form-group" style="padding-left:15px; background: #fcffe9; border-top:2px dashed #ccc; border-bottom:2px dashed #ccc; margin-left:0; width:99%;clear:both; display: none;  min-height:300px;" id="foo">
    
                                        <h3 class="col-sm-12">REQUIRED IMAGES</h3>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-6 col-md-6" style="float: left;">
                                                <label>Thumbnail</label>
                                                
                                                    <div class="slim" style="width:180px; height:120px;"
                                                         data-meta-user-id="1230"
                                                         data-ratio="434:290"
                                                         data-size="434,290"
                                                        >
                                                        <?php
                                                         $img_url = base_url('uploads/cat/thumb/').$info->thumb;
                                                          if(@getimagesize($img_url))
                                                          {                                                                                      
                                                               echo '<img src="'.$img_url.'" class="img-thumbnail" alt="avatar">';
                                                          }                                                      
                                                         ?>
                                                        <input type="file" name="thumb_img" >
                                                    </div>
                                               
                                            </div>
                                            <div class="col-sm-6 col-md-6" style="float: left;">
                                                <label  >Banner</label>
                                                
                                                    <div class="slim" style="width:274px; height:120px;"
                                                         data-meta-user-id="1220"
                                                         data-ratio="16:7"
                                                         data-size="1600,700"
                                                        >
                                                        <?php
                                                         $img_url = base_url('uploads/cat/banner/').$info->banner;
                                                          if(@getimagesize($img_url))
                                                          {                                                                                      
                                                               echo '<img src="'.$img_url.'" class="img-thumbnail" alt="avatar">';
                                                          }                                                      
                                                         ?>
                                                        <input type="file" name="banner"  >
                                                    </div>
                                                
                                            </div>
                                        </div>
</div>



                                    
                                    
                                    
                                    
                                    
                                    <button type="submit" class="btn btn-success">Update</button>
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
    $("#cat_nm").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace('/\s/g','-');
        Text = Text.replace(/ /g,'-');
        Text = Text.replace(/[^\w-]+/g,'');
        Text = Text.replace(/-{2,}/g, '-');



        $("#cat_url").val(Text);    
    });
});

</script>