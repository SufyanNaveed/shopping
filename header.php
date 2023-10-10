<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
// print_r($mail); exit;
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.googlemail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sufyan.naveed@codepispor.com';                     //SMTP username
    $mail->Password   = 'Connect@786!!!';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sufyan.naveed@codepispor.com', 'Mailer');
    $mail->addAddress('sufyannaveed28@gmail.com', 'Joe User');     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit;

 
// if (isset($_POST['submit']))
// {
    $to = "sufyannaveed28@gmail.com"; // Your email address
    $name = 'Test';
    $from = 'sufyan.naveeed@codepispor.com';
    $message = 'All send';
    $subject = "Contact Form Submission";
    $headers = "From:" . $from;
    $result = mail($to, $subject, $message, $headers);

    if ($result)
    {
        echo '<script type="text/javascript">alert("Your message was sent!");</script>';
        //echo '<script type="text/javascript">window.location.href = window.location.href;</script>';

    }
    else
    {
        echo '<script type="text/javascript">alert("Oops! Your message wasn’t sent. Try again later.");</script>';
        //echo '<script type="text/javascript">window.location.href = window.location.href;</script>';
    }
// }
exit;


    $db = new Database();
    $db->select('options','site_name,site_logo,currency_format');
    $header = $db->getResult();

    $cur_format = '$';
    if(!empty($header[0]['currency_format'])){
        $cur_format = $header[0]['currency_format'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php if(isset($title)){ ?>
        <title><?php echo $title; ?></title>
    <?php }else{ ?>
        <title>Taaza Sabziphal</title>
    <?php } ?>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900|Montserrat:400,500,700,900" rel="stylesheet">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="css/owl.theme.default.min.css"/>
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="mobile-view">
            <div class="col-md-2 logo">
                 <a href="index.php"><img src="images/updated1.png" alt="logo"></a>
            </div>
            <div class="mobile-view-nav">
            <div class="humberger">
            <i class="fa fa-bars"></i>
            </div>
            </div>
            </div>
            <!-- /LOGO -->
            <div class="col-md-7">
                <form action="search.php" method="GET">
                <div class="input-group search">
                    <input type="text" class="form-control" name="search" placeholder="Search for...">
                    <span class="input-group-btn">
                        <input class="btn btn-default"  type="submit" value="Search" />
                    </span>
                </div>
                </form>
            </div>
            <div class="col-md-3">
                <ul class="header-info">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <?php
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            if(isset($_SESSION["user_role"])){ ?>
                                Hello <?php echo $_SESSION["username"]; ?><i class="caret"></i>
                            <?php  }else{ ?>
                                <i class="fa fa-user"></i>
                            <?php  } ?>

                        </a>
                        <ul class="dropdown-menu">
                            <!-- Trigger the modal with a button -->
                            <?php
                                if(isset($_SESSION["user_role"])){ ?>
                                    <li><a href="user_profile.php" class="" >My Profile</a></li>
                                    <li><a href="user_orders.php" class="" >My Orders</a></li>
                                    <li><a href="javascript:void()" class="user_logout" >Logout</a></li>
                            <?php  }else{ ?>
                                    <li><a data-toggle="modal" data-target="#userLogin_form" href="#">login</a></li>
                                    <li><a href="register.php">Register</a></li>
                              <?php  } ?>

                        </ul>
                    </li>
                    <li>
                        <a href="wishlist.php"><i class="fa fa-heart"></i>
                            <?php if(isset($_COOKIE['wishlist_count'])){
                                    echo '<span>'.$_COOKIE["wishlist_count"].'</span>';
                                } ?>
                        </a>
                    </li>
                    <li>
                        <a href="cart.php"><i class="fa fa-shopping-cart"></i>
                            <?php if(isset($_COOKIE['cart_count'])){
                                    echo '<span>'.$_COOKIE["cart_count"].'</span>';
                                } ?>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="userLogin_form" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <!-- Form -->
                            <form  id="loginUser" method ="POST">
                                <div class="customer_login"> 
                                    <h2>login here</h2>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="email" class="form-control username" placeholder="Username" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control password" placeholder="password" autocomplete="off" required>
                                    </div>
                                    <div class="forget">
                                       <a href="forget.php">Forget Password?</a> 
                                    </div>
                                    <input type="submit" name="login" class="btn" value="login"/>
                                    <span>Don't Have an Account <a href="register.php">Register</a></span>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->
        </div>
    </div>
</div>
<div id="header-menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="menu-list">
                    <li><a href="index.php">Home</a></li>
                    <?php
                    $db = new Database();
                    $db->select('sub_categories','*',null,'cat_products > 0 AND show_in_header = "1"',null,null);
                    $result = $db->getResult();
                    if(count($result) > 0){
                        foreach($result as $res){ ?>
                            <li><a href="category.php?cat=<?php echo $res['sub_cat_id']; ?>"><?php echo $res['sub_cat_title']; ?></a></li>
                        <?php    }
                    } ?>
                <li><a href="all_products.php">Popular Products</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>