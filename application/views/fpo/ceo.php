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
                    <div class="header bordered-palegreen">Add <?=@$ext_hd ?> CEO</div>
                    
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        
                                       
                                        <div class="col-sm-3">
                                            <label>Name*</label>
                                            <input type="text" class="form-control"  name="name" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Gender*</label>
                                            <select required class="form-control" name="gender" >
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Educational Qualification*</label>
                                           <!--  <input type="text" class="form-control" name="educationalQualification"  required> -->
                                            <select required class="form-control" name="educationalQualification" >
                                                <option value="" selected="selected" disabled="disabled">-- select one --</option>
                                                <option value="No formal education">No formal education</option>
                                                <option value="Primary education">Primary education</option>
                                                <option value="Secondary education">Secondary education or high school</option>
                                                <option value="Bachelor's degree">Bachelor's degree</option>
                                                <option value="Master's degree">Master's degree</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Email Id</label>
                                            <input type="email" class="form-control" name="email"  >
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Mobile No</label>
                                            <input type="text" class="form-control mobile-valid" name="mobileNo" title="10 digit mobile number"  >
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Date of appointment</label>
                                            <input type="date" class="form-control" name="dateOfAppointment"  >
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-6" style="float: left;">
                                                <label>Profile Image</label>
                                                
                                                    <div class="slim" style="width:180px; height:120px;"
                                                         data-meta-user-id="1230"
                                                         data-ratio="434:290"
                                                         data-size="434,290"
                                                        >
                                                        <input type="file" name="profileImage" >
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



