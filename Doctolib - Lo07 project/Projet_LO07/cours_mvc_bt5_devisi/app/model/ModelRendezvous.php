
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelRendezvous {
 private $id, $patient_id, $praticien_id,$rdv_date;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $patient_id=NULL, $praticienn_id=NULL, $rdv_date=NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->patient_id = $patient_id;
   $this->praticien_id =$praticien_id;
   $this->rdv_date=$rdv_date;  
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setPatientid($patient_id) {
  $this->patient_id = $patient_id;
 }
 
 function setPraticientid($praticien_id) {
  $this->praticien_id = $praticien_id;
 }
 function setRdvdate($rdv_date) {
  $this->rdv_date = $rdv_date;
 }
 
 function getId() {
  return $this->id;
 }

 function getPatientid() {
  return $this->patient_id;
 }
function getPraticienid() {
  return $this->praticien_id;
 }
 function getrdv() {
  return $this->rdv_date;
 }
 
 
 
 public static function getALL() {
  try {
    $database = Model::getInstance();
    $query = "SELECT * from rendezvous ;";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  } 
}

public static function getAllRDVPatient($id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT rdv_date, p.nom AS praticien_nom, p.prenom AS praticien_prenom FROM rendezvous JOIN personne AS p ON praticien_id = p.id WHERE patient_id = $id;";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  } 
}


public static function getAllDispoPraticien($id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT rdv.rdv_date, p.nom AS praticien_nom, p.prenom AS praticien_prenom FROM rendezvous AS rdv JOIN personne AS p ON rdv.praticien_id = p.id WHERE rdv.patient_id = 0 and p.id= $id;";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  } 
}

public static function countRdvByDate($date)
{
    try {
        $database = Model::getInstance();
        $query = "SELECT COUNT(*) as count FROM rendezvous WHERE DATE(rdv_date) = :date";
        $statement = $database->prepare($query);
        $statement->execute(array(':date' => $date));
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    } 
    
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return 0;
    }
}

public static function AddRDVDispo($praticien_id, $date){
        try {
            $database = Model::getInstance();
            // trouver la dernière id utilisée dans la table => assigner une nouvelle clé pour le prochain rendez-vous (id++)
            $query = "SELECT MAX(id) FROM rendezvous";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple[0];
            $id++;
            
            
            // Insérer les nouveaux rendez-vous
            $query = "insert into rendezvous value (:id, 0, :praticien_id, :date)";
            $statement = Model::getInstance()->prepare($query);
            $statement->execute([
                'rendezvous_id' => $id,
                'praticien_id' => $praticien_id,
                'date_rdv' => $date
            ]);
            return $id;
        } catch (PDOException $e) {
            printf('%s - %s<p/>\n', $e->getCode(), $e->getMessage());
            return -1;
        }
}
   
public static function getAllRDVPraticien($id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT rdv_date AS rdv_date, personne.nom AS patient_nom, personne.prenom AS patient_prenom FROM rendezvous INNER JOIN personne ON patient_id = personne.id WHERE praticien_id = $id and patient_id!=0;";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  } 
}


public static function getAllPatient_du_Praticien($id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT DISTINCT p.nom as patient_nom, p.prenom as patient_prenom, p.adresse as patient_adresse FROM personne AS p JOIN rendezvous AS r ON p.id = r.patient_id WHERE r.praticien_id = $id and p.id!=0;";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  } 
}

public static function AfficherRendezVous($praticien_id) {
    try {
      $database = Model::getInstance();
      $query = "SELECT rdv_date FROM rendezvous WHERE praticien_id = :praticien_id AND patient_id = 0";
      $statement = $database->prepare($query);
      $statement->execute([
        'id' => $praticien_id
      ]);
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
      return NULL;
    }
  }


}
;?>
<!-- ----- fin ModelRendezvous -->
