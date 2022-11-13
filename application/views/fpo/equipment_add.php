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
                    <div class="header bordered-palegreen">Add Infrastructure /equipment present in FPO</div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                <div id="dynamic_field"> 
                                    <div class="form-group row">

                                        <div class="col-sm-3">
                                            <label>Bill Number</label>
                                            <input type="text" class="form-control"  name="bill_number[]" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Purchase Date</label>
                                            <input type="date" class="form-control"  name="purchase_date[]">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Purchase From </label>
                                            <input type="text" class="form-control"  name="purchase_from[]">
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-3">
                                            <label>Item Name </label>
                                            <input type="text" class="form-control"  name="item_name[]">
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Quantity </label>
                                            <input type="number" class="form-control" name="qty[]" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Rate</label>
                                            <input type="text"  data-behaviour="decimal" class="form-control"  name="rate[]" required>
                                        </div>

                                         <div class="col-sm-2">
                                            <label>GST/TAX</label>
                                            <input type="text" data-behaviour="decimal" class="form-control"  name="tax[]" maxlength="15" >
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Amount</label>
                                            <input type="number" class="form-control"  name="amount[]">
                                        </div>
                                    </div>    
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Item Type</label>
                                            <input type="text" class="form-control"  name="item_typ[]">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Equipment Condition</label>
                                            <input type="text" class="form-control"  name="present_condition[]">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Depreciation Rate </label>
                                            <input type="text" data-behaviour="decimal" class="form-control"  name="depreciation_value[]">
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
           $('#dynamic_field').append('<div id="row'+i+'"> <div class="form-group row"> <div class="col-sm-3"> <label>Bill Number</label> <input type="text" class="form-control" name="bill_number[]" required> </div> <div class="col-sm-3"> <label>Purchase Date</label> <input type="date" class="form-control" name="purchase_date[]"> </div> <div class="col-sm-3"> <label>Purchase From </label> <input type="text" class="form-control" name="purchase_from[]"> </div> </div> <div class="form-group row"> <div class="col-sm-3"> <label>Item Name </label> <input type="text" class="form-control" name="item_name[]"> </div> <div class="col-sm-2"> <label>Quantity </label> <input type="number" class="form-control" name="qty[]" required> </div> <div class="col-sm-2"> <label>Rate</label> <input type="number" class="form-control" name="rate[]" required> </div> <div class="col-sm-2"> <label>GST/TAX</label> <input type="text" class="form-control" name="tax[]" maxlength="15"> </div> <div class="col-sm-2"> <label>Amount</label> <input type="number" class="form-control" name="amount[]"> </div> </div> <div class="form-group row"> <div class="col-sm-3"> <label>Item Type</label> <input type="text" class="form-control" name="item_typ[]"> </div> <div class="col-sm-3"> <label>Equipment Condition</label> <input type="text" class="form-control" name="present_condition[]"> </div> <div class="col-sm-3"> <label>Depreciation Rate </label> <input type="text" class="form-control" name="depreciation_value[]"> </div> <div class="col-sm-1"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:23px">X</button> </div> </div>  </div> ');
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