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
            Status of ROC Return Filing List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('ngo/roc_add') ?>" class="btn btn-success">+Add Status of ROC Return Filing</a> 
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
                                                <th scope="col">Date of Filling</th>
                                                <th scope="col">Auditor Name</th>
                                                <th scope="col">Status of ROC return</th>
                                                <th scope="col">DIR – 3</th>
                                                <th scope="col">AOC – 4</th>
                                                <th scope="col">MGT – 7</th>
                                                <th scope="col">INC – 22 </th>
                                                <th scope="col">DPT – 3</th>
                                                <th scope="col">Remarks (PDF)</th>
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
                                                <td><?= $r->filling_date;  ?></td>
                                                <td><?= $r->appointment_auditor;  ?></td>
                                                <td><?= $r->roc_return_status;  ?></td>
                                                <td><?= $r->dir3;  ?></td>
                                                <td><?= $r->aoc4;  ?></td>
                                                <td><?= $r->mgt7;  ?></td>
                                                <td><?= $r->inc22;  ?></td>
                                                <td><?= $r->dpt3;  ?></td>
                                                <td><?= $r->remarks;  ?></td>
                                                
                                                <td>
                                                    <a href="<?=base_url('ngo/roc_edit/'.$r->id)  ?>" class="btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('ngo/roc_delete/'.$r->id)  ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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