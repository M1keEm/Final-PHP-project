<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content="Michał Banaszek"/>
    <title>Edycja opinii</title>
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
    <link href="/css/styles.css" rel="stylesheet"/>
</head>
<body>
<section class="content-section bg-primary" id="opinions">
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 rounded-3 shadow-lg">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="h3">Edytuj opinię</div>
                        </div>
                        <div class="text-center">
                            <form action="/edit-post/{{$post->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <h5 style="margin-bottom: 5px">Tytuł</h5>
                                <input class="form-control" type="text" style="width: 100%" name="title"
                                       value="{{$post->title}}">
                                <h5 style="margin-top: 20px; margin-bottom: 5px">Tekst opinii</h5>
                                <textarea class="form-control" name="body">{{$post->body}}</textarea>
                                <div class="d-grid" style="margin-top: 15px">
                                    <button class="btn btn-primary btn-lg">Zapisz zmiany</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer text-center">
    <div class="container px-4 px-lg-5">
        <ul class="list-inline">
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/MiastoLublin/"
                   target="_blank">
                    <i class="icon-social-facebook"
                       style="display: flex; align-items: center; justify-content: center; height: 100%;"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="https://x.com/miasto_lublin?lang=pl"
                   target="_blank"> <i class="icon-social-twitter"
                                       style="display: flex; align-items: center; justify-content: center; height: 100%;"></i>

                </a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white" href="https://www.instagram.com/miastolublin/"
                   target="_blank">
                    <i class="icon-social-instagram"
                       style="display: flex; align-items: center; justify-content: center; height: 100%;"></i>
                </a>
            </li>
        </ul>
        <p class="text-muted small mb-0" style="margin-top: 3rem"> Lublin - miasto inspiracji <br>Copyright &copy MB</p>
    </div>
</footer>
</body>
