<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>



<link href="<?=base_url()  ?>/assets/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/assets/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>



<div class="page-body"> 
    <?php if($this->session->flashdata('error') != ''): ?>
         <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
      <?php endif; ?> 

      
      <?php if($this->session->flashdata('success') != ''): ?>
         <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
      <?php endif; ?>

       <?php if($this->session->flashdata('suc_del') != ''): ?>
         <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('suc_del'); ?>
          </div>
      <?php endif; ?>

     

    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

        <section class="well with-header">
            <div class="header bordered-palegreen">Category - <?=$data->pcat_name  ?>. </div>
            <div class="well-sm">
                <div class="row">
                   
                    <div class="col-md-3">
                        

                        <div class="panel panel-default">
                          <div class="panel-heading"><strong>UPDATE CATEGORY </strong></div>
                          <div class="panel-body">

                            <label>Category Name</label>
                            <input type="text" value="<?=$data->pcat_name  ?>" name="pcat_name" class="form-control" required>
                                                       
                            <hr/>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="<?php echo base_url() ?>admin/blog_cat" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>

                          </div>
                        </div>
                    </div>

                    
                </div>

                <br/>
               
            </div>
            
        </section>       

    </form> 
                          
</div>


<?php
      include 'inc/footer-js.php';  
?>

