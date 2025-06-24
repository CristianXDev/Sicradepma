<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
-->
<!-- beautify ignore:start -->
<html
lang="en"
class="light-style layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="../assets/"
data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8" />
  <meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
  />

  @yield('title')

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('static/images/gorro-4.png') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ asset('static/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('static/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('static/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('static/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('static/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <link rel="stylesheet" href="{{ asset('static/vendor/libs/apex-charts/apex-charts.css') }}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{ asset('static/vendor/js/helpers.js') }}"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('static/js/config.js') }}"></script>

  <!--ALERTS-->
  <script src="{{ asset('static/js/sweetalert.min.js') }}"></script> <!-- Swiper for image and text sliders -->

  <!--ALERTS-->
  <script src="{{ asset('static/js/sweetalert.min.js') }}"></script> <!-- Swiper for image and text sliders -->

  @livewireStyles

</head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <!--SIDEBAR-->
        @include('partials.dashboard.sidebar')
        <!--END SIDEBAR-->

        <!-- Layout container -->
        <div class="layout-page">

          <!--NAVBAR-->
          @include('partials.dashboard.navbar')
          <!--END NAVBAR-->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">


              <!-- Alert -->
              @include('partials.others.alert')
              <!-- end of alert -->

              <!--Content-->
              @yield('content')
              <!--End content-->

              <!--Livewire gemini chat-->
              @livewire('gemine')
              <!--End livewire gemini chat-->

              <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
          </div>

          <!-- Overlay -->
          <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <script src="{{ asset('static/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('static/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('static/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('static/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('static/vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Main JS -->
        <script src="{{ asset('static/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('static/js/dashboards-analytics.js') }}"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="{{ asset('static/js/logout.js') }}"></script> <!-- Logout scripts -->

        @livewireScripts

        <script type="module">
          const addModal = new bootstrap.Modal('#createDataModal');
          const editModal = new bootstrap.Modal('#updateDataModal');
          window.addEventListener('closeModal', () => {
            addModal.hide();
            editModal.hide();
          })
        </script>
    </body>
</html>
