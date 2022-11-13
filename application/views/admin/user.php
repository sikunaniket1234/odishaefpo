<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<div class="page-body"> 

  <?php if($this->session->flashdata('del_msg') != ''): ?>
     <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('del_msg'); ?>
      </div>
  <?php endif; ?> 

  
  <?php if($this->session->flashdata('success') != ''): ?>
     <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('success'); ?>
      </div>
  <?php endif; ?>


  <div class="well with-header with-footer" style="margin-top: 20px;">
      <div class="header bordered-palegreen">
        

        
          <div class="row">
            <div class="col-md-9">
              List of NGO.
            </div>
            <div class="col-md-3 text-right">
              <a href="<?php echo base_url('admin/user_add'); ?>" class="btn btn-success btn-lg">+Add NGO Credential</a> 
            </div>
          </div>
      </div> 

      
      <br/>


      <table class="table table-bordered table-hover">

          <thead>
              <tr>
                  <th>
                     SL NO.
                  </th>
                  <th>
                      Name
                  </th>
                  <th>
                      Email
                  </th>
                  
                  <th>
                      Action
                  </th>
              </tr>
          </thead>

          <tbody>
              <?php       
                
                if ($users) {

                  $sl=0;
                  foreach($users as $value) {  

                       $sl++;

                      ?>
                        <tr>
                          <td class="col-md-1"><?php echo $sl; ?> </td>
                          <td class="col-md-4"><?php echo $value->user_name; ?></td>
                          <td class="col-md-6"><?php echo $value->user_email; ?></td>
                          
                          <td class="col-md-1">
                              <a class="btn btn-sm btn-warning" href="<?=base_url('admin/user_edit/'.$value->id)  ?>"><i class="fa fa-pencil"></i> </a> 
                              <a class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure want to Delete?')"  href="<?=base_url('admin/user_del/'.$value->id)  ?>"><i class="fa fa-trash-o"></i> </a>
                          </td>
                        </tr> 
                      <?php   
                   }
                }

                else{
                    ?>
                      <tr>
                        <td colspan="4">No record found.</td>
                      </tr>
                    <?php
                }  
                
              ?>   
          </tbody>
      </table>


      


  </div>

  </div>

<?php
      include 'inc/footer-js.php';  
?>
