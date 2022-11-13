<div class="page-sidebar" id="sidebar">
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li <?=($this->uri->segment(2)==''  || $this->uri->segment(2)=='index')?'class="active"':''  ?> >
            <a href="<?=base_url('admin/')  ?>">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li> 

        <?php
            $pg_nm = $this->uri->segment(2);
            $mst_urlz = array('client','proj_payment','category_list','category_list_edit','city','city_edit');
        ?>
        
        <li <?=($this->uri->segment(2)=='user_add') || ($this->uri->segment(2)=='user') ?'class="active"':''  ?> >
            <a href="<?=base_url('admin/user')  ?>">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">NGO CREDENTIAL</span>
            </a>
        </li>

        <li <?=($this->uri->segment(2)=='ngo_list') || ($this->uri->segment(2)=='media') ?'class="active"':''  ?> >
            <a href="<?=base_url('admin/ngo_list')  ?>">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">LIST OF NGO/POPI</span>
            </a>
        </li>

        <li <?=($this->uri->segment(2)=='fpo_list') || ($this->uri->segment(2)=='media') ?'class="active"':''  ?> >
            <a href="<?=base_url('admin/fpo_list')  ?>">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">LIST OF FPO</span>
            </a>
        </li>

        <li <?=($this->uri->segment(2)=='ngo_add') || ($this->uri->segment(2)=='media') ?'class="active"':''  ?> >
            <a href="#">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">MANAGE NGO REPORT</span>
            </a>
        </li>

        <li <?=($this->uri->segment(2)=='ngo_add') || ($this->uri->segment(2)=='media') ?'class="active"':''  ?> >
            <a href="#">
                <i class="menu-icon fa fa-user-secret"></i>
                <span class="menu-text">DDM CREDENTIAL</span>
            </a>
        </li>

        <li <?=($this->uri->segment(2)=='rating') || ($this->uri->segment(2)=='media') ?'class="active"':''  ?> >
            <a href="<?=base_url('admin/rating')  ?>">
                <i class="menu-icon fa fa-sort-alpha-asc"></i>
                <span class="menu-text">RATING OF NGO</span>
            </a>
        </li>

         <!-- <li <?=($this->uri->segment(2)=='service_list') || ($this->uri->segment(2)=='service') || ($this->uri->segment(2)=='edit_service')  || ($this->uri->segment(2)=='service_edit')?'class="active open"':''  ?> >

            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-envira"></i>
                <span class="menu-text"> Services </span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li <?=($this->uri->segment(2)=='service_list') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/service_list')  ?>">
                        <span class="menu-text">View All</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='service') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/service')  ?>">
                        <span class="menu-text">Add Service</span>
                    </a>
                </li>
                
            </ul>
        </li>
 -->

        
        <!-- <li <?=($this->uri->segment(2)=='portfolio_edit') || ($this->uri->segment(2)=='portfolio_list') || ($this->uri->segment(2)=='portfolio_add') || ($this->uri->segment(2)=='portfolio_gallery') ?'class="active open"':''  ?> >

            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-folder-open"></i>
                <span class="menu-text"> Portfolio </span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li <?=($this->uri->segment(2)=='portfolio_list') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/portfolio_list')  ?>">
                        <span class="menu-text">View All</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='portfolio_add') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/portfolio_add')  ?>">
                        <span class="menu-text">Add Portfolio</span>
                    </a>
                </li>
                
            </ul>
        </li> -->


         <li <?=($this->uri->segment(2)=='edit_reviews') || ($this->uri->segment(2)=='reviews') || ($this->uri->segment(2)=='add_reviews') ?'class="active open"':''  ?>  style="display: none;">

            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-comments-o"></i>
                <span class="menu-text"> Reviews </span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li <?=($this->uri->segment(2)=='reviews') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/reviews')  ?>">
                        <span class="menu-text">View All</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='add_reviews') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/add_reviews')  ?>">
                        <span class="menu-text">Add Review</span>
                    </a>
                </li>
                
            </ul>
        </li>

        <li <?=($this->uri->segment(2)=='faq') || ($this->uri->segment(2)=='faq_add') || ($this->uri->segment(2)=='faq_edit') ?'class="active open"':''  ?> style="display: none;">

            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-question"></i>
                <span class="menu-text"> FAQ's </span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li <?=($this->uri->segment(2)=='faq') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/faq')  ?>">
                        <span class="menu-text">View All</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='faq_add') ?'class="active"':''  ?>>
                    <a href="<?=base_url('admin/faq_add')  ?>">
                        <span class="menu-text">Add Faq</span>
                    </a>
                </li>
                
            </ul>
        </li>

        

        <li <?=($this->uri->segment(2)=='gallery_list') || ($this->uri->segment(2)=='gallery') ?'class="active"':''  ?> style="display:none;">
            <a href="<?=base_url('admin/gallery_list')  ?>">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text">Gallery</span>
            </a>
        </li>

        <!-- <?php
            $blg_urlz = array('page_list','page','page_edit','banner_list','banner');
        ?>
        <li <?=(in_array($pg_nm, $blg_urlz))?' class="active open" ':''  ?>   > 
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file"></i>
                <span class="menu-text">Pages</span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">  

                <li <?=($this->uri->segment(2)=='page_list')?'class="active"':''  ?> >
                    <a href="<?=base_url('admin/page_list')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Page List</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='page')?'class="active"':''  ?> >
                    <a href="<?=base_url('admin/page')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Add Page</span>
                    </a>
                </li>

            </ul>
         </li> -->  

         <!--country -->
         <?php
            $blg_urlz = array('country_list','country','country_edit');
        ?> 
         <li <?=(in_array($pg_nm, $blg_urlz))?' class="active open" ':''  ?>  style="display: none;" > 
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file"></i>
                <span class="menu-text">Country</span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">  

                <li <?=($this->uri->segment(2)=='country_list')?'class="active"':''  ?> >
                    <a href="<?=base_url('admin/country_list')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Country List</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='country')?'class="active"':''  ?> >
                    <a href="<?=base_url('admin/country')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Add Country</span>
                    </a>
                </li>

            </ul>
         </li>

   



        <?php
            $blog_urlz = array('blog_list','blog','blog_edit','blog_cat','add_blog_cat','edit_blog_cat');
        ?>
        <li <?=(in_array($pg_nm, $blog_urlz))?' class="active open" ':''  ?>   style="display: none;"> 
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
        </li>  

        <li <?=($this->uri->segment(2)=='newsletter') ?'class="active"':''  ?> style="display: none;">
            <a href="<?=base_url('admin/newsletter')  ?>">
                <i class="menu-icon fa fa-envelope-open-o"></i>
                <span class="menu-text">Newsletter Subscribed</span>                
            </a>            
        </li>

        <li <?=($this->uri->segment(2)=='site_settings') ?'class="active"':''  ?> style="display: none;">
            <a href="<?=base_url('admin/site_settings')  ?>">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text">Settings</span>                
            </a>            
        </li>

        <li>
            <a href="<?=base_url('admin/logout')  ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-sign-out"></i>
                <span class="menu-text"> Log Out</span>
            </a>
        </li>                 
    </ul>
</div>           