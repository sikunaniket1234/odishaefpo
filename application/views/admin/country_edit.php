<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="page-body"> 
            <?php include 'inc/flashmsg.php'; ?>

            <form id="validationform" data-parsley-validate="" novalidate="" method="post" role="form">
                <div class="container-fluid  dashboard-content">
                    
                    <div class="well with-header">
                        <div class="header bordered-palegreen">+Update Country </div>                
                        <br/>                        
                        <div class="row">
                            <div class="col-md-9">
                                <label>Country Name*</label>
                                 <input type="text" id="country_name" value="<?=@$info->country_name   ?>" name="country_name" required placeholder="Type something"  class="form-control">

                                 <br/>
                                 <label>country Url*</label>
                                 <input type="text" name="country_utl" id="country_utl" required placeholder="Type something" value="<?=@$info->country_utl   ?>"  class="form-control">

                                 <br/>
                                 <label>Over View</label>
                                 <textarea required="" 
                                  name="overview" value="<?=@$info->overview   ?>"  class="form-control"><?=@$info->overview   ?></textarea>

                                 <br/>
                                 <label>Glance</label>
                                 <textarea required="" value="<?=@$info->glance_text   ?>" name="glance_text"  class="form-control"><?=@$info->glance_text   ?></textarea>

                                 <br/>
                                 <label>Why Choose Us</label>
                                 <textarea required="" value="<?=@$info->why_text   ?>"  name="why_text" class="form-control"><?=@$info->why_text   ?></textarea>

                                 <br/>
                                 <label>Exams & Coaching</label>
                                 <textarea required="" value="<?=@$info->exam_text   ?>" name="exam_text"
                                   class="form-control"><?=@$info->exam_text   ?></textarea>

                                 <br/>
                                 <label>Education Cost Info</label>
                                 <textarea required="" value="<?=@$info->cost_text   ?>" name="cost_text"  
                                 class="form-control"><?=@$info->cost_text   ?></textarea>

                                 <br/>
                                 <label>Other Essential Information</label>
                                 <textarea required="" value="<?=@$info->other_info   ?>"
                                  name="other_info"  class="form-control"><?=@$info->other_info   ?></textarea>

                                 <br/>
                                  <label>Title Banner*</label>
                                  <div class="slim" style="width:100%; height:235px;" 
                                      data-meta-user-id="1221" data-ratio="192:75" data-size="1920,750" >
                                    <?php
                                      if (isset($info) && $info->banner!='') {
                                        $banner_url = base_url('uploads/country/banner/'.$info->banner);
                                        if (@getimagesize($banner_url)) {
                                          ?>
                                            <img src="<?=$banner_url ?>">
                                          <?php
                                        }

                                      }
                                ?>

                                      <input type="file" name="banner" required>
                                  </div>
                                  <div class="text-info" style="margin-top: 5px;">
                                      <i class="fa fa-info-circle"></i> <small>For Best Preview upload image size (1920 x 750).</small>
                                  </div>

                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Update</div>
                                      <div class="panel-body">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-globe"></i> Update</button>
                                        <a href="<?php echo base_url() ?>admin/country_list" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                                    </div>
                                </div>

                                <div class="clear"></div>

                                <label>Thumbnail</label>
                                <div class="slim" style="width:100%; height:210px;"
                                     data-meta-user-id="1230"
                                     data-ratio="800:600"
                                     data-size="800,600"
                                    >
                                    <?php
                                      if (isset($info) && $info->thumb!='') {
                                        $thumbnail_url = base_url('uploads/country/thumb/'.$info->thumb);
                                        if (@getimagesize($thumbnail_url)) {
                                          ?>
                                            <img src="<?=$thumbnail_url ?>">
                                          <?php
                                        }

                                      }
                                    ?>
                                    <input type="file" name="thumb" required>
                                </div>
                                <br/>
                                <div class="text-info">
                                    <i class="fa fa-info-circle"></i> For Best Preview image size (800 x 600).
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
        $("#country_name").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace('/\s/g','-');
            Text = Text.replace(/ /g,'-');
            Text = Text.replace(/[^\w-]+/g,'');
            Text = Text.replace(/-{2,}/g, '-');
            $("#country_utl").val(Text);    
        });
    });

</script> 


<script>
    ////CKEDITOR.replace( 'editor1');


CKEDITOR.replace( 'editor1', {
  fullPage: true,
  allowedContent: true
});




                       
                
</script>



