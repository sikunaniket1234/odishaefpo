<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

<div class="page-body"> 
      <?php include 'inc/flashmsg.php'; ?>                   
      
      <div class="well with-header">
        <div class="header bordered-palegreen">
            Newsletter Subscription List.
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
                  <table class="table table-hover table-centered table-bordered">
                      <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Email</th>                                         
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          if ($newsletter) {
                            $i=0;
                            foreach($newsletter as $r){
                                $i++;
                              ?>
                            
                                <tr>
                                    <th class="col-md-1"><?= $i;  ?></th>                                   
                                    <td  class="col-md-9"><?= $r->email;  ?></td>                                    
                                    <td  class="col-md-1">                                      
                                      <a href="<?=base_url('admin/newsletter_delete/'.$r->nws_id) ?>" 
                                        class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete ?')">
                                        <i class="fa fa-trash"></i>
                                      </a>
                                    </td>                                    
                                    
                                </tr>
                              <?php
                            }
                          }
                          else{
                            ?>
                              <tr>
                                <td colspan="3">Record not found.</td>
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