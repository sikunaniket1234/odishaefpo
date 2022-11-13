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
                    <div class="header bordered-palegreen">Add Annual Turnover Report</div>
                    
                    <form class="form-horizontal"  method="post" role="form" enctype="multipart/form-data">
                                <div id="dynamic_field">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-3">
                                            <label>Year Date</label>
                                            <select name="year_date[]" id="year_date" class="form-control">
                                              <option disbled>Select</option>
                                              <option value="2019-2020">2019-2020</option>
                                              <option value="2020-2021">2020-2021</option>
                                              <option value="2021-2022">2021-2022</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Input Sale</label>
                                            <input type="number" class="form-control"  name="input_sale[]" id="input_sale"autocomplete="off">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Output Sale</label>
                                            <input type="number" class="form-control"  name="output_sale[]" id="output_sale"autocomplete="off">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Audit report</label>
                                            <input type="file" class="form-control"  name="audit_report[]" id="audit_report"autocomplete="off">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Profit</label>
                                            <input type="text" class="form-control"  name="profit[]" id="profit"autocomplete="off">
                                        </div>
                                        
                                     
                                        <div class="col-sm-3">
                                            <label>Loss</label>
                                            <input type="text" class="form-control" name="loss[]" id="loss"autocomplete="off" >
                                        </div>

                                        
                                        <div class="col-sm-1">
                                           <button type="button" name="add" id="add" class="btn btn-success" style="margin-top: 23px">Add More</button>
                                        </div>
                                                                                
                                    </div>
                                </div>  
                                  
                                    <button type="submit" name="submit" id="submit"  class="btn btn-success" value="Submit">Submit</button>
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


<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'"> <div class="form-group row"> <div class="col-sm-3"> <label>Year Date</label> <select name="year_date[]" id="year_date" class="form-control"> <option disbled>Select</option> <option value="2019-2020">2019-2020</option> <option value="2020-2021">2020-2021</option> <option value="2021-2022">2021-2022</option> </select> </div> <div class="col-sm-3"> <label>Input Sale</label> <input type="number" class="form-control" name="input_sale[]" id="input_sale"autocomplete="off"> </div> <div class="col-sm-3"> <label>Output Sale</label> <input type="number" class="form-control" name="output_sale[]" id="output_sale"autocomplete="off"> </div> <div class="col-sm-3"> <label>Audit report</label> <input type="file" class="form-control" name="audit_report[]" id="audit_report"autocomplete="off"> </div> <div class="col-sm-3"> <label>Profit</label> <input type="number" class="form-control" name="profit[]" id="profit"autocomplete="off"> </div> <div class="col-sm-3"> <label>Loss</label> <input type="number" class="form-control" name="loss[]" id="loss"autocomplete="off" > </div> <div class="col-sm-1"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:23px">X</button> </div> </div> </div> ');
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
