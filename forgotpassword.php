<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Forgot Password</title>
    <link rel="stylesheet" href="panelstyle.css" />
    <link rel="stylesheet" href="font-awesome/4.5.0/css/font-awesome.min.css" />
    <style>
        body {
    margin: 0;
    padding: 0;
    background: #DDD;
    font-size: 10px;
    color: black;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 30;
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

/*h1 {
    width: 300%;
    height: 90%;
    margin-top: 100px;
    background-color: white;
    border-radius: 4px;
    margin-left: 160px;
} */

nav {
    margin-top: 0px;
    padding: 40px;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
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
    left: 30px;
    width: 70px;
    margin-top: 10px;
}

input[type=text],
select {
    color: black;
    width: 90%;
    padding: 12px 20px;
    margin-left: 5px;
    margin-bottom: 5px;
    display: inline-flexbox;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

label {
    font-family: Arial, Helvetica, sans-serif;
    color: black;
    font-weight: 200;
    float: left;
    margin-left: 3px;
    margin-bottom: 5px;
}

h3 {
    margin-left: 3px;
    font-family: Arial, Helvetica, sans-serif;
    padding: 10px;
}


/*dropdown add new employee*/

.dropdown {
    display: inline-table;
    position: relative;
    margin-left: 350px;
    padding-top: 0px;
    padding: 0px;
    margin-top: 0px;
    width: 160px;
}

.dropdown-content {
    display: none;
    position: absolute;
    width: 100%;
    overflow: auto;
    color: gray;
}

.dropdown:hover .dropdown-content {
    display: block;
    color: gray;
}

.dropdown-content a {
    display: block;
    color: gray;
    padding: 5px;
    text-decoration: none;
    border-top: 1px solid gray;
    border-bottom: 1px solid gray;
    border-right: 1px solid gray;
    border-left: 1px solid gray;
    font-size: 12px;
    color: gray;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 50;
}

.dropdown-content a:hover {
    color: #FFFFFF;
    background-color: rgb(113, 138, 247);
}

.button-manage{
    width: 160px;
}


/*dropdown on nav - reports */

.menu-btn {
    background-color: white;
    color: gray;
    padding: 16px;
    font-size: 20px;
    font-weight: bolder;
    font-family: Arial, Helvetica, sans-serif;
    border: none;
}

.dropdown-menu {
    position: relative;
    display: inline-block;
}

.menu-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    z-index: 1;
    border-top: 1px solid gray;
    border-right: 1px solid gray;
    border-left: 1px solid gray;
}

.links,
.links-hidden {
    display: inline-block;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    font-size: large;
    border-bottom: 1px solid gray;
}

.links-hidden {
    display: block;
}

.links {
    display: inline-block;
}

.links-hidden:hover,
.links:hover {
    background-color: rgb(113, 138, 247);
}

.dropdown-menu:hover .menu-content {
    display: block;
}

.dropdown-menu:hover .menu-btn {
    background-color: white;
    color: blue;
}


/*dropdown on nav - scholars*/

.menu-btn1 {
    background-color: white;
    color: gray;
    padding: 16px;
    font-size: 20px;
    font-weight: bolder;
    font-family: Arial, Helvetica, sans-serif;
    border: none;
}

.dropdown-menu1 {
    position: relative;
    display: inline-block;
}

.menu-content1 {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    z-index: 1;
    border-top: 1px solid gray;
    border-right: 1px solid gray;
    border-left: 1px solid gray;
}

.links,
.links-hidden1 {
    display: inline-block;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    font-size: large;
    border-bottom: 1px solid gray;
}

.links-hidden1 {
    display: block;
}

.links1 {
    display: inline-block;
}

.links-hidden1:hover,
.links1:hover {
    background-color: rgb(113, 138, 247);
}

.dropdown-menu1:hover .menu-content1 {
    display: block;
}

.dropdown-menu1:hover .menu-btn1 {
    background-color: white;
    color: blue;
}

/*form*/

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "segoe ui", verdana, helvetica, arial, sans-serif;
    font-size: 16px;
    transition: all 500ms ease; }

    body {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
    -moz-font-feature-settings: "liga" on; }

    .row {
    background-color: rgb(113, 138, 247);
    color: #fff;
    text-align: center;
    padding: 2em 2em 0.5em;
    width: 90%;
    margin: 2em	auto;
    border-radius: 15px; }
    .row h1 {
        font-size: 2.5em; }
    .row .form-group {
        margin: 0.5em 0; }
        .row .form-group label {
        display: block;
        color: #fff;
        text-align: left;
        font-weight: 600; }
        .row .form-group input, .row .form-group button {
        display: block;
        padding: 0.5em 0;
        width: 100%;
        margin-top: 1em;
        margin-bottom: 0.5em;
        background-color: inherit;
        border: none;
        border-bottom: 1px solid #555;
        color: #eee; }
        .row .form-group input:focus, .row .form-group button:focus {
            background-color: #fff;
            color: #000;
            border: none;
            padding: 1em 0.5em; animation: pulse 1s infinite ease;}
        .row .form-group button {
        border: 1px solid #fff;
        border-radius: 5px;
        outline: none;
        -moz-user-select: none;
        user-select: none;
        color: #333;
        font-weight: 800;
        cursor: pointer;
        margin-top: 2em;
        padding: 1em; }
        .row .form-group button:hover, .row .form-group button:focus {
            background-color: #fff; }
        .row .form-group button.is-loading::after {
            animation: spinner 500ms infinite linear;
            content: "";
            position: absolute;
            margin-left: 2em;
            border: 2px solid #000;
            border-radius: 100%;
            border-right-color: transparent;
            border-left-color: transparent;
            height: 1em;
            width: 4%; }
    .row .footer h5 {
        margin-top: 1em; }
    .row .footer p {
        margin-top: 2em; }
        .row .footer p .symbols {
        color: #444; }
    .row .footer a {
        color: inherit;
        text-decoration: none; }

    .information-text {
    color: #ddd; }

    @media screen and (max-width: 320px) {
    .row {
        padding-left: 1em;
        padding-right: 1em; }
        .row h1 {
        font-size: 1.5em !important; } }
    @media screen and (min-width: 900px) {
    .row {
        width: 50%; } }

        .button-reset{
            text-decoration:none;
        }
    </style>
</head>

<body>
        <img src="owwa.png" class="logo">
        <nav id="navigation">
            
        </nav>

        <div class="row">
		<h1>Forgot Password</h1>
		<h6 class="information-text">Enter your registered email to reset your password.</h6>
		<div class="form-group">
			<input type="email" name="user_email" id="user_email">
			<p><label for="username">Email</label></p>
            <div class="button-reset">
                <!--<a href="RESET PASS LINK"> -->
                                <button onclick="showSpinner()">Reset Password</button>
                </a>
            </div>
		</div>
		<div class="footer">
			<h5>New here? <a href="account_registration.php">Sign Up.</a></h5>
			<h5>Already have an account? <a href="login.php">Sign In.</a></h5>
            <br>
		</div>
	</div>

    </body>

</html>