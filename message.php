<?php
session_start();
//if(isset($_SESSION['user'])!="")
//{
// header("Location: index.php");
//}

date_default_timezone_set("Asia/Taipei");
include_once 'dbconnect.php';



if(isset($_POST['btn-sign']))
{
 $nickname = mysql_real_escape_string($_POST['nickname']);
 $message = mysql_real_escape_string($_POST['message']);
 $time= date("M d").", ".date("Y")." AT ".date("h:i:sa");
 if(mysql_query("INSERT INTO mes_board(nickname,message,time) VALUES('$nickname','$message','$time')"))
 {
  ?>
        <script>alert('successfully');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('error...');</script>
        <?php
 }
}
?>
<?php
    $count=1;
    $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
    $row=mysql_fetch_array($res);
    $result = mysql_query("SELECT * FROM mes_board");
    $num_rows = mysql_num_rows($result);
    //echo $num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Single | Corlate</title>
    
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
                        <li class="dropdown">
                            <a href="login.php" class="dropdown-toggle" data-toggle="dropdown"><img src="images/user-login.png" height="20" width="20" alt="login"></a>
                            <ul class="dropdown-menu">
                                <li><a href="Myprofile.php">Information</a></li>
                                <li><a href="logout.php?logout">Logout</a></li>
                            </ul>
                        </li> 
                        <li class="active"><a href="message.php"><img src="images/mail.png" height="20" width="20" alt="message"></a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->


    <section id="blog" class="container">
        <div class="center">                
            <h2>Message Board</h2>
            <p class="lead">write something what you want</p>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-10">  
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                    <?php
                        $res=mysql_query("SELECT * FROM mes_board WHERE mes_id='$count'");
                        $row=mysql_fetch_array($res);
                    ?>
                        <div class="media comment_section" style="display:<?php if($count>$num_rows){echo "none";}else{$count++;}?>">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="uploads/<?php if(strcmp($row['file'],null)==0){echo "nonpic.jpg";} else {echo $row['file'];}?>" class="img-circle" alt=""></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3><?php echo $row['nickname']?></h3>
                                <h4><?php echo $row['time']?></h4>
                                <p><?php echo $row['message']?></p>
                            </div>
                        </div>
                        <div id="contact-page clearfix">
                            <div class="status alert alert-success" style="display: none"></div>
                            <div class="message_heading">
                                <h4>Leave a Replay</h4>
                            </div> 
                            <form class="contact-form" name="contact-form" method="post" role="form">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required="required" name="nickname">
                                        </div>               
                                    </div>
                                    <div class="col-sm-7">                        
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" id="message" required="required" class="form-control" rows="8" name="message"></textarea>
                                        </div>                        
                                        <div class="form-group">
                                            <button type="submit" class="btn-primary btn-lg" name="btn-sign">Submit Message</button>
<!--                                            <button type="submit" class="btn btn-default" name="btn-submit">Confirm</button>-->
                                        </div>
                                    </div>
                                </div>
                            </form>     
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->  
            </div><!--/.row-->
         </div><!--/.blog-->
    </section><!--/#blog-->
    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
            </div>
        </div>
    </section><!--/#bottom-->

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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>