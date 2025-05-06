<?php

    require "config.php";

    if (isset($_POST["reg-btn"])) {

        $lekerdezes = "SELECT * FROM users WHERE username='$_POST[username]'";
        $talalt_felhasznalo = $conn->query($lekerdezes);

        if (mysqli_num_rows($talalt_felhasznalo) == 0) {
            
            if ($_POST['pass1'] == $_POST['pass2']) {

                $titkositott = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
                
                $conn->query("INSERT INTO users VALUES(id, '$_POST[username]', '$titkositott', '', 0)");

                $lekerdezes = "SELECT * FROM users WHERE username='$_POST[username]'";
                $talalt_felhasznalo = $conn->query($lekerdezes);
                $felhasznalo = $talalt_felhasznalo->fetch_assoc();

                setcookie("id", $felhasznalo['id'], time()+3600, '/');
                header("Location: index.php");

            }
            else {
                echo "<script>alert('A két jelszó nem egyezik!')</script>";
            }
        }
        else {
            echo "<script>alert('Felhasználónév foglalt!')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palaeo Tours</title>

    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap-theme.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/puredesign.css">

    <link rel="stylesheet" href="assets/css/flexslider.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.css">

    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/jquery.fullPage.css">

</head>

<body>
    <div id="myloader">
        <div class="loader">
            <div class="inner-loader">
				<img src="assets/img/logo.png" class="normal" alt="logo" id="logo1">
				<img src="assets/img/logo_white.png" class="normal white-logo hidden" alt="logo" id="logo2">
			</div>
        </div>
    </div>

    <div id="main-wrap" class="full-width">
        <header id="header" class="fixed transparent full-width">
            <div class="container">
                <nav class="navbar navbar-default white">
                    <div id="logo">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/img/logo.png" class="normal" alt="logo">
                            <img src="assets/img/logo@2x.png" class="retina" alt="logo">
                            <img src="assets/img/logo_white.png" class="normal white-logo" alt="logo">
                            <img src="assets/img/logo_white@2x.png" class="retina white-logo" alt="logo">
                        </a>
                    </div>
                    <div id="menu-classic">
                        <div class="menu-holder">
                            <ul>
                                <li><a href="index.php">Főoldal</a></li>
                                <li><a href="tours.php">Túrák</a></li>
								<li><a href="sites.php">Lelőhelyek</a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0)">Hasznos oldalak</a>
									<ul class="sub-menu">	
									<li><a href="forum.php">Fórum</a></li>
									<li><a href="faq.php">FAQ</a></li>
									</ul>
                                </li>
                                <li><a href="contact.php">Kapcsolat</a></li>
								<li><a href="reg.php" class="active-item">Belépés</a></li>
                                <li class="search"><i class="icon ion-ios-search"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div id="menu-responsive-classic">
                        <div class="menu-button">
                            <span class="bar bar-1"></span>
                            <span class="bar bar-2"></span>
                            <span class="bar bar-3"></span>
                        </div>
                    </div>
                    <div id="search-box" class="full-width">
                        <form role="search" id="search-form" class="black big">
                            <div class="form-input">
                                <input class="form-field black big" type="search" placeholder="Keresés...">
                                <span class="form-button big">
                                        <button type="button">
                                            <i class="icon ion-ios-search"></i>
                                        </button>
                                    </span>
                            </div>
                        </form>
                        <button class="close-search-box">
                                <i class="icon ion-ios-close-empty"></i>
                            </button>
                    </div>
                </nav>
            </div>
        </header>
		
		<div id="page-content" class="header-static footer-fixed">
            <div id="flexslider" class="fullpage-wrap small">
                <ul class="slides">
                    <li style="background-image:url(assets/img/contact.jpg)">
                        <div class="container text text-center">

                            <h2>Regisztráció</h2><br>
                            <form method="post" action="reg.php">
                                <input id="username" name="username" type="text" placeholder="Felhasználónév" required><br><br>

                                <input id="pass1" name="pass1" type="password" placeholder="Jelszó" required><br><br>
                                <label id="lower-check"><i style='color: red;' class='fa-solid fa-x'></i> <span style="color: white;">Kisbetűt tartalmaz</span></label><br><br>
                                <label id="upper-check"><i style='color: red;' class='fa-solid fa-x'></i> <span style="color: white;">Nagybetűt tartalmaz</span></label><br><br>
                                <label id="number-check"><i style='color: red;' class='fa-solid fa-x'></i> <span style="color: white;">Számot tartalmaz</span></label><br><br>

                                <!-- !:! CSS elrendezése !:! -->

                                <input id="pass2" name="pass2" type="password" placeholder="Jelszó újra" required>
                                <label id="pass-samecheck"></label><br><br>

                                <input name="reg-btn" type="submit" value="Regisztrálok"><br><br>

                                <label style="color: white;">Már regisztrálva vagyok. <a href="login.php">Bejelentkezés!</a></label> <!-- !:! Stílus biztosítása !:! -->

                            </form><!-- !:! CSS elrendezése !:! -->

                        </div>
                        <div class="gradient dark"></div>
                    </li>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Főoldal</a></li>
                        <li class="active">Regisztráció</li>
                    </ol>
                </ul> 
            </div>
            <div id="page-wrap" class="content-section fullpage-wrap">
                <div class="row margin-leftright-null">
                    <div class="container">
                        
                    </div>
                </div>
                
            </div>
        </div>
		
		<footer class="fixed full-width">
                    <div class="container">
                        <div class="row no-margin">
                             <div class="col-sm-4 col-md-2 padding-leftright-null">
                                <h6 class="heading white margin-bottom-extrasmall">Paleo Tours</h6>
                                <ul class="sitemap">
                                    <li><a href="index.php">Főoldal</a></li>
                                    <li><a href="tours.php">Túrák</a></li>
                                    <li><a href="sites.php">Lelőhelyek</a></li>
                                    
                                    <li><a href="contact.php">Kapcsolat</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-md-2 padding-leftright-null">
                                <h6 class="heading white margin-bottom-extrasmall">Túrázz tudatosan</h6>
                                <ul class="useful-links">
									<li><a href="forum.php">Fórum</a></li>
									<li><a href="faq.php">FAQ</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                    <li><a href="">Cookie Policy</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-md-4 padding-leftright-null">
                                <h6 class="heading white margin-bottom-extrasmall">Kapcsolat</h6>
                                <ul class="info">
                                    <li>Telefon <a href="">+36 20-345-6789</a></li>
                                    <li>E-mail <a href="">info@paleotours.com</a></li>
                                    <li>Hétfőtől Péntekig <span class="white">9.00-tól 19.00-ig</span><br>Szombaton <span class="white">9.00-tól 12.00-ig</span></li>
                                    <li><a href="">Budapest, 1145 <br>
                                           Amerikai út 47 </a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 padding-leftright-null">
                                <h6 class="heading white margin-bottom-extrasmall">Nem akarsz lemaradni semmiről?</h6>
                                <p class="grey-light">Iratkozz fel hírlevelünkre...</p>
                                <div id="newsletter-form" class="padding-onlytop-xs">
                                    <form class="search-form" method="post" action="https://www.aweber.com/scripts/addlead.pl">
                                        <input type="hidden" name="listname" value="[ENTER YOUR AWEBER LIST ID HERE]" />
                                        <input type="hidden" name="redirect" value="https://www.example.com/thankyou.htm" />
                                        <input type="hidden" name="meta_redirect_onlist" value="https://www.example.com/thankyou.htm" />
                                        <input type="hidden" name="meta_adtracking" value="custom form" />
                                        <input type="hidden" name="meta_required" value="email" />
                                        <input type="hidden" name="meta_forward_vars" value="1" />
                                        <div class="form-input">
                                            <input type="text" id="email" name="email" placeholder="E-mail címed" value="" />
                                            <span class="form-button">
                                                    <input type="submit" name="submit" value="Feliratkozás" />
                                                </span>
                                        </div>
                                    </form>
                                    <p>A leletek valóban nem szaladnak el, de a lehetőség rád vár, hogy felfedezd őket!</p>
                                </div>
                            </div>
                        </div>
                        <div class="copy">
                            <div class="row no-margin">
                                <div class="col-md-8 padding-leftright-null">
                                    &copy; 2025 Paleo Tours - túrázz tudatosan... | Hegyeshalmi Barnabás és Tóth Marcell vizsgafeladta
                                </div>
                                <div class="col-md-4 padding-leftright-null">
                                    <ul class="social">
                                        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
	
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <script src="assets/js/jquery.fullPage.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/smooth.scroll.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/jquery.scrolly.js"></script>
    <script src="assets/js/plugins-scroll.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/js/main.js"></script>
	
	    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/086e7cefb3.js" crossorigin="anonymous"></script>

    <script>
        
        const username_input = document.getElementById("username");
        const pass1_input = document.getElementById("pass1");
        const pass2_input = document.getElementById("pass2");
        
        const lower_check = document.getElementById("lower-check");
        const upper_check = document.getElementById("upper-check");
        const number_check = document.getElementById("number-check");
        const pass_samecheck = document.getElementById("pass-samecheck");

        
        pass1_input.addEventListener("keyup", (e) => {

            passSameCheck();
            passCheck(e.target.value);

        })

        pass2_input.addEventListener("keyup", (e) => {

            passSameCheck();

        })

        // !:! CSS elrendezése !:!
        function passSameCheck(){

            if (pass1_input.value == pass2_input.value) {
                pass_samecheck.innerHTML = "<i style='color: green;' class='fa-solid fa-check'></i>";
            }
            else{
                pass_samecheck.innerHTML = "<i style='color: red;' class='fa-solid fa-x'></i>"
            }

        }

        function passCheck(pass){

            // !:! CSS elrendezése !:!
            if (containsUpper(pass)) {
                upper_check.innerHTML = "<i style='color: green;' class='fa-solid fa-check'></i> <span style='color: white;'>Nagybetűt tartalmaz</span>";
            }
            else{
                upper_check.innerHTML = "<i style='color: red;' class='fa-solid fa-x'></i> <span style='color: white;'>Nagybetűt tartalmaz</span>"
            }

            if (containsLower(pass)) {
                lower_check.innerHTML = "<i style='color: green;' class='fa-solid fa-check'></i> <span style='color: white;'>Kisbetűt tartalmaz</span>";
            }
            else{
                lower_check.innerHTML = "<i style='color: red;' class='fa-solid fa-x'></i> <span style='color: white;'>Kisbetűt tartalmaz</span>";
            }

            if (containsNumber(pass)) {
                number_check.innerHTML = "<i style='color: green;' class='fa-solid fa-check'></i> <span style='color: white;'>Számot tartalmaz</span>";
            }
            else{
                number_check.innerHTML = "<i style='color: red;' class='fa-solid fa-x'></i> <span style='color: white;'>Számot tartalmaz</span>"
            }

        }

        function containsUpper(str){
            return /[A-Z]/.test(str);
        }

        function containsLower(str){
            return /[a-z]/.test(str);
        }

        function containsNumber(str){
            return /\d/.test(str);
        }

        


    </script>
</body>

</html>