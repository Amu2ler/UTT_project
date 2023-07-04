
<!-- ----- debut ControllerProducteur -->
<?php
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRendezvous.php';

class ControllerPraticien {
 
 public static function getAllDispo() {
  // ajouter une validation des informations du formulaire
  $id=$_SESSION['id'];
  $results = ModelRendezvous::getAllDispoPraticien($id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/praticien/ViewAllDispo.php';
  require ($vue);
 }

 
  public static function CreateRDVPraticien() {
  include 'config.php';
  $vue = $root . '/app/view/praticien/ViewAjoutRDV.php';
  require ($vue);
 }

 
  public static function CreatedRDVPraticien() {
  {
            $date = $_GET["date"];
            $nbrRdv = $_GET["nbr_rdv"];
            // Récupérer l'ID du praticien connecté
            $praticien_id = $_SESSION['id'];

            $nbrRdvExistant = ModelRendezVous::countRdvByDate($date);
            if ($nbrRdv + $nbrRdvExistant <= 9 && $nbrRdvExistant < 9) {

                switch ($nbrRdvExistant) {
                    case 0:
                        $date = $date . " à 10h00";
                        break;
                    case 1:
                        $date = $date . " à 11h00";
                        break;
                    case 2:
                        $date = $date . " à 12h00";
                        break;
                    case 3:
                        $date = $date . " à 13h00";
                        break;
                    case 4:
                        $date = $date . " à 14h00";
                        break;
                    case 5:
                        $date = $date . " à 15h00";
                        break;
                    case 6:
                        $date = $date . " à 16h00";
                        break;
                    case 7:
                        $date = $date . " à 17h00";
                        break;
                    case 8:
                        $date = $date . " à 18h00";
                        break;
                }

                // Ajouter une nouvelle disponibilité
                $results = ModelRendezVous::AddRDVDispo($praticien_id, $date);

                //Construction chemin de la vue
                include 'config.php';
                $vue = $root . '/app/view/praticien/viewAjoutRDVFait.php';
                require($vue);
            } 
    }
  }
 
 
 
 
 public static function getAllRDV() {
  // ajouter une validation des informations du formulaire
  $id=$_SESSION['id'];
  $results = ModelRendezvous::getAllRDVPraticien($id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/praticien/ViewAllRDVPraticien.php';
  require ($vue);
 }

  public static function getAllPatientSansDoublon() {
  // ajouter une validation des informations du formulaire
  $id=$_SESSION['id'];
  $results = ModelRendezvous::getAllPatient_du_Praticien($id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/praticien/ViewListePatient.php';
  require ($vue);
 }


 
}
?>
<!-- ----- fin ControllerVin -->


