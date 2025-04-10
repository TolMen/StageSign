
<?php

class connectBDD {
    private static $name = "stagesign";
    private static $url = "localhost";
    private static $username = "root";
    private static $password = "";

    public static function getConnexion() {
        $bdd = new PDO("mysql:host=".self::$url.";dbname=".self::$name."; charset=utf8", self::$username, self::$password);
        return $bdd;
    }

    public static function redirectNonloggedUser() {
        if (empty($_SESSION["id"])) {
            header("Location: home.php"); # .htaccess
            exit;
        }
    }

    public static function redirectNonAdminUser() {
        if (empty($_SESSION["id"]) || $_SESSION["role"] != "admin") {
            header("Location: home.php"); # .htaccess
            exit;
        }
    }
}
