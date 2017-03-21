<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ asset('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>D</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b> Dashboard</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset('assets/dashboard/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset('assets/dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                            <p>
                                {{ Auth::user()->email }} <br >
                                {{ Auth::user()->name }}
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat disabled">Profile</a>
                            </div>
                            <div class="pull-right">
                                {!! Form::open(['route' => 'logout','name' => 'logout-form','id' => 'logout-form',]) !!}
                                {{ csrf_field() }}
                                {!! Form::button('Log Out', ['type' => 'submit','class' => 'btn btn-default btn-flat']) !!}
                                {!! Form::close() !!}

                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">GENERAL MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li {{ ((Request::is('dashboard/auctioneers')) ? 'class=active' : ' ') }}><a href="{{ url('/dashboard/auctioneers') }}"><i class="glyphicon glyphicon-usd"></i> <span>Auctioneers</span></a></li>
            <li {{ ((Request::is('dashboard/auction-houses')) ? 'class=active' : ' ') }}><a href="{{ url('/dashboard/auction-houses') }}"><i class="fa fa-group"></i> <span>Auction Houses</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>