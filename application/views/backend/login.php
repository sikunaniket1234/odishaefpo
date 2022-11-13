<?php
   include 'inc/metaheader.php';  
?> 
<!--Body-->
<body>
    <div class="login-container animated fadeInDown" style="
    background-image: url(<?=base_url()?>assets/img/login-bg-01.svg),url(<?=base_url()?>assets/img/login-bg-02.svg),linear-gradient(45deg,#30cfd0 0%,#330867 100%);
">

     <form method="post" >
        <div class="loginbox bg-themeprimary" style="padding:20px;"> 
            <div class="loginbox-title">SIGN IN</div>
            <div class="loginbox-social"> 
                <!-- <?php
                    if (isset($settings->company_logo)) {
                        ?>                            
                            <div align="center">
                                <img src="<?=base_url().'uploads/'.$settings->company_logo;?>" class="img-responsive">
                            </div>
                        <?php                    }
                    else{
                        ?>
                            <div align="center">
                                <img src="<?=base_url() ?>frontv2/image/default_user_icon.png" class="img-responsive" height="100">
                            </div>
                        <?php
                    }
                ?> -->

                <!-- loginbg.jpg -->
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or">PANEL</div>
                
            </div> 
            <br/>
            <div class="form-group">
                <span class="input-icon icon-right">
                <input type="text" class="form-control" name="email" placeholder="Email">
                <i class="glyphicon glyphicon-user circular"></i>
                </span>
            </div>
            <div class="form-group">
                <span class="input-icon icon-right">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <i class="fa fa-lock circular"></i>
                </span>
            </div>
            

            <div class="loginbox-submit">
                <input type="submit" class="btn btn-warning btn-block" value="Login">
            </div>
        </div>
        </form>
    </div>








    <!--Basic Scripts-->
    <script src="assets/js/jquery-2.0.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>
</body>
<!--Body Ends-->
</html>
