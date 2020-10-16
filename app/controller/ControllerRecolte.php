
<!-- ----- debut ControllerRecolte -->
<?php
require_once '../model/ModelRecolte.php';

class ControllerRecolte {


    // --- Liste des tables joined
    public static function recolteReadAllJoined() {
        $statement = ModelRecolte::getAllJoined();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewAllJoined.php';
        if (DEBUG)
            echo ("ControllerRecolte : recolteReadAllJoined : vue = $vue");
        require ($vue);
    }


    public static function recolteReadVinByRegion() {
        $statement = ModelRecolte::getVinByRegion();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewAllJoined.php';
        if (DEBUG)
            echo ("ControllerRecolte : recolteReadVinByRegion : vue = $vue");
        require ($vue);
    }


    // --- Liste des tables joined
    public static function recolteReadVinByProducteur() {
        $statement = ModelRecolte::getVinByProducteur();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewAllJoined.php';
        if (DEBUG)
            echo ("ControllerRecolte : recolteReadVinByProducteur : vue = $vue");
        require ($vue);
    }


    // --- Liste des tables joined
    public static function recolteDelete() {
        $statement = ModelRecolte::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewDelete.php';
        if (DEBUG)
            echo ("ControllerRecolte : recolteDelete : vue = $vue");
        require ($vue);
    }

    public static function recolteDeleted() {
        foreach ($_POST as $key => $value) {
            ModelRecolte::delete($key, $value);
        }

        self::recolteDelete();
    }


}
?>
<!-- ----- fin ControllerRecolte -->


