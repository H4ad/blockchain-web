
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blockchain</title>

    {{-- Token csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js'></script>

    <!-- Custom fonts for this template -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/freelancer.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  </head>

  <body id="page-top">

    <!-- Navigation -->
    @include ('layouts.home.nav')

    <!-- Content Section -->
    @yield ('content')

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Footer Section -->
    @include ('layouts.home.footer')

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Magnific Popup core JS file -->
    <script src="{{ secure_asset('js/jquery.magnific-popup.js') }}"></script>

    <!-- Magnific Popup core JS file -->
    <script src="{{ secure_asset('js/jquery.easing.compatibility.js') }}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ secure_asset('js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ secure_asset('js/contact_me.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ secure_asset('js/freelancer.min.js') }}"></script>
  </body>

</html>
