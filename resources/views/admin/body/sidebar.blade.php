{{-- Left Sidebar Start --}}
<div class="vertical-menu">
    <div data-simplebar class="h-100">

        {{-- Código para poder traer datos del usuario para desplegar foto de perfil y nombre de usuario --}}
        @php
            if (Auth::check()){
                $id = Auth::user()->id;
                $adminData = App\Models\User::find($id);
            }
            else{
                return redirect('/');
            }
        @endphp

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                    alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $adminData->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    En Linea</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <!-- * MENU -->
                <li class="menu-title">Menu</li>

                <!-- Dashboard Inicio -->
                <li>
                    <a href="{{ route('inicio') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Panel Inicio</span>
                    </a>
                </li>

                <!-- Dashboard Control -->
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                        <span>Panel Control</span>
                    </a>
                </li>

                <!-- Proveedores -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-factory"></i>
                        <span>Proveedores</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('list.supplier') }}">Lista</a></li>
                        <li><a href="{{ route('add.supplier') }}">Agregar</a></li>
                    </ul>
                </li>

                <!-- Clientes -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-user-3-line"></i>
                        <span>Clientes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('list.customer') }}">Lista</a></li>
                        <li><a href="{{ route('add.customer') }}">Agregar</a></li>
                        <li><a href="{{ route('credit.customer') }}">Con Adeudo</a></li>
                        <li><a href="{{ route('paid.customer') }}">Entradas</a></li>
                        <li><a href="{{ route('customer.wise.report') }}">Por Deudor/Acreedor</a></li>
                    </ul>
                </li>

                <!-- Unidades -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-tape-measure"></i>
                        <span>Unidades</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('list.unit') }}">Lista</a></li>
                        <li><a href="{{ route('add.unit') }}">Agregar</a></li>
                    </ul>
                </li>

                <!-- Categorías -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-function-line"></i>
                        <span>Categorías</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('list.category') }}">Lista</a></li>
                        <li><a href="{{ route('add.category') }}">Agregar</a></li>
                    </ul>
                </li>

                <!-- Productos -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-basket-2-line"></i>
                        <span>Productos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('list.product') }}">Lista</a></li>
                        <li><a href="{{ route('add.product') }}">Agregar</a></li>
                        <li><a href="{{ route('list.product.category') }}">Por Categoría</a></li>
                        <li><a href="{{ route('list.product.supplier') }}">Por Proveedor</a></li>
                    </ul>
                </li>

                <!-- Compras -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shopping-bag-line"></i>
                        <span>Compras</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('list.purchase') }}">Lista</a></li>
                        <li><a href="{{ route('add.purchase') }}">Agregar</a></li>
                        <li><a href="{{ route('pending.purchase') }}">Aprobar</a></li>
                        <li><a href="{{ route('daily.purchase.report') }}">Reporte por Fechas</a></li>
                    </ul>
                </li>

                <!-- Facturas - Invoices -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-article-line"></i>
                        <span>Facturas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('todas.invoice') }}">Lista Todas</a></li>
                        <li><a href="{{ route('list.invoice') }}">Lista Aprobadas</a></li>
                        <li><a href="{{ route('pending.list.invoice') }}">Por Aprobar</a></li>
                        <li><a href="{{ route('add.invoice') }}">Agregar</a></li>
                        <li><a href="{{ route('print.list.invoice') }}">Imprimir</a></li>
                        <li><a href="{{ route('daily.invoice.report') }}">Reporte PDF por Fechas</a></li>
                        <li><a href="{{ route('por.mes.invoice') }}">Por Mes</a></li>
                    </ul>
                </li>


                <!-- * REPORTES -->
                <li class="menu-title">Reportes</li>
                
                <!-- Reporte de Inventario -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        {{-- <i class="ri-hotel-line"></i> --}}
                        <img src="{{ asset('backend/assets/icons/inventario.svg') }}" alt="" height="20">
                        <span>Inventario</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('stock.report') }}">Lista Inventario</a></li>
                        <li><a href="{{ route('stock.supplier.wise') }}">Por Proveedor/Productos</a></li>
                    </ul>
                </li>

                <!-- Reporte de Facturas -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <img src="{{ asset('backend/assets/icons/factura.svg') }}" alt="" height="20">
                        <span>Facturas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('todas.invoice') }}">Todas</a></li>
                        <li><a href="{{ route('print.list.invoice') }}">Imprimir</a></li>
                        <li><a href="{{ route('daily.invoice.report') }}">Reporte PDF por Fechas</a></li>
                    </ul>
                </li>

                 <!-- * ROLES y PERMISOS -->
                 <li class="menu-title">ROLES y PERMISOS</li>
                
                 <!-- Roles y Permisos -->
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <img src="{{ asset('backend/assets/icons/lock.svg') }}" alt="" height="20">
                        <span>Roles y Permisos</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.permission') }}">Lista Permisos</a></li>
                     </ul>
                 </li>



                {{-- <!-- Calendar -->
                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <!-- Layouts -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                <li><a href="layouts-preloader.html">Preloader</a></li>
                                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- * PAGES -->
                <li class="menu-title">Pages</li>

                <!-- Authentication -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html">Login</a></li>
                        <li><a href="auth-register.html">Register</a></li>
                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>

                <!-- Utility -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>

                <!-- * COMPONENTS -->
                <li class="menu-title">Components</li>

                <!-- Elements -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-offcanvas.html">Offcavas</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-general.html">General</a></li>

                    </ul>
                </li>

                <!-- Advanced UI -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-vip-crown-2-line"></i>
                        <span>Advanced UI</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="advance-rangeslider.html">Range Slider</a></li>
                        <li><a href="advance-roundslider.html">Round Slider</a></li>
                        <li><a href="advance-session-timeout.html">Session Timeout</a></li>
                        <li><a href="advance-sweet-alert.html">Sweetalert 2</a></li>
                        <li><a href="advance-rating.html">Rating</a></li>
                        <li><a href="advance-notifications.html">Notifications</a></li>
                    </ul>
                </li>

                <!-- Forms -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ri-eraser-fill"></i>
                        <span class="badge rounded-pill bg-danger float-end">8</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-advanced.html">Form Advanced Plugins</a></li>
                        <li><a href="form-editors.html">Form Editors</a></li>
                        <li><a href="form-uploads.html">Form File Upload</a></li>
                        <li><a href="form-xeditable.html">Form X-editable</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                    </ul>
                </li>

                <!-- Tables -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Tables</a></li>
                        <li><a href="tables-responsive.html">Responsive Table</a></li>
                        <li><a href="tables-editable.html">Editable Table</a></li>
                    </ul>
                </li>

                <!-- Charts -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html">Apex Charts</a></li>
                        <li><a href="charts-chartjs.html">Chartjs Charts</a></li>
                        <li><a href="charts-flot.html">Flot Charts</a></li>
                        <li><a href="charts-knob.html">Jquery Knob Charts</a></li>
                        <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                    </ul>
                </li>

                <!-- Icons -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-brush-line"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-remix.html">Remix Icons</a></li>
                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font awesome 5</a></li>
                    </ul>
                </li>

                <!-- Maps -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html">Google Maps</a></li>
                        <li><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>

                <!-- Multi Level -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>

        </div>
        <!-- Sidebar -->

    </div>
</div>
<!-- Left Sidebar End -->
