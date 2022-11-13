
<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>


                <div class="page-body">    

                 

                    
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">All Admin List</span>
                                    <div class="widget-buttons">
                            <a class="btn btn-success" href="<?=base_url('admin/script_page')  ?>" >
                                            ADD
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="widget-body">
                                    
                 <div id="print_table">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Slno</th>
                                <th>Name</th>
                                <th style="width:400px;">Details</th>
                                
                                <th>Action</th>                                                
                            </tr>
                        </thead>

                        <tbody>     
							     <?=$alldata  ?> 
                        </tbody>
                    </table>
                  </div>  
                     

                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

<?php
      include 'inc/footer-js.php';  
?>

