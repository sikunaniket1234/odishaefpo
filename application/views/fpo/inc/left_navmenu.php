<div class="page-sidebar" id="sidebar">
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li <?=($this->uri->segment(2)==''  || $this->uri->segment(2)=='index')?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/')  ?>">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li> 
         <?php
            $pg_nm = $this->uri->segment(2);
            $mst_urlz = array('client','proj_payment','category_list','category_list_edit','city','city_edit');
        ?>
        



  

        <li <?=($this->uri->segment(2)=='bank_details_list'||$this->uri->segment(2)=='bank_details_add'||$this->uri->segment(2)=='bank_details_edit') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/bank_details_list')  ?>">
                <i class="menu-icon fa fa-bank"></i>
                <span class="menu-text">Bank Details FPO</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='share_holder_capital_list'||$this->uri->segment(2)=='share_holder_capital_add'||$this->uri->segment(2)=='share_holder_capital_edit') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/share_holder_capital_list')  ?>">
                <i class="menu-icon fa fa-line-chart"></i>
                <span class="menu-text">Share Holder / Capital </span>                
            </a>            
        </li> 

       <!--  <li <?=($this->uri->segment(2)=='newsletter') ?'class="active"':''  ?> >
            <a href="#">
                <i class="menu-icon fa fa-money"></i>
                <span class="menu-text">Paid up Share Capital</span>                
            </a>            
        </li>  -->


        <!--Product Basket -->
        <?php
            $blg_urlz = array('product_list','product_add','product_edit');
        ?> 
         <li <?=(in_array($pg_nm, $blg_urlz))?' class="active open" ':''  ?>   > 
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-cart-plus"></i>
                <span class="menu-text">Product Basket</span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">  

                <li <?=($this->uri->segment(2)=='product_list')?'class="active"':''  ?> >
                    <a href="<?=base_url('fpo/product_list')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text"> List</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='product_add')?'class="active"':''  ?> >
                    <a href="<?=base_url('fpo/product_add')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Add </span>
                    </a>
                </li>

            </ul>
         </li> 


         <!-- <li <?=($this->uri->segment(2)=='marketing_agency_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/marketing_agency_list')  ?>">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">Marketing Agency</span>                
            </a>            
        </li>  -->

        <!--Product Basket -->
        <?php
            $blg_urlz = array('marketing_agency_list','marketing_agency_add','value_addition_of_products','market_outlet_add','business_plan_add','business_plan_list');
        ?> 
         <li <?=(in_array($pg_nm, $blg_urlz))?' class="active open" ':''  ?>   > 
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">Marketing Agency</span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">  

                <li <?=($this->uri->segment(2)=='marketing_agency_list'||$this->uri->segment(2)=='marketing_agency_add')?'class="active"':''  ?> >
                    <a href="<?=base_url('fpo/marketing_agency_list')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Marketing Agency </span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='value_addition_of_products')?'class="active"':''  ?> >
                    <a href="<?=base_url('fpo/value_addition_of_products')  ?>">
                        <i class="menu-icon fa fa-rocket"></i>
                        <span class="menu-text">Value Addition </span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='market_outlet_add')?'class="active"':''  ?> >
                    <a href="<?=base_url('fpo/market_outlet_add')  ?>">
                        <i class="menu-icon fa fa-globe"></i>
                        <span class="menu-text">Market Outlet </span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='business_plan_add'||$this->uri->segment(2)=='business_plan_list')?'class="active"':''  ?> >
                    <a href="<?=base_url('fpo/business_plan_list')  ?>">
                        <i class="menu-icon fa fa-pie-chart"></i>
                        <span class="menu-text">Business Plan </span>
                    </a>
                </li>

            </ul>
         </li> 

        <li <?=($this->uri->segment(2)=='license_list'||$this->uri->segment(2)=='license_add'||$this->uri->segment(2)=='license_edit') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/license_list')  ?>">
                <i class="menu-icon fa fa-legal"></i>
                <span class="menu-text">Licence Details</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='storage_facilities_add'||$this->uri->segment(2)=='storage_facilities_list'||$this->uri->segment(2)=='storage_facilities_edit') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/storage_facilities_list')  ?>">
                <i class="menu-icon fa fa-bitbucket"></i>
                <span class="menu-text">STORAGE FACILITY</span>                
            </a>            
        </li> 


        <li <?=($this->uri->segment(2)=='equipment_add'||$this->uri->segment(2)=='equipment_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/equipment_list')  ?>">
                <i class="menu-icon fa fa-building"></i>
                <span class="menu-text">INFRASTRUCTURE OF FPO</span>                
            </a>            
        </li> 


        <li <?=($this->uri->segment(2)=='registered_maintenance_add'||$this->uri->segment(2)=='registered_maintenance_list'||$this->uri->segment(2)=='registered_maintenance_edit') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/registered_maintenance_list')  ?>">
                <i class="menu-icon fa fa-certificate"></i>
                <span class="menu-text">REGISTER MAINTENANCE</span>                
            </a>            
        </li> 

        <!-- <li <?=($this->uri->segment(2)=='value_addition_of_products') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/value_addition_of_products')  ?>">
                <i class="menu-icon fa fa-rocket"></i>
                <span class="menu-text">Value Addition </span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='market_outlet_add'||$this->uri->segment(2)=='market_outlet_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/market_outlet_add')  ?>">
                <i class="menu-icon fa fa-globe"></i>
                <span class="menu-text">Market Outlet</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='business_plan_add'||$this->uri->segment(2)=='business_plan_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/business_plan_add')  ?>">
                <i class="menu-icon fa fa-pie-chart"></i>
                <span class="menu-text">Business Plan</span>                
            </a>            
        </li>  -->

        <li <?=($this->uri->segment(2)=='success_story_list'||$this->uri->segment(2)=='success_story_add') ?'class="active"':''  ?> >
            <a href="<?=base_url('fpo/success_story_list')  ?>">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text">SUCCESS STORIES</span>                
            </a>            
        </li> 
        <li <?=($this->uri->segment(2)=='expenditure') ?'class="active"':''  ?> >
            <a href="#">
                <i class="menu-icon fa fa-money"></i>
                <span class="menu-text">INCOME & EXPENDITURE</span>                
            </a>            
        </li> 
        <li <?=($this->uri->segment(2)=='report') ?'class="active"':''  ?> >
            <a href="#">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">REPORT</span>                
            </a>            
        </li> 

























   <!--      <?php
            $blog_urlz = array('blog_list','blog','blog_edit','blog_cat','add_blog_cat','edit_blog_cat');
        ?>
        <li <?=(in_array($pg_nm, $blog_urlz))?' class="active open" ':''  ?>   > 
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-globe"></i>
                <span class="menu-text">Blog</span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu"> 

                <li <?=($this->uri->segment(2)=='blog_cat')?'class="active"':''  ?> >
                    <a href="<?=base_url('admin/blog_cat')  ?>">
                        <i class="menu-icon glyphicon glyphicon-tasks"></i>
                        <span class="menu-text">Categories</span>
                    </a>
                </li>

               

                <li <?=($this->uri->segment(2)=='blog_list')?'class="active"':''  ?> >
                    <a href="<?=base_url('admin/blog_list')  ?>">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text">Blog List</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='blog')?'class="active"':''  ?> >
                    <a href="<?=base_url('admin/blog')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Add Blog</span>
                    </a>
                </li>               

            </ul>
        </li>   -->

        <!-- <li <?=($this->uri->segment(2)=='newsletter') ?'class="active"':''  ?> >
            <a href="<?=base_url('admin/newsletter')  ?>">
                <i class="menu-icon fa fa-envelope-open-o"></i>
                <span class="menu-text">Newsletter Subscribed</span>                
            </a>            
        </li> -->

        <!-- <li <?=($this->uri->segment(2)=='site_settings') ?'class="active"':''  ?> >
            <a href="<?=base_url('admin/site_settings')  ?>">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text">Settings</span>                
            </a>            
        </li> -->

        <li>
            <a href="<?=base_url('fpo/logout')  ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-sign-out"></i>
                <span class="menu-text"> Log Out</span>
            </a>
        </li>                 
    </ul>
</div>           