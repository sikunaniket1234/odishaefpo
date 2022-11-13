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
              Board Of Director List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('ngo/bod_add') ?>" class="btn btn-success">+Add Board Of Director</a> 
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
                                                <th scope="col">Fpo Name</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Educational Qualification</th>
                                                <th scope="col">Contact Number</th>
                                                <th scope="col">Din</th>
                                                <th scope="col">Selection Process</th>
                                                <th scope="col">Image</th>
                                                <!-- <th scope="col">Image</th>  -->
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
                                                <td><?= $r->fpo_name;  ?></td>
                                                <td><?= $r->name;  ?></td>
                                                <td><?= $r->gender;  ?></td>
                                                <td><?= $r->educationalQualification;  ?></td>
                                                <td><?= $r->contactNumber;  ?></td>
                                                <td><?= $r->din;  ?></td>
                                                <td><?= $r->selectionProcess;  ?></td>
                                                <td><img width="60" src="<?=base_url() ?>/uploads/bod/<?= $r->thumb;  ?>" alt="bod"></td>
                                                
                                                <td>
          <a href="<?=base_url('ngo/bod_edit/'.$r->id)  ?>" class="btn-sm btn-success"><i class="fa fa-edit"></i></a>

          <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('ngo/bod_delete/'.$r->id)  ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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