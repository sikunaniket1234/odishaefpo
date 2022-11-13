<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/superadminassets/slimcrop/slim/slim.min.css" rel="stylesheet">

<script src="<?=base_url()  ?>/superadminassets/slimcrop/slim/slim.kickstart.min.js"></script>

        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add Master Seo Input </h2>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->

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




                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Master Seo Update</h5>
                                <div class="card-body">
                                    <form id="validationform" data-parsley-validate="" novalidate="" method="post" role="form">
                                        
                                        
                                       
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-12 col-form-label text-sm-left">
                                              Put Google Analytics Code / Tag Manager / ANY Other meta code here. ( It will reflect in each page of frontend.)
                                            </label>
                                            <label class="col-12 col-sm-2 col-form-label text-sm-right"> Seo Code*</label>
                                            <div class="col-12 col-sm-10 col-lg-6">
                                              <textarea style="height: 220px;" class="form-control" name="seo_code" required placeholder="Type something" ><?=$info->seo_code ?></textarea>
                                                
                                            </div>
                                        </div>  


                                        


                                        



                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary">Update</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
           
            </div>
            <!-- ============================================================== -->
<?php
      include 'inc/footer-js.php';  
?>

