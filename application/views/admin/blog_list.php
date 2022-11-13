<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

 <?php include 'inc/flashmsg.php'; ?>
  <div class="page-body">

    <div class="well with-header">
        <div class="header bordered-palegreen">
          <div class="row">
            <div class="col-md-6">
              List of Blog(s)
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('admin/blog') ?>" class="btn btn-success">+Add Blog</a> 
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                
            </div>
            
            <div class="col-md-12">
                <div class="page-title-box">
                    <h4 class="page-title"></h4>
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl No.</th>
                                                <th scope="col">Blog heading</th>
                                                <th scope="col">Image</th> 
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i=0;
                                            foreach($vfnies as $r){
                                            $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i;  ?></th>
                                                <td><?= $r->page_heading;  ?></td>
                                                <td><img width="60" src="<?=base_url() ?>/uploads/pages/<?= $r->thumb_img;  ?>"></td>
                                                <td>
          <a href="<?=base_url('admin/blog_edit/'.$r->page_id) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>

          <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('admin/blog_delete/'.$r->page_id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                    
                </div>
            </div>
        </div>

      </div>


  </div>              
            
<?php
      include 'inc/footer-js.php';  
?>