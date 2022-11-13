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
                Business Plan LIST
            </div>
            <div class="col-md-6 text-right">
              <a href="<?=base_url('fpo/business_plan_add') ?>" class="btn btn-success">+Add Business Plan</a> 
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
                                                <th scope="col">Business Plan (200 words)</th>
                                                <!-- <th scope="col">PDF </th> -->
                                                
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
                                                <td><?= $r->bp_date;  ?></td>
                                                <td><?= $r->business_plan;  ?></td>
                                                <!-- <td>

                                                    <object data="<?=base_url('uploads/fpo/businessPlan/'.$r->bp_pdf)  ?>" type="application/pdf" width="500px" height="600px">
                                                        <p>Your web browser doesn't have a PDF plugin.
                                                        <a href="<?=base_url('uploads/fpo/businessPlan/'.$r->bp_pdf)  ?>">click here to download the PDF file.</a></p>
                                                    </object>
                                                </td> -->
                                              
                                                <td>
                                                    <a href="<?=base_url('uploads/fpo/businessPlan/'.$r->bp_pdf)  ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                    <a href="<?=base_url('fpo/business_plan_edit/'.$r->id)  ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('fpo/business_plan_delete/'.$r->id)  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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