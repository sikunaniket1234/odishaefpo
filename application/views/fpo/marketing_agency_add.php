<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>




	 <div class="page-body">                    
        <div class="row">                      
            
            <div class="col-md-12">

                <?php include 'inc/flashmsg.php'; ?>
                <div class="well with-header">
                    <div class="header bordered-palegreen">Add Marketing Agency</div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                <div id="dynamic_field">    
                                    <div class="form-group row">
                                
                                        <div class="col-sm-3">
                                            <label>Name of the Agency</label>
                                            <input type="text" class="form-control"  name="agency_name[]" required>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Product Procured</label>
                                            <input type="text" class="form-control" name="product_procured[]" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Contact Details</label>
                                            <input type="text" class="form-control"  name="contact[]" title="10 digit mobile number" pattern="[1-9]{1}[0-9]{9}" required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Contact Persion</label>
                                            <input type="text" class="form-control"  name="contact_persion[]" >
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Email Id</label>
                                            <input type="email" class="form-control"  name="email[]" >
                                        </div>

                                        <div class="col-sm-1">
                                           <button type="button" name="add" id="add" class="btn btn-success" style="margin-top: 23px">Add More</button>
                                        </div>
                                    </div>
                                </div>
                                  
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>






                </div>
              
             
                

            </div> 
        </div>                   
    </div>



    <?php
        include 'inc/footer-js.php';  
    ?>




<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'">  <div class="form-group row"> <div class="col-sm-3"> <label>Name of the Agency</label> <input type="text" class="form-control" name="agency_name[]" required> </div> <div class="col-sm-3"> <label>Product Procured</label> <input type="text" class="form-control" name="product_procured[]" required> </div> <div class="col-sm-3"> <label>Contact Details</label> <input type="text" class="form-control" name="contact[]" title="10 digit mobile number" pattern="[1-9]{1}[0-9]{9}" required> </div> <div class="col-sm-3"> <label>Contact Persion</label> <input type="text" class="form-control" name="contact_persion[]" > </div> <div class="col-sm-3"> <label>Email Id</label> <input type="email" class="form-control" name="email[]" > </div> <div class="col-sm-1"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:23px">X</button> </div> </div> </div> ');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Delete This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>