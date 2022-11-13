
<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

 
  <div class="page-body">
    <?php include 'inc/flashmsg.php'; ?>

    <div class="well with-header">
      <div class="header bordered-palegreen">
        <div class="row">
          <div class="col-md-9">
            List of Pages
          </div>
          <div class="col-md-3 text-right">
            <a href="<?php echo base_url('admin/page'); ?>" class="btn btn-success btn-sm">+Add Page</a> 
          </div>
        </div>
      </div>  

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Sl No.</th>
                    <th scope="col">Name</th>                     
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i=0;
                foreach($vfnies as $r){
                $i++;
            ?>
                <tr>
                    <th scope="row"><?= $i;  ?></th>
                    <td>
                      <a target="_blank" href="<?=base_url($r->page_url)  ?>"  />
                      <?= $r->page_heading;  ?>
                      

                      </a>
                        
                      </td>
                    
                    
                    <td>
                        <a href="<?=base_url('admin/page_edit/'.$r->page_id) ?>" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>

                         <a title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('admin/page_delete/'.$r->page_id) ?>" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a>
                    </td>
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