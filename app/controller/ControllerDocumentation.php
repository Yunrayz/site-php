
<!-- ----- debut ControllerDocumentation -->
<?php

class ControllerDocumentation {



    // --- Affiche Mes propositions
    public static function mesPropositions() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/mesPropositions.php';
        if (DEBUG)
            echo ("ControllerDocumentation : mesPropositions : vue = $vue");
        require ($vue);
    }

    // --- Affiche Mes propositions
    public static function monProjet() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/monProjet.php';
        if (DEBUG)
            echo ("ControllerDocumentation : monProjet : vue = $vue");
        require ($vue);
    }


}
?>
<!-- ----- fin ControllerDocumentation -->


