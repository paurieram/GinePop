<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">
    <!-- Details -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <script src="/js/items.js"></script>
    <title>GinePop</title>
</head>

<body class="d-flex flex-column min-vh-100">
    @livewire('navigation-menu')
    @section('body')
    @show
    <footer class="mt-auto container-fluid p-4" style="background-color: #84c236;">
        <div class="row">
            <div id="links" class="col-6 offset-3 ftrtxt">Desenvolupat per <a href="https://github.com/paurieram" target="_blank" style="color:green; text-decoration: none;">Pau Riera</a>, <a href="https://github.com/rubegine" target="_blank" style="color:green; text-decoration: none;">Ruben Recolons</a> i <a href="https://github.com/joseprecolons" target="_blank" style="color:green; text-decoration: none;">Josep Recolons</a>, alumnes de 2n DAW</div>
            <ul class="social-footer-icons col-3">
                <li><a href="https://www.ginebro.cat/blog/" target="blank"><i class="fa-solid fa-blog" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/escolaginebro/" target="blank"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/escolaginebro" target="blank"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.facebook.com/escolaginebro" target="blank"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </footer>
    <script src="/js/slideshow.js"></script>
    <script src="/js/img.js"></script>
    <script src="/js/modal.js"></script>
</body>

</html>