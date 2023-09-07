
    <?php
    if(!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
    }
                        ?> 
<style>
        .spacing{
            margin-top: 25px;
            padding: 20px;
            border: none;
            border-radius: 4px;
            margin:5px;
        }
    body{
        background-color: rgb(237, 237, 237);
        margin: none;
        color: #353535;
        font-family: Arial, Helvetica, sans-serif;
    }
    .post-content{
        flex-basis: 60%;
        border-radius: 10px;
        align-content: center;
        position: sticky;
    }  
    .main-content{
        flex-basis: 60%;
        border-radius: 10px;
        background:#ffffff;
        position: sticky;
        margin-top: 10px;
        padding: 20px;
        align-content: center;
    }  
    .container{
        display : flex;
        justify-content: space-between;
        margin: 10px;
        margin-bottom: 10px;
        margin-top: 2px;
    }

    .left{
        flex-basis:25%;
        position: sticky;
        align-self:flex-start;
        height:100vh;
        color: #1876f2;
    }
    .right{
        display:flex;
        flex-basis:25%;
        position:static;
        align-self:flex-start;
        height:100vh;
    
        align-self:flex-start;
        border-radius: 10px;
    }    
    .pics {
        width: 40px;
        height: 40px;
    }

    .row:after {
        display: table;
        clear: both;
        background:#ffffff;
    }
    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        width: 26%;
        padding: 2px;
    }
    .column-meduim {
        float: left;
        width: 32%;
        padding: 2px;
    }
    .column50 {
        float: left;
        width: 46%;
        padding: 5px;
    }
    
    .column2 {
        float: left;
        width: 100%;
        padding: 5px;
    }
    .column4 {
        float: left;
        width: 16%;
        padding: 2px;
    }
    .column_ {
        float: left;
        padding: 2px;
    }
    .column25{
        float: left;
        width: 24%;
        padding: 2px;
    }
    .column75 {
        float: left;
        width: 74%;
        padding: 5px;
    }
    .column60{
        float: left;
        width: 55%;
        padding: 5px;
    }

    button{
        background-color:#1876f2;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing:2px
    }
        button:hover{
            background-color: #dddddd;
    }
    input[type=text], select {
        width: 96%;
        padding: 10px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }
    input[type=date ], select {
        width: 96%;
        padding: 10px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }


    
    /*buttons*/

    .button1 {
        width: 150px;
        height: 25px;
        margin-left: 540px;
        border-color: lightgray;
        border-radius: 4px;
        margin-top: 0px;
    }

    .button1:hover {
        background-color: rgb(113, 138, 247);
    }


    /*dropdown on nav */

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

    /*   pictures    */

    .logo {
        padding: 15px;
        position: fixed;
        height: auto;
        left: 30px;
        width: 50px;
    }

    .picflogo {
        padding: 10px;
        position: fixed;
        height: auto;
        right: 50px;
        width: 40px;
        top: 7px;
    }

    .notif {
        padding: 10px;
        position: fixed;
        height: auto;
        right: 100px;
        width: 40px;
        top: 7px;
    }

    /* Body */

    .imp-links a {
        text-decoration: none;
        display: flex;
        align-items: center;
        text-align: left;
        margin-bottom: 20px;
        color: gray;
        width: fit-content;
        margin-left: 20px;
        padding: 1px;
        margin-top: 10px;
    }

    .imp-links a img {
        width: 25px;
        margin-right: 10px;
    }


    .panelforeduc{
        padding: 10px;
        border: none;
        border-radius: 4px;
    }





    /* End of message box */
    </style>
    <head>
        <title>Admin Interface Manage Scholars</title>
    </head>

    <body>
    <!-- HTML form with a button to create the folder -->
    <form method="post" action="controller.php?action=add">
        <input type="text" name="folder_name" placeholder="Enter folder name" required>
        <button type="submit" name="create_folder">Create Folder</button>
    </form>
    </body>

    </html>