<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

<div class="page-body"> 
      <?php include 'inc/flashmsg.php'; ?>                   
      
      <div class="well with-header">
        <div class="header bordered-palegreen">
          <div class="row">
            <div class="col-md-6">
              List of Sliders
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('admin/media') ?>" class="btn btn-success">+Add Slider</a> 
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
                              <th>Sl No.</th>
                              <th>Home Banner</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if ($inf){
                                $i=0;
                                foreach($inf as $r){
                                  $i++;
                                  ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><img width="60" src="<?=base_url() ?>/uploads/home/banner/<?= $r->media_thumb;  ?>"></td>
                                        <td><?= $r->media_title;  ?></td>
                                        <td><?= $r->media_desc;  ?></td>
                                        
                                        <td>
                                          <a href="<?=base_url('admin/media_edit/'.$r->m_id) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                          <a href="<?=base_url('admin/media_list_delete/'.$r->m_id) ?>" onclick="return confirm('Are you sure want to delete ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                              ?>
                                <tr>
                                  <td colspan="5">Slider not available.</td>
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
              <!-- end row -->
  </div> 






<?php
      include 'inc/footer-js.php';  
?>
