<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('backend/dist/img/logo_seminario.jpg')}}" alt="Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SEMINARIO MAYOR</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Panel De Control
                        </p>
                    </a>
                </li>
                @if(auth()->user()->can('pais.index')|| auth()->user()->can('departamentos.index') || auth()->user()->can('ciudads.index')
                    || auth()->user()->can('tipodocumentos.index'))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-dharmachakra"></i>
                            <p>Parámetros<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-globe-americas nav-icon"></i>
                                    <p>Organización Territorial<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('pais.index')
                                        <li class="nav-item">
                                            <a href="{{ route('pais.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-globe"></i>
                                                <p>País</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('departamentos.index')
                                        <li class="nav-item">
                                            <a href="{{ route('departamentos.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-map-marker"></i>
                                                <p>Departamento</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('ciudads.index')
                                        <li class="nav-item">
                                            <a href="{{ route('ciudads.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                                <p>Ciudad</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-bezier-curve nav-icon"></i>
                                    <p>Tiposs<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('tipodocumentos.index')
                                        <li class="nav-item">
                                            <a href="{{ route('tipodocumentos.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Tipo Documento</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endif
                @if(auth()->user()->can('pais.index')|| auth()->user()->can('departamentos.index') || auth()->user()->can('ciudads.index')
                    || auth()->user()->can('tipodocumentos.index'))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-dharmachakra"></i>
                            <p>Sitio<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-globe-americas nav-icon"></i>
                                    <p>Organización Territorial<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('pais.index')
                                        <li class="nav-item">
                                            <a href="{{ route('pais.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-globe"></i>
                                                <p>País</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('departamentos.index')
                                        <li class="nav-item">
                                            <a href="{{ route('departamentos.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-map-marker"></i>
                                                <p>Departamento</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('ciudads.index')
                                        <li class="nav-item">
                                            <a href="{{ route('ciudads.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                                <p>Ciudad</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-bezier-curve nav-icon"></i>
                                    <p>Tipos<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('portadas.index')
                                        <li class="nav-item">
                                            <a href="{{ route('portadas.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Portada</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('whyChooseUs.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Porque Elegirnos</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-bezier-curve nav-icon"></i>
                                    <p>Nosotros<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('nosotros.nosotros-banner.index')
                                        <li class="nav-item">
                                            <a href="{{ route('nosotros-banner.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Banner</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('nosotros.nosotros-objetivos.index')
                                        <li class="nav-item">
                                            <a href="{{ route('nosotros-objetivos.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Informacion</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('nosotros.nosotros-banner.index')
                                        <li class="nav-item">
                                            <a href="{{ route('nosotros-banner.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Objetivos</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-bezier-curve nav-icon"></i>
                                    <p>Servicios<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('servicios.servicios-card.index')
                                        <li class="nav-item">
                                            <a href="{{ route('servicios-card.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Servicios 1 </p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-th-list nav-icon"></i>
                                    <p>Galeria<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('galeria.index')
                                        <li class="nav-item">
                                            <a href="{{ route('galeria.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Galeria 1</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-th-list nav-icon"></i>
                                    <p>Blog<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('blog.blog-banner.index')
                                        <li class="nav-item">
                                            <a href="{{ route('blog-banner.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Blog 1</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('blog.blog-card.index')
                                        <li class="nav-item">
                                            <a href="{{ route('blog-card.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-id-card"></i>
                                                <p>Blog 2</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endif
                @can('institucions.index')
                    <li class="nav-item">
                        <a href="{{ route('institucions.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Institución</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
