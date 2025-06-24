
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{ asset('static/images/gorro-4.png') }}" width="30" height="30">
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-primary">SICRADEPMA</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">INICIO</span>
    </li>

    <!-- Dashboard -->
    <li class="menu-item">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-dashboard"></i>
        <div data-i18n="Analytics">Panel De Control</div>
      </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Layouts">Perfil</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('perfil') }}" class="menu-link">
            <div data-i18n="Without menu">Configuración</div>
          </a>
        </li>
      </ul>
    </li>

  @if(Auth::user()->rol == '1')
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Administración</span>
    </li>
  </li>
  <li class="menu-item">
    <a href="{{ route('usuarios') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-group"></i>
      <div data-i18n="Analytics">Usuarios</div>
    </a>
  </li>
  <li class="menu-item">
    <a href="{{ route('auditorias') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-show-alt"></i>
      <div data-i18n="Analytics">Auditoria</div>
    </a>
  </li>
  <li class="menu-item">
    <a href="{{ route('backup') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-data"></i>
      <div data-i18n="Analytics">Respaldo SQL</div>
    </a>
  </li>
  @endif


  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Estudiantes Y Docentes</span>
  </li>
  <li class="menu-item">
    <a href="{{ route('estudiantes') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bxs-graduation"></i>
      <div data-i18n="Analytics">Estudiantes</div>
    </a>
  </li>
  <li class="menu-item">
    <a href="{{ route('profesores') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-face"></i>
      <div data-i18n="Analytics">Profesores</div>
    </a>
  </li>
  <!-- Components -->
  <li class="menu-header small text-uppercase"><span class="menu-header-text">Gestion Academica</span></li>
  <!-- Cards -->
  <li class="menu-item">
    <a href="{{ route('notas') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Basic">Notas</div>
    </a>
  </li>
  <!-- Cards -->
  <li class="menu-item">
    <a href="{{ route('certificados') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-trophy"></i>
      <div data-i18n="Basic">Certificados</div>
    </a>
  </li>
  <!-- Cards -->
  <li class="menu-item">
    <a href="{{ route('secciones') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-chalkboard"></i>
      <div data-i18n="Basic">Secciones</div>
    </a>
  </li>
  <!-- Cards -->
  <li class="menu-item">
    <a href="{{ route('horario') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-time"></i>
      <div data-i18n="Basic">Horario</div>
    </a>
  </li>
</ul>
</aside>
<!-- / Menu -->