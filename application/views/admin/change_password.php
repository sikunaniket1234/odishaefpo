<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

                <div class="page-body">
                    
                    <div class="row">



                      <?php include 'inc/flashmsg.php'; ?>

                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6">
                          
                          <div class="well with-header">
                                <div class="header bordered-palegreen">Change Password</div>

                                <form method="post">

                                    <div class="form-group mb-3">
                                        <label for="password">Old Password</label>
                                        <input class="form-control" type="password" name="old_password"  placeholder="Enter Old password">
                                    </div> 

                                     <div class="form-group mb-3">
                                        <label for="password">New Password</label>
                                        <input class="form-control" type="password" name="new_password"  placeholder="Enter New password">
                                    </div>


                                                               

                                    <div class="form-group mb-3 hidden">
                                        <label for="password">Confirm Password</label>
                                        <input class="form-control" type="password"  placeholder="Enter Conform password" name="confirm_password">
                                    </div>

                                    

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Update
                                        </button>
                                    </div>
                                </form>
                           </div>
                            

                        </div> 
                    </div>
                   
               </div>

<?php
      include 'inc/footer-js.php';  
?>

