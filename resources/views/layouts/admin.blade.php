<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CJF-COST</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{ HTML::style('/css/bootstrap.min.css') }}
  {{ HTML::style('/css/select2.min.css') }}
  {{ HTML::style('/css/AdminLTE.min.css') }}
  {{ HTML::style('/css/_all-skins.min.css') }}
  {{ HTML::style('/css/dataTables.bootstrap.css') }}
  {{ HTML::style('/css/font-awesome.min.css') }}
  {{ HTML::script('/js/jquery-2.2.3.min.js') }}

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
 <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  <style>
 .readonly{
    border:none;
    color:white;
    background-color: white;
  }
  fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.2em 1.2em 1.2em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        margin: 12px 2px 12px;
        border-bottom:none;
    }
  </style>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CJFI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CJF-COST</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
        
    
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        {{ HTML::image('images/avatar.png', 'a picture', array('class' => 'img-circle')) }}
         </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
   <!--    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>MASTER MENU</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">10</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/brands')}}"><i class="fa fa-circle-o"></i> Brands</a></li>
            <li><a href="{{url('admin/items')}}"><i class="fa fa-circle-o"></i> Items</a></li>
            <li><a href="{{url('admin/lines')}}"><i class="fa fa-circle-o"></i> Lines</a></li>
            <li><a href="{{url('admin/cost-items')}}"><i class="fa fa-circle-o"></i> Cost Items</a></li>
            <li><a href="{{url('admin/formulas')}}"><i class="fa fa-circle-o"></i> Formulas</a></li>
            <li><a href="{{url('admin/types')}}"><i class="fa fa-circle-o"></i> Types</a></li>
            <li><a href="{{url('admin/motifs')}}"><i class="fa fa-circle-o"></i> Motifs</a></li>
            <li><a href="{{url('admin/sizes')}}"><i class="fa fa-circle-o"></i> Sizes</a></li>
            <li><a href="{{url('admin/colors')}}"><i class="fa fa-circle-o"></i> Colors</a></li>
            <li><a href="{{url('admin/rollers')}}"><i class="fa fa-circle-o"></i> Rollers</a></li>
          </ul>
        </li>


        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/bodys')}}"><i class="fa fa-circle-o"></i> Formula Body</a></li>
            <li><a href="{{url('admin/aluminas')}}"><i class="fa fa-circle-o"></i> Formula Alumina</a></li>
            <li><a href="{{url('admin/engobes')}}"><i class="fa fa-circle-o"></i> Formula Engobe</a></li>
            <li><a href="{{url('admin/glazes')}}"><i class="fa fa-circle-o"></i> Formula Glaze</a></li>
            <li><a href="{{url('admin/drops')}}"><i class="fa fa-circle-o"></i> Formula Drop</a></li>
            <li><a href="{{url('admin/pastas')}}"><i class="fa fa-circle-o"></i> Formula Pasta</a></li>
            <li><a href="{{url('admin/inks')}}"><i class="fa fa-circle-o"></i> Formula INK</a></li>
            <li><a href="{{url('admin/pcosts')}}"><i class="fa fa-circle-o"></i> Production Cost</a></li>
            <li><a href="{{url('admin/prices')}}"><i class="fa fa-circle-o"></i> Prices ITEM</a></li>
            <li><a href="{{url('admin/finishs')}}"><i class="fa fa-circle-o"></i> Finish ITEM</a></li>
          </ul>
        </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/reportAll')}}"><i class="fa fa-circle-o"></i> General Report</a></li>
           
          </ul>
        </li>
          <li><a href="{{url('logout')}}" title="Logout"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
        
        
        
        
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>PT CHANG JUI FANG INDONESIA</b> 
    </div>
    <strong>Copyright &copy; 2017 <a href="http://cjfi.co.id">CJFI</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

{{ HTML::script('/js/jquery.number.js') }}
{{ HTML::script('/js/bootstrap.min.js') }}
{{ HTML::script('/js/jquery.slimscroll.min.js') }}
{{ HTML::script('/js/fastclick.js') }}
{{ HTML::script('/js/app.min.js') }}
{{ HTML::script('/js/demo.js') }}
{{ HTML::script('/js/jquery.dataTables.js')}}
{{ HTML::script('/js/dataTables.bootstrap.min.js')}}
 {{ HTML::script('/js/select2.full.min.js') }}


<script>
  $(function () {
    $("#example").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
