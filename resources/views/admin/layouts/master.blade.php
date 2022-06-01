<!DOCTYPE html>
<html>
    <!-- head -->
    @include('admin.layouts.head')
    <!-- /head -->
    <body class="hold-transition skin-purple-light sidebar-mini">

        <div class="wrapper">

            @include('admin.layouts.header')

            @include('admin.layouts.left_side_bar')

            @yield('main_content')

            @include('admin.layouts.footer')

            <!-- Add the side bar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>

        @include('admin.layouts.scripts')
        
    </body>


</html>