<?php
    function getAPIKey($vendeur) {
        $api_keys = [
            "MI-3_H" => "abcdef123456789"   
        ];
        return $api_keys[$vendeur] ?? "abcd"; // Retourne "abcd" si le vendeur n'est pas trouvé
    }
?>
