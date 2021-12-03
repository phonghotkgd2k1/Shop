@extends('Admin.layout.master_layout')
@section('content')
<div class="wrapper">
      <!-- Navbar -->
        <div class="row">
          <!--Kho nhập -->
          <input type="hidden" value='{{ $nthang1[0]}}' id="nthang1">
          <input type="hidden" value='{{ $nthang2[0]}}' id="nthang2">
          <input type="hidden" value='{{ $nthang3[0] }}' id="nthang3">
          <input type="hidden" value='{{ $nthang4[0]}}' id="nthang4">
          <input type="hidden" value='{{ $nthang5[0]}}' id="nthang5">
          <input type="hidden" value='{{ $nthang6[0]}}' id="nthang6">
          <input type="hidden" value='{{ $nthang7[0]}}' id="nthang7">
          <input type="hidden" value='{{ $nthang8[0]}}' id="nthang8">
          <input type="hidden" value='{{ $nthang9[0] }}' id="nthang9">
          <input type="hidden" value='{{ $nthang10[0]}}' id="nthang10">
          <input type="hidden" value='{{ $nthang11[0]}}' id="nthang11">
          <input type="hidden" value='{{ $nthang12[0]}}' id="nthang12"> 


          <!--kho xuất -->
          <input type="hidden" value='{{ $thang1[0]}}' id="thang1">
          <input type="hidden" value='{{ $thang2[0]}}' id="thang2">
          <input type="hidden" value='{{ $thang3[0] }}' id="thang3">
          <input type="hidden" value='{{ $thang4[0]}}' id="thang4">
          <input type="hidden" value='{{ $thang5[0]}}' id="thang5">
          <input type="hidden" value='{{ $thang6[0]}}' id="thang6">
          <input type="hidden" value='{{ $thang7[0]}}' id="thang7">
          <input type="hidden" value='{{ $thang8[0]}}' id="thang8">
          <input type="hidden" value='{{ $thang9[0] }}' id="thang9">
          <input type="hidden" value='{{ $thang10[0]}}' id="thang10">
          <input type="hidden" value='{{ $thang11[0]}}' id="thang11">
          <input type="hidden" value='{{ $thang12[0]}}' id="thang12"> 
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category"></h5>
                    <h2 class="card-title"></h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-primary btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"></span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-single-02"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"></span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-gift-2"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="2">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"></span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-tap-02"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script type="text/javascript">
  window.onload = function () {
  
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light1", // "light2", "dark1", "dark2"
    animationEnabled: false, // change to true		
    title:{
      text: "Tổng nhập"
    },
    data: [
    {
      
      type: "column",
      dataPoints: [
        { label: "Tháng 1",  y: Number(document.getElementById("nthang1").value)},
        { label: "Tháng 2", y: Number(document.getElementById("nthang2").value)},
        { label: "Tháng 3", y: Number(document.getElementById("nthang3").value)},
        { label: "Tháng 4", y: Number(document.getElementById("nthang4").value)},
        { label: "Tháng 5",  y: Number(document.getElementById("nthang5").value)},
        { label: "Tháng 6",  y: Number(document.getElementById("nthang6").value)},
        { label: "Tháng 7", y: Number(document.getElementById("nthang7").value)},
        { label: "Tháng 8", y: Number(document.getElementById("nthang8").value)},
        { label: "Tháng 9",  y: Number(document.getElementById("nthang9").value)},
        { label: "Tháng 10", y: Number(document.getElementById("nthang10").value)},
        { label: "Tháng 11", y: Number(document.getElementById("nthang11").value)},

        { label: "Tháng 12", y: Number(document.getElementById("nthang12").value)},

      ]
    }
    ]
  });
  chart.render();

  var chart1 = new CanvasJS.Chart("chartContainer1", {
    theme: "light1", // "light2", "dark1", "dark2"
    animationEnabled: false, // change to true		
    title:{
      text: "Tổng xuất"
    },
    data: [
    {
      
      type: "column",
      dataPoints: [
        { label: "Tháng 1",  y: Number(document.getElementById("thang1").value)},
        { label: "Tháng 2", y: Number(document.getElementById("thang2").value)},
        { label: "Tháng 3", y: Number(document.getElementById("thang3").value)},
        { label: "Tháng 4", y: Number(document.getElementById("thang4").value)},
        { label: "Tháng 5",  y: Number(document.getElementById("thang5").value)},
        { label: "Tháng 6",  y: Number(document.getElementById("thang6").value)},
        { label: "Tháng 7", y: Number(document.getElementById("thang7").value)},
        { label: "Tháng 8", y: Number(document.getElementById("thang8").value)},
        { label: "Tháng 9",  y: Number(document.getElementById("thang9").value)},
        { label: "Tháng 10", y: Number(document.getElementById("thang10").value)},
        { label: "Tháng 11", y: Number(document.getElementById("thang11").value)},

        { label: "Tháng 12", y: Number(document.getElementById("thang12").value)},

      ]
    }
    ]
  });
  chart1.render();
  
  }
  </script>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"></h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i></h3>
              </div>
              <div class="card-body">
                <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
            </div>
          </div>
          
          
        </div>
        
      
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
          <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
            Documentation
          </a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
          <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
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

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
@endsection