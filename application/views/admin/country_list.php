
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
            List of Country
          </div>
          <div class="col-md-3 text-right">
            <a href="<?php echo base_url('admin/country'); ?>" class="btn btn-success btn-sm">+Add Country</a> 
          </div>
        </div>
      </div>  
      <form class="form-inline" role="form" method="post">
           <div class="form-group">
               <input type="text" class="form-control" name="srch_term" placeholder="Search by name">
           </div>
          <button type="submit" class="btn btn-info" name="submit" >Search</button>
      </form>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Sl No.</th>
                    <th scope="col">Country Name</th>                     
                    <th scope="col">Country Url</th>                     
                    <th scope="col">Over View</th>                     
                    <th scope="col">Glance</th>                     
                    <th scope="col">Why Choose Us</th>                     
                    <th scope="col">Exams & Coaching</th>                     
                    <th scope="col">Education Cost Info</th>                     
                    <th scope="col">Other Essential Information</th>                     
                    <th scope="col">Banner</th>                     
                    <th scope="col">Thumb</th>                     
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
                    <td> <?= $r->country_name;  ?> </td>
                    <td> <?= $r->country_utl;  ?> </td>
                    <td> <?= $r->overview;  ?> </td>
                    <td> <?= $r->glance_text;  ?> </td>
                    <td> <?= $r->why_text;  ?> </td>
                    <td> <?= $r->exam_text;  ?> </td>
                    <td> <?= $r->cost_text;  ?> </td>
                    <td> <?= $r->other_info;  ?> </td>
                    <td><img width="60" src="<?=base_url() ?>uploads/country/banner/<?= $r->banner;  ?>"></td>
                    <td><img width="60" src="<?=base_url() ?>uploads/country/thumb/<?= $r->thumb;  ?>"></td>
                    
                    
                    <td>
                        <a href="<?=base_url('admin/country_edit/'.$r->country_id) ?>" class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a>

                         <a title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"  href="<?=base_url('admin/country_delete/'.$r->country_id) ?>" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>       
        <?=$this->pagination->create_links();  ?>  
    </div>
  </div>              
            
<?php
      include 'inc/footer-js.php';  
?>