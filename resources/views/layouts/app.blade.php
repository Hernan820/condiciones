<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
    <meta name="author" content="Bootlab">

    <title>Loan management.</title>

    <!-- PICK ONE OF THE STYLES BELOW -->
    <!-- <link href="css/modern.css" rel="stylesheet"> -->
    <!-- <link href="css/classic.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->
    <link href="css/light.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js"></script>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>

    <!-- BEGIN SETTINGS -->
    <!-- You can remove this after picking a style -->
    <style>
    body {
        opacity: 0;
    }
    </style>

    <script src="{{ asset('js/settings.js') }}"></script>


    <!-- END SETTINGS -->
</head>

<body>
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>

    <div class="wrapper">
        @guest
        @else
        <nav id="sidebar" class="sidebar">
            <a class="sidebar-brand" href="" >
            <img src="{{ asset('img/avatars/avatar.jpeg') }}" style="width:40px">
                <span id="nombrempresa" >  </span>
            </a>
            <div class="sidebar-content">
                <div class="sidebar-user">
                    <img src="{{ asset('img/avatars/avatar-2.jpg') }}" class="img-fluid rounded-circle mb-2"
                        style="height: 94px !important ; width: 94px  !important ;" alt="Linda Miller" />
                    <div class="fw-bold">{{ Auth::user()->name }}</div>
                    <small>File Processor</small>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main
                    </li>
                   <li class="sidebar-item " id="itemregistro">
                        <a class="sidebar-link" href="" id="vistaregistro" >
                        <i class="align-middle me-2 fas fa-fw fa-file-text"></i> <span class="align-middle">Files in process</span>
                        </a>
                    </li> 
                  @if(@Auth::user()->hasRole('Admin|master'))
                    <li class="sidebar-item " id="itemManagement">
                        <a class="sidebar-link" href="" id="vistamanagement" >
                            <i class="align-middle me-2 fas fa-fw fa-user"></i> <span class="align-middle">Users Management</span>
                        </a>
                    </li>   
                    @endif
                 @if(@Auth::user()->hasRole('Admin|master'))
                    <li class="sidebar-item " id="itemCompania">
                        <a class="sidebar-link" href="" id="vistaCompania" >
                        	<i class="align-middle me-2 fas fa-fw fa-briefcase"></i> <span class="align-middle">Companies</span>
                        </a>
                    </li> 
                    @endif
                    <li class="sidebar-item " id="itemCuestionario">
                        <a class="sidebar-link" href="" id="vistaCuestionario" >
                            <i class="align-middle me-2 fas fa-fw fa-question"></i> <span class="align-middle">Questionnaires</span>
                        </a>
                    </li> 

                    <li class="sidebar-item " id="itemOpenign">
                        <a class="sidebar-link" href="" id="vistaopening" >
                            <i class="align-middle me-2 fas fa-fw fa-folder"></i> <span class="align-middle">Files to opening</span>
                        </a>
                    </li> 
                    
                    <li class="sidebar-item " id="itemTask">
                        <a class="sidebar-link" href="" id="vistaTask" >
                            <i class="align-middle me-2 fas fa-fw fa-tasks"></i> <span class="align-middle">tasks</span>
                        </a>
                    </li> 
<!-- END  
                     <--<li class="sidebar-item" id="opcioncondiciones">
                        <a class="sidebar-link" id="vistabancos" href="">
                            <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">CONDICIONES</span>
                        </a>
                    </li>   -->      
                </ul>
            </div>
        </nav>
        @endguest

        <div class="main">
            <nav class="navbar navbar-expand navbar-theme">
                <a class="sidebar-toggle d-flex me-2">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        @guest
                        @else
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown"
                                data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-envelope-open"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">
                                        4 New Messages
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-5.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Michelle Bilodeau">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Michelle Bilodeau</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu
                                                    tortor.</div>
                                                <div class="text-muted small mt-1">5m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-3.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Kathie Burton">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Kathie Burton</div>
                                                <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.
                                                </div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-2.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Alexander Groves">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Alexander Groves</div>
                                                <div class="text-muted small mt-1">Curabitur ligula sapien euismod
                                                    vitae.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-4.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Daisy Seger">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Daisy Seger</div>
                                                <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed,
                                                    posuere ac, mattis non.</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all messages</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown"
                                data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-bell"></i>
                                <span class="indicator"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-danger fas fa-fw fa-bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-warning fas fa-fw fa-envelope-open"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Lorem ipsum</div>
                                                <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
                                                    hendrerit et.</div>
                                                <div class="text-muted small mt-1">6h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-primary fas fa-fw fa-building"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Login from 192.186.1.1</div>
                                                <div class="text-muted small mt-1">8h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="ms-1 text-success fas fa-fw fa-bell-slash"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Anna accepted your request.</div>
                                                <div class="text-muted small mt-1">12h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown"
                                data-bs-toggle="dropdown">
                                <i class="align-middle fas fa-cog"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <a class="dropdown-item " data-target="#" data-toggle="modal" href="#"
                                    id="mantBancos"><i class="align-middle me-1 fas fa-fw fa-user"></i> Mant. Bancos</a>
                                <a class="dropdown-item" href="#"><i
                                        class="align-middle me-1 fas fa-fw fa-comments"></i> Contacts</a>
                                <a class="dropdown-item" href="#"><i
                                        class="align-middle me-1 fas fa-fw fa-chart-pie"></i> Analytics</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-cogs"></i>
                                    Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i
                                        class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
                            </div>
                        </li>
                        @endguest

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid contenido">
                    @yield('content')
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-8 text-start">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms of Service</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4 text-end">
                        <p class="mb-0">
								&copy; <?php echo date('Y'); ?> <a href="https://contigomortgage.com" class="text-muted">Contigo Mortgage</a>
							</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- BEGIN primary modal -->

    <div class="modal fade" id="modalbancos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">BANCOS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form id="frmbanco">
                        <div class="mb-3">
                            <label class="form-label">BANCO</label>
                            <input type="text" class="form-control" name="nbrbanco" id="nbrbanco"
                                placeholder="Nombre banco" autocomplete="off">
                        </div>

                        <button type="button" id="agregabanco" class="btn btn-primary">agregar</button>
                    </form>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:40%;">Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>cuscatlan</td>
                                <td class="table-action">
                                    <a href="#"><i class="align-middle fas fa-fw fa-pen"></i></i></a>&nbsp;
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <svg width="0" height="0" style="position:absolute">
        <defs>
            <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
                <path
                    d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
                </path>
            </symbol>
        </defs>
    </svg>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mantenimientobanco.js') }}"></script>
    <script src="{{ asset('js/master.js') }}"></script>


</body>

</html>