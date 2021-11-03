<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Biblioteka</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/book') }}">Książki</a></li>
                        @if(isset(Auth::user()->admin))
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/bookAdd') }}">Dodaj Książkę</a></li>
                        @endif
                        @if(isset(Auth::user()->admin))
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/authorAdd') }}">Dodaj Autora</a></li>
                        @endif
                        @if(isset(Auth::user()->admin))
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/categoryAdd') }}">Dodaj Kategorię</a></li>
                        @endif
                        @if(isset(Auth::user()->admin))
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/publishingAdd') }}">Dodaj Wydawnictwo</a></li>
                        @endif
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/') }}">Strona główna</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#register">Biblioteka</a></li>
                    </ul>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">


                                    @if($message = Session::get('error'))
                                            <button type ="button" data-dismiss="alert">x</button>
                                            <strong>{{ $message }}</strong>
                                    @endif

                                    <!-- Wyświetlanie błędów logowania -->
                                    <!-- @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif -->
                                    @if(isset(Auth::user()->admin))

                                    <strong>Witaj {{Auth::user()->name}} </strong>
                                    <a href="{{ url('/login/logout') }}"> Logout </a>
                                    @elseif(!isset(Auth::user()->admin) && isset(Auth::user()->email))

                                    <strong>Witaj {{Auth::user()->name}}</strong>
                                    <a href="{{ url('/login/logout') }}"> Logout </a>
                                    @endif
                                </div>
                    </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
            </div>
        </header>

        <section class="page-section portfolio" id="register">
            <div class="container">
                <!-- News Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Biblioteka</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div style="background-color: rgb(230 230 250)">
                    <form method="get" action="/bookResults">
                        <input type="text" name="bookTitle" style="width: 94.7%" placeholder="Wpisz szukaną frazę"><button type="submit">Szukaj</button></form><a href="/book">Pokaż wszystkie</a></div>
                <div style="float:left; border: dotted; background-color: gray; height:300px; width: 30%;">
                  @foreach($book as $b)
                  {{$b->name}} {{$b->surname}}<br>
                  @endforeach
                </div>
                <div style="float:left; border: dotted; background-color: rgb(147 112 219); height:300px; width: 35%;">
                    @foreach($book as $b)
                    <li>{{$b->isbn}} &nbsp <a href="{{ route('details', ['title' => $b->title]) }}"> "{{$b->title}}" </a></li>
                    @endforeach

                </div>
                <div style="float:left; border: dotted; background-color: rgb(147 112 219); height:300px; width: 35%;">
                    @foreach($book as $b)
                    <li>{{$b->description}}</li>
                    @endforeach
                </div>

                <div style="clear:both;"></div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Lokalizacja</h4>
                        <p class="lead mb-0">
                        Stefana Banacha 22,
                            <br />
                            90-238 Łódź
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Znajdź nas w internecie</h4>
</br>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Your Website 2021</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
