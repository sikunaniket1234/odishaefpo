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
            Credit linkage List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('ngo/credit_linkage_add') ?>" class="btn btn-success">+Add Credit linkage</a> 
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
                                                <th scope="col">Name of the financial institution</th>
                                                <th scope="col">Type of loan</th>
                                                <th scope="col">Apply Amount</th>
                                                <th scope="col">Sanction Amount</th>
                                                <th scope="col">ROI</th>
                                                <th scope="col">Amount Released</th>
                                                <th scope="col">Receive Date</th>
                                                <th scope="col">Installment per month</th>
                                                <th scope="col">Loan Time period</th>
                                                <th scope="col">Number of installment</th>
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
                                                <td><?= $r->cl_date;  ?></td>
                                                <td><?= $r->financial_institution_name;  ?></td>
                                                <td><?= strtoupper($r->loan_type);  ?></td>
                                                <td><?= $r->apply_amount;  ?></td>
                                                <td><?= $r->sanction_amount;  ?></td>
                                                <td><?= $r->roi;  ?></td>
                                                <td><?= $r->amount_released;  ?></td>
                                                <td><?= $r->receive_date;  ?></td>
                                                <td><?= $r->installment_per_month;  ?></td>
                                                <td><?= $r->loan_time_period;  ?></td>
                                                <td><?= $r->number_of_installment;  ?></td>
                                                
                                                <td>
                                                    <a href="<?=base_url('ngo/credit_linkage_edit/'.$r->id)  ?>" class="btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('ngo/credit_linkage_delete/'.$r->id)  ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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