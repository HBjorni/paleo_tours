<?php 

	require "config.php";

    if (isset($_COOKIE['id'])) {

        $lekerdezes = "SELECT * FROM users WHERE id=$_COOKIE[id]";
        $talalt_felhasznalo = $conn->query($lekerdezes);
        $felhasznalo = $talalt_felhasznalo->fetch_assoc();

    }

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// E-mail cím. Itt adj meg egy fogadó e-mail címet
	define("__TO__", "info@paleotours.hu");

	// Sikeres üzenetküldés esetén
	define('__SUCCESS_MESSAGE__', "Az üzeneted sikeresen elküldted. Hamarosan válaszolni fogunk rá. Köszönjük!");

	// Hiba esetén megjelenítendő üzenet
	define('__ERROR_MESSAGE__', "Hiba történt az üzeneted küldése során. Kérünk próbáld meg újra.");

	// Üzenet, ha valamelyik mező nincs kitöltve
	define('__MESSAGE_EMPTY_FIELDS__', "Kérünk tölts ki minden mezőt.");

	// E-mail validáció
	function check_email($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
	}

	// Név validáció
	function check_name($data) {
		if (!preg_match("/^[a-zA-ZÁÉÍÓÖŐÚÜŰáéíóöőúüű ]*$/", $data)) {
			return false;
		} else {
			return true;
		}
	}

	// Bemeneti adatok tisztítása
	function check_input($text) {
		$text = trim($text);
		$text = stripslashes($text);
		$text = htmlspecialchars($text);
		return $text;
	}

	// E-mail küldés
	function send_mail($to, $subject, $message, $headers) {
		if (mail($to, $subject, $message, $headers)) {
			echo json_encode(array('info' => 'success', 'msg' => __SUCCESS_MESSAGE__));
		} else {
			echo json_encode(array('info' => 'error', 'msg' => __ERROR_MESSAGE__));
		}
	}

	// Űrlapadatok ellenőrzése és e-mail küldés
	if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['messageForm'])) {

		$name        = check_input($_POST['name']);
		$mail        = check_input($_POST['mail']);
		$subjectForm = isset($_POST['subjectForm']) ? check_input($_POST['subjectForm']) : '';
		$messageForm = check_input($_POST['messageForm']);

		if ($name == '') {
			echo json_encode(array('info' => 'error', 'msg' => "Kérjük add meg a neved."));
			exit();
		} else if (!check_name($name)) {
			echo json_encode(array('info' => 'error', 'msg' => "Kérjük valós nevet adj meg."));
			exit();
		} else if ($mail == '' || !check_email($mail)) {
			echo json_encode(array('info' => 'error', 'msg' => "Kérjük add meg az e-mail címed."));
			exit();
		} else if ($messageForm == '') {
			echo json_encode(array('info' => 'error', 'msg' => "Kérjük írd le az üzeneted."));
			exit();
		} else {
			$to      = __TO__;
			$subject = $subjectForm . ' ' . $name;
			$message = '
			<html>
			<head>
			  <title>Mail from ' . $name . '</title>
			</head>
			<body>
			  <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Name:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">' . $name . '</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">' . $mail . '</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Subject:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">' . $subjectForm . '</td>
				</tr>
				<tr style="height: 32px;">
				  <th align="right" style="width:150px; padding-right:5px;">Message:</th>
				  <td align="left" style="padding-left:5px; line-height: 20px;">' . $messageForm . '</td>
				</tr>
			  </table>
			</body>
			</html>
			';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: ' . $mail . "\r\n";

			send_mail($to, $subject, $message, $headers);
		}
	} else {
		echo json_encode(array('info' => 'error', 'msg' => __MESSAGE_EMPTY_FIELDS__));
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
                                <li><a href="contact.php" class="active-item">Kapcsolat</a></li>
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
        <div id="page-content" class="header-static footer-fixed">
            <div id="flexslider" class="fullpage-wrap small">
                <ul class="slides">
                    <li style="background-image:url(assets/img/contact.jpg)">
                        <div class="container text text-center">
                            <h1 class="white margin-bottom-small">Kapcsolat</h1>
                            <p class="heading white">Az emberi tényezőt itt se zárhatjuk ki teljesen.</p>
                        </div>
                        <div class="gradient dark"></div>
                    </li>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Főoldal</a></li>
                        <li><a href="contact.php" class="active">Kapcsolat</a></li>
                    </ol>
                </ul>
            </div>
            <div id="page-wrap" class="content-section fullpage-wrap">
                <div class="row margin-leftright-null">
                    <div class="container">
                        <div class="col-md-6 padding-leftright-null">
                            <div class="text">
                                <h2 class="margin-bottom-null title">Vegyük fel a kapcsolatot személyesen!</h2>
                                <p class="heading center grey margin-bottom-null">Célunk ügyfeleink megismerése és hálózatunk bővítése.</p>
                                <div class="padding-onlytop-md">
                                    <p class="margin-bottom">Szakértőinket is ide várjuk egy személyes megismerésre, továbbá itt tárgyalunk új túrák felvételéről is.</p>
                                    <p><span class="contact-info">Cím <em>Budapest, 1145 Amerikai út 47
                                            </em></span><br><span class="contact-info">Telefon <em>+36 20-345-6789</em></span><br><span class="contact-info">E-mail <a href="#"><em>info@paleotours.com</em></a></span></p>
                                    <p class="margin-md-bottom-null"><span class="contact-info">Hétfőtől Péntekig <em>9.00-tól 17.00-ig</em></span><br><span class="contact-info">Szombaton <em>9.00-tól 12.00-ig</em></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 padding-leftright-null">
                            <div class="text padding-onlybottom-sm padding-md-top-null">
                                <form id="contact-form" class="padding-onlytop-md padding-md-topbottom-null">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="form-field" name="name" id="name" type="text" placeholder="Név">
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-field" name="mail" id="mail" type="text" placeholder="Email">
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-field" name="subjectForm" id="subjectForm" type="text" placeholder="Tárgy">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea class="form-field" name="messageForm" id="messageForm" rows="6" placeholder="Üzeneted"></textarea>
                                            <div class="submit-area padding-onlytop-sm">
                                                <input type="submit" id="submit-contact" class="btn-alt" value="Üzenet küldése">
                                                <div id="msg" class="message"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
							<div class="details-section">
								<h4 class="text-center margin-bottom-small">Helyszín térkép</h4>
								<?php
									$location = urlencode("Budapest, 1145 Amerikai út 47");
									$mapUrl = "https://www.google.com/maps?q=$location&output=embed";
								?>
								<iframe src="<?php echo htmlspecialchars($mapUrl); ?>" frameborder="0" allowfullscreen style="width: 100%; height: 500px;"></iframe>
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
    <script src="assets/js/maps.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>