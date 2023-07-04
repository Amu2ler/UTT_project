
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerDoctolib.php');
require ('../controller/ControllerSpecialite.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerPraticien.php');

session_start();

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// On supprime l'élément action de la structure
unset($param['action']);

// --- Liste des méthodes autorisées
switch ($action) {
 case "PraticienSpecialite" :
 case "NombrePraticiensParPatient" :
 case "AdministrateurInfo" :
     ControllerAdministrateur::$action();
  break;

case "getAllDispo":
case "InserRDV":
case "getAllRDV":
case"getAllPatientSansDoublon":
case "CreatedRDVPraticien":
case "CreateRDVPraticien":     
  ControllerPraticien::$action();
 break;

case "ListeSpecialite":
 case "SpecialiteReadOne":
 case "SpecialiteReadId":
 case "SpecialiteCreate":
 case "SpecialiteCreated":
     ControllerSpecialite::$action();
 break;

case "InfoCompte" :
case"InfoRDV":
case "viewFormulaireListePraticiens":
case "viewFormulaireDispoPraticien":
 case "updateRDV":
    ControllerPatient::$action();
 break;

 case "DoctolibRegister":
 case "DoctolibLogin":
 case "DoctolibConnected":
 case"RegisterCreated":
 case "deconnexion";
 case"DoctolibInnovation":
 case"MVCAmelioration":
     ControllerDoctolib::$action();
 break;

 // Tache par défaut
 default:
  $action = "DoctolibAccueil";
  ControllerDoctolib::$action();
}
?>
<!-- ----- Fin Router1 -->

