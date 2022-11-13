<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


<div class="page-body">                    
        <div class="row">  
        <?php include 'inc/flashmsg.php'; ?>                    
            <div class="col-md-6">

                
                <div class="well with-header">
                    <div class="header bordered-palegreen">City</div>

                    <form  id="basicform" data-parsley-validate="" novalidate="" method="post" >
                                        


                                        <div class="form-group">
                                        <div class="col-md-8">
                                            <label for="inputUserName">City Name* </label>
                                            <input  type="text" name="city_name" required placeholder="Enter city name" 
                                            value="<?=@$info->city_name  ?>"   class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputUserName">Order Index </label>
                                            <input  type="text" name="order_no" placeholder="Higher on top" 
                                            value="<?=@$info->order_no  ?>" class="form-control">
                                        </div>
                                        </div>

                                        <div class="form-group" style="padding-left:15px; background: #fcffe9; border-top:2px dashed #ccc; border-bottom:2px dashed #ccc; margin-left:0; width:99%;clear:both;  
                                    min-height:300px;" id="foo">
    
                                        <h3 class="col-sm-12">REQUIRED IMAGES</h3>
                                        
                                        <div class="form-group">
                                            

                                            <div class="col-sm-6 col-md-6" style="float: left;">
                                                <label  >Banner</label>
                                                
                                                    <div class="slim" style="width:274px; height:120px;"
                                                         data-meta-user-id="1220"
                                                         data-ratio="800:534"
                                                         data-size="800,534"
                                                        >
                                                        <input type="file" name="banner" required>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                </div>

                                            <?php include 'inc/seoinputs.php'; ?>
 



                                                                                
                                        
                                        <div class="row">
                                           
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" style="margin-right: 91px;" class="btn btn-success">Submit</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>



                </div>




            </div>
            <div class="col-md-6">

                <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl No.</th>
                                                <th scope="col">City Name</th>
                                                <th scope="col">Index</th>
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
                                                <th scope="row"><?=$i;  ?></th>
                                                <th>
                                                    <img style="border:3px solid #ccc; margin-right: 10px;" width="70" 
                                                src="<?=spl_imgload('uploads/city/'.$r->banner,'Y'); ?>" 
                                                
                                                />
                                                    <?=$r->city_name  ?>                                  
                                                </th>
                                                <th><?= $r->order_no  ?></th>
                                                
                                                <td>

                                                    <a 
                                            href="<?=base_url('admin/city_delete/'.$r->city_id) ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fa fa-trash"></i></a> 
                                                    

                                                    <a 
                                            href="<?=base_url('admin/city_edit/'.$r->city_id) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a> 
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














<?php
      include 'inc/footer-js.php';  
?>