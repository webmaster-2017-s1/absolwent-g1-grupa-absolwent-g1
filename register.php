<?php
    session_start();
    require_once ("config.php");

    $errors = array();
//****Registration

    if (isset($_POST['register-user'])) {
       $username=mysqli_real_escape_string($db,$_POST['username']);
       $password=mysqli_real_escape_string($db,$_POST['password']);
       $rpassword=mysqli_real_escape_string($db,$_POST['r-password']);
       $email=mysqli_real_escape_string($db,$_POST['email']);

           //TODO Print errors check empty vars if user change required type

        if($password!=$rpassword){
            array_push($errors, "Hasła nie pasuja");
        }
        $check_user="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result=mysqli_query($db, $check_user);
        $user=mysqli_fetch_assoc($result);


        if($user){
            if($user['username']==$username){
                array_push($errors, "Nick jest zajety");
            }
            if($user['email']==$email){
                array_push($errors, "Adres Email jest zajety");
            }
        }

        if(count($errors)==0){
            //TODO Hashing password
            $sql="INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            mysqli_query($db, $sql);
            $_SESSION['username']=$username;
            $_SESSION['success']="Jestes teraz zalogowany";
            header('location: index.html');
        }

    }

//****Login
    if(isset($_POST['login-user'])){
        $email=mysqli_real_escape_string($db, $_POST['email']);
        $password=mysqli_real_escape_string($db, $_POST['password']);
        
        $check_user="SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($db, $check_user);
        $user=mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)==1){
            if($user['email']==$email & $user['password']==$password){
                echo "Zalogowano pomyslnie";
                $_SESSION['username']=$user['username'];
                $_SESSION['success']="Zalogowany";
                header('location: index.html');
            } else{
                echo "Złe hasło";
            }
        }else{
            echo "Nie ma uzytkownika o takich danych";
        }

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
    };
    try {
        document.addEventListener("DOMContentLoaded", $buo_f, false)
    }
    catch (e) {
        window.attachEvent("onload", $buo_f)
    }
</script>

<!-- Nagłówek strony: menu, logo, breadcrumbs itp. -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="80" height="80">
            <div class="flt">
                <span class="textsize textpadding fonttype">Collegium Gostomianum</span><br>
                <span class="abspadding fonttype abssize">Absolwent</span>
            </div>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav navsize fonttype">
                <li class="nav-item libordertwo navpadding navhover">
                    <a class="nav-link text-white" href="#">Wydarzenia</a>
                </li>
                <li class="nav-item liborderone navpadding navhover">
                    <a class="nav-link text-white" href="#">Kontakt</a>
                </li>
                <li class="nav-item liborderthree navpadding navhover">
                    <a class="nav-link text-white" href="login.html">Zaloguj się</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Podnaglowek strony -->
<div class="container-fluid bg-white secondshadow">
    <div class="container">
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

<div class="container col-md-6 px-auto py-5">

    <div class="container col-xs-4 px-5">
        <button class="btn btn-secondary my-1" id="login">Zaloguj się</button>
        <button class="btn btn-secondary my-1" id="signin">Zarejestruj się</button>
    </div>
    <hr>

    <div class="container col px-5" id="log-form" style="display: block">
        <form method="post">
            <div class="form-group">
                <label for="email-log">Adres email:</label>
                <input type="email" class="form-control" name="email" placeholder="Wprowadź adres email" required>
            </div>
            <div class="form-group">
                <label for="password-log">Hasło:</label>
                <input type="password" class="form-control" name="password" placeholder="Wprowadź hasło" required>
            </div>
            <div class="checkbox">
                <label class="pb-2"><input type="checkbox">Zapamiętaj mnie</label>
            </div>
            <button type="submit" class="btn btn-primary py-1" name="login-user">Zaloguj się</button>

            <div class="form-group pt-2">
                <a href="#">Zapomniałeś hasła?</a>
            </div>
        </form>
    </div>

    <div class="container col px-5" id="sign-form" style="display: none">
        <form method="post">
            <div class="form-group">
                <label for="name">Nick:</label>
                <input type="text" class="form-control" name="username" value="<?php if (isset($username)& !empty($username)){echo $username;}?>" placeholder="Wprowadź imię" required>
            </div>

            <div class="form-group">
                <label for="email">Adres email:</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset($email)& !empty($email)){echo $email;}?>" placeholder="Wprowadź adres email" required>
            </div>

            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" class="form-control" name="password" placeholder="Wprowadz hasło" required>
            </div>

            <div class="form-group">
                <label for="r-password">Powtórz hasło</label>
                <input type="password" class="form-control" name="r-password" placeholder="Wprowadz ponownie hasło" required>
            </div>

            <div class="checkbox">
                <label><input type="checkbox" required>Wyrażam zgodę na przetwarzanie moich danych osobowych.</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox">Chcę otrzymywać informacje o Collegium Gostomianum na adres email.</label>
            </div>
            <button type="submit" class="btn btn-primary" name="register-user">Zarejestruj się</button>
        </form>
    </div>

</div>
<!-- Stopka strony: copyrights, dodatkowe linki itp. -->
<!--<div class="container">-->
<!--<div class="text-white bg-dark">-->
<!--<div class="row">-->
<!--<div class="p-5 col-md-4">-->
<!--<i class="material-icons mb-3" style="font-size: 125px">school</i>-->
<!--<h3 class="mb-4">Absolwent-->
<!--<br>-->
<!--</h3>-->
<!--<ul class="list-unstyled">-->
<!--<a href="#" class="text-white">Strona główna</a>-->
<!--<br>-->
<!--<a href="#" class="text-white">Wydarzenia</a>-->
<!--<br>-->
<!--<a href="#" class="text-white">Zaloguj się</a>-->
<!--</ul>-->
<!--</div>-->
<!--<div class="p-5 col-md-8">-->
<!--<h3>Chcesz być na bieżąco?</h3>-->
<!--<form class="my-4">-->
<!--<fieldset class="form-group">-->
<!--Otrzymuj informacje o Collegium Gostomianum-->
<!--<br>-->
<!--<input type="email" class="form-control" placeholder="Podaj email"></fieldset>-->
<!--<button type="submit" class="btn btn-outline-light">Wyślij</button>-->
<!--</form>-->
<!--<h3 class="mt-5">Kontakt-->
<!--<br>-->
<!--</h3>-->
<!--<div class="col-12 my-3 px-0">-->
<!--I Liceum Ogólnokształcące Collegium Gostomianum-->
<!--<br>-->
<!--ul. Jana Długosza 7-->
<!--<br>-->
<!--27-600 Sandomierz-->
<!--</div>-->

<!--<div class="row my-2 px-3">-->

<!--<div class="col-lg-6 my-3 px-0">-->
<!--<i class="fas fa-phone"></i>-->
<!--<a href="tel:158325246" class="text-white">(15) 832-52-45</a>-->
<!--</div>-->

<!--<div class="col-lg-6 my-3 px-0">-->
<!--<i class="fas fa-envelope"></i>-->
<!--<a href="mailto:1losand@lo1.sandomierz.pl" class="text-white">1losand@lo1.sandomierz.pl</a>-->
<!--</div>-->

<!--</div>-->


<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-md-12 mt-4">-->
<!--<p class="text-center">© Copyright 2018 Marcin Zasuwa, Marcin Saja, Piotr Nowak - Wszelkie Prawa Zastrzeżone.</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!-- jQuery library -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript and Popper JS (https://popper.js.org) -->
<script src="js/bootstrap.bundle.min.js"></script>
<!--jQuery script-->
<script src="js/script.js"></script>

</body>
</html>

