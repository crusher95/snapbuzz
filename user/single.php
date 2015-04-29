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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="script/jquery.cropit.js"></script>
    <link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>
    <style>
      .cropit-image-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
        cursor: move;
      }


      .image-size-label {
        margin-top: 10px;
      }

      input {
        position: relative;
        display: block;
      }

      .export {
        margin-top: 10px;
      }
    </style>
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
                              
                                    <?php
                                      require_once('connection.php');
                                      $imageid=$_GET['imageid'];
                                      $query=mysqli_query($con,"SELECT * from `uploads` where `imageid`='$imageid'");
                                      $fetch=mysqli_fetch_assoc($query); 
                                    ?>
            `                  <div class="row">
                    <div class="col-md-12"><h2>Image Cropper: </h2>
                            <?php
                               echo "<img src='albums/".$fetch['albumid']."/".$fetch['image']."'' style='width:500px; height:400px;' id='photo'>";
                            ?> 
                           <form method="post" style="width:500px; height:auto; background:#ccc; padding:10px;">
                              
                              <input type="hidden" name="x1" value="" />
                              <input type="hidden" name="y1" value="" />
                              <input type="hidden" name="x2" value="" />
                              <input type="hidden" name="y2" value="" />
                     <center>  Drag to Make selection     <input type="submit" name="submit" value="CROP"/></center>   
                            </form>
                           </div>
                    </div>
                </div>
             <?php
              if (isset($_POST['submit'])) {
                $x1=$_POST['x1'];
                $y1=$_POST['y1'];
                $x2=$_POST['x2'];
                $y2=$_POST['y2'];
                $w=$x2-$x1;
                $h=$y2-$y1;                
                $filename = "albums/".$fetch['albumid']."/".$fetch['image'];
                $format=exif_imagetype($filename);
                if ($format==3) {
                   $src = imagecreatefrompng($filename);
                }elseif ($format==2) {
                   $src = imagecreatefromjpeg($filename);
                }else{
                  $src= imagecreatefromgif($filename);
                }
                $dest = imagecreatetruecolor($w, $h);
                list($width, $height) = getimagesize($filename);

                imagecopyresampled($dest, $src, $x1, $y1, 0, 0  , $w, $h, $width,$height);
                imagepng($dest,'albums/test.png');
              }
             ?>                 
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

<script type="text/javascript">
$(document).ready(function () {
    $('#photo').imgAreaSelect({
        onSelectEnd: function (img, selection) {
            $('input[name="x1"]').val(selection.x1);
            $('input[name="y1"]').val(selection.y1);
            $('input[name="x2"]').val(selection.x2);
            $('input[name="y2"]').val(selection.y2);         
        }
    });
});
</script>

</body>
</html>
