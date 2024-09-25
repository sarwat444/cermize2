<!DOCTYPE html>
<html lang="en">
    @include('panel.layouts.css')
    <!-- Google font-->
  <body onload="startTime()">
    <!-- loader starts-->
     @include('panel.layouts.breadcrumb')
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('panel.layouts.header')
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
         @include('panel.layouts.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
             @yield('content')
        </div>
        <!-- footer start-->

      </div>
    </div>
    @include('panel.layouts.scripts')
  </body>
</html>
