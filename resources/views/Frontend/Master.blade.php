<!doctype html>
 @include('Frontend.Layout.header')
<body>
    <div class="site-preloader-wrap">
        <div class="spinner"></div>
    </div>
  @include('Frontend.Layout.navbar')

  

      @yield('content')





  @include('Frontend.Layout.footerDetails')

</body>
 @include('Frontend.Layout.footer')

<!-- index.html  29 Nov 2019 03:30:38 GMT -->

</html>
