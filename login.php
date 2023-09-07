<?php
    // require_once("../include/initialize.php ");
    include_once('C:\xampp\htdocs\OWWASPOM\include\initialize.php');

       // login confirmation
       if (isset($_SESSION['USERID'])) {
        if ($_SESSION['TYPE'] == 'Administrator') {
          redirect(web_root."admin/index.php");
        } elseif ($_SESSION['TYPE'] == 'Staff') {
          redirect(web_root."staff/index.php");
        } elseif ($_SESSION['TYPE'] == 'Scholar') {
          redirect(web_root."scholar/index.php");
        } elseif ($_SESSION['TYPE'] == 'Parent') {
          redirect(web_root."parent/index.php");
        } else {
          redirect(web_root."index.php"); // Default redirection for unknown user type
        }
      }
      
    
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <link rel="icon" type="image/png" href="<?php echo web_root;?>admin/adminmenu/assets/img/owwa.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      OWWASPOMS
    </title>
    <style>
    body {
                margin: 0;
                padding: 0;
                font-size: 16px;
                color: black;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 300;
            }
            
            /* .left {
                position: absolute;
                top: 0;
                left: 0;
                box-sizing: border-box;
                padding: 40px;
                width: 250px;
                height: 425px;
                margin-left: 230px;
            }
             */
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
                text-align: none;
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
            .text {
                /* padding-top: 25px; */
                color: gray;
                /* margin-left: 90px; */
                text-align: center;
                font-size: 24px;
                font-family: Arial, Helvetica, sans-serif;
                /* margin-top: 230px;
                margin-right: 720px; */

            }
            
    /*login form*/

            form label {
                display: flex;
                margin-top: 20px;
                font-size: 18px;
                justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
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
            .container {
      height: 70vh;
      /* display: flex; */
      align-items: center;
      justify-content: center;
      margin-top: 100px;
    }

    .card {
      max-width: 400px;
    }
    .logo {
      max-width: 200px;
      margin-bottom: 20px;
    }

    </style>
    <head>
    <link rel="stylesheet" href="panelstyle.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
   

    <body>
    <nav id="navigation">
    </nav>
    

    <div class="container">
            <div class="row justify-content-center align-items-center ">
                    <div class="col-md-8">
                            <div class="text">
                            <img src="owwa.png" class="logo" alt="OWWA Logo">

                            <h3>Overseas Workers Welfare 
                                <br> Administration's Scholarship 
                                <br>Program Online Monitoring 
                                <br>System (OWWASPOMS)</h3>
                            </div>
                    </div>

        <div class="col-md-4">
  
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center">Login</h2>
                                <?php check_message(); ?>
                                <form action="" method="POST">
                               
                                <div class="form-group">
                                <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="user_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="user_pass" required>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-primary" name="btnLogin" value="Log in">
                                </div>
                                <p class="text-center">
                                    <a href="forgotpassword.php">Forgot Password?</a>
                                </p>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
     </div>





    <?php

    if(isset($_POST['btnLogin'])){
    $email = trim($_POST['user_email']);
    $upass  = trim($_POST['user_pass']);
    // $h_upass = sha1($upass);

    if ($email == '' OR $upass == '') {

        message("Invalid Username and Password!", "error");
        redirect("login.php");

        } else {
    //it creates a new objects of member
        $user = new User();
        //make use of the static function, and we passed to parameters
        $res = $user::userAuthentication($email, $upass);
        if ($res==true ) {
                    message("You login as ".$_SESSION['TYPE'].".","success");
                    if ($_SESSION['TYPE']=='Administrator'){
                        redirect(web_root."admin/index.php");
                        $_SESSION['loginTo'] = "admin";

                    } else if ($_SESSION['TYPE'] == 'Staff') {
                        redirect(web_root."staff/index.php");
                        $_SESSION['loginTo'] = "staff";

                    } else if ($_SESSION['TYPE'] == 'Scholar') {
                        redirect(web_root."scholar/index.php");
                        $_SESSION['loginTo'] = "scholar";

                    } else if ($_SESSION['TYPE'] == 'Parent') {
                        redirect(web_root."parent/index.php");
                        $_SESSION['loginTo'] = "parent";

                    }else{
                        redirect(web_root."login.php");
                    }
        }else{
            
        message($_SESSION['message'], "error");
        // unset( $_SESSION['account_status'] );
        // redirect(web_root."login.php");
        }
    }
    }
    ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
    </html>
