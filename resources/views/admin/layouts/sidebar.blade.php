<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <div class="logo-img">
                  
                </div>
                <span class="text">EnfermeriaSI2</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    {{-- <div class="nav-item">
                        <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                    </div> --}}

                    @if(auth()->check() && auth()->user()->role->name == 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Enfermero</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('nurse.create')}}" class="menu-item">Añadir</a>
                            <a href="{{route('nurse.index')}}" class="menu-item">ver</a>
                            {{-- <a href="pages/widget-data.html" class="menu-item">Data</a>
                            <a href="pages/widget-chart.html" class="menu-item">Chart Widget</a> --}}
                        </div>
                    </div>
                    @endif

                    @if(auth()->check() && auth()->user()->role->name == 'nurse')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Reservaciones</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('appointment.create')}}" class="menu-item">Crear Reservaciones</a>
                            <a href="{{route('appointment.index')}}" class="menu-item">ver Reservaciones</a>
                            {{-- <a href="pages/widget-data.html" class="menu-item">Data</a>
                            <a href="pages/widget-chart.html" class="menu-item">Chart Widget</a> --}}
                        </div>
                    </div>
                    @endif

                    @if(auth()->check() && auth()->user()->role->name == 'nurse')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span> Prescripciones de Pacientes</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patients.today')}}" class="menu-item">Pacientes de hoy</a>
                            <a href="{{route('prescribed.patients')}}" class="menu-item">Todos los pacientes</a>
                            {{-- <a href="pages/widget-data.html" class="menu-item">Data</a>
                            <a href="pages/widget-chart.html" class="menu-item">Chart Widget</a> --}}
                        </div>
                    </div>
                    @endif

                    @if(auth()->check() && auth()->user()->role->name == 'nurse')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>reservaciones de Pacientes</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient')}}" class="menu-item">Reservaciones de hoy</a>
                            <a href="{{route('all.appointments')}}" class="menu-item">Todas las reservaciones</a>
                            {{-- <a href="pages/widget-data.html" class="menu-item">Data</a>
                            <a href="pages/widget-chart.html" class="menu-item">Chart Widget</a> --}}
                        </div>
                    </div>
                    @endif

                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>cerrar sesion</span></a>
                         <form id="logout-form" action="{{ route        ('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                   
                </nav>
            </div>
        </div>
    </div>