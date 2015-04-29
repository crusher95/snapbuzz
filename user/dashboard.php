<?php
session_start();
if (empty($_SESSION['user']['SnapID'])) {
   header("Location:../index.html#prettyPhoto[iframes]/0/");
}
?>
<html>
<head>
    <title>SnapBuzz | Dashboard</title>
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
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
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
                        <li>Welcome to SnapBuzz - One Stop Destination for Awesomeness</li>
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
                    <li class="active"><a href="dashboard.php"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
                    <li><a href="album.php"><i class="fa fa-image fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Albums</span></a>
                       
                    </li>
                    <li><a href="settings.php"><i class="fa fa-cogs fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Settings</span></a>
                       
                    </li>
                </ul>
            </div>
        </nav>

            <!--END SIDEBAR MENU-->
        
            <div id="page-wrapper">
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Dashboard</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Dashboard</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
        
                <!--BEGIN CONTENT-->
                <div class="page-content">
                        <div class="row mbl">
                            <div class="col-lg-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="profile">
                                            <div style="margin-bottom: 15px" class="row">
                                                <div class="col-xs-12 col-sm-8">
                                                    <h2>
                                                       <?php
                                                        require_once('connection.php');
                                                        $snapid=$_SESSION['user']['SnapID'];
                                                        $avatar=mysqli_query($con,"SELECT * from `users` where `SnapID`='$snapid'");
                                                        $afetch=mysqli_fetch_assoc($avatar);
                                                    ?>
                                                        <?php
                                                             echo strtoupper($afetch['name']);
                                                        ?>
                                                        </h2>
                                                    <p>
                                                        <strong>Mobile:</strong> <?php echo $afetch['mobile'];?></p>
                                                    <p>
                                                        <strong class="mrs">Email:</strong><span class="label label-green mrs"><?php echo $_SESSION['user']['email'];?></span>
                                               </div>
                                                <div class="col-xs-12 col-sm-4 text-center">
                                                 
                                                    <figure><?php echo ("<img src='images/avatar/".$afetch['avatar']."' alt='' style='display: inline-block' class='img-responsive img-circle'/>");?>
                                                </figure>
                                                </div>
                                            </div>
                                                                                  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="portlet box">
                                    <div class="portlet-header">
                                        <div class="caption">
                                            Last Upload</div>
                                    </div>
                                    <div style="overflow: scroll; padding:10px; margin:10px;">
                                        <?php
                                            require_once('connection.php');
                                            $recent=mysqli_query($con,"SELECT * from `uploads` where `time`=(SELECT max(`time`) from `uploads`) limit 0,4");
                                            while($recentfetch=mysqli_fetch_assoc($recent))
                                            echo "<a href='albums/".$recentfetch['albumid']."/".$recentfetch['image']."'><img src='albums/".$recentfetch['albumid']."/".$recentfetch['image']."' width='300' height='180' class='thumbnail' style='float:left'></a>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
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
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="script/highcharts.js"></script>
    <script src="script/data.js"></script>
    <script src="script/drilldown.js"></script>
    <script src="script/exporting.js"></script>
    <script src="script/highcharts-more.js"></script>
    <script src="script/charts-highchart-pie.js"></script>
    <script src="script/charts-highchart-more.js"></script>
    <!--CORE JAVASCRIPT-->
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
