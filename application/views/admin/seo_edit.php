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
                            <h2 class="pageheader-title">Add Seo </h2>
                            
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
                                <h5 class="card-header">Seo Update</h5>
                                <div class="card-body">
                                    <form id="validationform" data-parsley-validate="" novalidate="" method="post" role="form">
                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-2 col-form-label text-sm-right">Url*</label>
                                            <div class="col-12 col-sm-10 col-lg-6">
                                                <input type="text" name="url" id="page_url" value="<?=$info->url ?>" required placeholder="Type something" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-2 col-form-label text-sm-right"> Meta Title*</label>
                                            <div class="col-12 col-sm-10 col-lg-6">
                                                <input type="text" name="title" required placeholder="Type something" value="<?=$info->title ?>" class="form-control">
                                            </div>
                                        </div>  


                                        


                                        <div class="form-group row">
                                            <label class="col-12 col-sm-2 col-form-label text-sm-right"> Meta Key</label>                                            
                                            <div class="col-10 col-sm-10 col-lg-10">
                                                <textarea type="text" name="meta_key" 
                                                 class="form-control"  ><?=$info->meta_key ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-2 col-form-label text-sm-right"> Meta Description</label>                                            
                                            <div class="col-10 col-sm-10 col-lg-10">
                                                <textarea type="text" name="meta_desc" class="form-control"  ><?=$info->meta_desc ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-2 col-form-label text-sm-right">Other Meta info</label>                                            
                                            <div class="col-10 col-sm-10 col-lg-10">
                                                <textarea type="text"  name="meta_otherinfo" class="form-control"  ><?=$info->meta_otherinfo ?></textarea>
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