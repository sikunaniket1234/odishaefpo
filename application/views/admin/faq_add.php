<?php
   include ('inc/metaheader.php');  
   include ('inc/head2.php');  
?>

<div class="page-body"> 


    <div class="row">
    <div class="col-md-12">
        <div class="well with-header">
            <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add FAQ'  ?></div>

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>FAQ Title*</label>
                         <input type="text" class="form-control" value="<?=@$data->faq_title  ?>" name="faq_title" autocomplete="off" required>
                         <br/>
                         
                         <label>Description*</label>
                         <textarea type="text" class="form-control" rows="7" name="faq_desc" autocomplete="off" required><?=@$data->faq_desc  ?></textarea>
                    </div>

                   
                </div>


                
                <div class="clerfix"></div>

                <hr/>
                
              <div align="center">

               <button type="submit" class="btn btn-success btn-lg"><?=(isset($btn_nm))?$btn_nm:'Submit'  ?></button>
                  <a href="<?php echo base_url('admin/faq') ?>" class="btn btn-danger btn-lg">Cancel</a>
              </div>

            </form>

        </div>

    </div>
</div>


  </div>

<?php
  include 'inc/footer-js.php';
?>
