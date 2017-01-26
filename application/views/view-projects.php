<?php
$name = $this->session->userdata('name');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../brand.ico">

        <title>Aegis Infinite</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>css/navbar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/admin.css" rel="stylesheet">   
        <link href="<?php echo base_url(); ?>css/table.css" rel="stylesheet">   

        <script type="text/javascript" src="<?php echo base_url(); ?>js/filter.js"></script>
        <script src="http://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <style>
            .btn { padding: 9.65px 12px;}
        </style>
    </head>
    <body style="margin: 0px;">
        <!-- NAVBAR -->
        <nav class="navbar" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>images/leidos-logo.png" class="brand"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-search"></span></a>
                            <ul class="dropdown-menu" style="min-width: 300px;">
                                <li>
                                    <div class="col-md-12">
                                        <form class="navbar-form navbar-left" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- END OF NAVBAR -->

        <!-- CONTENT -->
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <h5><i class="fa fa-home fa-fw"></i> Management</h5>   
                        <hr>
                        <li><a href="#"><span class="glyphicon glyphicon-dashboard fa-fw"></span>Dashboard</a></li>
                        <li><a href="<?php echo site_url('admin/add_employee'); ?>"><i class="fa fa-users fa-fw"></i>Employees</a></li>
                        <li><a href="<?php echo site_url('admin/view_projects') ?>"><i class="fa fa-folder-open fa-fw"></i>Projects</a></li>
                        <h5><i class="fa fa-calendar fa-fw"></i> Calendar</h5>   
                        <hr>                        
                        <li><a href="#"><i class="fa fa-calendar fa-fw"></i>Attendance</a></li>
                        <li><a href="#"><i class="fa fa-rocket fa-fw"></i>Leave Applications</a></li>
                        <li><a href="#"><i class="fa fa-sun-o fa-fw"></i>Holidays</a></li>
                        <h5><i class="fa fa-wrench fa-fw"></i> Options</h5>   
                        <hr>
                        <li><a href="#"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
                        <hr>
                    </ul>
                </div>
                <div class="content col-md-9">
                    <h3>Employees</h3>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="view-employees.html">Employees</a></li>
                        <li class="active">Employees List</li>
                    </ol>                        
                    <a href="<?php echo site_url('admin/view_projects'); ?>" role="button" class="btn btn-add-e">View Project
                        <span class="glyphicon glyphicon-folder-open"></span>
                    </a>

                    <a href="<?php echo site_url('admin/add_project'); ?>" role="button" class="btn btn-add-e">Add New Project
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>

                    <hr>
                    <div id="row-table" class="row">
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">
                                <i class="fa fa-users"></i>Employees Database
                                <div class="pull-right">
                                    <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                        <i class="glyphicon glyphicon-filter"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter" />
                            </div>
                            <table class="table table-hover" id="dev-table">
                                <thead>
                                    <tr><th>Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Project Type</th>
                                        <th>Project Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $data) { ?>
                                        <tr>
                                            <td><?php echo $data['title']; ?></td>
                                            <td><?php echo $data['startDate']; ?>
                                            <td><?php echo $data['endDate']; ?></td>
                                            <td><?php echo $data['projectType']; ?><br/></td>
                                            <td><?php echo $data['projLocation']; ?></td>   
                                            <td>
                                                <a href="" class = "btn btn-add-e">
                                                    <i class = "fa fa-pencil"></i>
                                                </a>
                                                <a href="" class="btn btn-add-e">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>   
                                            <!--
                                            <td>kilgore</td>
                                            <td>kilgore</td>
                                            <td>loc</td>
                                            <td><button type="button" class="btn btn-add-e">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </td> -->
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>

                            <div class="panel-footer">
                                <ul class="pagination">
                                    <!-- Show pagination links -->
                                    <?php
                                    foreach ($links as $link) {
                                        echo "<li class='pagination'>" . $link . "</li>";
                                    }
                                    ?>
                                </ul>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <!-- END OF CONTENT -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/filter.js"></script>
        <script>
            function popUp() {
                var popup = document.getElementById('myPopup');
                popup.classList.toggle('show');
            }
        </script>
    </body>
</html>