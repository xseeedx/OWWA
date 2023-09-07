
    <!DOCTYPE html>
    <html lang="en">

    <?php
    // create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "scholar";

            // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }        
    $sql = "SELECT * FROM scholar_info";

    $result = mysqli_query($conn, $sql);
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
        /* align-items: center; */
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
        background-color:#00bcd4;
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

    /* Navigation bar  */

    .active {
        color: rgb(45, 64, 231);
        font-size: 20px;
        text-decoration: none;
        padding: 0 10px;
        margin: 0 10px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .navoooooo {
        margin-top: 0px;
        padding: 24px;
        text-align: center;
        font-family: Raleway;
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
        font-family: Arial, Helvetica, sans-serif;
    }

    .link:hover {
        background-color: #ffffff;
        color: blue;
    }

    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #1876f2;
        padding: 25px 30%;
        position: sticky;
        top: 0;
        z-index: 100;
    }


    /* End of navigation */


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


    /*   End of pictures    */


    /* 
    .divpic{
        text-decoration: none;
        display: flex;
        justify-content:space-between;
        margin-bottom: 20px;
        margin-left: 20px;
        padding: 1px;
        margin-top: 10px;
    } */


    /* 
    .message{
    flex-basis: 25%;
    position:sticky;
    top:70px;
    align-self: flex-start;
    padding:20px;
    border-radius: 4px;
    color:#262626; 
        font-family: Arial, Helvetica, sans-serif;

    } */


    /*   homepage    */


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
        /* background-color:#c0c0c0; */
        padding: 10px;
        border: none;
        border-radius: 4px;
    }





    /* End of message box */
    </style>
    <head>
        <title>Admin Interface Manage Scholars</title>
        <!-- <link rel="stylesheet" href="../css/panelstyle1.css" />
        <link rel="stylesheet" href="../css/admin_add_new_scholar.css" />
        <link rel="stylesheet" href="font-awesome/4.5.0/css/font-awesome.min.css" /> -->

    </head>

    <body>
        <nav id="navigation">
            <img src="owwa.png" class="logo">
            <a class="link" href="admin_homepage_and_messagebox.php">Home</a>
            <div class="dropdown-menu1">
                <button class="menu-btn1">Scholars</button>
                <div class="menu-content1">
                    <a class="links-hidden1" href="admin_manage_scholars.php">Manage Scholars</a>
                    <a class="links-hidden1" href="admin_scholar_information.php">Manage Scholar Information</a>
                </div>
            </div>
            <div class="dropdown-menu">
                <button class="menu-btn">Reports</button>
                <div class="menu-content">
                    <a class="links-hidden" href="admin_reports_scholar_list.php">List of Scholars</a>
                    <a class="links-hidden" href="admin_reports_grant_list.php">Grant List</a>
                    <a class="links-hidden" href="admin_reports_list_of_graduated_scholars.php">Graduated</a>
                    <a class="links-hidden" href="admin_reports_list_of_scholars_suspended.php">Suspended Scholars</a>
                    <a class="links-hidden" href="admin_reports_list_of_submitted_documents.php">Submitted Documents</a>
                </div>
            </div>
            <a class="link" href="admin_setting.php">Settings</a>
        </nav>

        <form action = "admin_add_new_scholar.php" method = "POST">
            <div class = container id = "panel-box">
                <div class = "left-sidebar"></div>
            
            <!-- pinaka container ni madam -->
        
            <div class ="main-content">
            <!-- parang tables ni madam -->
            
            <form method = "post">
            <h2 align = "center">Personal Information</h2> 
            </form>

            
                        <div class = "row">
                                <div class="column75">
                                <h4></h4> 
                                        </div>
                                    <div class="column25">
                                    <label for="fname">Program: </label>
                                        </div>
                                    <div class="column25">
                                    <select name="program" id="program" value="<?php if(isset($row)) { echo $row['program']; } ?>">
                                            <option value="ODSP">ODSP</option>
                                            <option value="ODSP+">ODSP+</option>
                                            <option value="EDSP">EDSP</option>
                                            <option value="EDSP+">EDSP+</option>
                                            <option value="ELAP">ELAP</option>    
                                    </select>     
                                        </div>
                                        </div>
        
                                <br>

                    <h4>Scholars Name:</h4> 
                    <div class="row">
                            <div class="column">
                                <label for="fname">First Name:</label> 
                            </div>
                            <div class="column">
                                <label for="fname">Middle Name:</label>
                            </div>
                            <div class="column">
                                <label for="fname">Last Name:</label>
                            </div>
                            <div class="column4">
                                <label for="suffix">Suffix:</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <input type="text" id="fname" name="fname" placeholder="Enter first name"></div>
                            <div class="column">
                                <input type="text" id="mname" name="mname" placeholder="Enter Middle name" ></div>
                            <div class="column">
                                <input type="text" id="lname" name="lname" placeholder="Enter Last name"></div>
                            <div class="column4">
                                <input type="text" id="suffix" name="suffix" placeholder="Enter Suffix name"></div>
                        </div>
                    

                        <div class="row">
                <label>Permanent Address : </label>
                <div class="column2">
                            <input type="text" id="premanentaddress" name="permanentaddress" placeholder="Permanent Address :"></div>
                </div>

                <div class="row">
                <label>Present Address : </label>
                <div class="column2">
                            <input type="text" id="presentaddress" name="presentaddress" placeholder=" Present Address :"></div>
                </div>
            
                <div class="row">
                            <div class="column4">
                            <label for="age">Age: </label> 
                            </div>
                            <div class="column4">
                            <select id="age" name="age">
                            <?php       
                                for($i = 1; $i <= 100; $i += 1){
                                        echo("<option value='{$i}'>{$i}</option>");
                                }
                                        ?>
                                        </select>
                            </div>

                            <div class="column4">
                            <label for="gender">Gender: </label>
                            </div>

                            <div class="column4">
                            <select id="gender" name="gender">
                                    <option value="male"selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="column4">
                            <label for="bday">Birthday: </label>
                            </div>

                            <div class="column4">
                                <input type="date" id="bday" name="bday" value="2019-02-06"
                                    min="1919-02-06" max="2050-03-05">
                            </div>
                </div>
                
                <div class="row">
                            <div class="column4">
                                <label for="POB">Place of Birth: </label> 
                            </div>
                            <div class="column-meduim">
                                <input type="text" id="POB" name="POB" placeholder=""></div>

                            <div class="column25">
                                <label for="num">Telephone number:</label>
                            </div>
                                <div class="column25">
                            <input type="text" id="telenum" name="telenum" placeholder="" ></div>
                        </div>

                        <div class="row">
                            <div class="column4">
                                <label for="religion">Religion: </label> 
                            </div>
                            <div class="column-meduim">
                                <input type="text" id="religion" name="religion" placeholder=""></div>

                            <div class="column25">
                                <label for="cpnum">Celphone number:</label>
                            </div>
                                <div class="column25">
                            <input type="text" id="cpnum" name="cpnum" placeholder="" ></div>
                        </div>
                
                        <div class="row">
                            <div class="column4">
                            <label for="citizenship">Citizenship: </label> 
                            </div>
                            <div class="column4">
                            <input type="text" id="citizenship" name="citizenship" placeholder="" >
                            </div>

                            <div class="column4">
                            <label for="email">Email: </label>
                            </div>

                            <div class="column50">
                            <input type="text" id="email" name="email" placeholder="" >
                            </div>

                        
                        </div>

                                                <!-- </form> -->
                        <!-- <form class = "spacing"> -->
                        <div class="row">
                            <div class="column2">
                        <h3>Name of OFW member:</h3>   
                            </div>
                            </div>

                    <div class="row">
                            <div class="column">
                            <label for="fnameOFW">First Name:</label> 
                            </div>
                            <div class="column">
                            <label for="mnameOFW">Middle Name:</label>
                            </div>
                            <div class="column">
                            <label for="lnameOFW">Last Name:</label>
                            </div>
                            <div class="column4">
                            <label for="suffixOFW">Suffix:</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                            <input type="text" id="fnameOFW" name="fnameOFW" placeholder="Enter first name"></div>
                            <div class="column">
                            <input type="text" id="mnameOFW" name="mnameOFW" placeholder="Enter middle name" ></div>
                            <div class="column">
                            <input type="text" id="lnameOFW" name="lnameOFW" placeholder="Enter last name"></div>
                            <div class="column4">
                            <input type="text" id="suffixOFW" name="suffixOFW" placeholder="Enter suffix"></div>
                        </div>

                        <div class="row">
                            <div class="column">
                            <label for="relationship">Relationship to OFW: </label> 
                            </div>
                            <div class="column">
                            <input type="text" id="relationship" name="relationship" placeholder="">
                            </div>

                            <div class="column">
                            <label for="category">Category: </label>
                            </div>

                            <div class="column4">
                            <select id="category" name="category">
                                    <option value="Land">Land based</option>
                                    <option value="Sea">Sea Based</option>
                                </select>
                            </div>
                            </div>

                            <div class="row">
                                        <div class="column2">
                                    <h3>Family background:</h3>   
                                        </div>
                                        </div>
                                    <div class="row">
                                        <div class="column4">
                                        <label for="siblings">Number of Siblings: </label> 
                                        </div>
                                        <div class="column4">
                                        <input type="text" id="siblings" name="siblings" placeholder="" >
                                    
                                    
                                        </div>

                                        <div class="column4">
                                        <label for="fname">Father: </label>
                                        </div>

                                        <div class="column4">
                                        <select id="fstatus" name="fstatus">
                                                <option value="Living"selected>Living</option>
                                                <option value="Deceased">Deceased</option>
                                            </select>
                                        </div>

                                        <div class="column4">
                                        <label for="fname">Mother: </label>
                                        </div>

                                        <div class="column4">
                                        <select id="mstatus" name="mstatus">
                                                <option value="Living"selected>Living</option>
                                                <option value="Deceased">Deceased</option>
                                            </select>
                                        </div>
                            </div>
            
            

            <!-- Fathers full name -->
            <div class="row">
                            <div class="column2">
                        <h4>Father's Name:</h4>   
                            </div>
                            </div>
                <div class="row">
                        <div class="column">
                        <label for="fatherfname">First Name:</label> 
                        </div>
                        <div class="column">
                        <label for="fathermname">Middle Name:</label>
                        </div>
                        <div class="column">
                        <label for="fatherlname">Last Name:</label>
                        </div>
                        <div class="column4">
                        <label for="fathersuffix">Suffix:</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                        <input type="text" id="fatherfname" name="fatherfname" placeholder=""></div>
                        <div class="column">
                        <input type="text" id="fathermname" name="fathermname" placeholder="" ></div>
                        <div class="column">
                        <input type="text" id="fatherlname" name="fatherlname" placeholder=""></div>
                        <div class="column4">
                        <input type="text" id="fathersuffix" name="fathersuffix" placeholder=""></div>
                    </div>


                <div class = "row">
                <div class="column-meduim ">
                        <label for="fatherOccupation">Occupation/Position:</label> 
                        </div>
                        <div class="column-meduim ">
                        <label for="FatherEduc">Educational Attainment:</label>
                        </div>
                        <div class="column-meduim ">
                        <label for="fathercontact">Contact Number:</label>
                        </div>
                </div>

                <div class = "row">

                        <div class="column-meduim ">
                            <input type="text" id="fatheroccupation" name="fatheroccupation" placeholder="" >
                        </div>
                        <div class="column-meduim ">
                            <input type="text" id="Fathereduc" name="Fathereduc" placeholder="" >
                        </div>
                        <div class="column-meduim ">
                            <input type="text" id="fathercontact" name="fathercontact" placeholder="" >
                        </div>
                        </div>

                        <div class="row">
                            <div class="column2">
                        <h4>Mother's Name:</h4>   
                            </div>
                            </div>
                <div class="row">
                        <div class="column">
                        <label for="motherfname">First Name:</label> 
                        </div>
                        <div class="column">
                        <label for="mothermname">Middle Name:</label>
                        </div>
                        <div class="column">
                        <label for="motherlname">Last Name:</label>
                        </div>
                        <div class="column4">
                        <label for="mothersuffix">Suffix:</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                        <input type="text" id="motherfname" name="motherfname" placeholder=""></div>
                        <div class="column">
                        <input type="text" id="mothermname" name="mothermname" placeholder="" ></div>
                        <div class="column">
                        <input type="text" id="motherlname" name="motherlname" placeholder=""></div>
                        <div class="column4">
                        <input type="text" id="mothersuffix" name="mothersuffix" placeholder=""></div>
                    </div>

                    <div class="row">
                <div class="column-meduim ">
                        <label for="motheroccupation">Occupation/Position:</label> 
                        </div>
                        <div class="column-meduim ">
                        <label for="mothereduc">Educational Attainment:</label>
                        </div>
                        <div class="column-meduim ">
                        <label for="mothercontact">Contact Number:</label>
                        </div>
                </div>

                <div class = "row">

                        <div class="column-meduim ">
                            <input type="text" id="motheroccupation" name="motheroccupation" placeholder="" >
                        </div>
                        <div class="column-meduim ">
                            <input type="text" id="mothereduc" name="mothereduc" placeholder="" >
                        </div>
                        <div class="column-meduim ">
                            <input type="text" id="mothercontact" name="mothercontact" placeholder="" >
                        </div>
                </div>

                    <!-- <form class = "spacing"> -->
            <div class = "panelforeduc">
                <div class="row">
                    <div class="column2">
                        <h3>Educational Background:</h3>   
                    </div>
                </div>

                <div class="row">
                    <div class="column25">
                        <label>Primary : </label>
                    </div>
                        
                    <div class="column75">
                        <input type="text" id="primaryschool" name="primaryschool" placeholder="">
                    </div>
                </div>

                <div class="row">
                    <div class="column25">
                        <label>Period of Attendance: </label>
                    </div>
                    
                    <div class="column25">
                        <label></label>
                    </div>
                    <div class="column-">
                        <label> </label>
                    </div>
                    <div class="column50">
                        <label>Awards/Scholarship/Citations </label>
                    </div>
                                
                </div>     

                <div class="row">
                                    <!-- <div class="column_">               </div> -->
                    <div class="column_">
                        <label>From: </label>
                    </div>
                    <div class = "column4">
                            <select id="primaryyearfrom" name="primaryyearfrom">
                                <?php
                                    $currentYear = date("Y");
                                    for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                    echo "<option value=\"$i\">$i</option>";
                                    }
                                    ?>
                            </select>
                    </div>
                    <div class="column_">
                        <label>To: </label>
                    </div>
                    
                    <div class = "column4">
                        <select id="primaryyearto" name="primaryyearto">
                            <?php
                            $currentYear = date("Y");
                            for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="column60">
                        <input type="text" id="primaryaward" name="primaryaward" placeholder="">
                    </div>
                </div>
            </div>
        <!-- <form> -->
        <!-- <form class = "spacing"> -->
            <div class = "panelforeduc">
            
                <div class="row">
                    <div class="column25">
                        <label>Secondary : </label>
                    </div>
                        
                    <div class="column75">
                        <input type="text" id="secondaryschool" name="secondaryschool" placeholder="">
                    </div>
                </div>

                <div class="row">
                    <div class="column25">
                        <label>Period of Attendance: </label>
                    </div>
                    
                    <div class="column25">
                        <label></label>
                    </div>
                    <div class="column-">
                        <label> </label>
                    </div>
                    <div class="column50">
                        <label>Awards/Scholarship/Citations </label>
                    </div>
                                
                </div>     

                <div class="row">
                                    <!-- <div class="column_">               </div> -->
                    <div class="column_">
                        <label>From: </label>
                    </div>
                    <div class = "column4">
                            <select id="secondaryyearfrom" name="secondaryyearfrom">
                                <?php
                                    $currentYear = date("Y");
                                    for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                    echo "<option value=\"$i\">$i</option>";
                                    }
                                    ?>
                            </select>
                    </div>
                    <div class="column_">
                        <label>To: </label>
                    </div>
                    
                    <div class = "column4">
                        <select id="secondaryyearto" name="secondaryyearto">
                            <?php
                            $currentYear = date("Y");
                            for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="column60">
                        <input type="text" id="secondaryaward" name="secondaryaward" placeholder="">
                    </div>
                </div>
            </div>
        <!-- <form>  -->
        
        <!-- <form class = "spacing"> -->
            <div class = "panelforeduc">
            
                <div class="row">
                    <div class="column25">
                        <label>Tertiary : </label>
                    </div>
                        
                    <div class="column75">
                        <input type="text" id="tertiaryschool" name="tertiaryschool" placeholder="">
                    </div>
                </div>

                <div class="row">
                    <div class="column25">
                        <label>Period of Attendance: </label>
                    </div>
                    
                    <div class="column25">
                        <label></label>
                    </div>
                    <div class="column-">
                        <label> </label>
                    </div>
                    <div class="column50">
                        <label>Awards/Scholarship/Citations </label>
                    </div>
                                
                </div>     

                <div class="row">
                                    <!-- <div class="column_">               </div> -->
                    <div class="column_">
                        <label>From: </label>
                    </div>
                    <div class = "column4">
                            <select id="tertiaryyearfrom" name="tertiaryyearfrom">
                                <?php
                                    $currentYear = date("Y");
                                    for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                    echo "<option value=\"$i\">$i</option>";
                                    }
                                    ?>
                            </select>
                    </div>
                    <div class="column_">
                        <label>To: </label>
                    </div>
                    
                    <div class = "column4">
                        <select id="tertiaryyearto" name="tertiaryyearto">
                            <?php
                            $currentYear = date("Y");
                            for ($i = $currentYear; $i >= $currentYear - 100; $i--) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="column60">
                        <input type="text" id="tertiaryaward" name="tertiaryaward" placeholder="">
                    </div>
                </div>
            </div>
        <!-- <form>     -->
        
        
        <!-- <form class = "spacing"> -->
                            <div class="row">
                            <div class="column2">
                        <h3>Scholarship Application Information:</h3>   
                            </div>
                            </div>
                            <div class = "row">
                                <div class="column25">
                                <label for="school">School Adress</label>
                                    </div>

                                <div class="column2">
                                        <input type="text" id="schooladress" name="schooladress" placeholder="" >
                                    </div>
                            </div>
                            
                            <div class = "row">
                            
                            <div class="column50">
                            <label for="course">Course</label>
                            </div>

                            <div class="column50">
                            <label for="yearlevel">Year level</label>
                            </div>
                    </div>
                        <div class = "row">

                                <div class="column50">
                                    <input type="text" id="course" name="course" placeholder="" >
                                </div>

                                <div class="column50">
                                    <input type="text" id="yearlevel" name="yearlevel" placeholder="" >
                                </div>
                        </div>

            <!-- <form> -->


                    <div class = "row">
                        <div class="column25"></div>
                        <div class="column25"></div>
                        <div class="column25"></div>
                        <div class="column25">
                                <button style="color: #00bcd4" type="submit"  name ="AddScholar">Add Scholar</button>
                        </div>
                    </div>
            
                    </div>
                
            
                
                <div class = "right-sidebar"></div>
                </div>
            </div>
            </div>
        
        </form>
        <?php
    
    if (isset($_POST['AddScholar'])){
                    $account = 0; 
                    $f = $_POST['fname'];
                    $f = str_replace("'", "\'", $f);
                    $mn = $_POST['mname'];
                    $mn = str_replace("'", "\'", $mn);
                    $ln = $_POST['lname'];
                    $ln = str_replace("'", "\'", $ln);
                    $s = $_POST['suffix'];
                    $s = str_replace("'", "\'", $s);

                    $a = $_POST['permanentaddress'];
                    $a = str_replace("'", "\'", $a);
                    $a2 = $_POST['presentaddress'];
                    $a2 = str_replace("'", "\'", $a2);
                    $cp= $_POST['cpnum'];
                    $cp = str_replace("'", "\'", $cp);
                    ////
                    $tele = $_POST['telenum'];
                    $tele = str_replace("'", "\'", $tele);
                    ////
                    $e = $_POST['email'];
                    $email = str_replace("'", "\'", $email);
                    $age = $_POST['age'];
                
                    $gender = $_POST['gender'];
                
                    $religion = $_POST['religion'];
                    $religion = str_replace("'", "\'", $religion);
                    $citizenship = $_POST['citizenship'];
                    $citizenship = str_replace("'", "\'", $citizenship);
                    $day = $_POST['bday'];
                    $birthplace = $_POST['POB'];
                    $birthplace = str_replace("'", "\'", $birthplace);
                    $program = $_POST['program'];
                    // $c = $_POST['course'];
                    // ofw
                    $OFWf = $_POST['fnameOFW'];
                    $OFWf = str_replace("'", "\'", $OFWf);
                    $OFWm = $_POST['mnameOFW'];
                    $OFWm = str_replace("'", "\'", $OFWm);
                    $OFWl= $_POST['lnameOFW'];
                    $OFWl = str_replace("'", "\'", $OFWl);
                    $OFWs = $_POST['suffixOFW'];
                    $OFWs = str_replace("'", "\'", $OFWs);
                    $relationship= $_POST['relationship'];
                    $relationship = str_replace("'", "\'", $relationship);
                    $category = $_POST['category'];

                    $siblings = $_POST['siblings'];
                    $siblings = str_replace("'", "\'", $siblings);
                    $fstatus = $_POST['fstatus'];
                    $mstatus = $_POST['mstatus'];
                    $fatherfname = $_POST['fatherfname'];
                    $fatherfname = str_replace("'", "\'", $fatherfname);
                    $fathermname = $_POST['fathermname'];
                    $fathermname = str_replace("'", "\'", $fathermname);
                    $fatherlname = $_POST['fatherlname'];
                    $fatherlname = str_replace("'", "\'", $fatherlname);
                    $fathersuffix = $_POST['fathersuffix'];
                    $fathersuffix = str_replace("'", "\'", $fathersuffix);
                    $fatheroccupation = $_POST['fatheroccupation'];
                    $fatheroccupation = str_replace("'", "\'", $fatheroccupation);
                    $Fathereduc = $_POST['Fathereduc'];
                    $Fathereduc = str_replace("'", "\'", $Fathereduc);
                    $fathercontact = $_POST['fathercontact'];
                    $fathercontact = str_replace("'", "\'", $fathercontact);
            
                    $motherfname = $_POST['motherfname'];
                    $motherfname = str_replace("'", "\'", $motherfname);
                    $mothermname = $_POST['mothermname'];
                    $mothermname = str_replace("'", "\'", $mothermname);
                    $motherlname = $_POST['motherlname'];
                    $motherlname = str_replace("'", "\'", $motherlname);
                    $mothersuffix = $_POST['mothersuffix'];
                    $mothersuffix = str_replace("'", "\'", $mothersuffix);
                    $motheroccupation = $_POST['motheroccupation'];
                    $mothersuffix = str_replace("'", "\'", $mothersuffix);
                    $mothereduc = $_POST['mothereduc'];
                    $mothereduc = str_replace("'", "\'", $mothereduc);
                    $mothercontact = $_POST['mothercontact'];
                    $mothercontact = str_replace("'", "\'", $mothercontact);
            
                    //school
                    $primaryschool = $_POST['primaryschool'];
                    $primaryschool = str_replace("'", "\'", $primaryschool);
                    $primaryyearfrom = $_POST['primaryyearfrom'];
                    $primaryyearto = $_POST['primaryyearto'];
                    $primaryaward = $_POST['primaryaward'];
                    $primaryaward = str_replace("'", "\'", $primaryaward);
                    
                    $secondaryschool = $_POST['secondaryschool'];
                    $secondaryschool = str_replace("'", "\'", $secondaryschool);
                    $secondaryyearfrom = $_POST['secondaryyearfrom'];
                    $secondaryyearto = $_POST['secondaryyearto'];
                    $secondaryaward = $_POST['secondaryaward'];
                    $secondaryaward = str_replace("'", "\'", $secondaryaward);
                    
                    $tertiaryschool = $_POST['tertiaryschool'];
                    $tertiaryschool = str_replace("'", "\'", $tertiaryschool);
                    $tertiaryyearfrom = $_POST['tertiaryyearfrom'];
                    $tertiaryyearto = $_POST['tertiaryyearto'];
                    $tertiaryaward = $_POST['tertiaryaward'];
                    $tertiaryaward = str_replace("'", "\'", $tertiaryaward);
                    
                    $schooladdress = $_POST['schooladress'];
                    $schooladdress = str_replace("'", "\'", $schooladdress);
                    $course = $_POST['course'];
                    $course = str_replace("'", "\'", $course);
                    $yearlevel = $_POST['yearlevel'];
                    $yearlevel = str_replace("'", "\'", $yearlevel);

                    if(empty($_POST['fname'])) {
                        ?> 
                        <script> alert("Empty First name") </script> 
                        <?php 
                    }
                    
                    if(empty($_POST['mname'])) {
                        ?> 
                        <script> alert("Empty Middle name") </script> 
                        <?php 
                    }
                    
                    if(empty($_POST['lname'])) {
                        ?> 
                        <script> alert("Empty Last name") </script> 
                        <?php 
                    }

                    else{
        $sql = "INSERT INTO scholar_info ( scholar_id, firstname, middlename, lastname, suffix, address, presentaddress, age, gender, birthdate, phone_num, telephone_number, religion, program, citizenship, OFW_firstname, OFW_middlename, OFW_lastname, OFW_suffix, OFW_relationship, category, number_siblings, fatherstatus, motherstatus, father_fname ,father_mname ,father_lname  ,father_suffix ,father_occupation ,Father_Educ ,father_contactnum ,mother_fname ,mother_mname ,mother_lname ,mother_suffix ,mother_occupation ,mother_Educ ,mother_contactnum, primary_school, primary_year_from, primary_year_to, primary_award, secondary_school, secondary_year_from , secondary_year_to, secondary_award, tertiary_school ,tertiary_year_from ,tertiary_year_to ,tertiary_award ,school_address ,course, year_level)

                    VALUES                            ( '$account',   '$f',      '$mn',      '$ln',      '$s', '$a', '$a2',       '$age', '$gender', '$day', '$cp','$tele','$religion','$program', '$citizenship', '$OFWf ', '$OFWm','$OFWl', '$OFWs', '$relationship', '$category', '$siblings', '$fstatus', '$mstatus', '$fatherfname', '$fathermname', '$fatherlname', '$fathersuffix', '$fatheroccupation', '$Fathereduc', '$fathercontact','$motherfname', '$mothermname', '$motherlname','$mothersuffix', '$motheroccupation', '$mothereduc', '$mothercontact', '$primaryschool','$primaryyearfrom', '$primaryyearto','$primaryaward','$secondaryschool','$secondaryyearfrom','$secondaryyearto','$secondaryaward','$tertiaryschool','$tertiaryyearfrom','$tertiaryyearto','$tertiaryaward','$schooladdress','$course','$yearlevel')";
                    }
                    if (mysqli_query($conn, $sql)) {
                        //  $idpost = $idpost + 1;
                        } 
                    else {
                    echo "Error inserting data: " . mysqli_error($conn);
                        }           

                }
        

    ?>
    </body>

    </html>