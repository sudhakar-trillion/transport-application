<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?PHP echo base_url();?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transport-web-app</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="resources/template-assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="resources/template-assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="resources/template-assets/css/style.css" rel="stylesheet" />
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="resources/custom-assests/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="resources/custom-assests/css/jquery-ui.css" />


</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="<?PHP echo base_url('dashboard')?>">Transport App </a>
            </div>

            <div class="notifications-wrapper" >
<ul class="nav">
               
         <!--       <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 1</strong>
                                                <span class="pull-right text-muted">60% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 2</strong>
                                                <span class="pull-right text-muted">30% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                    <span class="sr-only">30% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 3</strong>
                                                <span class="pull-right text-muted">80% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete (warning)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 4</strong>
                                                <span class="pull-right text-muted">90% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                    <span class="sr-only">90% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See Tasks List + </strong>
                                    </a>
                                </li>
                            </ul>
                </li> -->
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?PHP echo base_url('edit-profile');?>"><i class="fa fa-user-plus"></i> My Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?PHP echo base_url('logout');?>"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
               
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="resources/template-assets/img/transport.png" class="img-circle" />

                           
                        </div>

                    </li>
                     <li>
                        <a  href="#"> <strong> <?PHP echo ucwords($this->session->userdata('Admin_Name'));?> </strong></a>
                    </li>

                    <li>
                        <a class="<?PHP if($this->uri->segment(1)=="dashboard"){ echo 'active-menu';} ?>"  href="<?PHP echo base_url('dashboard')?>"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    
                    <li>
                        <a style="cursor:pointer"><i class="fa fa-users "></i>Sub Admins<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level <?PHP if($this->uri->segment(1)=="add-sub-admin" || $this->uri->segment(1)=="view-sub-admins" || $this->uri->segment(1)=="edit-sub-admin"){ echo 'collapse in';} ?>">
                            <li>
                        <a  class="<?PHP if($this->uri->segment(1)=="add-sub-admin"){ echo 'active-menu';} ?>" href="<?PHP echo base_url('add-sub-admin'); ?>">Add subadmins</a>
                        
                    </li>
                             <li>
                        <a class="<?PHP if($this->uri->segment(1)=="view-sub-admins"){ echo 'active-menu';} ?>"  href="<?PHP echo base_url('view-sub-admins'); ?>">View subadmins</a>
                        
                    </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a style="cursor:pointer"><i class="fa fa-users "></i>Transport form<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level <?PHP if($this->uri->segment(1)=="add-data"){echo 'collapse in';} ?>">
                            <li>
                        <a class="<?PHP if($this->uri->segment(1)=="add-data"){ echo 'active-menu';} ?>" href="<?PHP echo base_url('add-data'); ?>">Add paymnet</a>
                        
                    </li>
                             <li>
                        <a  href="<?PHP echo base_url('view-data'); ?>">View payment</a>
                        
                    </li>
                            
                        </ul>
                    </li>
                    
                    
                    <li>
                        <a style="cursor:pointer"><i class="fa fa-rupee "></i>Customer Payment<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level <?PHP if($this->uri->segment(1)=="add-customer-payment"){echo 'collapse in';} ?>">
                            <li>
                        <a class="<?PHP if($this->uri->segment(1)=="add-customer-payment"){ echo 'active-menu';} ?>" href="<?PHP echo base_url('add-customer-payment'); ?>">Add payment</a>
                        
                    </li>
                             <li>
                        <a  href="<?PHP echo base_url('view-data'); ?>">View paymnent</a>
                        
                    </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a style="cursor:pointer"><i class="fa fa-car"></i>Driver Payment<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level <?PHP if($this->uri->segment(1)=="add-driver-payment"){echo 'collapse in';} ?>">
                            <li>
                        <a class="<?PHP if($this->uri->segment(1)=="add-driver-payment"){ echo 'active-menu';} ?>" href="<?PHP echo base_url('add-data'); ?>">Add data</a>
                        
                    </li>
                             <li>
                        <a  href="<?PHP echo base_url('view-data'); ?>">View data</a>
                        
                    </li>
                            
                        </ul>
                    </li>
                    
                    
                    
                   <!-- <li>
                        <a href="table.html"><i class="fa fa-bolt "></i>Data Tables </a>
                        
                    </li>
                   
                     
                     <li>
                        <a href="forms.html"><i class="fa fa-code "></i>Forms</a>
                    </li>
                   
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-cogs "></i>Second  Link</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-bullhorn "></i>Second Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third  Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank.html"><i class="fa fa-dashcube "></i>Blank Page</a>
                    </li>-->
                   
                </ul>
            </div>

        </nav>