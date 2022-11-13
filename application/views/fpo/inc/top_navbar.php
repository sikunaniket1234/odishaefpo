<!-- Loading Container -->
  <!--   <div class="loading-container">
        <div class="loading-progress">
            <div class="rotator">
                <div class="rotator">
                    <div class="rotator colored">
                        <div class="rotator">
                            <div class="rotator colored">
                                <div class="rotator colored"></div>
                                <div class="rotator"></div>
                            </div>
                            <div class="rotator colored"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
    </div> -->
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="<?=base_url('fpo/')  ?>" class="navbar-brand" style="padding-top: 3px;">
                       <!--  <?php
                            if ($settings->company_logo) {
                                ?>
                                    <img src="<?php echo base_url().'uploads/'.$settings->company_logo; ?>" width="190">
                                <?php
                            }
                            else{
                                ?>
                                    <small style="font-size: 38px;">
                                       MY ADMIN
                                    </small>
                                <?php
                            }
                        ?> -->
                        
                        <small style="font-size: 30px;line-height: normal;font-weight: bold;">
                                       FPO PANEL
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->

                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            
                          


                            
                           <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="<?=base_url()  ?>assets/img/avatars/nopic.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span><?=$myinfo->name  ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->


                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a><?=$myinfo->name  ?></a></li>
                                    <li class="email"><a><?=$myinfo->emailId  ?></a></li>
                                    <!--Avatar Area-->
                                    <!-- <li>
                                        <div class="avatar-area">
                                            <img src="<?=base_url()  ?>assets/img/avatars/adam-jansen.jpg" class="avatar">
                                            <span class="caption">CEO</span>
                                        </div>
                                    </li> -->
                                    <li class="edit">
                                        <a href="<?=base_url('fpo/change_password')  ?>" class="pull-left">Change Password</a>
                                    </li>
                                   
                                    <li class="dropdown-footer">
                                        <a href="<?=base_url('fpo/logout')  ?>">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            
                        </ul>
                        
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->