<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

 
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Seo List</h2>


                            <?php
                  ///////////////////////////////////////////////////////////
                  $err = $this->session->flashdata('error');
                  if(!empty($err))
                  {
                      echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show">
                            <button class="close" data-dismiss="alert">
                              ×
                            </button>
                            <i class="fa-fw fa fa-times"></i>
                            <strong>Error!</strong> '.$scs.'
                          </div>';
                   }
                  $scs = $this->session->flashdata('success');
                  if(!empty($scs))
                  {
                     echo '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show">
                            <button class="close" data-dismiss="alert">
                              ×
                            </button>
                            <i class="fa-fw fa fa-check"></i>
                            <strong>Success</strong> '.$scs.'
                          </div>';
                 
                  }
                  ////////////////////////////////////////////////////////
                  ?>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                    
                 
                        <!-- ============================================================== -->
                        <!-- hoverable table -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Seo</h5>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl No.</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Url</th> 
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i=0;
                                            foreach($seoies as $r){
                                            $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i;  ?></th>
                                                <td><?= $r->title;  ?></td>
                                                <td><?= $r->url;  ?></td>
                                                <td>
                                                    <a href="<?=base_url('admin/seo_edit/'.$r->si_id) ?>" class="btn btn-success"><i class="fas fa-external-link-alt"></i></a>

                                                     
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
                        <!-- ============================================================== -->
                        <!-- end hoverable table -->
                        <!-- ============================================================== -->
                    </div>
                   
               
            </div>    



                
            
<?php
      include 'inc/footer-js.php';  
?>
