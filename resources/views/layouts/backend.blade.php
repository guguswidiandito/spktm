<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
      rel="stylesheet">
      <link href="{{ asset('/css/font-awesome.css')}}" rel="stylesheet">
      <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
      
      <script>
      window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
      ]); ?>
      </script>
    </head>
    <body>
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="#">SPKTM </a>
            <div class="nav-collapse">
              <ul class="nav pull-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="#">STMIK YMI Tegal</a></li>
                @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
                @endif
              </li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- /container -->
      </div>
      <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="subnavbar">
      <div class="subnavbar-inner">
        <div class="container">
          <ul class="mainnav">
            @if (Auth::check())
            <li class="{{ url('/home') == request()->url() ? 'active' : '' }}"><a href="{{ url('/home') }}" title=""><i class="icon-dashboard"></i><span>Dashboard</span></span> </a></li>
            <li class="{{ route('mahasiswa.index') == request()->url() ? 'active' : '' }}"><a href="{{ route('mahasiswa.index') }}" title=""><i class="icon-list-alt"></i><span>Mahasiswa</span> </a></li>
            <li class="{{ route('mahasiswa.transaksi') == request()->url() ? 'active' : '' }}"><a href="{{ route('mahasiswa.transaksi') }}" title="" ><i class="icon-code"></i><span>Transaksi</span> </a> </li>
            <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-long-arrow-down"></i>
                <span>Prediksi</span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('prediksi.training') }}" title="">Training Set</a></li>
                <li><a href="{{ route('prediksi.ipk12') }}" title="">IPK Semester 1-2</a></li>
                <li><a href="{{ route('prediksi.ipk123') }}" title="">IPK Semester 1-3</a></li>
                <li><a href="{{ route('prediksi.ipk1234') }}" title="">IPK Semester 1-4</a></li>
                <li><a href="{{ route('prediksi.ipk123456') }}" title="">IPK Semester 1-6</a></li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
        <!-- /container -->
      </div>
      <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->
    <div class="main">
      <div class="main-inner">
        <div class="container">
          <div class="row">
            {{-- <div class="span12">
              <div class="widget widget-nopad">
                <div class="widget-header">
                  <h3></h3>
                </div>
                <div class="widget-content">
                  <div class="widget big-stats-container">
                    <div class="widget-content">
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
            @include('layouts._flash')
            @yield('content')
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer">
    <div class="footer-inner">
      <div class="container">
        <div class="row">
          <div class="span12"> &copy; 2017 <a href="http://www.egrappler.com/">Gugus Widiandito@13115051</a>. </div>
          <!-- /span12 -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /footer-inner -->
  </div>
  <!-- /footer -->
  <!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{asset('/js/jquery-3.1.0.min.js')}}"></script>
  {{-- <script src="{{asset('/js/excanvas.min.js')}}"></script> --}}
  {{-- <script src="{{asset('/js/chart.min.js')}}" type="text/javascript"></script> --}}
  <script src="{{asset('/js/bootstrap.min.js')}}"></script>
  {{-- <script src="{{ asset('js/base.js')}}"></script> --}}
  <script src="{{ asset('/js/custom.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script>
  $( "#dropdown" ).select2({
  theme: "bootstrap"
  });
  </script>
  @yield('scripts')
</body>
</html>