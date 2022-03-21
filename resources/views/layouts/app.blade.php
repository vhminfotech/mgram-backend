<!doctype html>
<html lang="en">
    
    @include('include.header')

    <body data-sidebar="dark">

        <div id="layout-wrapper">
            <!-- Body header Start -->
             @include('include.body_header')
            <!-- Body header End -->
            
            <!-- Left Sidebar Start -->
             @include('include.sidebar')
            <!-- Left Sidebar End -->

            <div class="main-content">
                <!-- Start right Content here -->
                 @yield('content')
                <!-- End Page-content -->
                
                <!-- Start  Body-Footer -->
                @include('include.body_footer')
                <!-- End Body-Footer -->
            </div>
        </div>
        <!-- END layout-wrapper -->
        @include('include.footer')
    </body>

</html>