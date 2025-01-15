<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content="Michał Banaszek"/>
    <title>Lubelski sport</title>
    <!-- Favicon-->
    <link rel="apple-touch-icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css"
          rel="stylesheet"/>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
          rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body id="page-top">
<!-- Navigation-->
<a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="#page-top">Lublin</a></li>
        <li class="sidebar-nav-item"><a href="/">Strona główna</a></li>
        <li class="sidebar-nav-item"><a href="#about">Opis</a></li>
        <li class="sidebar-nav-item"><a href="/#whyUs">Nasze usługi</a></li>
        <li class="sidebar-nav-item"><a href="/#categories">Kategorie</a></li>
        <li class="sidebar-nav-item"><a href="#opinions">Posty</a></li>
        <li class="sidebar-nav-item"><a href="/#login">Zaloguj się</a></li>
    </ul>
</nav>
<!-- Header-->
<header class="masthead d-flex align-items-center"
        style="background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 100%), url(assets/img/lublin_pkp.jpg); .btn-primary.--bs-btn-bg #cd853f;
--bs-btn-border-color: #cd853f;
--bs-btn-hover-bg: #a0522d;
--bs-btn-hover-border-color: #a0522d; ">
    <div class="container px-4 px-lg-5 text-center">
        <h1 class="mb-1" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; color: white">
            Lublin</h1>
        <h3 class="mb-5" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; color: white"><em>transport
                przyszłości
            </em></h3>
        <a class="btn btn-primary btn-xl" href="#about">Sprawdź!</a>
    </div>
</header>
<!-- About-->
<section class="content-section bg-light" style="padding-top: 2.5rem; padding-bottom: 2.5rem" id="about">
    <div class="container px-4 px-lg-5 text-center">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-auto">
                <h2>Komfort, Nowoczesność i Historia w Ruchu
                </h2>
                <p class="lead mb-5">
                    Lublin, miasto o bogatej historii i dynamicznie rozwijającej się infrastrukturze, oferuje
                    mieszkańcom i turystom nowoczesne i wygodne rozwiązania transportowe. Od historycznych linii
                    trolejbusowych, przez nowoczesne autobusy elektryczne, aż po rozwijającą się sieć rowerów miejskich
                    – lubelski transport to połączenie tradycji z przyszłością. Sprawnie funkcjonujący system
                    komunikacji miejskiej umożliwia szybkie przemieszczanie się między malowniczym Starym Miastem,
                    zielonymi parkami i nowoczesnymi dzielnicami. Dla miłośników aktywnego trybu życia dostępne są
                    liczne ścieżki rowerowe, które łączą różne części miasta. Odkryj Lublin w ruchu – wygodnie,
                    ekologicznie i z pasją.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="opinions">

    <div class="container">
        @auth
            <form action="/logout" method="POST"
                  style="position: fixed;top: 20px;    left: 20px;    z-index: 1000; /* Ensures it is on top of other elements */">
                @csrf
                <button class="delete-button"
                        style="padding: 15px 15px 15px 15px; margin-top: -10px; width: 100%; height: 100%; background-color: lightyellow; color: black;"
                        onmouseover="this.style.backgroundColor='red';this.style.color='white';"
                        onmouseout="this.style.backgroundColor='lightyellow';this.style.color='black'">
                    Wyloguj
                </button>
            </form>
            @if(auth()->user()->is_admin)
                <div>
                    <h3 class="text-center">Stwórz nowy post: </h3>
                    <form action="/create-post" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="category" value=3
                        >
                        <input class="form-control" name="title" type="text"
                               style="width: 100%; margin-bottom: 10px"
                               placeholder="Tytuł" required>
                        <textarea class="form-control" name="body" placeholder="Napisz post.."
                                  style="height: 4rem; margin-bottom: 10px" required></textarea>
                        <label for="image">Zdjęcie:</label>
                        <input type="file" name="image" id="image">
                        <div class="invalid-feedback">Nie napisałeś treści posta.. :c</div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <div class="d-grid" style="margin-bottom: 30px">
                            <button class="btn btn-primary btn-lg" type="submit">Stwórz post</button>
                        </div>
                    </form>
                </div>
                @foreach ($allPosts as $post)
                    @if($post['category']===3)
                        <div class="card mb-4">
                            <a href="#"><img class="card-img-top"
                                             src="{{ asset('storage/' . $post->image) }}"
                                             alt="obraz"/></a>
                            <div class="card-body">
                                <div class="small text-muted">Ostatnio edytowane: {{$post['updated_at']}}</div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h2 class="card-title">{{$post['title']}},</h2>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2>Autor: {{$post->user->name}}</h2>
                                    </div>
                                </div>
                                <p class="card-text">{{$post['body']}}
                                </p>
                                <a class="btn btn-primary" href="/#">Dowiedz się więcej →</a>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-11" style="margin-top: 5px; margin-bottom: -10px">
                                        <p><a href="/edit-post/{{$post->id}}"><strong>Edytuj</strong></a></p>
                                    </div>
                                    <div class="col-lg-1">
                                        <form action="/delete-post/{{$post->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-button">Usuń</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach
            @else
                <!-- Blog entries-->
                <div class="row">
                    <div class="col-lg-10">
                        @foreach ($allPosts as $post)
                            @if($post['category']===3)
                                <div class="card mb-4">
                                    <a href="#"><img class="card-img-top"
                                                     src="{{ asset('storage/' . $post->image) }}"
                                                     alt="obraz"/></a>
                                    <div class="card-body">
                                        <div class="small text-muted">Ostatnio edytowane: {{$post['updated_at']}}</div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h2 class="card-title">{{$post['title']}},</h2>
                                            </div>
                                            <div class="col-lg-4">
                                                <h2>Autor: {{$post->user->name}}</h2>
                                            </div>
                                        </div>
                                        <p class="card-text">{{$post['body']}}
                                        </p>
                                        <a class="btn btn-primary" href="/#">Dowiedz się więcej →</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            @endif
        @else
            <!-- Blog entries-->
            <div class="row">
                <div class="col-lg-10">
                    @foreach ($allPosts as $post)
                        @if($post['category']===3

                        )
                            <div class="card mb-4">
                                <a href="#"><img class="card-img-top"
                                                 src="{{ asset('storage/' . $post->image) }}"
                                                 alt="obraz"/></a>
                                <div class="card-body">
                                    <div class="small text-muted">Ostatnio edytowane: {{$post['updated_at']}}</div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h2 class="card-title">{{$post['title']}},</h2>
                                        </div>
                                        <div class="col-lg-4">
                                            <h2>Autor: {{$post->user->name}}</h2>
                                        </div>
                                    </div>
                                    <p class="card-text">{{$post['body']}}
                                    </p>
                                    <a class="btn btn-primary" href="/#">Dowiedz się więcej →</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        @endauth

        <!-- Pagination-->
        {{--
        <nav aria-label="Pagination">--}}
        {{--
        <hr class="my-0"/>
        --}}
        {{--
        <ul class="pagination justify-content-center my-4">--}}
        {{--
        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                                          aria-disabled="true">Newer</a>--}}
        {{--
    </li>
    --}}
        {{--
        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
        --}}
        {{--
        <li class="page-item"><a class="page-link" href="#!">2</a></li>
        --}}
        {{--
        <li class="page-item"><a class="page-link" href="#!">3</a></li>
        --}}
        {{--
        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
        --}}
        {{--
        <li class="page-item"><a class="page-link" href="#!">15</a></li>
        --}}
        {{--
        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
        --}}
        {{--
    </ul>
    --}}
        {{--
    </nav>
    --}}
        {{--
    </div>
    --}}
        <!-- Side widgets-->
        {{--
        <div class="col-lg-4">--}}
        {{--                            <!-- Search widget-->--}}
        {{--
        <div class="card mb-4">--}}
        {{--
        <div class="card-header">Search</div>
        --}}
        {{--
        <div class="card-body">--}}
        {{--
        <div class="input-group">--}}
        {{-- <input class="form-control" type="text" --}}
        {{-- placeholder="Wpisz wyszukiwaną frazę..." --}}
        {{-- aria-label="Enter search term..." aria-describedby="button-search"/>--}}
        {{--
        <button class="btn btn-primary" id="button-search" type="button">Szukaj!--}}
        {{--
    </button>
    --}}
        {{--
    </div>
    --}}
        {{--
    </div>
    --}}
        {{--
    </div>
    --}}
    </div>
</section>
<!-- CDN Link to SB Forms Scripts -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<!-- Footer-->
<footer class="footer text-center">
    <div class="container px-4 px-lg-5">
        <ul class="list-inline mb-5">
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3"
                   href="https://www.facebook.com/MiastoLublin/"
                   target="_blank"><i class="icon-social-facebook"></i></a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3"
                   href="https://x.com/miasto_lublin?lang=pl"
                   target="_blank"><i class="icon-social-twitter"></i></a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white"
                   href="https://www.instagram.com/miastolublin/"
                   target="_blank"><i class="icon-social-instagram"></i></a>
            </li>
        </ul>
        <p class="text-muted small mb-0"> Lublin - miasto inspiracji <br>Copyright &copy MB</p>
    </div>
</footer>
<!-- Scroll to Top Button-->
<script src="js/local.js"></script>
<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
