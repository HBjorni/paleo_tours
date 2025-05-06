<?php

    require "config.php";

    if (isset($_COOKIE['id'])) {

        $lekerdezes = "SELECT * FROM users WHERE id=$_COOKIE[id]";
        $talalt_felhasznalo = $conn->query($lekerdezes);
        $felhasznalo = $talalt_felhasznalo->fetch_assoc();

    }

    $postid = $_GET['postid'];

    $lekerdezes = "SELECT * FROM posts WHERE id=$postid";
    $talalt_poszt = $conn->query($lekerdezes);
    $poszt = $talalt_poszt->fetch_assoc();
	
	$lekerdezes = "SELECT * FROM users WHERE id=$poszt[userid]";
	$talalt_felhasznalo = $conn->query($lekerdezes);
	$poszt_felhasznalo = $talalt_felhasznalo->fetch_assoc();

    if (isset($_POST["comment-btn"])) {

        if (!isset($_COOKIE['id'])) {
            echo "<script>alert('Nem vagy bejelentkezve!')</script>";
        }
        else{

            $date = date("Y-m-d H:i:s");

            $conn->query("INSERT INTO comments VALUES(id, $felhasznalo[id], $postid, '$_POST[messageForm]', '$date')");
            
        }

    }

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?= $poszt['title']; ?></title>

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
        <span class="loader">
                <div class="inner-loader"></div>
            </span>
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
                                <li><a href="tours.php" class="active-item">Túrák</a></li>
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
                                <!-- Search Icon -->
                                <li class="search">
                                    <i class="icon ion-ios-search"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--  END Menu  -->
                    
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
        <!--  END Header & Menu  -->

        <!--  Page Content  -->
        <div id="page-content" class="header-static footer-fixed">
            <!--  Slider  -->
            <div id="flexslider" class="fullpage-wrap small">
                <ul class="slides">
                    <li style="background-image:url(assets/img/bg-02.png)">
                        <div class="container text text-center">
                            <h1 class="white margin-bottom-small"><?= $poszt['title']; ?></h1>
                            <p class="heading white"><? $poszt['description']; ?></p>
                        </div>
                        <div class="gradient dark"></div>
                    </li>
                    <ol class="breadcrumb">
                        <li><a href="forum.php">Fórum</a></li>
                        <li class="active"><?= $poszt['title']; ?></li>
                    </ol>
                </ul>
            </div>
            <!--  END Slider  -->
            <div id="post-wrap" class="content-section fullpage-wrap">
                <div class="row margin-leftright-null">
                    <div class="container text">
                        <div class="row content-post no-margin">
                            <!--  Post Meta  -->
                            <div class="col-md-12 padding-leftright-null text-center">
                                <h2 class="margin-bottom-null title simple left"><?= $poszt['title']; ?></h2>
                                <?php

                                    $lekerdezes = "SELECT * FROM post_cat WHERE postid = $poszt[id]";
                                    $talalt_kapcsolatok = $conn->query($lekerdezes);

                                    $rows = mysqli_num_rows($talalt_kapcsolatok);
                                    $i = 1;

                                    while($kapcsolat = $talalt_kapcsolatok->fetch_assoc()){
                                        
                                        $lekerdezes = "SELECT * FROM categories WHERE id = $kapcsolat[catid]";
                                        $talalt_kategoria = $conn->query($lekerdezes);
                                        $kategoria = $talalt_kategoria->fetch_assoc();
                                        if ($rows > $i) {
                                            echo "<span class='category'>$kategoria[name]</span>";
                                            $i++;
                                        }
                                        else {
                                            echo "<span class='category last'>$kategoria[name]</span>";
                                        }

                                    }
                                
                                ?>
                                <span class="date"><?= date("Y.m.d",strtotime($poszt['date'])); ?></span>
                            </div>
                            <!--  END Post Meta  -->
                            <div class="col-md-12 padding-onlytop-md padding-leftright-null">
                                <p><?= $poszt['text']; ?></p>
                            </div>
                        </div>
                        <!--  Author Meta  -->
                        <div class="row no-margin">
                            <div class="col-md-12 padding-leftright-null">
                                <div id="post-meta">
                                    <img src="assets/img/hiker1.jpg" alt="">
                                    <div class="author">
                                        <h3><a href="profile.php"><?= $poszt_felhasznalo['username']; ?></a></h3>
                                        <p><?= $poszt_felhasznalo['bio']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  END Author Meta  -->
                        
                        <!--  Comments  -->
                        <div class="row no-margin">
                            <div class="col-md-12 padding-leftright-null">
                                <div id="comments">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab-one" aria-controls="tab-one" role="tab" data-toggle="tab" aria-expanded="true">Összes komment</a></li>
                                        <li role="presentation" class=""><a href="#tab-two" aria-controls="tab-two" role="tab" data-toggle="tab" aria-expanded="false">Írj egy kommentet</a></li>
                                    </ul>
                                    <!--  Nav Tabs  -->
                                    <!-- Tab panes -->
                                    <div class="tab-content no-margin-bottom">
                                        <div role="tabpanel" class="tab-pane padding-md active" id="tab-one">
                                            <?php
                                                
                                                $lekerdezes = "SELECT * FROM comments WHERE postid=$poszt[id] ORDER BY id DESC";
                                                $talalt_kommentek = $conn->query($lekerdezes);
                                                while($komment = $talalt_kommentek->fetch_assoc()){

                                                    $lekerdezes = "SELECT * FROM users WHERE id=$komment[userid]";
                                                    $talalt_kommentauthor = $conn->query($lekerdezes);
                                                    $kommentauthor = $talalt_kommentauthor->fetch_assoc();

                                                    echo "<div class='comment'>
                                                            <div class='row margin-null'>
                                                                <div class='col-md-12 padding-leftright-null'>
                                                                    <img src='assets/img/hiker2.jpg' alt=''>
                                                                    <div class='content'>
                                                                        <span class='comment-author'>
                                                                            $kommentauthor[username]
                                                                        </span>
                                                                        <span class='comment-date'>
                                                                            ".date('Y-m-d', strtotime($komment['date']))."
                                                                        </span>
                                                                        <p>$komment[text]</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";

                                                }
                                            
                                            ?>
                                            
                                            
                                        </div>
                                        <div role="tabpanel" class="tab-pane padding-md" id="tab-two">
                                            <section class="comment-form">
                                                <form id="comment-form" method="post" acton="post.php?postid=<?= $postid; ?>">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea class="form-field" name="messageForm" id="messageForm" rows="6" placeholder="Üzeneted"></textarea>
                                                            <div class="submit-area">
                                                                <input type="submit" name="comment-btn" id="submit-comment" class="btn-alt" value="Küldés">
                                                                <div id="msg" class="message"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  END Comments  -->
                    </div>
                </div>
            </div>
        </div>
        <!--  END Page Content  -->

        <!--  Footer  -->
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
        <!--  END Footer  -->
    </div>
    <!--  Main Wrap  -->

    <!-- jQuery -->
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