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
                    <div class="header bordered-palegreen">Add Product</div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                <div id="dynamic_field">
                                    <div class="form-group row">
                                        
                                
                                        <div class="col-sm-3">
                                            <label>Product</label>
                                            <input type="text" class="form-control"  name="product_name[]" required>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Volume/Stock (qtl) </label>
                                            <input type="number" class="form-control"  name="stock[]" required>
                                        </div>
                                    
                                        <div class="col-sm-2">
                                            <label>Season</label>
                                            <select name="season[]" required class="form-control">
                                              <option value="rabi">Rabi</option>
                                              <option value="kharif">Kharif</option>
                                              <option value="pre kharif">Pre-Kharif</option>
                                              <option value="boro">Boro</option>
                                              <option value="kharif">Elected</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Harvest Month One</label>
                                            <select name="harvest_month_one[]" required class="form-control">
                                                <option>month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <label>Harvest Month Two</label>
                                            <select name="harvest_month_two[]" required class="form-control">
                                                <option>month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <label>Harvest Month Three</label>
                                            <select name="harvest_month_three[]" required class="form-control">
                                                <option>month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
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
           $('#dynamic_field').append('<div id="row'+i+'"> <div class="form-group row"> <div class="col-sm-3"> <label>Product</label> <input type="text" class="form-control" name="product_name[]" required> </div> <div class="col-sm-2"> <label>Volume/Stock (qtl) </label> <input type="number" class="form-control" name="stock[]" required> </div> <div class="col-sm-2"> <label>Season</label> <select name="season[]" required class="form-control"> <option value="rabi">Rabi</option> <option value="kharif">Kharif</option> <option value="pre kharif">Pre-Kharif</option> <option value="boro">Boro</option> <option value="kharif">Elected</option> </select> </div> <div class="col-sm-2"> <label>Harvest Month One</label> <select name="harvest_month_one[]" required class="form-control"> <option>month</option> <option value="January">January</option> <option value="February">February</option> <option value="March">March</option> <option value="April">April</option> <option value="May">May</option> <option value="June">June</option> <option value="July">July</option> <option value="August">August</option> <option value="September">September</option> <option value="October">October</option> <option value="November">November</option> <option value="December">December</option> </select> </div> </div> <div class="form-group row"> <div class="col-sm-2"> <label>Harvest Month Two</label> <select name="harvest_month_two[]" required class="form-control"> <option>month</option> <option value="January">January</option> <option value="February">February</option> <option value="March">March</option> <option value="April">April</option> <option value="May">May</option> <option value="June">June</option> <option value="July">July</option> <option value="August">August</option> <option value="September">September</option> <option value="October">October</option> <option value="November">November</option> <option value="December">December</option> </select> </div> <div class="col-sm-2"> <label>Harvest Month Three</label> <select name="harvest_month_three[]" required class="form-control"> <option>month</option> <option value="January">January</option> <option value="February">February</option> <option value="March">March</option> <option value="April">April</option> <option value="May">May</option> <option value="June">June</option> <option value="July">July</option> <option value="August">August</option> <option value="September">September</option> <option value="October">October</option> <option value="November">November</option> <option value="December">December</option> </select> </div> <div class="col-sm-1"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:23px">X</button> </div> </div> </div> ');
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
