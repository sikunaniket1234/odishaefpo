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
            <div class="header bordered-palegreen">List of Categories. </div>
            <div class="well-sm">
                <div class="row">
                   
                    <div class="col-md-3">
                        

                        <div class="panel panel-default">
                          <div class="panel-heading"><strong>Add Category Item(s)</strong></div>
                          <div class="panel-body">

                            <label>Category Name</label>
                            <input type="text" name="pcat_name" class="form-control" required>
                                                       
                            <hr/>
                            <button type="submit" class="btn btn-success"> +Add Category</button>
                            <a href="<?php echo base_url() ?>admin/blog_list" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>

                          </div>
                        </div>
                    </div>

                     <div class="col-md-9">


                      <table class="table table-bordered table-hover">

                        <thead>
                            <tr class="text-uppercase">
                                <th>
                                   SL NO.
                                </th>
                                <th>
                                    Category Name
                                </th>
                                
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                          <?php
                            if ($blogcat) {
                              
                              $sl=0;
                                foreach($blogcat as $value) {  

                                 $sl++;

                                ?>
                                  <tr>
                                    <td class="col-md-1"><?php echo $sl; ?> </td>
                                    <td class="col-md-9"><?php echo $value->pcat_name; ?></td>                          
                                    <td class="col-md-2">
                                        <a class="btn btn-sm btn-warning" href="<?=base_url('admin/edit_blog_cat/'.$value->pcat_id)  ?>"><i class="fa fa-pencil"></i> </a> 
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure want to Delete?')"  href="<?=base_url('admin/del_blog_cat/'.$value->pcat_id)  ?>"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                  </tr> 
                                <?php   
                              }
                            }
                            else{
                              ?>
                                <tr>
                                  <td colspan="5">Data not available.</td>
                                </tr>
                              <?php
                            }
                            
                          ?>

                        </tbody>

                      </table>
                        
                        
                        

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

