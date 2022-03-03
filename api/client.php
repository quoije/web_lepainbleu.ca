<!DOCTYPE html>
<?php
	include 'db.php';
	if (isset($_COOKIE['pass'])) {
    	$dog = $_COOKIE["user"];
	$cat = $_COOKIE["pass"];
	}
    $thelist = '';
    if ($handle = opendir("./client_files/")) {
        while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            $thelist .= '<li><a href="client_files/'.$file.'">'.$file.'</a></li>';
        }
        }
        closedir($handle);
    }
	$dog;
        $cat;
        $user_sql = "SELECT user FROM users where user LIKE '". $dog ."'";
        $pass_sql = "SELECT pass FROM users where user LIKE '". $dog ."'";
        $rus = mysqli_query($conn, $user_sql);
        $rps = mysqli_query($conn, $pass_sql);

        if ($rus->num_rows > 0) {
            while($row = $rps->fetch_assoc()) {
                if ($cat == $row["pass"])
                {
                    echo <<<GFG
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
                        <title>Le pain bleu</title>
                        <meta name="description" content="Boulangerie où l'on ne sert que du pain bleu. Seulement bleu.">
                        <link rel="icon" type="image/png" sizes="512x512" href="../assets/img/external-content.duckduckgo.com.png">
                        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
                        <script src="mmn.js"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
                    </head>
                    <body style="background:linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('../assets/img/bg.jpg');">
                        <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="site-heading-lower"><span class="site-heading-lower">LE PAIN BLEU<span class="text-primary site-heading-upper mb-3" style="margin-top: 6px;">SEULEMENT BLEU&nbsp;&nbsp;<img src="../assets/img/Logo%20Projet%20Fina_oofl.png" width="125"></span></span></span></h1>
                        <nav class="navbar navbar-dark navbar-expand-lg bg-dark py-lg-4" id="mainNav" style="margin-top: 0px;">
                            <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#" style="color: rgb(86,144,230);">Le pain bleu</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                                <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav mx-auto">
                                        <li class="nav-item"><a class="nav-link" href="../index.html">Accueil</a></li>
                                        <li class="nav-item"><a class="nav-link" href="../products.html">produits</a></li>
                                        <li class="nav-item"><a class="nav-link" href="https://boutique.lepainbleu.ca">boutique</a></li>
                                        <li class="nav-item"><a class="nav-link" href="../login.html">espace client</a></li>
                                        <li class="nav-item"><a class="nav-link" href="../about.html">à propos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <section class="page-section cta">
                        <center>
                        <form action="javascript:deleteCookies('user');javascript:deleteCookies('pass')">
                        <input type="submit" value="Se déconnecter">
                        </form>
                        </center>
                        <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-9 mx-auto">
                                <div class="cta-inner rounded">
                                        <a href="https://docs.nopcommerce.com/en/running-your-store/catalog/index.html">Procédure utilisateur</a>
                                <p>
                                            <h3>Fichiers:</h3>
                                            <ul>
                                            $thelist
                                            </ul>
                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <footer class="text-center footer text-faded py-5">
                            <div class="container">
                                <p class="m-0 small">copyright&nbsp;© le pain bleu - deux mille vingt-deux<br><br></p>
                            </div>
                        </footer>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                    </body>

                    </html>
                    GFG;
                    
                }
                else
                {
                    echo "YOU DONT BELONG HERE YOU BLUE BREAD EATER";
                    die("DENIED");
                }
            }
          } else {
            echo "you shall not pass at this time, sorry :(";
          }
	$conn->close();

   
	?>

