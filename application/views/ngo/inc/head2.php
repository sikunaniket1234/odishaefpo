<!-- /Head -->
<!-- Body -->
<body>
    
    <?php include ("top_navbar.php"); ?>
    <div class="main-container container-fluid">
        <div class="page-container">
            <?php include ("left_navmenu.php"); ?>
            <div class="page-content">
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Home</a>
                        </li>
                        <li class="active"><?=($this->uri->segment(2)=='index') ?'Dashboard':$this->uri->segment(2)  ?></li>
                    </ul>
                </div>
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            <?php echo (isset($fpo->name)) ? strtoupper($fpo->name) : 'NO FPO SELECTED'; ?>
                        </h1>
                    </div>
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                        <!-- <i class="glyphicon glyphicon-arrow-right success" style="margin-top:15px"></i>
                        <a  id="bootbox-options" href="#" class="tooltip-lg" data-toggle="tooltip" data-placement="top" data-original-title="Large Tooltip">
                            <i class="glyphicon glyphicon-retweet"></i>
                        </a> -->
                    </div>
                </div>



