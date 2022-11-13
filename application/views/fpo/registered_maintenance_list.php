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
                Registered Maintenance LIST
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('fpo/registered_maintenance_add') ?>" class="btn btn-success">+Add Registered Maintenance</a> 
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
                                                <th scope="col">Date</th>
                                                <th scope="col">Membership Register</th>
                                                <th scope="col">Certificate Issuing Register</th>
                                                <th scope="col">Meeting Register</th>
                                                <th scope="col">Stock Register</th>
                                                <th scope="col">Sales Register</th>
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
                                                <td><?= $r->rm_date;  ?></td>
                                                <td><?= $r->membership_register;  ?></td>
                                                <td><?= $r->certificate_issuing;  ?></td>
                                                <td><?= $r->meeting;  ?></td>
                                                <td><?= $r->stock;  ?></td>
                                                <td><?= $r->sales;  ?></td>
                                                <td>
                                                    <a href="<?=base_url('fpo/registered_maintenance_edit/'.$r->id)  ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('fpo/registered_maintenance_delete/'.$r->id)  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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