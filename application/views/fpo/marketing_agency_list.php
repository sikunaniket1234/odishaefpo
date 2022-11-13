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
              Marketing Agency List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('fpo/marketing_agency_add') ?>" class="btn btn-success">+Add Marketing Agency</a> 
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
                                                <th scope="col">Agency Name</th>
                                                <th scope="col">Product Procured</th>
                                                <th scope="col">Contact Details</th>
                                                <th scope="col">Email Id</th>
                                                <th scope="col">Action</th>
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
                                                <td><?= $r->agency_name;  ?></td>
                                                <td><?= $r->product_procured;  ?></td>
                                                <td><?= $r->contact;  ?></td>
                                                <td><?= $r->email;  ?></td>
                                                
                                                <td>
          <!-- <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a> -->

          <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('fpo/marketing_agency_delete/'.$r->id)  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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