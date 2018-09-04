<?php
/**
 * Created by PhpStorm.
 * User: marcin
 * Date: 9/2/18
 * Time: 7:06 PM
 */

    session_start();

    if(!isset($_SESSION['username'])){
        header('location: register.php');
    }

?>

<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Szablon Bootstrapa</title>

    <!-- Czcionki -->
    <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome, zob. How to Use: https://fontawesome.bootstrapcheatsheets.com -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css"
          integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css"
          integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- twoje style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- brak java scriptu -->
<noscript>
    Do pełnej funkcjonalności strony potrzebujesz włączonej obsługi skryptów.
    Tu znajdziesz <a href="https://www.enable-javascript.com/pl/" target="_blank">
        instrukcje, które pozwolą Ci włączyć skrypty w Twojej przeglądarce</a>.
</noscript>

<!-- nieaktualna przeglądarka, zob. dostosowanie: https://browser-update.org/customize.html -->
<script>
    var $buoop = {notify: {e: -6, f: -4, o: -4, s: -2, c: -4}, insecure: true, api: 5};

    function $buo_f() {
        var e = document.createElement("script");
        e.src = "http://browser-update.org/update.min.js";
        document.body.appendChild(e);
    }
    try {
        document.addEventListener("DOMContentLoaded", $buo_f, false)
    }
    catch (e) {
        window.attachEvent("onload", $buo_f)
    }
</script>

<!-- Nagłówek strony: menu, logo, breadcrumbs itp. -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top navbackground p-2">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="" src="img/logo.png" width="80" height="80">
        </a>
        <div class="text-center logpadding">
            <p class="">
                <a href="#" class="textsize textpadding fonttype">Collegium Gostomianum</a><br>
                <a href="#" class="abscolor fonttype abssize flt">Absolwent</a>
            </p>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav navsize fonttype">
                <li class="nav-item libordertwo navpadding navhover">
                    <a class="nav-link text-white" href="index.html#news">Wydarzenia</a>
                </li>
                <li class="nav-item liborderone navpadding navhover">
                    <a class="nav-link text-white" href="index.html#footbar">Kontakt</a>
                </li>
                <li class="nav-item liborderthree navpadding navhover">
                    <a class="nav-link text-white" href="login.html">
                        <?php
                            echo $_SESSION['username'];
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Podnaglowek strony -->
<div class="container-fluid bg-white secondshadow mt-5 pt-5">
    <div class="container mt-4">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link secondafont libordertwo" href="index.html">Strona główna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link secondafont libordertwo" href="#">O szkole</a>
            </li>
            <li class="nav-item">
                <a class="nav-link secondafont libordertwo" href="gallery.html">Galeria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link secondafont libordertwo" href="#">Historia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link secondafont libordertwo" href="#">Absolwenci</a>
            </li>
            <li class="nav-item">
                <a class="nav-link secondafont libordertwo" href="#">Dokumenty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link secondafont liborderone" href="#">Archiwum</a>
            </li>
        </ul>
    </div>
</div>

<!-- Treść główna -->

<div class="container survey">
    <h1 class="surveyheading">Ankieta</h1>
    <hr>
    <form method="post">
        <div class="form-group">
            <label>1. Czy wybór szkoły na przestrzeni lat uważasz za udany?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="question1a" value="option1">
                <label class="form-check-label" for="question1a">
                    Tak
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="question1b" value="option2">
                <label class="form-check-label" for="question1b">
                    Nie
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>2. Czy poleciłbyś/aś szkołę osobie bliskiej?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="question2a" value="option1">
                <label class="form-check-label" for="question2a">
                    Tak
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="question2b" value="option2">
                <label class="form-check-label" for="question2b">
                    Nie
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>3. Czy kontynuowałeś/aś naukę w szkole wyższej?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="question3a" value="option1">
                <label class="form-check-label" for="question3a">
                    Tak
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="question3b" value="option2">
                <label class="form-check-label" for="question3b">
                    Nie
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>4. Czy dostałeś/aś się na te studia, gdzie planowałeś/aś?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question4" id="question4a" value="option1">
                <label class="form-check-label" for="question4a">
                    Tak
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question4" id="question4b" value="option2">
                <label class="form-check-label" for="question4b">
                    Nie
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question4" id="question4c" value="option2">
                <label class="form-check-label" for="question4c">
                    Nie studiuję
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>5. Jeżeli na poprzednie pytanie odpowiedziałeś/aś "Tak" podaj nazwę uczelni na której studiujesz, jeżeli na
                "Nie" pozostaw puste pole.</label>
            <input type="text" class="form-control" id="question5" placeholder="Nazwa uczelni">
        </div>
    </form>
    <button class="btn btn-primary" type="submit">Wyślij</button>
</div>

<!-- jQuery library -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript and Popper JS (https://popper.js.org) -->
<script src="js/bootstrap.bundle.min.js"></script>
<!--jQuery script-->
<script src="js/script.js"></script>

</body>
</html>

