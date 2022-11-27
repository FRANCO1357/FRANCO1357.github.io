<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ski</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        {{-- font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>

            body{
                font-family: 'Darker Grotesque', sans-serif;
            }

            header{
                border-bottom: 1px solid black;
            }
            header img{
                height: 40px;
            }

            .jumbotron{
                border-bottom: 1px solid black;
            }

            .jumbotron img{
                width: 100%;
            }

            .jumbotron-left{
                width: 40%;
                padding: 0 30px;
            }

            .jumbotron-right{
                width: 60%;
                padding: 0 30px;
            }

            /* marquee */

            .marquee{
                width: 100%;
                height: 30px;
                overflow: hidden;
                white-space: nowrap;
                margin-top: 10px;
            }

            .marquee div{
                animation: animate 40s linear infinite;
                transform: translate(110vW, 0);
                display: inline-block;
                font-size: 16px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
            }

            .marquee span{
                margin: 0 12px;
            }

            @keyframes animate{
                100%{
                    transform: translate(-100vW, 0);
                }
            }

            /* button */

            .btn{
                background-color: black;
                color: white;
                padding: 10px 20px;
                transition: 0.5s;
            }

            .btn:hover{
                transform: scale(1.2);
                color: white;
            }

            footer{
                background-color: black;
            }

            .footer-left{
                width: 50%;
            }
            .footer-right{
                width: 50%;
                border-left: 1px solid white
            }

            .card{
                opacity: 1;
                animation-name: fadeInOpacity;
                animation-iteration-count: 1;
                animation-timing-function: ease-in;
                animation-duration: 3s;
            }

            @keyframes fadeInOpacity {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        
}

        </style>
    </head>
    <body class="bg-white">
        <header class="p-3 d-flex justify-content-between align-items-center">
            <div class="left-menu d-flex">
                <img src="{{url('../images/logo-1.png')}}" alt="">
                <ul class="list-unstyled d-flex m-0">
                    <li class="nav-item"><a class="nav-link text-reset" href="#principianti">Principianti</a></li>
                    <li class="nav-item"><a class="nav-link text-reset" href="">Intermedi</a></li>
                    <li class="nav-item"><a class="nav-link text-reset" href="">Avanzati</a></li>
                </ul>
            </div>
            @if (Route::has('login'))
                <div class="right-menu">
                    @auth
                        <a class="btn rounded-0" href="{{ url('/admin') }}"><span>Area riservata</span></a>
                    @else
                        <a class="btn rounded-0" href="{{ route('login') }}"><span>Accedi</span></a>

                        @if (Route::has('register'))
                            <a class="btn rounded-0 ml-3" href="{{ route('register') }}"><span>Registrati</span></a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>

        {{-- main --}}
        <main>

            {{-- jumbotron --}}
            <div class="jumbotron rounded-0 bg-white m-0 d-flex">
                <div class="jumbotron-left pt-0 d-flex flex-column justify-content-end align-items-start">
                    <h1>Lezioni di Sci Freestyle</h1>
                    <p class="mt-3">Sei affascinato dagli atleti che girano nel nostro snowpark e vorresti provare anche tu a fare qualche evoluzione spettacolare?<br><br>
                        Non improvvisare, affidati ai maestri di sci e fatti insegnare le migliori tecniche per affrontare i primi ostacoli.<br><br>
                        Lo sapevi che.... alcuni dei maestri a tua disposizione hanno un passato da atleti professionisti e qualcuno di loro è persino stato fra i protagonisti di edizioni dei giochi olimpici!<br> Quale migliore garanzia per avvicinarti a questa fantastica disciplina?!</p>
                    <a class="btn rounded-0 mt-3" href="#contact-form"><span>Contattaci</span></a>
                </div>
                <div class="jumbotron-right pt-0">
                    <img src="{{url('../images/audi-nines.jpg')}}" alt="">
                </div>   
            </div>

            {{-- marquee --}}
            <div class="marquee">
                <div>Contattaci per prenotare la tua lezione!<span></span>Contattaci per prenotare la tua lezione!<span></span>Contattaci per prenotare la tua lezione!<span></span>Contattaci per prenotare la tua lezione!<span></span>Contattaci per prenotare la tua lezione!<span></span>Contattaci per prenotare la tua lezione!<span></span></div>
            </div>

            {{-- content --}}
            <div class="container">
                <div class="content">

                    {{-- cards offer --}}
                    <div id="principianti" class="card my-5 border-0 rounded-0 shadow">
                        <div class="row no-gutters">
                          <div class="col-md-4 p-3">
                            <img class="img-fluid" src="{{url('../images/ski-freestyle-1.jpg')}}" alt="">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Lezioni per principanti</h5>
                              <p class="card-text">Le lezioni di sci per principianti sono organizzate per chiunque non abbia mai sciato prima d’ora e quindi parte da zero. Si può imparare a sciare a qualsiasi età, posto che non si abbiano problemi fisici; quindi alle lezioni di sci per principianti non partecipano solo bambini e ragazzi, ma chiunque si voglia approcciare per la prima volta agli sport sulla neve e abbia bisogno di iniziare dai fondamenti, con l’aiuto di istruttori esperti e competenti. L’età minima prevista è di 5 anni e non esiste un’età massima per imparare, chiunque può partecipare ai corsi della scuola di sci di Cortina oppure iscriversi alle lezioni intermedie-avanzate.</p>
                              <div class="card-bottom d-flex justify-content-between">
                                <p class="card-text"><small class="text-muted">50€ / ora</small></p>
                                <a class="btn rounded-0" href="#contact-form">Prenota</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </main>

        {{-- footer --}}
        <footer class="d-flex text-white">

            <div class="footer-left p-5 w-50">
                {{-- contact form --}}
                <div class="col-12 mb-5">
                    <h2 class="text-center mb-4">Contattaci per prenotare la tua lezione</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('message'))
                            <div class="alert alert-{{session('type') ?? 'info'}}">
                                {{session('message')}}
                            </div>
                    @endif

                    <form id="contact-form" action="{{route('admin.store')}}" method="POST">

                        @csrf
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Email</label>
                                    <input type="email" class="form-control rounded-0" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Oggetto</label>
                                    <input type="text" class="form-control rounded-0" id="subject" name="subject">
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="title">Testo</label>
                                    <input type="text" class="form-control rounded-0" id="text" name="text">
                                </div>
                            </div>
                            <button class="btn bg-white text-dark rounded-0 ml-3 mt-2" type="submit">Invia</button>
                        </div>
                    </form> 
                </div>
            </div>

            <div class="footer-right p-5 w-50">
                <h3 class="mb-4">Contatti</h3>
                <address>
                    Schweizer Skischule
                    Hühnerhubelstrasse 95
                    CH-3123 Belp
                </address>
                <p>Tel. +41 31 820 41 12</p>
                <p>Fax. +41 31 920 41 12</p>
                <p>montagne@qodeinteractive.com</p>
                <div class="social d-flex pt-4">
                    <a href="#"><i class="fa-brands fa-square-facebook fa-2x text-white mr-4"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram fa-2x text-white mr-4"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok fa-2x text-white mr-4"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube fa-2x text-white mr-4"></i></a>
                </div>
            </div>
        </footer>
    </body>
</html>
