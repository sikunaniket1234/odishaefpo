<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>



<link href="<?=base_url()  ?>/assets/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/assets/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>



<div class="page-body"> 
    <?php if($this->session->flashdata('error') != ''): ?>
         <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
      <?php endif; ?> 

      
      <?php if($this->session->flashdata('success') != ''): ?>
         <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
      <?php endif; ?>

       <?php if($this->session->flashdata('suc_del') != ''): ?>
         <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('suc_del'); ?>
          </div>
      <?php endif; ?>

     

    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">

        <section class="well with-header">
            <div class="header bordered-palegreen">List of Major Activities Finalized. </div>
            <div class="well-sm">
                <div class="row">
                   
                    <div class="col-md-4">
                        

                        <div class="panel panel-default">
                          <div class="panel-heading"><strong>Add Major Activities</strong></div>
                          <div class="panel-body">

                            <label>Name of Activity</label>

                            <select id="e2" onchange = "ShowHideDiv()" style="width: 100%;" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true" name="activities">
                                <?php 
                                    foreach ($allMA as $ci) {
                                ?>
                                <option  value="<?=$ci->id ?>"><?=$ci->name?></option>
                                <?php 
                                    }
                                ?>    
                                <option value="other">Other</option>   
                              </select>
                                                       
                            <hr/>

                            <div id="dvOther" style="display: none">
                                Put Your Value:
                                <input type="text" id="txtOther" name="otherValue" />
                            </div>
                            <hr/>
                            <button type="submit" class="btn btn-success"> +Add Activities</button>
                            <a href="#" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>

                          </div>
                        </div>
                    </div>

                     <div class="col-md-8">


                      <table class="table table-bordered table-hover">

                        <thead>
                            <tr class="text-uppercase">
                                <th>
                                   SL NO.
                                </th>
                                <th>
                                    Activity Name
                                </th>
                                
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                          <?php
                            if ($inf) {
                              
                              $sl=0;
                                foreach($inf as $value) {  

                                 $sl++;

                                ?>
                                  <tr>
                                    <td class="col-md-1"><?php echo $sl; ?> </td>
                                    <td class="col-md-9"><?php echo $value->major_activity_name; ?></td>                          
                                    <td class="col-md-2">
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure want to Delete?')"  href="<?=base_url('ngo/major_activity_delete/'.$value->id)  ?>"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                  </tr> 
                                <?php   
                              }
                            }
                            else{
                              ?>
                                <tr>
                                  <td colspan="5">Data not available.</td>
                                </tr>
                              <?php
                            }
                            
                          ?>

                        </tbody>

                      </table>
                        
                        
                        

                    </div>
                </div>

                <br/>
               
            </div>
            
        </section>       

    </form> 
                          
</div>


<?php
      include 'inc/footer-js.php';  
?>

<script type="text/javascript">
    function ShowHideDiv() {
        var e2 = document.getElementById("e2");
        var dvOther = document.getElementById("dvOther");
        dvOther.style.display = e2.value == "other" ? "block" : "none";
    }
</script>