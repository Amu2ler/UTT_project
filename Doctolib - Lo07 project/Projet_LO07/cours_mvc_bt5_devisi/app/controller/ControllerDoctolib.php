<?php

require_once '../model/ModelPersonne.php';

class ControllerDoctolib {


    public static function DoctolibAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG)
            echo ("ControllerDoctolib : DoctolibAccueil : vue = $vue");
        require ($vue);
    }
    
    public static function DoctolibInscription() {
        include 'config.php';
        $vue = $root . '/app/view/Connexion/inscription.php';
        if (DEBUG)
            echo ("ControllerDoctolib : DoctolibAccueil : vue = $vue");
        require ($vue);
    }
    
    
    public static function DoctolibLogin() {
        include 'config.php';
        $vue = $root . '/app/view/Connexion/login.php';
        if (DEBUG)
            echo ("ControllerDoctolib : DoctolibAccueil : vue = $vue");
        require ($vue);
    }
    

    // Connexion au compte
    public static function DoctolibConnected() {
        $AllPersonne = ModelPersonne::getAllPersonne();
        $id= null;
        foreach ($AllPersonne as $Personne){
            if ($_GET['login'] == $Personne->getLogin() && $_GET['password'] == $Personne->getPassword()) {
                $id = $Personne->getId();
                break;
            }
        }
            $statut = ModelPersonne::getOnePersonne($id);
            
            if (!empty($statut)) {
            $_SESSION['statut'] = $statut[0]->getStatut();
            $_SESSION['id']=$statut[0]->getId();
            $_SESSION['login']=$statut[0]->getLogin();
            $_SESSION['Prenom']=$statut[0]->getPrenom();
            $_SESSION['Nom']=$statut[0]->getNom();
            include 'config.php';
                $vue = $root . '/app/view/viewDoctolibAccueil.php';
            } else {
                include 'config.php';
                $vue = $root . '/app/view/connexion/login.php';
            }

            require ($vue);
    }
         

    public static function DoctolibRegister() {

        include 'config.php';    
        $vue= $root . '/app/view/Connexion/inscription.php';
        require($vue);
        }


    public static function RegisterCreated() {
      // ajouter une validation des informations du formulaire
      $results = ModelPersonne::insert(
                htmlspecialchars($_GET['nom']),
                htmlspecialchars($_GET['prenom']),
                htmlspecialchars($_GET['adresse']),
                htmlspecialchars($_GET['login']),
                htmlspecialchars($_GET['password']),
                htmlspecialchars($_GET['statut']),
                htmlspecialchars($_GET['specialiteid'])
            );
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/Connexion/DoctolibRegistered.php';
      require ($vue);
     }



     // Se déconnecter
    public static function deconnexion()
    {
        session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
        echo '<script>window.location.href = "router1.php?action=acceuil";</script>'; // On redirige
        die();
    }
       
    public static function DoctolibInnovation() {

        include 'config.php';    
        $vue= $root . '/app/view/Innovations/UtilisationOriginale.php';
        require($vue);
        }

    
    public static function MVCAmelioration() {
        include 'config.php';    
        $vue= $root . '/app/view/Innovations/AméliorationCodeMVC.php';
        require($vue);
        }

    
    
    

    }
    


;?>