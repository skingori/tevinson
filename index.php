<?php
session_start();
if (isset($_SESSION['rank'])!="" && isset($_SESSION['logname'])!="") {
    header("Location: sessions.php");
    exit;
}


require('connection/db.php');
// If form submitted, insert values into the database.
if (isset($_POST['login'])){

    $Staff_Login_Name = stripslashes($_REQUEST['Staff_Login_Name']); // removes backslashes
//$rank = stripslashes($_REQUEST['rank']); // removes backslashes
    $Staff_Login_Password = stripslashes($_REQUEST['Staff_Login_Password']);

    $username_ = mysqli_real_escape_string($con,$Staff_Login_Name); //escapes special characters in a string
//$rank_ = mysqli_real_escape_string($con,$rank); //escapes special characters in a string
    $password_ = mysqli_real_escape_string($con,$Staff_Login_Password);

    $enc = md5($password_);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `staff_login` WHERE Staff_Login_Name='$username_' AND Staff_Login_Password='$enc'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);

    $rowCheck = mysqli_num_rows($result);
    $row= mysqli_fetch_array($result);


    if($row['Staff_Login_Rank']==1){

        $_SESSION['logname'] = $row['Staff_Login_Name'];
        $_SESSION['rank'] = $row['Staff_Login_Rank'];

        //below will be used as a welcome message
        $username=$_SESSION['logname'];

        $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome $username
                    </div>";


        ?>
        <p align="center">
            <meta content="2;admin/index.php?action=home" http-equiv="refresh" />
        </p>

        <?php

    } elseif ($row['Staff_Login_Rank']==2){

        $_SESSION['logname'] = $row['Staff_Login_Name'];
        $_SESSION['rank'] = $row['Staff_Login_Rank'];

        $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Login Successful !! Welcome
                    </div>";
        ?>

        <p align="center">
            <meta content="2;user/index.php?action=home" http-equiv="refresh" />
        </p>

        <?php

    }
    else {
        ?>
        <?php

        $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Wrong username or Password !
                    </div>";

    }
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page - FIDS</title>
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/backgound.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

</head>
<body>

<div class="wrapper">
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <div class="space-6"></div>
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>


                    <form id="loginform" class="form-horizontal" role="form" method="post">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="Staff_Login_Name" value="" placeholder="username or email">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="Staff_Login_Password" placeholder="password">
                        </div>



                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button type="submit" name="login" id="btn-login" class="btn btn-success">Login</button>
                                <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                            </div>
                        </div>
                    </form>

                    <div class="form-group">
                        <div class="col-md-12 control">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- signup box -->
        <div id="signupbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" hidden>
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Create Account</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <div class="space-6"></div>
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>


                    <form id="loginform" class="form-horizontal" role="form" method="post">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="Login_username" value="" placeholder="username or email">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="Login_username" value="" placeholder="username or email">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="Login_username" value="" placeholder="username or email">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="Login_password" placeholder="password">
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button type="submit" name="login" id="btn-login" class="btn btn-success">Create Account</button>

                            </div>
                        </div>
                    </form>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Already a member?
                                <a href="#" onClick="$('#loginbox').show(); $('#signupbox').hide()">
                                    Login Here
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of signup -->
    </div>
</div>


<!-- basic scripts -->


<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-3.1.0.min.js"></script>
<![endif]-->
</body>
</html>
