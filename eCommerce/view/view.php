<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?php echo $pagetitle; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--fonts-->
        <link rel="stylesheet" type="text/css" href="css/fontscss/font_definer.css">

        <!-- body -->
        <link rel="stylesheet" media="all" type="text/css" href="css/bodycss/body_all.css">
        <link rel="stylesheet" media="all and (min-width: 768px)" type="text/css" href="css/bodycss/body_viewport-7.css">
        <link rel="stylesheet" media="all and (min-width: 992px)" type="text/css" href="css/bodycss/body_viewport-9.css">
        <link rel="stylesheet" media="all and (min-width: 1200px)" type="text/css" href="css/bodycss/body_viewport-12.css">

        <!-- header -->
        <link rel="stylesheet" media="all" type="text/css" href="css/headercss/header_all.css">
        <link rel="stylesheet" media="all and (min-width: 768px)" type="text/css" href="css/headercss/header_viewport-7.css">
        <link rel="stylesheet" media="all and (min-width: 992px)" type="text/css" href="css/headercss/header_viewport-9.css">
        <link rel="stylesheet" media="all and (min-width: 1200px)" type="text/css" href="css/headercss/header_viewport-12.css">

        <!-- main -->
        <?php require FILE::build_path(array("view","css.php")); ?>

        <!-- footer -->
        <link rel="stylesheet" media="all" type="text/css" href="css/footercss/footer_all.css">
        <link rel="stylesheet" media="all and (min-width: 992px)" type="text/css" href="css/footercss/footer_viewport-9.css">

    </head>

    <body>
        <header>
            <nav class="second_nav">
                    <ul class="second_nav_links">
                        <?php
                            if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]==0) {
                                echo "<li><a href=\"index.php?&page=upload\">IMAGES</a></li>";
                                echo "<li><a href=\"index.php?action=readAll&controller=utilisateur\">UTILISATEURS</a></li>";
                                echo "<li><a href=\"index.php?action=readAll&controller=commande\">COMMANDES</a></li>";
                                echo "<li><a href=\"index.php?action=readAll&controller=contenu\">CONTENUS</a></li>";
                            }
                        ?>
                        <li><a href="index.php?page=wip">In English</a></li>
                        <?php
                            if (isset($_SESSION["idUser"])) {
                                echo "<li><a href=\"index.php?action=deconnexion&controller=utilisateur\">Déconnexion</a></li>";
                                echo "<li><a href=\"index.php?action=readMine&controller=commande\">Mes Commandes</a></li>";
                            } else {
                                echo "<li><a href=\"index.php?action=connexion&controller=utilisateur\">Se connecter</a></li>";
                            }
                        ?>
                        <li class="cart"><a href="index.php?action=showCart&controller=cart">Mon Panier</a></li>
                    </ul>
            </nav>
            <div id="nav_logo_container">
                <input type="checkbox" id="mobile_menu" class="mobile_menu" />
                <label for="mobile_menu" class="mobile_menu"></label>
                <label for="mobile_menu" class="menu_overlay"></label>

                <input type="checkbox" id="dropdown_menu_mobile" class="dropdown_menu_mobile" />
                <label for="dropdown_menu_mobile" class="dropdown_menu_overlay"></label>

                <input type="checkbox" id="dropdown_menu_mobile2" class="dropdown_menu_mobile2" />
                <label for="dropdown_menu_mobile2" class="dropdown_menu_overlay2"></label>

                <figure class="logo">
                    <a href="index.php"><img src="images/header/logo.png" alt="logo" /></a>
                </figure>

                <a class="cart" href="../cart.html"> </a>

                <nav class="main_nav">
                    <ul class="main_nav_links">
                        <li><a href="index.php" class="active">Accueil</a></li>
                        <li class="dropdown_menu_mobile"><label for="dropdown_menu_mobile" class="dropdown_menu_mobile">Chocolats</label>
                        </li>
                        <li class="dropdown_menu"><a href="index.php?action=readAll&controller=chocolat" class="dropdown_menu">Chocolats</a>
                        </li>
                        <li><a href="index.php?page=equipe">L'Équipe</a></li>
                        <li class="dropdown_menu_mobile2"><label for="dropdown_menu_mobile2" class="dropdown_menu_mobile2">Nous Rejoindre</label>
                            <ul class="main_nav_links dropdown_menu_mobile2">
                                <li><a href="index.php?page=metier1">Chocolatier</a></li>
                                <li><a href="index.php?page=metier2">Préparateur de commandes</a></li>
                                <li><a href="index.php?page=metier3">Commercial</a></li>
                            </ul>
                        </li>
                        <li class="dropdown_menu2"><a href="index.php?page=rejoindre" class="dropdown_menu2">Nous Rejoindre</a>
                            <ul class="main_nav_links dropdown_menu2">
                                <li><a href="index.php?page=metier1">Chocolatier</a></li>
                                <li><a href="index.php?page=metier2">Préparateur de commandes</a></li>
                                <li><a href="index.php?page=metier3">Commercial</a></li>
                            </ul>
                        </li>
                        <li class="mobile"><a href="index.php?page=faq">FAQ</a></li>
                        <li class="desktop"><a href="index.php?page=faq">Foire aux Questions</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
		<?php
            

            if(isset($controller))
                require File::build_path(array("view", $controller, "$view.php"));
            else
                require File::build_path(array("view","page", "$view.php"));
		?>
    </main>

        <footer>
            <div id="first_footer">
                <input type="checkbox" id="googlemap_popup" class="googlemap_popup" />
                <label for="googlemap_popup" class="googlemap_popup_overlay"></label>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2660.7520228067992!2d11.530708515176867!3d48.17286037922629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479e765c485c70b7%3A0xb2768a24d24a29a4!2sWilly%20Wonka%20And%20The%20Chocolate%20Factory%20Set!5e0!3m2!1sen!2scz!4v1577181922703!5m2!1sen!2scz" class="googlemap"></iframe>
                <div>
                    <p class="address">
                        <label class="address" for="googlemap_popup">
                            Willy Wonka & The Chocolate Factory
                            <br />
                            Agnes-Pockels-Bogen 6
                            80992 Munich, Allemagne
                        </label>
                    </p>
                    <address class="address">
                        <a href="mailto:abcdefghij@klmno.pq" class="address">abcdefghij@klmno.pq</a>
                        <br />
                        <a href="tel:+49-01-23-45-67-89" class="address">☎ +49.01.23.45.67.89</a>
                    </address>
                </div>
            </div>
            <div id="second_footer">
                <div class="social_networks">
                    <p>
                        Rejoignez nous sur:
                    </p>
                    <div class="social_networks_links">
                        <a href="https://www.facebook.com/"><img src="images/footer/facebook.png" alt="facebook_icon" class="facebook" /><span class="social_networks_names">Facebook</span></a>
                        <a href="https://twitter.com/"><img src="images/footer/twitter.png" alt="twitter_icon" class="twitter" /><span class="social_networks_names">Twitter</span></a>
                        <a href="https://www.youtube.com/"><img src="images/footer/youtube.png" alt="youtube_icon" class="youtube" /><span class="social_networks_names">Youtube</span></a>
                        <a href="https://www.pinterest.fr/"><img src="images/footer/pinterest.png" alt="pinterest_icon" /><span class="social_networks_names">Pinterest</span></a>
                        <a href="https://www.linkedin.com/"><img src="images/footer/linkedin.png" alt="linkedin_icon" /><span class="social_networks_names">Linkedin</span></a>
                        <a href="https://www.instagram.com/"><img src="images/footer/instagram.png" alt="instagram_icon" /><span class="social_networks_names">Instagram</span></a>
                    </div>
                </div>
            </div>
            <div id="third_footer">
                <a href="index.php?page=conditions">Conditions d'utilisation</a>
                <a href="index.php?page=presse">Presse</a>
                <a href="index.php?page=contact">Contactez-nous</a>
            </div>
            <div id="fourth_footer">
                <p>© 2020 Chocolate Factory Willy Wonka</p>
            </div>
        </footer>
    </body>
</html>
