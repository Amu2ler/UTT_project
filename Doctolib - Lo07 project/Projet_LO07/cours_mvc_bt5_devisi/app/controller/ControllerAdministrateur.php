
<?php
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRendezvous.php';

class ControllerAdministrateur {
 // --- page d'acceuil
 public static function DoctolibAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerAdministrateur : DoctolibAccueil : vue = $vue");
  require ($vue);
 }
 
 public static function PraticienSpecialite() {
  // ajouter une validation des informations du formulaire
  $results = ModelPersonne::getAllPraticiensLabel();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/praticien/viewAllLabel.php';
  require ($vue);
 }
 
 public static function NombrePraticiensParPatient() {
  // ajouter une validation des informations du formulaire
  $results = ModelPersonne::PraticiensParPatient();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAllPatient.php';
  require ($vue);
 }
 
 
 
 
  public static function AdministrateurInfo() {

      $results_specialite= ModelSpecialite::getAll();
      $results_administrateur= ModelPersonne::getAll((ModelPersonne::Administrateur));
      $results_praticien= ModelPersonne::getAll(ModelPersonne::Praticien);
      $results_patient= ModelPersonne::getAll(ModelPersonne::Patient);
      $resultats_rendezvous= ModelRendezVous::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Administrateur/ViewInfo.php';
  require ($vue);
 }

 
}
?>
