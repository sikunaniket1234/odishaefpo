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
            Meeting List
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('ngo/meeting_add') ?>" class="btn btn-success">+Add Meeting</a> 
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
                                                <th scope="col">Meeting Date</th>
                                                <th scope="col">Type of Meetings</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Number of participants</th>
                                                <th scope="col">Expenditure amount</th>
                                                <th scope="col">Remarks(PDF)</th>
                                                <th scope="col">Purpose</th>
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
                                                <td><?= $r->conducted_date;  ?></td>
                                                <td><?= $r->typ_conduct;  ?></td>
                                                <td><?= $r->location;  ?></td>
                                                <td><?= $r->participants_number;  ?></td>
                                                <td><?= $r->expenditure_amount;  ?></td>
                                                <td><?= $r->remarks;  ?></td>
                                                <td><?= $r->topic;  ?></td>
                                                
                                                <td>
                                                    <a href="<?=base_url('ngo/meeting_edit/'.$r->id)  ?>" class="btn-sm btn-success"><i class="fa fa-edit"></i></a>

                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('ngo/meeting_delete/'.$r->id)  ?>" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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