
<!-- ----- debut ControllerRecolte -->
<?php
require_once '../model/ModelAvis.php';

class ControllerAvis {


    public static function avisCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/avis/viewInsert.php';
        require ($vue);
    }

    public static function avisCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelAvis::insert(
            htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['commentaire'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/avis/viewInserted.php';
        require ($vue);
    }

    public static function avisReadAll() {
        $results = ModelAvis::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/avis/viewAll.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
        require ($vue);
    }



}
?>
<!-- ----- fin ControllerRecolte -->


