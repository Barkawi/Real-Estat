<!DOCTYPE html>
<html lang="en">
  <head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BZ-SOFT Locations Software </title>

    <!-- Bootstrap -->
	  <link rel="stylesheet" href="{{  asset('assets/vendors/bootstrap/dist/css/bootstrap-select.css')  }} ">
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }} " rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/vendors/iCheck/skins/flat/green.css') }} " rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }} " rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets/vendors/jqvmap/dist/jqvmap.min.css') }} " rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/sweetalert2.min.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/build/css/custom.min.css') }} " rel="stylesheet">
	   <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap-select.js') }} " defer></script>
  </head>
<script type="text/javascript">
     function go_full_screen(){
    var elem = document.documentElement;
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen();
    }
}
        </script>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa "></i> <span>BZ-SOFT </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Home <span class="fa "></span></a> </li>
              
                  
				   <li><a href="{{ url('Zones') }}"><i class="fa fa-building"></i> Zones <span class="fa "></span></a>
                    
                  </li>
				   <li><a href="{{ url('Immeubles') }}"><i class="fa fa-cubes"></i> Immeuble <span class="fa "></span></a>
                    
                  </li>
				   <li><a><i class="fa fa-group"></i> Contact <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('proprietaires') }}">Proprietaires</a></li>
                      <li><a href="{{ url('locataires') }}">Locataires</a></li>
                   </ul>
                  </li>
				   </li> 
				   <li><a href="{{url('appartements')}}"><i class="fa fa-square"></i> Appartement <span class="fa "></span></a>
                 
                  </li>

                  
				          <li><a><i class="fa fa-dollar"></i> Encaissements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{ url('encaissement/Etat') }}"><i class="fa fa-square"></i> Encaissement <span class="fa "></span></a></li>
                     <li><a href="PrintRe.php"><i class="fa fa-calendar"></i>Etat Date </a></li>
                    </ul>
                  </li>
                  <li><a href="{{url('datas')}}"><i class="fa fa-square"></i> Our Data <span class="fa "></span></a>
                 
                 </li>
                 <li>
                    <div class="sidebar-footer hidden-small">
            
              <a data-toggle="tooltip" data-placement="top" onclick="go_full_screen();" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
             
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div></li>
                </ul>
              </div>
             

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>
		<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <li>
                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>
                  </ul>
                </li>

                
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  
              </ul>
            </nav>
			
        <form method="POST" action="#" style="float:left">
			<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" name="Sh" class="form-control" placeholder="chercher un Locataire">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
			  </form>
          </div>
        </div>
        <!-- /top navigation -->


@yield('content')




        <!-- Footer -->

         <footer>
          <div class="pull-right">
            BZSOFT - Agence immobilier SOFTWARE MANAGEMENT</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{  asset('assets/vendors/jquery/dist/jquery.min.js')  }} "></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }} "></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/vendors/nprogress/nprogress.js') }} "></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/vendors/iCheck/icheck.min.js') }} "></script>
    <!-- Datatables -->
    <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/jszip/dist/jszip.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/pdfmake.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/vfs_fonts.js') }} "></script>
    <script src="{{ asset('assets/vendors/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset('assets/vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('assets/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/build/js/custom.min.js') }} "></script>
    <script src="{{ asset('assets/build/js/sweetalert2.min.js') }} "></script>
   <script>
  $('.deleteobj').click(function(){
     if(confirm("are you sure ?")){
       return true;
     }
     return false;
   });

   function myFunction() {
    var x = document.getElementById("de").value;
    document.getElementById('a').min = x;
}
   </script>

  </body>
</html>