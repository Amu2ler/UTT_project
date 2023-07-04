
<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPersonne.php';


class ControllerPatient{

  public static function InfoCompte() {
  // ajouter une validation des informations du formulaire
  $id= $_SESSION['id'];
  $results = ModelPersonne::getInfo($id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInfoCompte.php';
  require ($vue);
 }
 
  public static function InfoRDV() {
  // ajouter une validation des informations du formulaire
  $id=$_SESSION['id'];
  $results = ModelRendezvous::getAllRDVPatient($id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/ViewAllRDVPatient.php';
  require ($vue);
 }
 
 
 
 public static function viewFormulaireListePraticiens() {
    $praticiens = ModelPersonne::getAll(ModelPersonne::Praticien);
    include 'config.php';
    $vue = $root . '/app/view/patient/ViewFormulaireListePraticiens.php';
    require($vue);
  }




  public static function viewFormulaireDispoPraticien() {
    if (isset($_GET['praticien'])) {
      $praticien_id = $_GET['praticien'];
      $praticien = ModelRendezVous::AfficherRendezVous($praticien_id);
      // Vous pouvez également récupérer les disponibilités du praticien ici

      $vue = $root . '/app/view/patient/viewFormulaireDispoPraticien.php';
      require($vue);
    }
  }
 
 
  
 
// Prendre un RDV avec un praticien (Partie 1)
  public static function PrendreRDV() {
      $results = ModelPersonne::getAll(ModelPersonne::Praticien);
      include 'config.php';
      $vue = $root. '/app/view/patient/ViewRDVDispo.php';
      require $vue;
  }

  

public static function RDVcreate() {
    
   $results = ModelRendezVous::getAllDispoPraticien();
   include 'config.php';
   $vue = $root . '/app/view/patient/ViewRDVCreated.php';
   require  $vue;
}
    



}
?>
<!-- ----- fin ControllerSpecialite -->


