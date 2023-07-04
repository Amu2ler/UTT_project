
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelPersonne {
 
     const Administrateur=0;
     const Praticien=1;
     const Patient=2;

    private $id, $nom,$prenom,$adresse, $login, $password, $statut, $specialite_id;
            
 
 public function __construct($id = NULL, $nom=NULL, $prenom=NULL, $adresse=NULL, $login=NULL, $password=NULL, $statut=NULL, $specialite_id=NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom= $prenom;
   $this->adresse = $adresse;
   $this->login = $login;
   $this->password = $password;
   $this->statut=$statut;
   $this->specialite=$specialite_id;
   
  
  }
 }
 function setId($id) {
  $this->id = $id;
 }
 
 function setNom($nom) {
  $this->nom = $nom;
 }

 function setPrenom($prenom) {
  $this->prenom = $prenom;
 }
 
 function setAdresse($adresse) {
  $this->adresse = $adresse;
 }
 
 function setLogin($login) {
  $this->login = $login;
 }
 function setPassword($password) {
  $this->password = $password;
 }
 function setStatut($statut) {
  $this->statut= $statut;
 }
 
 function setSpecialiteid($specialite_id) {
  $this->specialite_id = $specialite_id;
 }
 
 
 function getId() {
  return $this->id;
 }

 function getNom() {
  return $this->nom;
 }

function getPrenom() {
  return $this->prenom;
 }
 

 function getAdresse() {
  return $this->adresse;
 }
 
 function getLogin() {
  return $this->login;
 }
 
 function getPassword() {
  return $this->password;
 }
 
 function getStatut() {
  return $this->statut;
 }
 
 function getSpecialiteid() {
  return $this->specialite_id;
 }
 

public static function getAllPraticiensLabel() {
  try {
    $database = Model::getInstance();
    $query = "SELECT personne.id AS personne_id, personne.nom AS personne_nom, personne.prenom AS personne_prenom, personne.adresse AS personne_adresse, specialite.label FROM specialite INNER JOIN personne ON personne.specialite_id = specialite.id WHERE specialite.id != 0;";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}

 
 public static function PraticiensParPatient() {
  try {
    $database = Model::getInstance();
    $query = "SELECT personne.nom AS personne_nom, personne.prenom AS personne_prenom, personne.adresse AS personne_adresse,COUNT(DISTINCT rendezvous.id) AS nb_praticiens
              FROM rendezvous INNER JOIN personne ON rendezvous.patient_id = personne.id WHERE rendezvous.patient_id != 0
              GROUP BY rendezvous.patient_id ;";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
  
  
}


// Liste des personnes appartenant à un certain statut
    public static function getAll($statut) {
        try {
            $query = 'SELECT * FROM personne WHERE statut = :statut AND id != 0 ORDER BY id ;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'statut' => $statut
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    

    public static function getInfo($id) {
      try {
          $query = 'SELECT * FROM personne WHERE id = :id AND id != 0;';
          $statement = Model::getInstance()->prepare($query);
          $statement->execute([
              'id' => $id
          ]);           
          $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
          return $results;
      } catch (PDOException $e) {
          printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
          return NULL;
      }
  }
 
  
  public static function insert($nom,$prenom,$adresse,$login,$password,$statut,$specialiteid) {
      try {
          $query="select max(id) from personne";
          $statement= model::getInstance()->query($query);
          $tuple=$statement->fetch();
          $id=$tuple['0'];
          $id++;
          
          $query = 'INSERT into personne value (:id,:nom, :prenom, :adresse, :login, :password, :statut, :specialiteid)';
          $statement = Model::getInstance()->prepare($query);
          $statement->execute([
              'id'=>$id,
              'nom' =>$nom,
              'prenom' => $prenom,
              'adresse' => $adresse,
              'login' => $login,
              'password' => $password,
              'statut' => $statut,
              'specialiteid' => $specialiteid
          ]);
          return $id;
      } catch (PDOException $e) {
          printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
          return -1;
      }
}
  
  public static function getAllPersonne() {
        try {
            $query = 'SELECT * FROM personne ;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
  public static function getOnePersonne($id) {
        try {
            $query = 'SELECT * from personne where id=:id ;';
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'id'=>$id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
            return $results;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return NULL;
        }
    }  
    
    
    
}
;?>
<!-- ----- fin ModelPersonne -->
