<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>




     <div class="page-body">                    
        <div class="row">                      
            
            <div class="col-md-12">

                <?php include 'inc/flashmsg.php'; ?>
                <div class="well with-header">
                    <div class="header bordered-palegreen"><?=(isset($pg_heading))?$pg_heading:'+Add Financial Sanction'  ?></div>
                    
                    <form class="form-horizontal"  method="post" role="form" enctype="multipart/form-data">
                                <div id="dynamic_field">
                                    <div class="form-group row">

                                        <div class="col-sm-3">
                                            <label>Financial Sanction Name</label>
                                            <select name="survey_name" id="survey_name" required class="form-control">
                                              <option <?=(@$data->survey_name=="Mobilization of farmers")?'selected':'' ?> value="Mobilization of farmers">Mobilization of farmers</option>
                                              <option <?=(@$data->survey_name=="CBBO man power Salary for professionals")?'selected':'' ?> value="CBBO man power Salary for professionals">CBBO man power Salary for professionals</option>
                                              <option <?=(@$data->survey_name=="Salary for other staffs")?'selected':'' ?> value="Salary for other staffs">Salary for other staffs</option>
                                              <option <?=(@$data->survey_name=="Travel Cost")?'selected':'' ?> value="Travel Cost">Travel Cost</option>
                                              <option <?=(@$data->survey_name=="Furniture and feature")?'selected':'' ?> value="Furniture and features">Furniture and features</option>
                                              <option <?=(@$data->survey_name=="Office accommodation")?'selected':'' ?> value="Office accommodation">Office accommodation</option>
                                              <option <?=(@$data->survey_name=="Utility")?'selected':'' ?> value="Utility">Utility</option>
                                              <option <?=(@$data->survey_name=="Training to bod")?'selected':'' ?> value="Training to bod">Training to bod</option>
                                              <option <?=(@$data->survey_name=="Training to CEO")?'selected':'' ?> value="Training to CEO">Training to CEO</option>
                                              <option <?=(@$data->survey_name=="Exposure visit")?'selected':'' ?> value="Exposure visit">Exposure visit</option>
                                              <option <?=(@$data->survey_name=="Professional charges")?'selected':'' ?> value="Professional charges">Professional charges</option>
                                              <option <?=(@$data->survey_name=="RFA to improve market building")?'selected':'' ?> value="RFA to improve market building">RFA to improve market building</option>
                                              <option <?=(@$data->survey_name=="Establishment/registration")?'selected':'' ?> value="Establishment/registration">Establishment/registration</option>
                                              <option <?=(@$data->survey_name=="Training and exposure visit")?'selected':'' ?> value="Training and exposure visit">Training and exposure visit</option>
                                              <option <?=(@$data->survey_name=="Salary of POPI resource person")?'selected':'' ?> value="Salary of POPI resource person">Salary of POPI resource person</option>
                                              <option <?=(@$data->survey_name=="Registration Fee")?'selected':'' ?> value="Registration Fee">Registration Fee</option>
                                              <option <?=(@$data->survey_name=="Business plan preparation")?'selected':'' ?> value="Business plan preparation">Business plan preparation</option>
                                              <option <?=(@$data->survey_name=="Initiative to POPI")?'selected':'' ?> value="Initiative to POPI">Initiative to POPI</option>
                                              <option <?=(@$data->survey_name=="Other Expenses")?'selected':'' ?> value="Other Expenses">Other Expenses (MIS,Travel, DPR, etc.)</option>
                                            </select>
                                           <!-- <input type="text" class="form-control"  name="survey_name" id="survey_name"> -->
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label>Sanction Date</label>
                                           <input type="date" class="form-control"  name="sanction_date" value="<?=@$data->sanction_date  ?>" id="sanction_date">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Sanction Amount</label>
                                            <input type="number" class="form-control"  name="sanction_amount" value="<?=@$data->sanction_amount  ?>" >
                                        </div>

                                        <div class="col-sm-3">
                                            <label>1st Year</label>
                                            <input type="text" class="form-control"  name="first_year" value="<?=@$data->first_year  ?>" id="1st_year">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>2nd Year</label>
                                            <input type="text" class="form-control"  name="second_year"value="<?=@$data->second_year  ?>" id="2nd_year">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>3rd Year</label>
                                            <input type="text" class="form-control"  name="third_year"value="<?=@$data->third_year  ?>" id="3rd_year">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>4th Year</label>
                                            <input type="text" class="form-control"  name="fourth_year"value="<?=@$data->fourth_year  ?>" id="4th_year">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>5th Year</label>
                                            <input type="text" class="form-control"  name="fifth_year"value="<?=@$data->fifth_year  ?>" id="5th_year">
                                        </div>




                                        <div class="col-sm-3">
                                            <label>Release Amount</label>
                                            <input type="number" class="form-control"  name="release_amount"value="<?=@$data->release_amount  ?>" >
                                        </div>
                                        

                                        <div class="col-sm-3">
                                            <label>Release Date</label>
                                            <input type="date" class="form-control"  name="release_date"value="<?=@$data->release_date  ?>" >
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Letter Number</label>
                                            <input type="number" class="form-control"  name="letter_number"value="<?=@$data->letter_number  ?>" >
                                        </div>
                                      
                                                                                
                                    </div>
                                </div>  
                                  
                                    <button type="submit"   class="btn btn-success" ><?=(isset($btn_nm))?$btn_nm:'Submit'  ?></button>
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
            $("#page_heading").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace('/\s/g','-');
                Text = Text.replace(/ /g,'-');
                Text = Text.replace(/[^\w-]+/g,'');
                Text = Text.replace(/-{2,}/g, '-');

                $("#page_url").val(Text);    
            });
        });
    </script>

    <script>
       ///// CKEDITOR.replace( 'editor1');
        var editor = CKEDITOR.replace( 'editor1',
        {
            
            format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div'
           
        } );
        CKFinder.setupCKEditor( editor, { basePath : "<?=base_url()?>ckfinder/", rememberLastFolder : false } ) ;
    </script> 


<!-- <script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'">  <div class="form-group row"> <div class="col-sm-3"> <label>Survey Name</label> <input type="text" class="form-control" name="survey_name" id="survey_name"> </div> <div class="col-sm-3"> <label>Sanction Date</label> <input type="date" class="form-control" name="sanction_date" id="sanction_date"> </div> <div class="col-sm-3"> <label>1st Year</label> <input type="text" class="form-control" name="1st_year" id="1st_year"> </div> <div class="col-sm-3"> <label>2nd Year</label> <input type="text" class="form-control" name="2nd_year" id="2nd_year"> </div> <div class="col-sm-3"> <label>3rd Year</label> <input type="text" class="form-control" name="3rd_year" id="3rd_year"> </div> <div class="col-sm-3"> <label>4th Year</label> <input type="text" class="form-control" name="4th_year" id="4th_year"> </div> <div class="col-sm-3"> <label>5th Year</label> <input type="text" class="form-control" name="5th_year" id="5th_year"> </div> <div class="col-sm-3"> <label>Disverse Amount</label> <input type="number" class="form-control" name="diverse_amount" id="diverse_amount"> </div> <div class="col-sm-3"> <label>Disverse Date</label> <input type="date" class="form-control" name="diverse_date" id="diverse_date"> </div> <div class="col-sm-1"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:23px">X</button> </div> </div> </div> ');
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
</script> -->
