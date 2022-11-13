<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>
<link href="<?=base_url()  ?>/slimcrop/slim/slim.min.css" rel="stylesheet">
<script src="<?=base_url()  ?>/slimcrop/slim/slim.kickstart.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>




     <div class="page-body">                    
        <div class="row">                      
            
            <div class="col-md-5">

                <?php include 'inc/flashmsg.php'; ?>
                <div class="well with-header">
                    <div class="header bordered-palegreen">Add Market Outlet</div>
                    
                    <form class="form-horizontal"  method="post" role="form" enctype="multipart/form-data">
                                <div id="dynamic_field">
                                    <div class="form-group row">

                                        <div class="col-sm-7">
                                            <label>Location Name</label>
                                           <input type="text" class="form-control"  name="location[]" id="location"autocomplete="off">
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
                <div class="col-md-7">
                      <table class="table table-bordered table-hover">

                        <thead>
                            <tr class="text-uppercase">
                                <th>
                                   SL NO.
                                </th>
                                <th>
                                    Location Name
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
                                    <td class="col-md-9"><?php echo $value->location_name; ?></td>                          
                                    <td class="col-md-2">
                                        <!-- <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-pencil"></i> </a>  -->
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure want to Delete?')"  href="<?=base_url('fpo/market_outlet_delete/'.$value->id)  ?>"><i class="fa fa-trash-o"></i> </a>
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
           $('#dynamic_field').append('<div id="row'+i+'">  <div class="form-group row"> <div class="col-sm-7"> <label>Location Name</label> <input type="text" class="form-control" name="location[]" id="location"autocomplete="off"> </div><div class="col-sm-1"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:23px">X</button> </div> </div> </div> ');
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
