  <!--
  =========================================================
  Material Dashboard - v2.1.1
  =========================================================

  Product Page: https://www.creative-tim.com/product/material-dashboard
  Copyright 2019 Creative Tim (https://www.creative-tim.com)
  Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

  Coded by Creative Tim

  =========================================================

  The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo web_root;?>admin/adminmenu/assets/imgages/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo web_root;?>admin/adminmenu/assets/img/owwa.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      OWWASPOMS
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo web_root;?>admin/adminmenu/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo web_root;?>admin/adminmenu/assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="azure" data-background-color="white" data-image="<?php echo web_root;?>admin/adminmenu/assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
          <a target="_blank" href="https://owwa.gov.ph/" class="simple-text logo-normal">
            OWWASPOMS
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item <?php echo (currentpage_admin() == '') ? "active" : false;?>  ">
              <a class="nav-link" href="<?php echo web_root.'scholar/index.php'; ?>">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
        
            <li class="nav-item <?php echo (currentpage_admin() == 'announcement') ? "active" : false;?>">
              <a class="nav-link" href="<?php echo web_root; ?>scholar/modules/announcement/index.php">
                <p>Announcements</p>
              </a>
            </li>
            <li class="nav-item <?php echo (currentpage_admin() == 'studentprofile') ? "active" : false;?>">
              <a class="nav-link" href="<?php echo web_root; ?>scholar/modules/studentprofile/index.php?">
                <p>Profile</p>
              </a> 
            </li>
        
            <li class="nav-item <?php echo (currentpage_admin() == 'documents') ? "active" : false;?>">
              <a class="nav-link" href="<?php echo web_root; ?>scholar/modules/documents/index.php">
                <p>Documents</p>
              </a> 
            </li>
            <li class="nav-item <?php echo (currentpage_admin() == 'notification') ? 'active' : ''; ?>">
      <a class="nav-link" href="<?php echo web_root; ?>scholar/modules/notification/index.php">
      <?php
    $id = $_SESSION['USERID'];

    $user = new User();
    $res = $user->single_user($id);
    
         $mydb->setQuery("SELECT * FROM `scholar_info` WHERE user_id = $id  ");
         $student = $mydb->loadResultList();
         foreach ($student as $students) {
           $ids = $students->scholar_id;
        
$mydb->setQuery("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND ( notification_for = 'Scholar'   OR notification_for = $ids) ");
$cur = $mydb->loadResultList();
//  print_r($cur[0]->count);
}?>
     <p>Notification<span class="notif_count" style=" background-color: <?php echo (!empty($cur[0]) && $cur[0]->count > 0) ? '#FF2E2E' : 'transparent'; ?>">
  <?php echo (!empty($cur[0])) ? $cur[0]->count : ""; ?>
</span></p>

    </a>
  </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href=""><?php echo $title;?></a>
            
              
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end"> 
              <ul class="navbar-nav"> 
                 
              <i class="fa fa-bell-o" style="float: right;"></i>
              <a href="<?php echo web_root; ?>scholar/modules/notification/index.php">
              <span class="badge rounded-pill badge-notification <?php echo (!empty($cur[0]) && $cur[0]->count > 0) ? 'bg-danger text-white' : 'bg-transparent text-gray'; ?> ">
        <?php echo (!empty($cur[0])) ? $cur[0]->count : ""; ?>
    </span> <a>            
                <li class="nav-item dropdown">
                  
                  <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                    <?php echo  $_SESSION['NAME'];?>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="<?php echo web_root;?>scholar/modules/user/index.php?view=edit&id=<?php echo $_SESSION['USERID']; ?>">Profile</a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo web_root;?>logout.php">Log out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
    
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card"> 
        <div class="col-md-12">
          <?php  check_message(); ?> 
          <?php  require_once $content;?> 
        </div> 
      </div>
    </div> 
      </div>
    </div>
  </div>



    <!--<footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com">
                    Creative Tim
                  </a>
                </li>
                <li>
                  <a href="https://creative-tim.com/presentation">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license">
                    Licenses
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright float-right">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="material-icons">favorite</i> by
              <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
          </div>
        </footer>
      </div>
    </div> --->
    
    <!--   Core JS Files   -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/core/jquery.min.js"></script>
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/core/popper.min.js"></script>
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo web_root;?>admin/adminmenu/assets/demo/demo.js"></script>


  
  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>input-mask/jquery.inputmask.js"></script> 
  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>input-mask/jquery.inputmask.date.extensions.js"></script> 
  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>input-mask/jquery.inputmask.extensions.js"></script> 

  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/kcctc.js"></script>
  <!-- <script src="<?php echo web_root;?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
  <script type="text/javascript" src="<?php echo web_root; ?>js/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>js/autofunc.js"></script>


  <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
      var t = $('#example').DataTable( {
          "bSort": false,
          "columnDefs": [ {
              "searchable": false,
              "orderable": false,
              "targets": 0
          } ],
  

            //vertical scroll
          // "scrollY":        "300px",

          // "scrollCollapse": true,

          //ordering start at column 1
          "order": [[ 1, 'desc' ]]
      } );

      t.on( 'order.dt search.dt', function () {
          t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();
  } );

  </script>


  <script>

  $(function(){
    $(".tds").each(function(i){
      len=$(this).text().length;
      if(len>80)
      {
        $(this).text($(this).text().substr(0,80)+'...');
      }
    });
  });
    $(function () {
      //Add text editor 
      $("#ANNOUNCEMENT_WHAT").wysihtml5();
      $("#EVENT_WHAT").wysihtml5();
      $("#compose-textarea").wysihtml5();
    });
  </script>
  <script type="text/javascript">
      $(function () {
          $('#datetimepicker2').datetimepicker({ 
              locale: 'en',
              todayBtn:1,
              autoclose: 1,
              todayHighlight: 1, 
              forceParse: 0
          });
      });
  </script>

  <script type="text/javascript">
  $('.TRANSDATE').keypress(function(e){
      // mask: "2/1/y h:s",
      // placeholder: "mm/dd/yyyy hh:mm",
      // alias: "dd/mm/yyyy",
    // mask: "2/1/y h:s ",
    // placeholder: "mm/dd/yyyy hh:mm",
    // alias: "date_time",
    // hourFormat: "24"
    // mask: "h:s",
    // placeholder: "hh:mm",
    // alias: "datetime",
    // hourFormat: "24"
    e.preventDefault();
  });


  $("#retype_user_pass").focusout(function(){

          var pass = $("#user_pass").val();
          var repass = $(this).val();
          if (pass != repass) {
              alert("Password does not match");
          };
  });

  function validatedpass(){

      var pass = $("#user_pass").val();
          var repass = $("#retype_user_pass").val();
          if (pass != repass) {
              alert("Password does not match");
              return false
          }else{
              return true
          };
  }

  $('#date_pickerfrom').datetimepicker({
    format: 'yyyy',
      language:  'en',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 4,
      minView: 4,
      forceParse: 0
      });


  $('#date_pickerto').datetimepicker({
    format: 'yyyy',
      language:  'en',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 4,
      minView: 4,
      forceParse: 0
      });



  </script>


  <script>
    function checkall(selector)
    {
      if(document.getElementById('chkall').checked==true)
      {
        var chkelement=document.getElementsByName(selector);
        for(var i=0;i<chkelement.length;i++)
        {
          chkelement.item(i).checked=true;
        }
      }
      else
      {
        var chkelement=document.getElementsByName(selector);
        for(var i=0;i<chkelement.length;i++)
        {
          chkelement.item(i).checked=false;
        }
      }
    }
    function checkNumber(textBox){
          while (textBox.value.length > 0 && isNaN(textBox.value)) {
            textBox.value = textBox.value.substring(0, textBox.value.length - 1)
          }
          textBox.value = trim(textBox.value);
        }
        //
        function checkText(textBox)
        {
          var alphaExp = /^[a-zA-Z]+$/;
          while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
            textBox.value = textBox.value.substring(0, textBox.value.length - 1)
          }
          textBox.value = trim(textBox.value);
        }

    </script>

  <script type="text/javascript">
  


  // function truncateText(selector, maxLength) {
  //     var element = document.querySelector(selector),
  //         truncated = element.innerText;

  //     if (truncated.length > maxLength) {
  //         truncated = truncated.substr(0,maxLength) + '...';
  //     }
  //     return truncated;
  // }
  // //You can then call the function with something like what i have below.
  // document.querySelector('#tds').innerText = truncateText('#tds', 107);
      </script>
  </body>

  </html>
