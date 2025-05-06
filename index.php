<?php

	require "config.php";

    if (isset($_COOKIE['id'])) {

        $lekerdezes = "SELECT * FROM users WHERE id=$_COOKIE[id]";
        $talalt_felhasznalo = $conn->query($lekerdezes);
        $felhasznalo = $talalt_felhasznalo->fetch_assoc();

    }

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paleo Tours</title>

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
        <header id="header" class="fixed full-width">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div id="logo">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/img/logo.png" class="normal" alt="logo">
                            <img src="assets/img/logo@2x.png" class="retina" alt="logo">
                        </a>
                    </div>
                    <div id="menu-classic">
                        <div class="menu-holder">
                            <ul>
                                <li><a href="index.php" class="active-item">Főoldal</a></li>
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
								<li>
                                    <?php

                                        if (isset($_COOKIE['id'])) {
                                            echo "<a href='profile.php'>$felhasznalo[username]</a>";
                                        }
                                        else {
                                            echo "<a href='reg.php'>Belépés</a>";
                                        }
                                    
                                    ?>
                                </li>
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
        <div id="page-content" class="padding-onlybottom-sm">
            <div id="fullpage" class="full-width">
                <div class="section main-section" style="background-image:url(assets/img/tour.jpg)">
                    <div class="text main text-center no-opacity">
                        <h2 class="margin-bottom-null title center white">Paleo Tours</h2>
                        <p class="heading center grey-light z-index">Tanúlj a szabadban!  &amp; Túrázz tudatosan...</p>
                        <div class="padding-onlytop-md">
                            <p class="white">Magyarország első interaktív lelőhely tára. Jelentkezzetek szervezett túráinkra. Minden héten szombaton a legjobb szakértőink vezetésével.</p>
                            <a href="tours.php" class="btn-alt small margin-null active">Szervezett túrák</a>
                        </div>
                    </div>
                    <div class="gradient"></div>
                </div>
                <div class="section project" style="background-image:url(assets/img/site.jpg)">
                    <div class="text text-center no-opacity">
                        <h2 class="margin-bottom-null title line center white">Kaland</h2>
                        <p class="heading center white grey-light margin-bottom">Fedezd fel a Kárpát-Medence szívében található lelőhelyeket, amikről még valószínüleg nem is hallottál.</p>
                        <a href="sites.php" class="btn-alt small margin-null active">Lelőhelyek</a>
                    </div>
                    <div class="gradient"></div>
                </div>
                <div class="section project" style="background-image:url(assets/img/forum.jpg)">
                    <div class="text text-center no-opacity">
                        <h2 class="margin-bottom-null title line center white">Tudás</h2>
                        <p class="heading center white grey-light margin-bottom">Találj választ lehetőleg minden kérdésedre hivatalos fórumunkon.</p>
                        <a href="forum.php" class="btn-alt small margin-null active">Fórum</a>
                    </div>
                    <div class="gradient"></div>
                </div>
                <div class="section fp-auto-height footer">
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
                </div>
            </div>
        </div>

    </div>

    <script src="assets/js/jquery.min.js"></script>
	
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <script src="assets/js/jquery.fullPage.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
    <script src="assets/js/smooth.scroll.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/jquery.scrolly.js"></script>
    <script src="assets/js/plugins-scroll.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>