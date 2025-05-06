<?php

	require "config.php";
	
			
	if (!isset($conn)) {
		die("Adatbázis kapcsolat nem elérhető.");
	}

	$siteid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	if (!$siteid) {
		die("Érvénytelen ID.");
	}

	$query = "SELECT sitename, introduction, description FROM sites WHERE id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $siteid);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$sitename = $row['sitename'];
		$introduction = $row['introduction'];
		$description = $row['description'];
	} else {
		die("Nincs ilyen ID-vel rendelkező adat.");
	}

	if (isset($_POST['upload-btn'])) {
		$sitename = $_POST['name'];
		$introduction = $_POST['introduction'];
		$description = $_POST['description'];

		if (empty($sitename) || empty($introduction) || empty($description)) {
			die("Minden mező kitöltése kötelező!");
		}

		$stmt = $conn->prepare("UPDATE sites SET sitename = ?, introduction = ?, description = ? WHERE id = ?");
		if (!$stmt) {
			die("Hiba az előkészített lekérdezésben: " . $conn->error);
		}
		$stmt->bind_param("sssi", $sitename, $introduction, $description, $siteid);

		if ($stmt->execute()) {
			header("Location: list_site.php");
			exit();
		} else {
			echo "Hiba történt: " . $stmt->error;
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
                    <li style="background-image:url(assets/img/site.jpg)">
                        <div class="container text text-center">
                            <h1 class="white margin-bottom-small">Lelőhelyek</h1>
                            <p class="heading white">Szeretnél rövid és tartalmas ismeretet szerezni Magyarország lelőhelyeiről? Oldalunkon ezt megteheted és válogathatsz igényeid szerint.</p>
                        </div>
                        <div class="gradient dark"></div>
                    </li>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Főoldal</a></li>
                        <li><a href="sites.php" class="active">Lelőhelyek</a></li>
                    </ol>
                </ul>
            </div>
			
			<div id="home-wrap" class="content-section fullpage-wrap row grey-background">
				<div class="text padding-onlybottom-sm padding-md-top-null">
					<form id="contact-form" class="padding-onlytop-md padding-md-topbottom-null" action="edit_site.php?id=<?php echo $siteid; ?>" method="post">
						<div class="row">
							<div class="col-md-12">
								<input class="form-field" name="name" id="name" type="text" placeholder="Név" value="<?php echo htmlspecialchars($sitename); ?>" required>
							</div>
							<div class="col-md-12">
								<input class="form-field" name="introduction" id="introduction" type="text" placeholder="Bevezető" value="<?php echo htmlspecialchars($introduction); ?>" required>
							</div>
							<div class="col-md-12">
								<input class="form-field" name="description" id="description" type="text" placeholder="Leírás" value="<?php echo htmlspecialchars($description); ?>" required>
							</div>
							<div class="col-md-12">
								<div class="submit-area padding-onlytop-sm">
									<input type="submit" name="upload-btn" value="Lelőhely Módosítása">
								</div>
							</div>
						</div>
					</form>
						<?php

							$directory = "img/";

							function getGalleryJSON($conn) {
								$siteid = $_GET['id'];
								$query = "SELECT `gallery` FROM `sites` WHERE `id` = $siteid ";
								$result = $conn->query($query);
								$row = $result->fetch_assoc();
								return json_decode($row['gallery'], true);
							}

							function updateGalleryJSON($conn, $galleryArray) {
								$siteid = $_GET['id'];
								$galleryJSON = $conn->real_escape_string(json_encode($galleryArray));
								$query = "UPDATE `sites` SET `gallery` = '$galleryJSON' WHERE `id` = $siteid ";
								$conn->query($query);
							}

							if (isset($_FILES['uploadedFile'])) {
								$file = $_FILES['uploadedFile'];
								$uniqueName = uniqid() . "_" . basename($file['name']);
								$targetPath = $directory . "/" . $uniqueName;

								if (move_uploaded_file($file['tmp_name'], $targetPath)) {
									echo "<p>Fájl sikeresen feltöltve: " . htmlspecialchars($uniqueName) . "</p>";

									
									$galleryArray = getGalleryJSON($conn);
									$galleryArray[] = $uniqueName;
									updateGalleryJSON($conn, $galleryArray);
								} else {
									echo "<p>Hiba történt a fájl feltöltésekor.</p>";
								}
							}

							if (isset($_POST['deleteFile'])) {
								$fileToDelete = $_POST['deleteFile'];
								$filePath = $directory . "/" . $fileToDelete;
								if (file_exists($filePath)) {
									unlink($filePath);
									echo "<p>A fájl törölve lett: " . htmlspecialchars($fileToDelete) . "</p>";
									
									$galleryArray = getGalleryJSON($conn);
									$galleryArray = array_values(array_filter($galleryArray, function($file) use ($fileToDelete) {
										return $file !== $fileToDelete;
									}));
									updateGalleryJSON($conn, $galleryArray);
								} else {
									echo "<p>A fájl nem található.</p>";
								}
							}

							$galleryArray = getGalleryJSON($conn);
							echo "<div class='row'>";
							echo "<div class='col-md-12'>";
							echo "<p>Feltöltött képek</p>";
							echo "</div>";
							echo "<div class='col-md-12'>";
							echo "<ul>";
							foreach ($galleryArray as $file) {
								echo "<li>" . htmlspecialchars($file) .
									" <form method='POST' style='display:inline' class='padding-onlytop-md padding-md-topbottom-null'>
										<button type='submit' name='deleteFile' value='" . htmlspecialchars($file) . "'>Törlés</button>
									  </form>
									  </li>";
							}
							echo "</ul>";
							echo "</div>";
							echo "</div>";
							
							echo "<div class='col-md-12'>";
							echo "<p>Fájl feltöltése:</p>";
							echo "</div>";
							echo "<form method='POST' enctype='multipart/form-data' class='padding-onlytop-md padding-md-topbottom-null'>
									<div class='row'>
										<div class='col-md-12'>
											<input type='file' name='uploadedFile' required>
										</div>
										<div class='col-md-12'>
											<div class='submit-area padding-onlytop-sm'>
												<input type='submit' value='Feltöltés'>
											</div>
										</div>
									</div>
								  </form>";

							$conn->close();
						?>		
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
</body>

</html>