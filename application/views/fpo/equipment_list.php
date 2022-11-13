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
                Infrastructure / Equipment List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('fpo/equipment_add') ?>" class="btn btn-success">+Add Infrastructure / Equipment</a> 
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
                                                <th scope="col">Bill number</th>
                                                <th scope="col">Purchase Date</th>
                                                <th scope="col">Purchase From</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Equipment Condition</th>
                                                <th scope="col">Depreciation Rate</th>
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
                                                <td><?= $r->bill_number;  ?></td>
                                                <td><?= $r->purchase_date;  ?></td>
                                                <td><?= $r->purchase_from;  ?></td>
                                                <td><?= $r->item_name;  ?></td>
                                                <td><?= $r->amount;  ?></td>
                                                <td><?= $r->present_condition;  ?></td>
                                                <td><?= $r->depreciation_value;  ?></td>
                                                <td>
                                                    <!-- <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a> -->

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('fpo/equipment_delete/'.$r->id)  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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