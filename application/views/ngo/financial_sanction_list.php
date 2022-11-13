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
            Financial Sanction List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('ngo/financial_sanction_add') ?>" class="btn btn-success">+Add Financial Sanction</a> 
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
                                                <th scope="col">Financial Sanction Name</th>
                                                <th scope="col">Sanction Date</th>
                                                <th scope="col">Sanction Amount</th>
                                                <th scope="col">first Year</th>
                                                <th scope="col">second Year</th>
                                                <th scope="col">third Year</th>
                                                <th scope="col">fourth Year</th>
                                                <th scope="col">fifth Year</th>
                                                <th scope="col">Release Date</th>
                                                <th scope="col">Release Amount</th>
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
                                                <td><?= $r->survey_name;  ?></td>
                                                <td><?= $r->sanction_date;  ?></td>
                                                <td><?= $r->sanction_amount;  ?></td>
                                                <td><?= $r->first_year;  ?></td>
                                                <td><?= $r->second_year;  ?></td>
                                                <td><?= $r->third_year;  ?></td>
                                                <td><?= $r->fourth_year;  ?></td>
                                                <td><?= $r->fifth_year;  ?></td>
                                                <td><?= $r->release_date;  ?></td>
                                                <td><?= $r->release_amount;  ?></td>
                                                
                                                <td>
                                                    <a href="<?=base_url('ngo/financial_sanction_edit/'.$r->id)  ?>" class="btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('ngo/financial_sanction_delete/'.$r->id)  ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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