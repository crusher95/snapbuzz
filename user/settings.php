<?php
session_start();
if (empty($_SESSION['user']['SnapID'])) {
   header("Location:../index.html#prettyPhoto[iframes]/0/");
}
?>
<html>
<head>
    <title>SnapBuzz | Dashboard Settings</title>
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
</head>
<body>
    <div>
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <a id="logo" href="dashboard.php" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">SnapBuzz</span></a></div>
            <div class="topbar-main">      
                
                <div class="news-update-box hidden-xs">
                                  <ul id="news-update" class="ticker list-unstyled">
                        <li>Welcome to SnapBuzz</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li id="topbar-chat" class="hidden-xs"><a href="logout.php" data-step="4" data-position="left" class="btn-chat"><i class="fa fa-lock"></i></a></li>
                </ul>
            </div>
        </nav>
        </div>
        
        <!--END TOPBAR-->
        
        <div id="wrapper">
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                    <li><a href="dashboard.php"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
                    <li><a href="album.php"><i class="fa fa-image fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Albums</span></a>
                       
                    </li>
                    <li class="active"><a href="settings.php"><i class="fa fa-cogs fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Settings</span></a>
                       
                    </li>
                </ul>
            </div>
        </nav>

            <!--END SIDEBAR MENU-->

            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Settings</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Settings</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Settings</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                
                                            <div class="col-md-12">
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
                                            </div>
                                
                            </div>

                            <div class="col-lg-12">
                              
                                    
                              <div class="row">
                    <div class="col-md-12"><h2>Profile: <?php echo strtoupper($_SESSION['user']['name']);?></h2>

                        <div class="row mtl">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="text-center mbl"><?php echo "<img src='images/avatar/".$_SESSION['user']['avatar'].".png' class='img-responsive'/>";?></div>
                                    <div class="text-center mbl"></div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td>User Name</td>
                                        <td><?php echo $_SESSION['user']['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><span class="label label-success"><?php echo $_SESSION['user']['email'];?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td><?php echo $_SESSION['user']['mobile'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Snap ID</td>
                                        <td><span class="label label-success"><?php echo $_SESSION['user']['SnapID'];?></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-9">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-edit" data-toggle="tab">Edit Profile</a></li>
                               </ul>
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
                                <?php
                                    if (isset($_POST['finish'])) {
                                        require_once('connection.php');
                                        $email=$_POST['email'];
                                        $mobile=$_POST['mobile'];
                                        $name=$_POST['name'];
                                        $snapid=$_SESSION['user']['SnapID'];
                                        $query=mysqli_query($con,"UPDATE `snapbuzz`.`users` SET `name` = '$name',`email`='$email',`mobile`='$mobile' WHERE `users`.`SnapID` = '$snapid'");
                                        if ($query) {
                                            echo "<script type='text/javascript'>alert('Update Successfull!');</script>";
                                        }else{
                                            echo "<script type='text/javascript'>alert('Update UnSuccessfull!');</script>";
                                        }
                                    }
                                ?>
                                        <form action="#" class="form-horizontal" method="post"><h3>Account Setting</h3>

                                            <div class="form-group"><label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?php echo "<input type='email' value='".$_SESSION['user']['email']."' class='form-control' name='email'/>"?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Username</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?php echo "<input type='text' value='".$_SESSION['user']['name']."' class='form-control' name='name'/>"?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-3 control-label">Mobile</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-4"><?php echo "<input type='number' value='".$_SESSION['user']['mobile']."' class='form-control' name='mobile'/>"?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <button type="submit" class="btn btn-green btn-block" name="finish">Finish</button>
                                        </form>
                                    </div>
                                   
                        </div>
                    </div>
                </div>
                              
                                </div>
                                
                            
                     
                            
                        </div>
                    </div>
                </div>
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                        <div id="footer">
                    <div class="copyright">
                        2015 &copy; SnapBuzz-<a href="http://fb.me/ud.thewon" target="_blank">Utkarsh Dhawan</a></div>
                </div>
                <!--END FOOTER-->
    </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    <script src="script/jquery-1.10.2.min.js"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/bootstrap-hover-dropdown.js"></script>
    <script src="script/html5shiv.js"></script>
    <script src="script/respond.min.js"></script>
    <script src="script/jquery.metisMenu.js"></script>
    <script src="script/jquery.slimscroll.js"></script>
    <script src="script/jquery.cookie.js"></script>
    <script src="script/icheck.min.js"></script>
    <script src="script/custom.min.js"></script>
    <script src="script/jquery.news-ticker.js"></script>
    <script src="script/jquery.menu.js"></script>
    <script src="script/pace.min.js"></script>
    <script src="script/holder.js"></script>
    <script src="script/responsive-tabs.js"></script>
    <script src="script/jquery.flot.js"></script>
    <script src="script/jquery.flot.categories.js"></script>
    <script src="script/jquery.flot.pie.js"></script>
    <script src="script/jquery.flot.tooltip.js"></script>
    <script src="script/jquery.flot.resize.js"></script>
    <script src="script/jquery.flot.fillbetween.js"></script>
    <script src="script/jquery.flot.stack.js"></script>
    <script src="script/jquery.flot.spline.js"></script>
    <script src="script/zabuto_calendar.min.js"></script>

    <script src="script/index.js"></script>
    <script src="script/main.js"></script>
    <script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-145464-12', 'auto');
        ga('send', 'pageview');


</script>
</body>
</html>
