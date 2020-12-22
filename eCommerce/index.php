<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "File.php");
session_start();
if (isset($_SESSION["stayLogged"]) /*&& $_SESSION["stayLogged"] == "on"*/) {
    session_abort();
    session_start(['cookie_lifetime' => 604800]);
} else {
    session_abort();
    session_start(['cookie_lifetime' => 1800]);
}

if (isset($_SESSION["stayLogged"]) && $_SESSION["stayLogged"] = "on") {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 604800)) {
        session_unset();
        session_destroy();
    } else {
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    }
} else {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_unset();
        session_destroy();
    } else {
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    }
}

require_once File::build_path(array("lib","Security.php"));
require_once File::build_path(array("controller","routeur.php"));
?>