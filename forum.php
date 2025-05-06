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
    
    <title>Fórum - Paleo Tours</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap-theme.min.css">

    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/puredesign.css">

    <!-- Flexslider -->
    <link rel="stylesheet" href="assets/css/flexslider.css">

    <!-- Owl -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/jquery.fullPage.css">

</head>

<body>

    <!--  loader  -->
    <div id="myloader">
        <div class="loader">
            <img src="assets/img/logo.png" class="normal" alt="logo" id="logo1">
            <img src="assets/img/logo_white.png" class="normal white-logo hidden" alt="logo" id="logo2">
        </div>
    </div>

    <!--  Main Wrap  -->
    <div id="main-wrap" class="full-width">
        <!--  Header & Menu  -->
        <header id="header" class="fixed transparent full-width">
            <div class="container">
                <nav class="navbar navbar-default white">
                    <!--  Header Logo  -->
                    <div id="logo">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/img/logo.png" class="normal" alt="logo">
                            <img src="assets/img/logo@2x.png" class="retina" alt="logo">
                            <img src="assets/img/logo_white.png" class="normal white-logo" alt="logo">
                            <img src="assets/img/logo_white@2x.png" class="retina white-logo" alt="logo">
                        </a>
                    </div>
                    <!--  END Header Logo  -->
                    <!--  Menu  -->
                    <div id="menu-classic">
                        <div class="menu-holder">
                            <ul>
                            <li><a href="index.php">Főoldal</a></li>
                                <li><a href="tours.php">Túrák</a></li>
								<li><a href="sites.php">Lelőhelyek</a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0)">Hasznos oldalak</a>
									<ul class="sub-menu">	
									<li><a href="forum.php" class="active-item">Fórum</a></li>
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
                                <!-- Search Icon -->
                                <li class="search">
                                    <i class="icon ion-ios-search"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--  END of Menu  -->

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
        <!--  END Header & Menu  -->

        <!--  Page Content  -->
        <div id="page-content" class="header-static footer-fixed">
            <!--  Slider  -->
            <div id="flexslider" class="fullpage-wrap small">
                <ul class="slides">
                    <li style="background-image:url(assets/img/bg-02.png)">
                        <div class="container text text-center">
                            <h1 class="white margin-bottom-small">Fórum</h1>
                            <p class="heading white"></p>
                        </div>
                        <div class="gradient dark"></div>
                    </li>
                    <ol class="breadcrumb">
                        <li><a href="forum.php">Fórum</a></li>
                        <li class="active">Fórum</li>
                    </ol>
                </ul>
            </div>
            <!--  END Slider  -->
            <div id="home-wrap" class="content-section fullpage-wrap row grey-background">
                <div class="container">
                    <div class="col-md-8 padding-leftright-null">
                        <!--  Posts Section  -->
                        <section id="news" class="page">
                            <div class="news-items equal one-columns">
                                <?php
                                
                                    $lekerdezes = "SELECT * FROM posts ORDER BY date DESC";
                                    $talalt_posztok = $conn->query($lekerdezes);
                                    while($poszt = $talalt_posztok->fetch_assoc()){
                                        
                                ?>

                                    <div class="single-news one-item horizontal-news">
                                        <article>
                                            <div class="col-md-6 padding-leftright-null">
                                                <div class="image" style="background-image:url(assets/img/test-fossil-01.jpg)"></div>
                                            </div>
                                            <div class="col-md-6 padding-leftright-null">
                                                <div class="content">
                                                    <h3><?= $poszt['title']; ?></h3>
                                                    <span class="date"><?= date("Y.m.d.",strtotime($poszt['date'])); ?></span>
                                                    
                                                    <p><?= $poszt['description']; ?></p>
                                                    <?php

                                                        // Kategóriák lekérdezése
                                                        $lekerdezes = "SELECT * FROM post_cat WHERE postid = $poszt[id]";
                                                        $talalt_kapcsolatok = $conn->query($lekerdezes);
                                                        while($kapcsolat = $talalt_kapcsolatok->fetch_assoc()){

                                                            $lekerdezes = "SELECT * FROM categories WHERE id = $kapcsolat[catid]";
                                                            $talalt_kategoria = $conn->query($lekerdezes);
                                                            $kategoria = $talalt_kategoria->fetch_assoc();

                                                            echo "<span class='category'>$kategoria[name]</span>";

                                                        }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <a href="post.php?postid=<?= $poszt['id']; ?>" class="link"></a>
                                        </article>
                                    </div>

                                <?php

                                    }
                                
                                ?>
                                

                                
                            </div>
                        </section>
                        <!--  END Posts Section  -->
                    </div>
                    <!--  Right Sidebar  -->
                    <div class="col-md-4 text">
                        <aside class="sidebar">
                            <div class="widget-wrapper">
                                <?php
                                    if (isset($_COOKIE['id'])) {
                                        echo "<a href='new_post.php' class='btn-alt small active margin-null'>Új poszt</a>";
                                    }
                                    else {
                                        echo "<a href='#' class='btn-alt small active margin-null'>Új poszt</a>";
                                    }
                                ?>
                                
                            </div>
                            <div class="widget-wrapper">
                                <form class="search-form">
                                    <div class="form-input">
                                        <input type="text" placeholder="Search...">
                                        <span class="form-button">
                                            <button type="button">
                                                <i class="icon ion-ios-search-strong"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-wrapper">
                                <h5>Kategóriák</h5>
                                <ul class="widget-categories">
                                    <?php

                                        $lekerdezes = "SELECT * FROM categories";
                                        $talalt_kategoriak = $conn->query($lekerdezes);
                                        while($kategoria = $talalt_kategoriak->fetch_assoc()){
                                            echo "<li><a href='#'>$kategoria[name]</a></li>";
                                        }

                                    ?>
                                </ul>
                            </div>
                            <div class="widget-wrapper">
                                <h5>Legújabb posztok</h5>
                                <ul class="recent-posts">

                                    <?php

                                        $lekerdezes = "SELECT * FROM posts ORDER BY date DESC";
                                        $talalt_posztok = $conn->query($lekerdezes);
                                        while($poszt = $talalt_posztok->fetch_assoc()){
                                    ?>

                                        <li>
                                            <img src="assets/img/test-fossil-02.jpg" alt="">
                                            <div class="content">
                                                <a href="post.php?postid=<?= $poszt['id']; ?>">
                                                    <span class="meta">
                                                            <?= date("M d, Y", strtotime($poszt['date'])); ?>
                                                        </span>
                                                    <p><?= $poszt['title']; ?></p>
                                                </a>
                                            </div>
                                        </li>

                                    <?php

                                        }
                                    
                                    ?>

                                </ul>
                            </div>
                        </aside>
                    </div>
                    <!--  END Right Sidebar  -->
                    
                </div>
            </div>
        </div>
        <!--  END Page Content  -->

        <!--  Footer -->
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
        <!--  END Footer -->
    </div>
    <!--  Main Wrap  -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- All js library -->
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