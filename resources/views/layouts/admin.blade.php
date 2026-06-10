<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAACo1BMVEX////9/v684ee74Ofp9few2+Oc0tsdma0gm6/T6+/h8vROr78Gj6UFjqUAjKM2pLbf8PNNr78CjaQOkqi64OYSlKnM6O1xv8z1+/xuvsvx+fr3+/xetsXc7/Lw+Prt9/k0pLbS6+9PsMB1wc34/P2Z0dra7vIQk6my3OP5/P1IrL2BxtLi8vU0o7ZDqrvv+Pn9/v/+///3/Pys2eELkacKkKav2+L6/f656PJszuPU8Pfr9vj8/v7z+ftLrr5ft8X8/f6o4u4TsNIKrdDC6/Py+fovobSPzdf7/f2e09wDjaQqn7Ln9Pbx+vw/v9oAqs7J5+sPk6knnrHl8/bQ6u4UlaoPk6jI5uvi9fknt9YJrdDE6/Tj8vU7prgMkadbtcT0+vvq9vguobMEjqSo2OD0+/yr4Oqf3Oei3OjR7PHg8fTC4+ml1t7k8/X7/f71+vs9qLnq9fdCqrsfmq49p7n6/f1svcpmusjo9fcrn7IDjqSn19/0+/3C5+5Ws8IRlKkKkKcHj6YBjaMJkKZTssHe8PPN6O0TlKoNkqjG5erh9flLw9yS2eim2+W44OeRztgIj6YXlqup2ODL5+yX0NomnbHg9fkftNQFrM8jttXJ7fUKkaei1d3G5evq+PsuudctoLOw2+Kh1N0Rk6mC1ecGrM9+xdA6prg1pLaOzNbL6Ozw+vx91OYzu9jJ5+wzo7V8xNBluced09z2+/xqvMllusfp+Pv4/f74/PxnushctsTz+vtKrb4BjKNAqbq33+W74OY/qLrf8fTY7fFFq7xVssKk1t7X7fDZ7vGq2eBdtsTS6u/i8vQEjqUZl6w2pbcbmK1juMea0ts8p7n1+/vm9PZQsMAgmq4onrFctcSm19/s9vi03eSQzdeLy9WY0dq+4uisPBg1AAACIklEQVQ4y32TZ1sTQRSFTzRi2xxlI2hQIworBpEExY6CJFHEgoq9IHZNjMQgii2U2LD3QmxYsaJix14QNfbe0J/iBwHZ6HK+zbzvM3PvPHcAxajq1VcpU6gbBDRs1FiZN2kqaNisuTIPFElti7o5g4Lr5kLLVnVzXYgCb93mD2+rVxDahZIUdO07hIUrPJCkpaDrGChGdFI4whAQ2TkkqgsZbfyHmUwAENNVBXSLZfcefrhnr959YOgbBwDo15+MT5ALAxLNFmvYwEFJAIDByRwyVMaHDU8xW0aM5KhUAMDoMRw7TiaMnzAxcdLkKWlT0wEA06ZzxkyZMGv2nLnzbPb5wTabzbEAGU5SkgkLXZk1camRvshfyFossirikixkL+Wy5TJhxUp3Tm4eme/JWbUaWLOW6wpkwvoNGzdt3rKV27bvsALYKXKXQybs3rN3X6Hdy0wbAFgjSXcWAPV+SZIk6UAMDh5KMVvsXh5WA0BRGoUjAFB0VCCpcRtgOnbcbLF7NSdUAKJOksXZAGAtOBVLFp8GcObsucLzJReMAPQXRXouVd1delmkcMUBIO7qtevZcQBSbwgUb5ZVV+e4dZvinbul1evwe9Eief/B3/ofPhLJiMflT4wZGfqKp8+CSNH1vHaHvngPyRcvQ53OV68FkrFvfPJRKHtbomFN8t6Vv/cftpgP0sdPuflksvbzl6/f/v8hKr7/qKz8+cuXVGvzN3L9jqc5Y06VAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/iconly.css') }}">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .input-group .select2-container {
            flex: 1 1 auto;
            width: 1% !important;
        }

        .input-group .select2-container--default .select2-selection--single {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            height: 38px;
            border-left: 0;
        }

        .input-group .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
            padding-left: 12px;
        }

        .input-group .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
        }
    </style>

</head>

<body>
    <script src="{{ asset('./assets/static/js/initTheme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ url('/admin') }}">
                                ADMIN
                                <!-- <img src="{{ asset('./assets/compiled/svg/logo.svg') }}" alt="Logo" srcset=""> -->
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}" ">
                            <a href=" {{url('/admin')}}" class='sidebar-link'>
                            <i class="bi bi-house"></i>
                            <span>Inicio</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Configuración</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item">
                                    <a href="{{ url('/admin/ajuste')}}" class='submenu-link'>
                                        <i class="bi bi-gear-fill"></i>
                                        <span>Ajustes</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ url('/admin/catalogos')}}" class='submenu-link'>
                                        <i class="bi bi-book"></i>
                                        <span>Catalogo</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{url('/admin/roles')}}" class='submenu-link'>
                                        <i class="bi bi-shield-check"></i>
                                        <span>Roles</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{url('/admin/usuarios')}}" class='submenu-link'>
                                        <i class="bi bi-person-add"></i>
                                        <span>Usuarios</span>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="sidebar-item  has-sub">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Inventario</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item">
                                    <a href="{{ url('/admin/categorias')}}" class='submenu-link'>
                                        <i class="bi bi-tags"></i>
                                        <span>Categoría</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ url('/admin/productos')}}" class='submenu-link'>
                                        <i class="bi bi-box-seam"></i>
                                        <span>Productos</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{url('/admin/compras')}}" class='submenu-link'>
                                        <i class="bi bi-cart"></i>
                                        <span>Compras</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{url('/admin/proveedores')}}" class='submenu-link'>
                                        <i class="bi bi-truck"></i>
                                        <span>Proveedor</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{url('/admin/ajustes-inventario')}}" class='submenu-link'>
                                        <i class="bi bi-gear"></i>
                                        <span>Ajustes</span>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <!-- <li class="sidebar-title">Inventario</li>
                        <li class="sidebar-item {{ request()->is('admin/categoria*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/categorias')}}" class='sidebar-link'>
                                <i class="bi bi-tags"></i>
                                <span>Categoria</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('admin/productos*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/productos')}}" class='sidebar-link'>
                                <i class="bi bi-box-seam"></i>
                                <span>Productos</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('admin/compras*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/compras')}}" class='sidebar-link'>
                                <i class="bi bi-cart"></i>
                                <span>Compras</span>
                            </a>
                        </li>
                                                <li class="sidebar-item {{ request()->is('admin/facturas*') ? 'active' : '' }}">
                                                    <a href="{{ url('/admin/facturas')}}" class='sidebar-link'>
                                                        <i class="bi bi-cash-stack"></i>
                                                        <span>Ventas</span>
                                                    </a>
                                                </li> -->
                        <li class="sidebar-item  has-sub">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Atenciones</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item">
                                    <a href="{{url('/admin/pacientes')}}" class='submenu-link'>
                                        <i class="bi bi-person-circle"></i>
                                        <span>Pacientes</span>
                                    </a>
                                </li>
                                <!-- <li class="submenu-item">
                                    <a href="{{url('/admin/clientes')}}" class='submenu-link'>
                                        <i class="bi bi-people"></i>
                                        <span>Clientes</span>
                                    </a>
                                </li> -->
                                <li class="submenu-item">
                                    <a href="{{url('/admin/facturas')}}" class='submenu-link'>
                                        <i class="bi bi-cash-stack"></i>
                                        <span>Facturas</span>
                                    </a>
                                </li>

                                <li class="submenu-item">
                                    <a href="{{url('/admin/consultas')}}" class='submenu-link'>
                                        <i class="bi bi-person-hearts"></i>
                                        <span>Ordenes</span>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="sidebar-item  has-sub">

                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>{{ Auth::user()->name ?? ''}}</span>
                            </a>


                            <ul class="submenu ">

                                <!-- <li class="submenu-item  ">
                                                                            <a href="extra-component-avatar.html" class="submenu-link">Avatar</a>
                                                                    
                                                                        </li> -->


                                <li class="submenu-item">
                                    <a href="account-profile.html" class="submenu-link">
                                        <i class="bi bi-person-badge"></i>
                                        <span>Perfil</span></a>
                                </li>
                                <li class="submenu-item">
                                    <a href="account-security.html" class="submenu-link">
                                        <i class="bi bi-shield-lock"></i>
                                        <span>Seguridad</span></a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('logout') }}" class="submenu-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Cerrar Sesión</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout')}}" method="POST"
                                        style="display:none;">
                                        @csrf
                                        @method('POST')
                                    </form>
                                </li>
                            </ul>

                        </li>




                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <!-- <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div> -->
            <div class="page-content">
                @yield('content')
            </div>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="{{url('/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ url('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script src="{{ url('/assets/compiled/js/app.js')}}"></script>

    <!-- Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ url('/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('/assets/static/js/pages/dashboard.js') }}"></script>


    @if( ($mensaje=session('mensaje')) && ($icono=session('icono')) )
    <script>

        Swal.fire({
            title: "{{ $mensaje }}",
            icon: "{{ $icono }}"
        });
    </script>
    @endif


    @stack('scripts')
</body>

</html>