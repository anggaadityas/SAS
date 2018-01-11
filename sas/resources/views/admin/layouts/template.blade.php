


    @include('admin.layouts.header')
    @include('admin.layouts.side-navbar')
    @include('admin.layouts.top-navbar')

    <!-- page content -->
    
        <div class="right_col" role="main">
            
            @yield('content')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <span class="fa fa-copyright"></span> <a href="www.sinergiadhikarya.co.id">Website</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('admin.layouts.footer')