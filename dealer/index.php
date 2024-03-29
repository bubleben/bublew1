<?php 
  session_start();
  // $deaid=$_SESSION['dea_id']; 
  //   echo $deaid ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/001-resume.png">
  <link rel="icon" type="image/png" href="../assets/img/001-resume.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title> Store  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/login.png" />
</head>
<body class="">
  <div class="wrapper" style="background: #d3d3d3">
    <div class="sidebar" data-background-color="black" style="background: #2e2e2e">
      <div class="logo"><a href="index.php" class="simple-text logo-normal">Store Management</a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="./index.php?page=main">
              <i class="material-icons">reorder</i>
              <p>Main menu</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=dealer">
              <i class="material-icons">supervisor_account</i>
              <p>Dealer info</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=product">
              <i class="material-icons">inventory_2</i>
              <p>Product</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=stock">
              <i class="material-icons">wysiwyg</i>
              <p>Stock</p>
            </a> 
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=sale">
              <i class="material-icons">task</i>
              <p>Sale</p>
            </a> 
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=transport">
              <i class="material-icons">library_books</i>
              <p>Transport</p>
            </a> 
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=Tracking">
              <i class="material-icons">filter_frames</i>
              <p>Tracking</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=Report">
              <i class="material-icons">print</i>
              <p>Report</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./index.php?page=logout">
              <i class="material-icons">logout</i>
              <p>Go to Website</p>
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
          <h4 style="padding-top: 13px">Welcomeback </span><b><?php echo $_SESSION['username'];?></b>  <h4>
            
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" style="padding-right: 10px">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="background: #d3d3d3">
       <?php
        @$page=$_GET['page'];
        switch ($page) {
          case 'main':
              include 'main.php';
              break;
      
          case 'product':
              include 'product.php';
              break;
          case 'pro_edit':
              include 'pro_edit.php';
              break;
          case 'pro_add':
              include 'pro_add.php';
              break;
          case 'pro_save':
              include 'pro_save.php';
              break;

          case 'dealer':
              include 'dealer.php';
              break;
          case 'sup_edit':
              include 'sup_edit.php';
              break;
          case 'sup_add':
              include 'sup_add.php';
              break;
          case 'sup_save':
              include 'sup_save.php';
              break;

          case 'stock':
              include 'stock.php';
              break;
          case 'stock_edit':
              include 'stock_edit.php';
              break;
          case 'stock_add':
              include 'stock_add.php';
              break;
          case 'stock_save':
              include 'stock_save.php';
              break;

          case 'category':
              include 'category.php';
              break;
          case 'Report':
              include 'Report.php';
              break;
          // case 'cate_add':
          //     include 'cate_add.php';
          //     break;
          // case 'cate_save':
          //     include 'cate_save.php';
          //     break;

          case 'province':
              include 'province.php';
              break;
          // case 'province_edit':
          //     include 'province_edit.php';
          //     break;
          // case 'province_add':
          //     include 'province_add.php';
          //     break;
          // case 'province_save':
          //     include 'province_save.php';
          //     break;

          case 'transport':
              include 'transport.php';
              break;
          case 'transport_edit':
              include 'transport_edit.php';
              break;
          case 'transport_add':
              include 'transport_add.php';
              break;
          case 'transport_save':
              include 'transport_save.php';
              break;
              
          case 'Tracking':
              include 'Tracking.php';
              break;
          case 'Tracking_edit':
              include 'Tracking_edit.php';
              break;
          case 'Tracking_add':
              include 'Tracking_add.php';
              break;
          case 'Tracking_save':
              include 'Tracking_save.php';
              break;

          
          case 'sale':
              include 'sale.php';
              break;
          case 'sale_edit':
              include 'sale_edit.php';
              break;
          case 'sale_add':
              include 'sale_add.php';
              break;
          case 'sale_save':
              include 'sale_save.php';
              break;

          case 'logout':
              include 'back_logout.php';
              break;
              
          default:
              include 'main.php';
              break;
        }
        ?> 
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i>
            <a href="" target="_blank"></a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>