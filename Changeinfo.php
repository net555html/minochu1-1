<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$u_name=$_SESSION['user'];

if(isset($_POST['btn-submit']))
{
 $hobby = mysql_real_escape_string($_POST['hobby']);
 $introduce = mysql_real_escape_string($_POST['introduce']);
 $gender = mysql_real_escape_string($_POST['gender']);
 // for file
 $file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$file);
//修改權限
 $nfile = "uploads/".$file ;
 chmod($nfile, 0755);
 
 if(mysql_query("UPDATE users SET hobby='$hobby', introduce='$introduce',gender='$gender',file='$file',type='$file_type',size='$file_size' WHERE user_id='$u_name'"))
 {
  ?>
        <script>alert('successfully modify ');</script>
        <?php header("Location: Myprofile.php");
 }
 else
 {
  ?>
        <script>alert('error modify...');</script>
        <?php
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>About Us | Corlate</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head><!--/head-->

<body>

    <header id="header">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.php">Blog</a></li> 
                        <li><a href="Article.php"><img src="images/pencil.png" height="20" width="20" alt="message"></a></li>
                        <li class="dropdown active">
                            <a href="login.php" class="dropdown-toggle" data-toggle="dropdown"><img src="images/user-login.png" height="20" width="20" alt="login"></a>
                            <ul class="dropdown-menu">
                                <li><a href="Myprofile.php">Information</a></li>
                                <li><a href="logout.php?logout">Logout</a></li>
                            </ul>
                        </li> 
                        <li><a href="message.php"><img src="images/mail.png" height="20" width="20" alt="message"></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
	</header><!--/header-->

    <section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown">
				<h2>SETTING</h2>
			</div>
            <div class="col-md-4"></div>
						<div class="col-md-4">
							<form method="post" enctype="multipart/form-data"> 
                                <div class="form-group">
                                  <h3>Account</h3>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                      <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                      </select>
                                </div>
                                <div class="form-group">
								    <label for="hobby">Hobby</label>
								    <input type="text" class="form-control" name="hobby">
							    </div>
                                <div class="form-group">
                                    <label for="comment">Introduce</label>
                                    <textarea class="form-control" rows="5" id="introduce" name="introduce"></textarea>
                                </div>
							  <div class="form-group">
								<label for="Input">Photo</label>
								<input type="file" class="form-control-file" name="file" id="file">
							  </div>
							  <button type="submit" class="btn btn-default" name="btn-submit">Confirm</button>
                            </form>
            </div>
        </div>
    </section>

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>