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
            Annual Turnover Report
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('ngo/turnover_add') ?>" class="btn btn-success">+Add Annual Turnover Report</a> 
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
                                                <th scope="col">Year Date</th>
                                                <th scope="col">Input Sale</th>
                                                <th scope="col">Output Sale</th>
                                                <th scope="col">Audit report</th>
                                                <th scope="col">Profit</th>
                                                <th scope="col">Loss</th>
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
                                                <td><?= $r->year_date;  ?></td>
                                                <td><?= $r->input_sale;  ?></td>
                                                <td><?= $r->output_sale;  ?></td>
                                                <td><?= $r->audit_report;  ?></td>
                                                <td><?= $r->profit;  ?></td>
                                                <td><?= $r->loss;  ?></td>
                                                
                                                <td>
                                                    <!-- <a href="<?=base_url('ngo/turnover_edit/'.$r->id)  ?>" class="btn-sm btn-success"><i class="fa fa-edit"></i></a> -->

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('ngo/turnover_delete/'.$r->id)  ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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