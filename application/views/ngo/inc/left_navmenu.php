<div class="page-sidebar" id="sidebar" >

    <?php
        if (isset($fpo)) {
    ?>
                               
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li <?=($this->uri->segment(2)==''  || $this->uri->segment(2)=='index')?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/')  ?>">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li> 
         <?php
            $pg_nm = $this->uri->segment(2);
            $mst_urlz = array('client','proj_payment','category_list','category_list_edit','city','city_edit');
        ?>
        <li <?=($this->uri->segment(2)=='fpo_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/fpo_list')  ?>">
                <i class="menu-icon fa fa-bar-chart-o"></i>
                <span class="menu-text">FPO CREATION</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='financial_sanction_list'||$this->uri->segment(2)=='financial_sanction_add') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/financial_sanction_list')  ?>">
                <i class="menu-icon fa fa-line-chart"></i>
                <span class="menu-text">FINANCIAL SANCTION</span>                
            </a>            
        </li> 

        <!-- Board Of Director -->
        <?php
            $blg_urlz = array('bod_list','bod_add','bod_edit');
        ?> 
         <li <?=(in_array($pg_nm, $blg_urlz))?' class="active open" ':''  ?>   > 
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user-secret"></i>
                <span class="menu-text">Board Of Director</span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">  

                <li <?=($this->uri->segment(2)=='bod_list')?'class="active"':''  ?> >
                    <a href="<?=base_url('ngo/bod_list')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text"> List</span>
                    </a>
                </li>

                <li <?=($this->uri->segment(2)=='bod_add')?'class="active"':''  ?> >
                    <a href="<?=base_url('ngo/bod_add')  ?>">
                        <i class="menu-icon fa fa-bolt"></i>
                        <span class="menu-text">Add </span>
                    </a>
                </li>

            </ul>
         </li> 


        <li <?=($this->uri->segment(2)=='ceo'  || $this->uri->segment(2)=='ceo_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/ceo_list')  ?>">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">CEO Details</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='major_activity_add') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/major_activity_add')  ?>">
                <i class="menu-icon fa fa-paper-plane"></i>
                <span class="menu-text">Major Activities</span>                
            </a>            
        </li> 


        <li <?=($this->uri->segment(2)=='turnover_add'|| $this->uri->segment(2)=='turnover_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/turnover_list')  ?>">
                <i class="menu-icon glyphicon glyphicon-stats"></i>
                <span class="menu-text">Annual Turnover</span>                
            </a>            
        </li> 
         

        <li <?=($this->uri->segment(2)=='credit_linkage_add'|| $this->uri->segment(2)=='credit_linkage_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/credit_linkage_list')  ?>">
                <i class="menu-icon fa fa-credit-card"></i>
                <span class="menu-text">CREDIT LINKAGE</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='training_add'||$this->uri->segment(2)=='training_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/training_list')  ?>">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">TRAINING CONDUCTED</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='meeting_add'||$this->uri->segment(2)=='meeting_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/meeting_list')  ?>">
                <i class="menu-icon fa fa-calendar"></i>
                <span class="menu-text">MEETING CONDUCTED</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='exposure_visit_add'||$this->uri->segment(2)=='exposure_visit_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/exposure_visit_list')  ?>">
                <i class="menu-icon  glyphicon glyphicon-asterisk"></i>
                <span class="menu-text">EXPOSURE VISITS</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='convergence_add'||$this->uri->segment(2)=='convergence_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/convergence_list')  ?>">
                <i class="menu-icon fa fa-leaf"></i>
                <span class="menu-text">CONVERGENCE</span>                
            </a>            
        </li> 

        

        <li <?=($this->uri->segment(2)=='roc_add'||$this->uri->segment(2)=='roc_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/roc_list')  ?>">
                <i class="menu-icon fa fa-flash"></i>
                <span class="menu-text">STATUS OF ROC FILLING</span>                
            </a>            
        </li> 
    
        <li <?=($this->uri->segment(2)=='auditing_firm_add'||$this->uri->segment(2)=='auditing_firm_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/auditing_firm_list')  ?>">
                <i class="menu-icon fa fa-newspaper-o"></i>
                <span class="menu-text">AUDITING FIRM DETAILS</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='nabfpo_add') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/nabfpo_add')  ?>">
                <i class="menu-icon fa fa-cubes"></i>
                <span class="menu-text">NABFPO PORTAL UPDATE</span>                
            </a>            
        </li> 

        

        <li <?=($this->uri->segment(2)=='success_story_add'||$this->uri->segment(2)=='success_story_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/success_story_list')  ?>">
                <i class="menu-icon fa fa-pencil"></i>
                <span class="menu-text">SUCCESS STORIES</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='rating') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/rating')  ?>">
                <i class="menu-icon fa fa-sort-alpha-asc"></i>
                <span class="menu-text">RATING OF FPO</span>                
            </a>            
        </li> 

        <li <?=($this->uri->segment(2)=='credit') ?'class="active"':''  ?> >
            <a href="#">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">REPORT / LIST / VIEW</span>                
            </a>            
        </li> 


        <li>
            <a href="<?=base_url('ngo/logout')  ?>" class="menu-dropdown">
                <i class="menu-icon fa fa-sign-out"></i>
                <span class="menu-text"> Log Out</span>
            </a>
        </li>                 
    </ul>                       



    <?php
        }
        else{
    ?>
                         
    <ul class="nav sidebar-menu">      
         <!--Dashboard-->
         <li <?=($this->uri->segment(2)==''  || $this->uri->segment(2)=='index')?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/')  ?>">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li> 
         <?php
            $pg_nm = $this->uri->segment(2);
            $mst_urlz = array('client','proj_payment','category_list','category_list_edit','city','city_edit');
        ?>
        <li <?=($this->uri->segment(2)=='fpo_list') ?'class="active"':''  ?> >
            <a href="<?=base_url('ngo/fpo_list')  ?>">
                <i class="menu-icon fa fa-bar-chart-o"></i>
                <span class="menu-text">FPO CREATION</span>                
            </a>            
        </li> 
    </ul>

            <?php
        }
    ?> 






    
</div>           