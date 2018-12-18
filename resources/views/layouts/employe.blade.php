<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>POME</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>


  <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('global/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">

  <!-- Plugins -->
  <link rel="stylesheet" href="{{asset('global/vendor/animsition/animsition.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/asscrollable/asScrollable.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/switchery/switchery.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/intro-js/introjs.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/slidepanel/slidePanel.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/flag-icon-css/flag-icon.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/waves/waves.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/blueimp-file-upload/jquery.fileupload.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/dropify/dropify.css')}}">
  <link rel="stylesheet" href="{{asset('global/vendor/summernote/summernote.css')}}">
  <link rel="stylesheet" href="{{asset('assets/examples/css/pages/project.css')}}">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{asset('global/fonts/font-awesome/font-awesome.css')}}">
  <link rel="stylesheet" href="{{asset('global/fonts/material-design/material-design.min.css')}}">
  <link rel="stylesheet" href="{{asset('global/fonts/brand-icons/brand-icons.min.css')}}">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="{{asset('global/vendor/breakpoints/breakpoints.js')}}"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body class="animsition site-navbar-small dashboard">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <a class="navbar-brand navbar-brand-center" href="/index.html">
        <img class="navbar-brand-logo navbar-brand-logo-normal" src="../../assets/images/logo.png"
        title="Remark">
        <img class="navbar-brand-logo navbar-brand-logo-special" src="../../assets/images/logo-blue.png"
        title="Remark">
        <span class="navbar-brand-text hidden-xs-down"> Staff</span>
      </a>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon md-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
                </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="/{{Auth::user()->image}}" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
    </div>
  </nav>

  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="dropdown site-menu-item has-sub">
                <a data-toggle="dropdown" href="{{route('home')}}" data-dropdown-toggle="false">
                  <i class="site-menu-icon md-apps" aria-hidden="true"></i>
                  <span class="site-menu-title">Dashboard</span></a>
              </li>

              <li class="dropdown site-menu-item has-sub">
                <a data-toggle="dropdown" href="{{route('project')}}" data-dropdown-toggle="false">
                  <i class="site-menu-icon oi-briefcase" aria-hidden="true"></i>
                  <span class="site-menu-title">Project</span></a>
              </li>

            </ul>
          </div>
        </div>
      </div>
  </div>

  <!-- Page -->
  <div class="page">
      @yield('page-content')
  </div>
  <!-- End Page -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© 2017 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
    <div class="site-footer-right">
      Crafted with <i class="red-600 icon md-favorite"></i> by <a href="http://themeforest.net/user/amazingSurge">amazingSurge</a>
    </div>
  </footer>
  <!-- Core  -->
  <script src="{{asset('global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
  <script src="{{asset('global/vendor/jquery/jquery.js')}}"></script>
  <script src="{{asset('global/vendor/tether/tether.js')}}"></script>
  <script src="{{asset('global/vendor/bootstrap/bootstrap.js')}}"></script>
  <script src="{{asset('global/vendor/animsition/animsition.js')}}"></script>
  <script src="{{asset('global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
  <script src="{{asset('global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
  <script src="{{asset('global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
  <script src="{{asset('global/vendor/waves/waves.js')}}"></script>
  <!-- Plugins -->
  <script src="{{asset('global/vendor/switchery/switchery.min.js')}}"></script>
  <script src="{{asset('global/vendor/intro-js/intro.js')}}"></script>
  <script src="{{asset('global/vendor/screenfull/screenfull.js')}}"></script>
  <script src="{{asset('global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
  <script src="{{asset('global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
  <script src="{{asset('global/vendor/peity/jquery.peity.min.js')}}"></script>
  <script src="{{asset('global/vendor/bootbox/bootbox.js')}}"></script>
  <script src="{{asset('global/vendor/asrange/jquery-asRange.min.js')}}"></script>
  <script src="{{asset('global/vendor/typeahead-js/bloodhound.min.js')}}"></script>
  <script src="{{asset('global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
  <script src="{{asset('global/vendor/typeahead-js/typeahead.jquery.min.js')}}"></script>
  <script src="{{asset('global/vendor/dropify/dropify.min.js')}}"></script>
  <script src="{{asset('global/vendor/formatter/jquery.formatter.js')}}"></script>
  <script src="{{asset('global/vendor/summernote/summernote.min.js')}}"></script>
  <!-- Scripts -->
  <script src="{{asset('global/js/State.js')}}"></script>
  <script src="{{asset('global/js/Component.js')}}"></script>
  <script src="{{asset('global/js/Plugin.js')}}"></script>
  <script src="{{asset('global/js/Base.js')}}"></script>
  <script src="{{asset('global/js/Config.js')}}"></script>
  <script src="{{asset('assets/js/Section/Menubar.js')}}"></script>
  <script src="{{asset('assets/js/Section/PageAside.js')}}"></script>
  <script src="{{asset('assets/js/Section/Sidebar.js')}}"></script>
  <script src="{{asset('assets/js/Plugin/menu.js')}}"></script>
  <!-- Config -->
  <script src="{{asset('global/js/config/colors.js')}}"></script>
  <script src="{{asset('assets/js/config/tour.js')}}"></script>
  <script>
  Config.set('assets', '{{asset('assets')}}');
  </script>
  <!-- Page -->
  <script src="{{asset('assets/js/Site.js')}}"></script>
  <script src="{{asset('global/js/Plugin/asscrollable.js')}}"></script>
  <script src="{{asset('global/js/Plugin/slidepanel.js')}}"></script>
  <script src="{{asset('global/js/Plugin/switchery.js')}}"></script>
  <script src="{{asset('global/js/Plugin/matchheight.js')}}"></script>
  <script src="{{asset('global/js/Plugin/peity.js')}}"></script>
  <script src="{{asset('assets/examples/js/dashboard/v1.js')}}"></script>
  <script src="{{asset('global/js/Plugin/summernote.js')}}"></script>
  <script src="{{asset('global/js/Plugin/filterable.js')}}"></script>
  <script src="{{asset('assets/examples/js/pages/project.js')}}"></script>
  <script src="{{asset('global/js/Plugin/formatter.js')}}"></script>
</body>
</html>
