<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

 
  <div class="page-body"> 
      <?php include 'inc/flashmsg.php'; ?>                   
      
      <div class="well with-header">
        <div class="header bordered-palegreen">

         <div  style="float: left;">
            List Of <?=@$ext_hd ?> Category <?=$spl_heading  ?>


         </div>
         <div class="text-right">
            <a href="<?=base_url('admin/'.@$url_prefix.'category') ?>" class="btn btn-success">Add <?=@$ext_hd ?> Category</a> 
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
                                  <th>Category Name</th>
                                  <th>Index</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                foreach($inf as $r){
                                    $i++;
                                    if(isset($url_prefix) && $url_prefix=='p'){
                                        $lnk=base64_encode($r->pcat_id);
                                    }else{
                                       $lnk=base64_encode($r->cat_id);
                                    }
                                    
                                ?>
                              
                              <tr>
                                  <th scope="row"><?= $i;  ?></th>
                                  <td>
                                    <?php
                                      if($r->noms >0){
                                     ?>
                                    <a href="<?=base_url('admin/'.@$url_prefix.'category_list/'. $lnk) ?>">
                                    <?= $r->cat_nm;  ?>(<?= $r->noms;  ?>) 
                                    </a>
                                     <?php
                                      }
                                      else {
                                        echo $r->cat_nm.'('.$r->noms.')';
                                      }
                                     ?>
                                  </td>
                                  <td><?= $r->order_no;  ?></td>
                                  

                                  <td>
                                     <?php
                                      if($r->noms ==0){


                                      if(isset($url_prefix) && $url_prefix=='p'){
                                          $mk= $r->pcat_id;
                                          $mmk1 = base_url('admin/pcategory_list_delete/'.$mk);
                                      }else{
                                         $mk= $r->cat_id;
                                         $mmk1 = base_url('admin/category_list_delete/'.$mk);
                                      }





                                     ?>
                                    <a href="<?=$mmk1  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                     <?php
                                      }

                                      if(isset($url_prefix) && $url_prefix=='p'){
                                          $mk= $r->pcat_id;
                                          $mmk = base_url('admin/pcategory_list_edit/'.$mk);
                                      }else{
                                         $mk= $r->cat_id;
                                         $mmk = base_url('admin/category_list_edit/'.$mk);
                                      }
                                     ?>

                                    <a href="<?=$mmk ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                    
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