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
              List of FPO
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
                                                <th scope="col">Reg. No</th> 
                                                <th scope="col">Reg. As</th> 
                                                <th scope="col">Reg. Date</th> 
                                                <th scope="col">POPI</th> 
                                                <th scope="col">Address</th> 
                                                <th scope="col">PIN</th> 
                                               
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i=0;
                                            foreach($fpo_list as $r){
                                            $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i;  ?></th>
                                                <td><?= $r->name;  ?></td>
                                                <td><?= $r->registeredNo;  ?></td>
                                                <td><?= $r->registeredAs;  ?></td>
                                                <td><?= $r->regDate;  ?></td>
                                                <td><?= $r->popi;  ?></td>
                                                <td><?= $r->address;  ?></td>
                                                <td><?= $r->pin;  ?></td>
                                              
                                                <td>
                                                <a onclick="return confirm('Are you sure you want to view this item?');"  href="#" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
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