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
									<li><a href="faq.php" class="active-item">FAQ</a></li>
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
                                <input class="form-field black big" type="search" placeholder="Search...">
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
                    <li style="background-image:url(assets/img/faq.jpg)">
                        <div class="container text text-center">
                            <h1 class="white margin-bottom-small">Gyakran ismételt kérdések</h1>
                            <p class="heading white">Kiss segítség az oldal tudatoss használatához. Ha elakadtál írj nekünk.</p>
                        </div>
                        <div class="gradient dark"></div>
                    </li>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Főoldal</a></li>
                        <li><a href="faq.php" class="active">FAQ</li>
                    </ol>
                </ul>
            </div>
            <div id="home-wrap" class="content-section fullpage-wrap row grey-background">
                <div class="container">
                    <div class="col-md-12 padding-leftright-null">
                        <section id="news" class="page">
                            <div class="news-items equal one-columns">
                                <div class="single-news one-item horizontal-news">
                                    <article>
                                        <div class="col-md-12 padding-leftright-null">
                                            <div class="content">
                                                <h3> Mi az oldal fő célja?</h3>
                                                <p>Az oldal célja, hogy összekösse a túrázni vágyó közösséget, inspirációt adjon a természet felfedezéséhez, és megismertesse a legjobb helyszíneket a lelőhely tár segítségével. Itt nemcsak túrákra jelentkezhetsz, de részese lehetsz egy aktív, támogató fórumnak is. Minden túrát és lelőhelyet kizárólag mi töltünk fel, hogy a tartalom megbízható és naprakész legyen.</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
								<div class="single-news one-item horizontal-news">
                                    <article>
                                        <div class="col-md-12 padding-leftright-null">
                                            <div class="content">
												<h3>Hogyan csatlakozhatok a fórumhoz?</h3>
												<p>A fórumunk mindenkinek nyitva áll, ám a részletes hozzászólások és a személyre szabott élmény érdekében ajánlott a regisztráció. A bejelentkezett tagok számára biztosított környezet elősegíti a minőségi beszélgetéseket és a hasznos információcserét.</p>
											</div>
										</div>
									</article>
								</div>
								<div class="single-news one-item horizontal-news">
                                    <article>
                                        <div class="col-md-12 padding-leftright-null">
                                            <div class="content">
												<h3>Miért érdemes regisztrálni?</h3>
												<p>A regisztráció számos előnyt kínál! Kizárólag a bejelentkezett tagok számára érhető el a túrákra való jelentkezés. Így, ha szeretnél részt venni a szervezett túrákon, a regisztráció elengedhetetlen.</p>
											</div>
										</div>
									</article>
								</div>
								<div class="single-news one-item horizontal-news">
                                    <article>
                                        <div class="col-md-12 padding-leftright-null">
                                            <div class="content">
												<h3>Hogyan jelentkezhetek túrákra</h3>
												<p>A túrákra való jelentkezés kizárólag a regisztrált tagok számára elérhető. Az aktuális túrákat az mi állítjuk össze és frissítjük, így biztos lehetsz abban, hogy mindig naprakész információk alapján tudsz dönteni. Miután regisztráltál és bejelentkeztél, böngészhetsz a túra oldalon, ahol részletes leírásokat és a jelentkezési feltételeket találod, így a jelentkezési folyamat mindenki számára egyszerű és átlátható.</p>
											</div>
										</div>
									</article>
								</div>
								<div class="single-news one-item horizontal-news">
                                    <article>
                                        <div class="col-md-12 padding-leftright-null">
                                            <div class="content">
												<h3>Mi az a lelőhely tár?</h3>
												<p>A lelőhely tár egy átfogó adatbázis, ahol az általunk feltöltött helyszínek böngészheted. Itt részletes leírásokat, fényképeket és értékeléseket találsz, amelyek segítenek a legmegfelelőbb helyszín kiválasztásában a következő kalandodhoz. Ennek köszönhetően garantáltan megbízható és naprakész tartalmakhoz jutsz.</p>
											</div>
										</div>
									</article>
								</div>
								<div class="single-news one-item horizontal-news">
                                    <article>
                                        <div class="col-md-12 padding-leftright-null">
                                            <div class="content">
												<h3> Kinek ajánljuk az oldal használatát?</h3>
												<p>Oldalunkat minden túrázni vágyó, természetkedvelő és kalandor számára ajánljuk, legyen szó akár kezdőkről vagy tapasztalt felfedezőkről. Itt minden szükséges információt megtalálsz, aktív közösségi támogatást élvezhetsz, és élményeidet is megoszthatod élményeidet a fórumban.</p>
											</div>
										</div>
									</article>
								</div>
                            </div>
                        </section>
                        <!--  END News Section  -->
                    </div>
                </div>
				<!--  Call to Action  -->
                <div class="row margin-leftright-null color-background">
                    <div class="col-md-12 text text-center">
                        <h4 class="big white margin-bottom-small">Ha akad még bármi kérdésed az oldal működésével kapcsolatban?</h4>
                        <a href="contact.php" target="_blank" class="btn-alt small white margin-null active shadow">Írj nekünk!</a>
                    </div>
                </div>
                <!--  END Call to Action  -->
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
</body>

</html>