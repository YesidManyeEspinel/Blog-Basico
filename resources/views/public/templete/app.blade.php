<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Freelancer - Start Bootstrap Theme</title>        
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- <link href="css/styles.css" rel="stylesheet" />-->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.css')}}">
    </head>
    <body>
        <!-- Navigation-->
        @include('public.templete.nav')
        <!-- Masthead-->
        @include('public.templete.header')
        <!-- Portfolio Section-->
        <section>
                <!-- Portfolio Grid Items-->
                @yield('Content-Articles')
        </section>
        <!-- About Section-->
        <section class="page-section bg-info text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="m-2 p-2 text-center">
                    ________<i class="fas fa-star"></i>________
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto"><p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p></div>
                    <div class="col-lg-4 mr-auto"><p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p></div>
                </div>
                <!-- About Section Button-->
                
            </div>
        </section>
        <!-- Footer-->
        <div>
        @include('admin.templete.footer')
        </div>
        <!-- Bootstrap core JS-->
        <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
        <script src="{{asset('fontawesome/js/all.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    </body>
</html>
