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
              Bank Details List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('fpo/bank_details_add') ?>" class="btn btn-success">+Add Bank Details</a> 
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
                                                <th scope="col">Bank</th>
                                                <th scope="col">Branch</th>
                                                <th scope="col">IFSC Code</th>
                                                <th scope="col">Account No.</th>
                                                <th scope="col">Balance as on Reporting Month</th>
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
                                                <td><?= $r->bank;  ?></td>
                                                <td><?= $r->branch;  ?></td>
                                                <td><?= $r->ifscCode;  ?></td>
                                                <td><?= $r->accountNo;  ?></td>
                                                <td><?= $r->balanceAsOnReportingMonth;  ?></td>
                                                <td>
          <a href="<?=base_url('fpo/bank_details_edit/'.$r->id)  ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>

          <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('fpo/bank_details_delete/'.$r->id)  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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