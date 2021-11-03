<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Strona główna</title>
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
                        @if(!isset(Auth::user()->admin) && isset(Auth::user()->email))
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/rents') }}">Moje wypożyczenia</a></li>
                        @endif
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/book') }}">Książki</a></li>
                        @if(isset(Auth::user()->admin))
                        <div class="dropdown">
                            <a class="dra" href="#">Interfejs admina</a>
                            <ul>
                                <li><a class="dra" href="{{ url('/showRents') }}">Wypożyczenia</a></li>
                                <li><a class="dra" href="{{ url('/bookAdd') }}">Książki</a></li>
                                <li><a class="dra" href="{{ url('/categoryAdd') }}">Kategorie</a></li>
                                <li><a class="dra" href="{{ url('/authorAdd') }}">Autorzy</a></li>
                                <li><a class="dra" href="{{ url('/publishingAdd') }}">Wydawnictwo</a></li>
                            </ul>
                        </div>
                        @endif
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#news">Wiadomości</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">O mnie</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Kontakt</a></li>
                    </ul>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                @if(isset(Auth::user()->email))
                                    <div class="blockLog">
                                        <img class="photoLog" src="../assets/img/man.png"> </img>
                                        <strong class="textLog"> Witaj, {{Auth::user()->name}} {{Auth::user()->surname}} </strong>
                                        <div class="posLog"><a  href="{{ url('/login/logout') }}"> Wyloguj się </a></div>
                                    </div>
                                    @else
                                    <form method='post' action="{{ url('/login/checklogin') }}">
                                        @csrf
                                        {{ csrf_field() }}
                                         <input type="email" name="email" placeholder="Adres email" class="form-control"/> </li>
                                         <input type="password" name="password" placeholder="Hasło" class="form-control"/> </li></li>
                                    </br>
                                    <postpos>
                                        <input type="submit" name="submit" value="Login" class="buttonLog"/>
                                        <a href="{{ url('/register') }}"> Rejestracja </a>
                                    </postpos>
                                </form>
                                @endif
                                </div>
                            </div>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
            </div>
        </header>

        <section class="page-section portfolio" id="news">
            <div class="container">
                <!-- News Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tutaj kiedyś będą newsy</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-preprimary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">O mnie</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto"><p class="lead">Twórca strony: Łukasz Justyński. Jestem studentem informatyki na wydziale Matematyki i Informatyki UŁ. A to jest moja testowa strona e-biblioteki. </p></div>
                    <div class="col-lg-4 mr-auto"><p class="lead">Platformy do wypożyczania książek. Mamy nadzieję że mój projekt się spodobał i zostawisz mi pozytywną ocenę!</p></div>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Skontaktuj się</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Imię: </label>
                                    <input class="form-control" id="name" type="text" placeholder="Imie" required="required" data-validation-required-message="Prosze podać imię." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Adres email: </label>
                                    <input class="form-control" id="email" type="email" placeholder="Adres email" required="required" data-validation-required-message="Prosze podać adres email." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Numer telefonu:</label>
                                    <input class="form-control" id="phone" type="tel" placeholder="Numer telefonu" required="required" data-validation-required-message="Prosze podać numer telefonu." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Wiadomość</label>
                                    <textarea class="form-control maxsize" id="message" rows="2" placeholder="Wiadomość" required="required" data-validation-required-message="Prosze podać wiadomość."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Wyślij</button></div>
                        </form>
                    </div>
                </div>
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
                        <h4 class="text-uppercase mb-4">Znajdź nas w internecje</h4>
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
