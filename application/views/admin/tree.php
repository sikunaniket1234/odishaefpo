<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>



<div class="page-body">
   
    <div class="row">
        
        <div class="col-lg-6 col-sm-6 col-xs-6">
            <div class="widget flat radius-bordered">
                <div class="widget-header bg-yellow">
                    <span class="widget-caption">Lined TreeView With Plus/Minus</span>
                    <div class="widget-buttons">
                        <a href="#" data-toggle="collapse">
                            <i class="fa fa-minus"></i>
                        </a>
                        <a href="#" data-toggle="dispose">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="widget-body">
                    <div id="MyTree4" class="tree tree-plus-minus tree-solid-line tree-unselectable">
                        <div class="tree-folder" style="display: none;">
                            <div class="tree-folder-header">
                                <i class="fa fa-folder"></i>
                                <div class="tree-folder-name"></div>
                            </div>
                            <div class="tree-folder-content">
                            </div>
                            <div class="tree-loader" style="display: none;"></div>
                        </div>
                        <div class="tree-item" style="display: none;">
                            <i class="tree-dot"></i>
                            <div class="tree-item-name"></div>
                        </div>
                    <div class="tree-folder" style="display: block;">
                            <div class="tree-folder-header">
                                <i class="fa fa-folder"></i>
                                <div class="tree-folder-name">Projects<div class="tree-actions"><i class="fa fa-plus green"></i><i class="fa fa-trash-o danger"></i><i class="fa fa-rotate-right blizzard"></i></div></div>
                            </div>
                            <div class="tree-folder-content">
                            </div>
                            <div class="tree-loader" style="display: none;"><div class="tree-loading"><i class="fa fa-rotate-right fa-spin"></i></div></div>
                        </div><div class="tree-folder" style="display: block;">
                            <div class="tree-folder-header">
                                <i class="fa fa-folder"></i>
                                <div class="tree-folder-name">Reports<div class="tree-actions"><i class="fa fa-plus green"></i><i class="fa fa-trash-o danger"></i><i class="fa fa-rotate-right blizzard"></i></div></div>
                            </div>
                            <div class="tree-folder-content">
                            </div>
                            <div class="tree-loader" style="display: none;"><div class="tree-loading"><i class="fa fa-rotate-right fa-spin"></i></div></div>
                        </div><div class="tree-item" style="display: block;">
                            <i class="tree-dot"></i>
                            <div class="tree-item-name"><i class="fa fa-user yellow"></i> Member <div class="tree-actions"><i class="fa fa-plus green"></i><i class="fa fa-trash-o danger"></i><i class="fa fa-rotate-right blizzard"></i></div></div>
                        </div><div class="tree-item" style="display: block;">
                            <i class="tree-dot"></i>
                            <div class="tree-item-name"><i class="fa fa-calendar sky"></i> Events <div class="tree-actions"><i class="fa fa-plus green"></i><i class="fa fa-trash-o danger"></i><i class="fa fa-rotate-right blizzard"></i></div></div>
                        </div><div class="tree-item" style="display: block;">
                            <i class="tree-dot"></i>
                            <div class="tree-item-name"><i class="fa fa-suitcase magenta"></i> Portfolio <div class="tree-actions"><i class="fa fa-plus green"></i><i class="fa fa-trash-o danger"></i><i class="fa fa-rotate-right blizzard"></i></div></div>
                        </div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-space"></div>
    
</div>




<script src="<?=base_url()?>assets/js/fuelux/treeview/tree-custom.min.js"></script>

<script src="<?=base_url()?>assets/js/fuelux/treeview/treeview-init.js"></script>


<script>
        jQuery(document).ready(function () {
            UITree.init();
        });
</script>


<?php
      include 'inc/footer-js.php';  
?>