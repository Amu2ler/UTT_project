
<!-- ----- debut ControllerSpecialite -->
<?php
require_once '../model/ModelSpecialite.php';


class ControllerSpecialite{

  public static function ListeSpecialite() {
  // ajouter une validation des informations du formulaire
  $results = ModelSpecialite::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/specialite/viewAll.php';
  require ($vue);
 }
 

  public static function SpecialiteReadId() {
  // ajouter une validation des informations du formulaire
  $results = ModelSpecialite::getAllId();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/specialite/viewid.php';
  require ($vue);
 }
 
 public static function SpecialiteReadOne() {
  $specialite_id= $_GET['id'];
  $results = ModelSpecialite::getOne($specialite_id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root .'/app/view/specialite/viewAll.php';
  require ($vue);
 }
 
// Affiche le formulaire de creation d'un producteur
public static function SpecialiteCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/specialite/viewInsert.php';
  require ($vue);
 }
 

 // Affiche un formulaire pour récupérer les informations d'un nouveau producteur.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function SpecialiteCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelSpecialite::insert(
    htmlspecialchars($_GET['label'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/specialite/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerSpecialite -->


