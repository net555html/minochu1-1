<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$u_name=$_SESSION['user'];
$res=mysql_query("SELECT * FROM users WHERE user_id='$u_name'");
$row=mysql_fetch_array($res);
$author=$row['username'];
date_default_timezone_set("Asia/Taipei");

if(isset($_POST['btn-submit']))
{
 $title = mysql_real_escape_string($_POST['title']);
 $content = mysql_real_escape_string($_POST['content']);
 $time= date("M d");
 $gender = mysql_real_escape_string($_POST['gender']);
 // for file
 $file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $folder="article/";
 move_uploaded_file($file_loc,$folder.$file);
 //修改權限
 $nfile = "article/".$file ;
 chmod($nfile, 0755);

 if(mysql_query("INSERT INTO article(title,content,file,time,author) VALUES('$title','$content','$file','$time','$author')"))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <?php header("Location: blog.php");
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
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
                        <li class="active"><a href="Article.php"><img src="images/pencil.png" height="20" width="20" alt="message"></a></li>
                        <li class="dropdown">
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
				<h2>Publication</h2>
			</div>
            <div class="col-md-2"></div>
						<div class="col-md-8">
							<form method="post" enctype="multipart/form-data"> 
                                <div class="form-group">
								    <label for="title">Title</label>
								    <input type="text" class="form-control" name="title">
							    </div>
                                <div class="form-group">
								<label for="Input">Pictures</label>
								<input type="file" class="form-control-file" name="file" id="file">
							    </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" rows="7" name="content"></textarea>
                                </div>
							  
							  <button type="submit" class="btn btn-default" name="btn-submit">Publicate</button>
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