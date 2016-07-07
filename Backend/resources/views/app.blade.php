<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{!! URL::asset('/css/libs.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('/css/app.css') !!}">
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @include('tinymce::tpl')
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      @include('partials/header')
      @include('partials/sidebar')

      <div class="content-wrapper">
        <section class="content-header">
          
          @yield('content-header')
          
        </section>
        <section class="content">

          @yield('content')

        </section>
      </div>
    
      @include('partials/footer')
      
    </div>
    <script src="{!! URL::asset('/js/libs.js') !!}" type="text/javascript"></script>

    @yield('scripts')

  </body>
</html>
