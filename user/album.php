<?php
session_start();
if (empty($_SESSION['user']['SnapID'])) {
   header("Location:../index.html#prettyPhoto[iframes]/0/");
}
 require_once "phpuploader/include_phpuploader.php" ;
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
    <link rel="stylesheet" href="styles/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
    <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $("a[rel^='prettyPhoto']").prettyPhoto();
      });
    </script>
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
                    <li class="active"><a href="album.php"><i class="fa fa-image fa-fw">
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
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Albums</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Albums</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Albums</li>
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
                            <div class="col-lg-12">
                        <ul id="generalTab" class="nav nav-tabs responsive">
                            <li class="active"><a href="#thumbnail-tab" data-toggle="tab">Albums</a></li>
                            <li><a href="#navbar-tab" data-toggle="tab">Upload</a></li>
                            <li><a href="#other-tab" data-toggle="tab">Setings</a></li>
                        </ul>
                        <div id="generalTabContent" class="tab-content responsive">                             
                            
                            <div id="navbar-tab" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-lg-12"><h4 class="box-heading">Upload File</h4>
                                            <script type="text/javascript">
                                                    function doStart()
                                                    {
                                                        var uploadobj = document.getElementById('myuploader');
                                                        if (uploadobj.getqueuecount() > 0)
                                                        {
                                                            uploadobj.startupload();
                                                        }
                                                        else
                                                        {
                                                            alert("Please browse files for upload");
                                                        }
                                                    }
                                            </script>

                                        <nav role="navigation" class="navbar navbar-default">
                                            <div class="container-fluid">
                                                <div class="navbar-header">         
                                                        <div class="demo">     
                                                             <h2>Start uploading manually</h2>
                                                             <p>Give the details of your Album below.</p>
                                                             <P>Allowed file types: <span style="color:red">jpg, gif, png</span></p>
                                                        <form id="form1" method="POST">
                                                            <input type="text" placeholder="Album Name" name="aname"><br><br>
                                                            <input type="text" placeholder="Description" style="height:30px;" name="desc"><br><br>
                                                            <?php       
                                                                $year=date("Y"); 
                                                                require_once('connection.php');
                                                                $snapid=$_SESSION['user']['SnapID'];
                                                                $query=mysqli_query($con,"SELECT * from `users` where `SnapID`='$snapid'");
                                                                if ($query) {
                                                                    $fetch=mysqli_fetch_assoc($query);
                                                                }
                                                                $random=rand(10,100);
                                                                $albumid=$_SESSION['user']['mobile'].$random;
                                                                $uploader=new PhpUploader();
                                                                $uploader->MaxSizeKB=10240;
                                                                $uploader->Name="myuploader";
                                                                $uploader->InsertText="Select multiple files (Max 10M)";
                                                                $uploader->AllowedFileExtensions="*.jpg,*.png,*.gif"; 
                                                                $uploader->MultipleFilesUpload=true;
                                                                $uploader->ManualStartUpload=true;
                                                                $uploader->Render();
                                                            ?>
                                                    <br /><br /><br />
                                                    <button id="submitbutton" onclick="doStart();return false;" name="upload">Start Uploading Files</button>

                                                </form>
                                                
                                                <br/><br/><br/>

                                                    <?php
                                                    $fileguidlist=@$_POST["myuploader"];
                                                    if($fileguidlist)
                                                    {
                                                        $guidlist=explode("/",$fileguidlist);
                                                        echo("<div style='font-family:Fixedsys;'>");
                                                        echo("Uploaded ");
                                                        echo(count($guidlist));
                                                        echo(" files:");
                                                        echo("</div>");
                                                        echo("<hr/>");
                                                        $aname=$_POST['aname'];
                                                        $desc=$_POST['desc'];
                                                        if ($aname=='') {

                                                            echo "<script type='text/javascript'>alert('Album Name Compulsory!');</script>";
                                                            exit();
                                                        } 
                                                       $flag=0;  
                                                       
                                                        mkdir("albums/".$albumid);                                                              
                              
                                                            foreach($guidlist as $fileguid)
                                                            {
                                                                $mvcfile=$uploader->GetUploadedFile($fileguid);
                                                                if($mvcfile)
                                                                {

                                                                    $time=time();
                                                                    echo("<div style='font-family:Fixedsys;border-bottom:dashed 1px gray;padding:6px;'>");
                                                                    echo("FileName: ");
                                                                    $filename=$mvcfile->FileName;
                                                                    echo($filename);
                                                                    echo("<br/>FileSize: ");
                                                                    echo($mvcfile->FileSize." b");
                                                                    $mvcfile->MoveTo("albums/".$albumid); 
                                                                    $tempid=$albumid;
                                                                                                                                                                                    
                                                                    if ($flag==0) {
                                                                        $flag=4;
                                                                          $albumquery=mysqli_query($con,"INSERT INTO `album`(`albumid`,`SnapID`, `aname`, `time`, `description`, `thumbnail`) VALUES ('$tempid','$snapid','$aname','$time','$desc','$filename')");                                                  
                                                                    }     
                                                                    $uploadquery=mysqli_query($con,"INSERT into `uploads` VALUES('','$albumid','$filename','$time','$year')");
                                                                    echo("</div>");
                                                                   
                                                                   }
                                                                                    
                                                                    }
                                                      
                                                    }
                                                    ?>

                                        </nav>
                                        <div class="panel">
                                            <div class="panel-body"><h4>Disclaimer</h4>

                                                <p>SnapBuzz is not responsible for any abusive/explicit upload.Strict action will be taken against the user for any illegal/inappropriate upload.</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="thumbnail-tab" class="tab-pane fade in active">


                                <h4 class="box-heading">Albums</h4>

                                <div class="row">
                                    <?php
                                            $mobile=$_SESSION['user']['mobile'];
                                            $albumdisplay=mysqli_query($con,"SELECT * from `album` where `SnapID`='$snapid'");
                                            echo "<form method='get' action='display.php'>";
                                            while($adfetch=mysqli_fetch_assoc($albumdisplay)){
                                                    echo "<div class='col-sm-6 col-md-3' style='font-size:20px;'><a href='display.php?albumid=".$adfetch['albumid']."' class='thumbnail'><img src='albums/".$adfetch['albumid']."/".$adfetch['thumbnail']."' width='300' height='180'><center>".strtoupper($adfetch['aname'])."</center></a></div>";
                                            }
                                            echo "</form>";
                                    ?>
                                 </div>
                            </div>
                            <div id="other-tab" class="tab-pane fade">
                                <div class="mbxl"></div>
                                <div class="row">
                                               <nav role="navigation" class="navbar navbar-default">
                                            <div class="container-fluid">
                                    <div class="navbar-header">
                                                        <div class="demo">     
                                                             <h2>Select The album to edit</h2>
                                                             <p>Given are the details of your Album </p>
                                                             <?php    
                                                                echo "<h3>Album Name</h3>";
                                                                $settingsalbum=mysqli_query($con,"SELECT * FROM `album`");
                                                                echo "<table style='width:100%;    border: 1px solid black;'><tr><th style='height: 50px;'>Album Name</th><th>Action</th></tr>";
                                                                while($settingsfetch=mysqli_fetch_assoc($settingsalbum)){
                                                                            echo "<tr><td style='border: 1px solid black;'>".$settingsfetch['aname']."</td><td style='border: 1px solid black;'><a href='delete.php?albumid=".$settingsfetch['albumid']."'>Delete</a></td></tr>";
                                                                  }
                                                                  echo "</table>";
                                                            ?>
                                                    </div>
                                </div></div>
                                <div class="mbxl"></div>
                            </div>
                        </div>
                    </div>
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
    <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
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
