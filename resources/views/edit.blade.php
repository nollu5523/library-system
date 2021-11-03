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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3" href="{{ url('/') }}">Strona główna</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#register">Książki</a></li>
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

        <section class="page-section portfolio" id="register">
            <div class="container">
                <!-- News Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytowanie książek </h2>
                <!-- Icon Divider-->
                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm xl">
                                    <form method='post' action="{{ route('update') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $edit->id }}">
                                        <label class="posesTag"> isbn:    </label> <input type="text" name="isbn" value="{{ $edit->isbn }}" class="form-control devolt"/>  <br/>
                                        <label class="posesTag"> title:    </label> <input type="text" name="title" value="{{ $edit->title }}" class="form-control devolt"/>  <br/>
                                        <label class="posesTag"> opis:    </label> <input type="text" name="description" value="{{ $edit->description }}" class="form-control devolt"/>  <br/>
                                        <label class="posesTag"> ilość:    </label> <input type="number" name="quantity" value="{{ $edit->quantity }}" class="form-control devolt"/>  <br/>
                                        <label class="posesTag"> Kategoria: </label>
                                        <select class="form-control devolt cls" name="category" id="category">
                                            @foreach($categoryList as $catList)
                                            @if(isset($category->id) && $category->id == $catList->id)
                                            <option value="{{ $catList->id}}" selected=""> {{$catList->category}}</option>
                                            @else
                                            <option value="{{ $catList->id}}"> {{$catList->category}}</option>
                                            @endif
                                            @endforeach
                                            </select>  <br/>
                                            <label class="posesTag"> Wydawnictwo:    </label>
                                            <select class="form-control devolt" name="publishing" id="publishing">
                                            @foreach($publishingList as $pubList)
                                            @if(isset($publishing->id) && $publishing->id == $pubList->id)
                                            <option value="{{$pubList->id}}" selected="">{{$pubList->name}}</option>
                                            @else
                                            <option value="{{$pubList->id}}" >{{$pubList->name}}</option>
                                            @endif
                                            @endforeach
                                            </select><br>
                                            <label class="posesTag"> Autor: </label>
                                            <select class="form-control devolt" name="author[]" id="author" multiple="multiple">
                                            @foreach($authorsList as $autList)
                                            @if(isset($author->id) && $author->id == $autList->id)
                                            <option value="{{$autList->id}}" selected="">{{$autList->name}} {{$autList->surname}}</option>
                                            @else
                                            <option value="{{$autList->id}}">{{$autList->name}} {{$autList->surname}}</option>
                                            @endif
                                            @endforeach
                                            </select>  <br/>
                                    </br>
                                    <input type="submit" name="edycja" class="btn btn-primary btn-xl-lite" value="zapisz"/>
                                    <a class="btn btn-primary btn-xl-lite" href="{{ url('/bookAdd') }}"> Cofnij </a>
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
