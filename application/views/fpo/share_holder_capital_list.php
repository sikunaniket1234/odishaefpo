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
                Shareholder List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('fpo/share_holder_capital_add') ?>" class="btn btn-success">+Add Shareholder</a> 
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Certificate No</th>
                                                <th scope="col">Issue Date</th>
                                                <th scope="col">Share Value</th>
                                                <th scope="col">Share Amount</th>
                                                <th scope="col">Share Transfer</th>
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
                                                <td><?= $r->name;  ?></td>
                                                <td><?= $r->certificate_number;  ?></td>
                                                <td><?= $r->issue_date;  ?></td>
                                                <td><?= $r->share_value;  ?></td>
                                                <td><?= $r->share_amount;  ?></td>
                                                <td><?= $r->share_transfer;  ?></td>
                                                <td>
                                                    <a href="<?=base_url('fpo/share_holder_capital_edit/'.$r->id)  ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('fpo/share_holder_capital_delete/'.$r->id)  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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