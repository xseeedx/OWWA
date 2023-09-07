    <?php
    require_once("../include/initialize.php");

    ?>
    <?php
    // login confirmation
    if(isset($_SESSION['USERID'])){
        redirect(web_root."admin/index.php");
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="panelstyle.css" />
        <link rel="preconnect" href="https://fonts.gastic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">
        <link rel="stylesheet" href="font-awesome/4.5.0/css/font-awesome.min.css" />
    <style>
    body {
                margin: 0;
                padding: 0;
                font-size: 16px;
                color: black;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 300;
            }
            
            .left {
                position: absolute;
                top: 0;
                left: 0;
                box-sizing: border-box;
                padding: 40px;
                width: 250px;
                height: 425px;
                margin-left: 230px;
            }
            
    /*panel */

            h1 {
                width: 320%;
                height: 120%;
                margin-top: 100px;
                background-color: white;
                border-radius: 12px;
                margin-left: 380px;
            }
            
            nav {
                margin-top: 0px;
                padding: 24px;
                text-align: center;
                box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            }
            
            #navigation {
                background: #ffffff;
            }
            
            .link {
                color: gray;
                font-size: 20px;
                text-decoration: none;
                padding: 0 10px;
                margin: 0 10px;
            }
            
            .link:hover {
                background-color: #ffffff;
                color: blue;
                padding: 24px 10px;
            }
            
            .logo {
                padding: 15px;
                position: fixed;
                height: auto;
                left: 110px;
                width: 110px;
                margin-top: 170px;
                margin-left: 245px;
            }
            
            .text {
                padding-top: 25px;
                color: gray;
                margin-left: 90px;
                text-align: none;
                font-size: 24px;
                font-family: Arial, Helvetica, sans-serif;
                margin-top: 230px;
                margin-right: 720px;
            }
            
    /*login form*/

            form label {
                display: flex;
                margin-top: 20px;
                font-size: 18px;
                margin-left: 130px;
            }
            
            h2 {
                text-align: center;
                padding-top: 15px;
                font-size: larger;
            }
            
            h3 {
                text-align: center;
                padding-top: 15px;
                font-size: 24px;
            }
            
            h5 {
                text-align: center;
                font-size: large;
            }
            
            form input {
                width: 250px;
                padding: 7px;
                border: none;
                border: 1px solid gray;
                border-radius: 6px;
                outline: none;
            }
            
            input[type="button"] {
                width: 100px;
                height: 35px;
                margin-top: 20px;
                border: none;
                background-color: #0d5ef7;
                color: white;
                font-size: 18px;
            }
            
            p {
                text-align: center;
                padding-top: 10px;
                font-size: 15px;
                color: gray;
            }
            
            .para-2 a:hover {
                color: #0d5ef7;
            }
            
            .insideform {
                margin-left: 200px;
                margin-top: 10px;
            }
            .buttonlogin{
                margin-top: 10px;         
            }

            .login{
                text-align: center;
            }
        

    </style>

    <body  >

    <img src="owwa.png" class="logo">

    <nav id="navigation">
    </nav>

    <div class="text">
        <h3>Overseas Workers Welfare <br> Administration's Scholarship <br>Program Online Monitoring <br>System (OWWASPOMS)</h3>
    </div>

    <form action="" method="post" role="login">
        <div id="panel-box ">
            <div class="left ">
                <h1>

                    <div class="insideform">
                        <h2>Login</h2>
                        <h5>Sign in to continue</h5>

                        <div class = "login"><label>Username</label>
                        <input type="text" placeholder=" " id = "username"name="user_email" value=""/>
                        <label>Password</label>
                        <input type="password" placeholder=" " id="password" name="user_pass" value="" />
                        <div class= "buttonlogin"><input type="submit" name="btnLogin" value="Log in" /></div>
                        <p class="para-2 ">
                            <a>Forgot Password?</a><div>
                        </p>
                    </div>
                </h1>
            </div>
        </div>
    </form>


    </body>

    <?php

    if(isset($_POST['btnLogin'])){
    $email = trim($_POST['user_email']);
    $upass  = trim($_POST['user_pass']);
    $h_upass = sha1($upass);

    if ($email == '' OR $upass == '') {

        message("Invalid Username and Password!", "error");
        redirect("login.php");

        } else {
    //it creates a new objects of member
        $user = new User();
        //make use of the static function, and we passed to parameters
        $res = $user::userAuthentication($email, $h_upass);
        if ($res==true) {
        message("You login as ".$_SESSION['TYPE'].".","success");
        if ($_SESSION['TYPE']=='Administrator'){
            redirect(web_root."admin/index.php");
        }else{
            redirect(web_root."admin/login.php");
        }
        }else{
        message("Account does not exist! Please contact Administrator.", "error");
        redirect(web_root."admin/login.php");
        }
    }
    }
    ?>
    </head>
    </html>
