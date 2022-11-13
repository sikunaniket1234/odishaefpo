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
              List of NGO
            </div>
            <!-- <div class="col-md-6 text-right">
              <a href="<?=base_url('admin/blog') ?>" class="btn btn-success">+Add Blog</a> 
            </div> -->
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Organisation Type</th> 
                                                <th scope="col">Phone</th> 
                                                <th scope="col">Email</th> 
                                                <th scope="col">Contact Persion</th> 
                                                <th scope="col">Pan</th> 
                                                <!-- <th scope="col">Organisation Head</th>  -->
                                                <th scope="col">Reg. No</th> 
                                                <th scope="col">Reg. Date</th> 
                                                <th scope="col">Grade</th> 
                                                
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i=0;
                                            foreach($ngo_list as $r){
                                            $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i;  ?></th>
                                                <td><?= $r->name;  ?></td>
                                                <td><?= $r->organisation_typ;  ?></td>
                                                <td><?= $r->phone;  ?></td>
                                                <td><?= $r->email;  ?></td>
                                                <td><?= $r->contact_persion;  ?></td>
                                                <td><?= $r->pan;  ?></td>
                                                <!-- <td><?= $r->org_head;  ?></td> -->
                                                <td><?= $r->registration_no;  ?></td>
                                                <td><?= $r->date_of_registration;  ?></td>
                                                <td><?= $r->grade;  ?></td>
                                                <td>
                                                <a onclick="return confirm('Are you sure you want to view this item?');"  href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>
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