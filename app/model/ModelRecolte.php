
<!-- ----- debut ModelRecolte -->
<?php
require_once 'Model.php';

class ModelRecolte {

    private $producteurId, $quantite, $vinId;



    public function __construct($producteurId = NULL, $quantite = NULL, $vinId = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($producteurId) AND !is_null($vinId)) {
            $this->producteurId = $producteurId;
            $this->quantite = $quantite;
            $this->vinId = $vinId;
        }
    }


    public function getProducteurId()
    {
        return $this->producteurId;
    }


    public function setProducteurId($producteurId)
    {
        $this->producteurId = $producteurId;
    }


    public function getQuantite()
    {
        return $this->quantite;
    }


    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }


    public function getVinId()
    {
        return $this->vinId;
    }


    public function setVinId($vinId)
    {
        $this->vinId = $vinId;
    }



    public function __toString() {
        return $this->producteurId." ".$this->vinId;
    }


    public static function view() {
        printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $this->getProducteurId(), $this->getQuantite(), $this->getVinId());
    }

// retourne une liste des id
    public static function getAllJoined() {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM (recolte LEFT JOIN vin ON vin.id=vin_id) LEFT JOIN producteur ON producteur.id=producteur_id ";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM recolte order by producteur_id, vin_id, quantite";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }

    }


    public static function getVinByRegion() {
        try {
            $database = Model::getInstance();
            $query = "SELECT region, annee, cru FROM (recolte LEFT JOIN vin ON vin.id=vin_id) LEFT JOIN producteur ON producteur.id=producteur_id order by region, annee";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getVinByProducteur() {
        try {
            $database = Model::getInstance();
            $query = "SELECT prenom, nom, cru, annee, quantite FROM (recolte LEFT JOIN vin ON vin.id=vin_id) LEFT JOIN producteur ON producteur.id=producteur_id order by producteur_id, annee";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function insert($producteurId, $quantite, $vinId) {
        try {
            $database = Model::getInstance();

            // ajout d'un nouveau tuple;
            $query = "insert into producteur value (:producteurId, :quantite, :vinId)";
            $statement = $database->prepare($query);
            $statement->execute([
                'producteutId' => $producteurId,
                'quantite' => $quantite,
                'vinId' => $vinId
            ]);
            return $producteurId." ".$vinId;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }



// supprime un tuple via ses id
    public static function delete($producteurId, $vinId) {
        try {
            $database = Model::getInstance();

            // ajout d'un nouveau tuple;
            $query = "delete from recolte where producteur_id = ". $producteurId." and vin_id = ".$vinId;
            $statement = $database->prepare($query);
            $statement->execute();
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        }
    }

}
?>
<!-- ----- fin ModelRecolte -->
