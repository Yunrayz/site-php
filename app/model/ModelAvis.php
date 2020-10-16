
<!-- ----- debut ModelProducteur -->
<?php
require_once 'Model.php';

class ModelAvis {

    private $id, $prenom, $nom, $commentaire;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $prenom = NULL, $nom = NULL, $commentaire = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->commentaire = $commentaire;
        }
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    public function getNom()
    {
        return $this->nom;
    }

  public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getCommentaire()
    {
        return $this->commentaire;
    }


    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }



    public function __toString() {
        return $this->id;
    }

    // Persistance .......








    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from avis";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelAvis");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }



    public static function insert($prenom, $nom, $commentaire) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from avis";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into avis value (:id, :nom, :prenom, :commentaire)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'commentaire' => $commentaire
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }


}
?>
<!-- ----- fin ModelProducteur -->
