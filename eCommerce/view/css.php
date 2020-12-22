<?php
    if ($view == "metier1" || $view == "metier2" || $view == "metier3")
        echo '<link rel="stylesheet" media="all" type="text/css" href="css/metiercss/metier_all.css">';
    else if ($view == "connexion" || $view == "inscription" || $view == "resetmdp" || $view == "update" || $view == "resetedmdp" || $view == "insc-check" || $view == "connexion-check")
        echo '<link rel="stylesheet" media="all" type="text/css" href="css/connexioncss/connexion_all.css">';
    else if ($view == "list" || $view == "detail" || $view == "chocolatblanc" || $view == "chocolatgeneral" || $view == "chocolatnoir" || $view == "chocolatlait" || $view == "commandegeneral" || $view == "utilisateursgeneral" || $view == "contenugeneral") {
        echo '<link rel="stylesheet" media="all" type="text/css" href="css/genericproductcss/genericproduct_all.css">';
        echo '<link rel="stylesheet" media="all and (min-width: 992px)" type="text/css" href="css/genericproductcss/genericproduct_viewport-9.css">';
    } else {
        echo "<link rel=\"stylesheet\" media=\"all\" type=\"text/css\" href=\"css/".$view."css/".$view."_all.css\">";
        echo "<link rel=\"stylesheet\" media=\"all and (min-width: 480px)\" type=\"text/css\" href=\"css/".$view."css/".$view."_viewport-4.css\">";
        echo "<link rel=\"stylesheet\" media=\"all and (min-width: 768px)\" type=\"text/css\" href=\"css/".$view."css/".$view."_viewport-7.css\">";
        echo "<link rel=\"stylesheet\" media=\"all and (min-width: 992px)\" type=\"text/css\" href=\"css/".$view."css/".$view."_viewport-9.css\">";
        echo "<link rel=\"stylesheet\" media=\"all and (min-width: 1200px)\" type=\"text/css\" href=\"css/".$view."css/".$view."_viewport-12.css\">";
    }
?>
