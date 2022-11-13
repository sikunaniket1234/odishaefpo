<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

<div class="page-body"> 
      <?php include 'inc/flashmsg.php'; ?>                   
      
      <div class="well with-header">
        <div class="header bordered-palegreen">

         <div  style="float: left;">
            Media gallery


         </div>
         <div class="text-right">
            <a href="<?=base_url('admin/gallery') ?>" class="btn btn-success">+Add Gallery Item.</a> 
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
                  <table class="table table-hover table-centered mb-0">
                                    <thead>
                                      <tr>
                                          <th>Sl No.</th>
                                          <th>Home Banner</th>
                                          <th>Alt</th>
                                          <th>Link</th>
                                          <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        foreach($inf as $r){
                                            $i++;
                                        ?>
                                      
                                      <tr>
                                          <th scope="row"><?= $i;  ?></th>
                                          <td><img width="60" src="<?=base_url() ?>/uploads/gallery/<?= $r->media_url;  ?>"></td>
                                          <td><?= $r->alt;  ?></td>
                                          <td><?= $r->href_link;  ?></td>
                                          
                                          <td>
                                            
                                            <a href="<?=base_url('admin/gallery_item_delete/'.$r->m_id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            

                                            
                                            
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
              <!-- end row -->
  </div> 















<?php
      include 'inc/footer-js.php';  
?>