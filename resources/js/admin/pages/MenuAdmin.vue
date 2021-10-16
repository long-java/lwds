<template>
    
    <div>
        <body>
            <section id="container" >
            <!--header start-->
            <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">

                <a href="index.html" class="logo">
                    <img src="images/logo.png" alt="">
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="" href="#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-success">8</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <li>
                                <p class="">You have 8 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Target Sell</h5>
                                            <p>25% , Deadline  12 June’13</p>
                                        </div>
                                                <span class="notification-pie-chart pull-right" data-percent="45">
                                        <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>


                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="" href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-important">4</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <li>
                                <p class="red">You have 4 Mails</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                                            <span class="subject">
                                            <span class="from">Jonathan Smith</span>
                                            <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                            Hello, this is an example msg.
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="" href="#">

                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-warning">3</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <li>
                                <p>Notifications</p>
                            </li>
                            <li>
                                <div class="alert alert-info clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #1 overloaded.</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="alert alert-danger clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #2 overloaded.</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="alert alert-success clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #3 overloaded.</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="https://scontent.fhan14-1.fna.fbcdn.net/v/t1.6435-1/c0.17.160.160a/p160x160/146499599_1819502324892968_7953567518336701893_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=7206a8&_nc_ohc=Ur2xBCEqBrsAX8KJ1MD&_nc_ht=scontent.fhan14-1.fna&oh=b6aaf8c93091d3ee533b80eea57904c7&oe=618E5430">
                            <span class="username">John Doe</span>
                            <!-- <b class="caret"></b> -->
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                    <li>
                        <div class="toggle-right-box">
                            <div class="fa fa-bars"></div>
                        </div>
                    </li>
                </ul>
                <!--search & user info end-->
            </div>
            </header>
            <!--header end-->
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <!-- sidebar menu start-->            
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a href="index.html"  class="active">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-laptop"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="sub">
                                <li><a href="boxed_page.html">Boxed Page</a></li>
                                <li><a href="horizontal_menu.html">Horizontal Menu</a></li>
                            </ul>
                        </li>


                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>UI Elements</span>
                            </a>
                            <ul class="sub">
                                <li><a href="general.html">General</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="fontawesome.html">
                                <i class="fa fa-bullhorn"></i>
                                <span>Fontawesome </span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Data Tables</span>
                            </a>
                            <ul class="sub">
                                <li><a href="basic_table.html">Basic Table</a></li>
                                <li><a href="responsive_table.html">Responsive Table</a></li>
                                <li><a href="dynamic_table.html">Dynamic Table</a></li>
                                <li><a href="editable_table.html">Editable Table</a></li>
                            </ul>
                        </li>
 
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope"></i>
                                <span>Mail </span>
                            </a>
                            <ul class="sub">
                                <li><a href="mail.html">Inbox</a></li>
                                <li><a href="mail_compose.html">Compose Mail</a></li>
                                <li><a href="mail_view.html">View Mail</a></li>
                            </ul>
                        </li>
 

                        <li>
                            <a href="login.html">
                                <i class="fa fa-user"></i>
                                <span>Login Page</span>
                            </a>
                        </li>
                    </ul></div>        
            <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
                <!--main content start-->
                <section id="main-content">
                    <section class="wrapper">
                    <!-- page start-->
                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Customize Graph
                                    <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                                        <a href="javascript:;" class="fa fa-cog"></a>
                                        <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
                                    </header>
                                    <div class="panel-body">
                                        <div id="graph-area"></div>
                                    </div>
                                </section>
                            </div>
                        </div> -->

                        <router-view></router-view>


                    <!-- page end-->
                    </section>
                </section>
                <!--main content end-->
            <!--right sidebar start-->
            <div class="right-sidebar">
            <div class="search-row">
                <input type="text" placeholder="Search" class="form-control">
            </div>
            <div class="right-stat-bar">
            <ul class="right-side-accordion">
            <li class="widget-collapsible">
                <a href="#" class="head widget-head red-bg active clearfix">
                    <span class="pull-left">work progress (5)</span>
                    <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                </a>
                <ul class="widget-container">
                    <li>
                        <div class="prog-row side-mini-stat clearfix">
                            <div class="side-graph-info">
                                <h4>Target sell</h4>
                                <p>
                                    25%, Deadline 12 june 13
                                </p>
                            </div>
                            <div class="side-mini-graph">
                                <div class="target-sell">
                                </div>
                            </div>
                        </div>

                    </li>
                </ul>
            </li>
            <li class="widget-collapsible">
                <a href="#" class="head widget-head terques-bg active clearfix">
                    <span class="pull-left">contact online (5)</span>
                    <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                </a>
                <ul class="widget-container">
                    <li>
                        <div class="prog-row">
                            <div class="user-thumb">
                                <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                            </div>
                            <div class="user-details">
                                <h4><a href="#">Jonathan Smith</a></h4>
                                <p>
                                    Work for fun
                                </p>
                            </div>
                            <div class="user-status text-danger">
                                <i class="fa fa-comments-o"></i>
                            </div>
                        </div>

                        <p class="text-center">
                            <a href="#" class="view-btn">View all Contacts</a>
                        </p>
                    </li>
                </ul>
            </li>
            <li class="widget-collapsible">
                <a href="#" class="head widget-head purple-bg active">
                    <span class="pull-left"> recent activity (3)</span>
                    <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                </a>
                <ul class="widget-container">
                    <li>
                        <div class="prog-row">
                            <div class="user-thumb rsn-activity">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="rsn-details ">
                                <p class="text-muted">
                                    just now
                                </p>
                                <p>
                                    <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                                </p>
                            </div>
                        </div>
  
                    </li>
                </ul>
            </li>
            <li class="widget-collapsible">
                <a href="#" class="head widget-head yellow-bg active">
                    <span class="pull-left"> shipment status</span>
                    <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                </a>
                <ul class="widget-container">
                    <li>
                        <div class="col-md-12">
                            <div class="prog-row">
                                <p>
                                    Full sleeve baby wear (SL: 17665)
                                </p>
                                <div class="progress progress-xs mtop10">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row">
                                <p>
                                    Full sleeve baby wear (SL: 17665)
                                </p>
                                <div class="progress progress-xs mtop10">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        <span class="sr-only">70% Completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            </ul>
            </div>
            </div>
            <!--right sidebar end-->

            </section>

        </body>
    </div>

</template>


<script>
    export default {
        

    }
</script>


<script>
    

</script>















<style scoped src="../assets/bs3/css/bootstrap.min.css"></style>
<style scoped src="../assets/css/bootstrap-reset.css"></style>
<style scoped src="../assets/font-awesome/css/font-awesome.css"></style>
<style scoped src="../assets/css/style.css"></style>
<style scoped src="../assets/css/style-responsive.css"></style>


<style scoped>
    #sidebar{
        width: 200px;
    }

    #main-content{
        margin-left: 200px;
    }

    .brand{
        width: 200px;
    }



</style>


