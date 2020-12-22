<?php
class Security {
    private static $seed = 'Urfq3O3RTGe0';

    public static function hasher($texte_en_clair) {
        $texte_seeded = $texte_en_clair . Security::$seed;
        $texte_hache = hash('sha256', $texte_seeded);
        return $texte_hache;
    }

    public static function generateRandomHex() {
        $numbytes = 16;
        $bytes = openssl_random_pseudo_bytes($numbytes);
        $hex   = bin2hex($bytes);
        return $hex;
    }
}
?>