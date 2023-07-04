
<!-- ----- début fragmentDoctolibMenu -->


<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
   <a class="navbar-brand" href="router1.php?action=DoctolibAccueil">HUA-MULLER 
            |
        <?php if (isset($_SESSION['login']) && $_SESSION['statut']=='0'){
                echo 'Administrateur' ;} 
              elseif(isset($_SESSION['login']) && $_SESSION['statut']=='1'){
                  echo 'Praticien';
              }
              elseif(isset ($_SESSION['login'])){
                  echo 'Patient';
              }
        ;?> 
        | 
        <?php if (isset($_SESSION['login'])){
        echo $_SESSION['Prenom']." ".$_SESSION['Nom'];}?></a>
      
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

               <?php if (isset($_SESSION['statut']) && ($_SESSION['statut'] == "0")) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Administrateur</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=ListeSpecialite">Liste des specialités</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=SpecialiteReadId">Sélection d'une specialite par son id</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=SpecialiteCreate">Insertion d'une specialite</a></li>

                            <li><a class="dropdown-item" href="router1.php?action=PraticienSpecialite">Liste des praticiens avec leur spécialité</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=NombrePraticiensParPatient">Nombre de praticiens par patient</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=AdministrateurInfo">Info</a></li>
                        </ul>
                        
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Se Connecter</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=deconnexion">Deconnexion</a></li>
                        </ul>
                    </li>
                    
                    

                    
                <?php } elseif (isset($_SESSION['statut']) && ($_SESSION['statut'] == "1")) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Praticien</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=getAllDispo">Liste de mes disponibilités</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=CreateRDVPraticien">Ajout de nouvelles disponibilités </a></li>
                            <li><a class="dropdown-item" href="router1.php?action=getAllRDV">Liste des rendez-vous avec le nom du patient</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=getAllPatientSansDoublon">Liste de mes patients (sans doublon)</a></li>
                        </ul>
                    </li>

                   
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Se Connecter</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=deconnexion">Deconnexion</a></li>
                        </ul>
                    </li>

                <?php } elseif (isset($_SESSION['statut']) && ($_SESSION['statut'] == "2")) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Patient</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=InfoCompte">Mon Compte</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=InfoRDV">Liste de mes rendez-vous </a></li>
                            <li><a class="dropdown-item" href="router1.php?action=viewFormulaireListePraticiens">Prendre un RDV avec un praticien</a></li>
                        </ul>
                    </li>
                    
                    
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Se Connecter</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=deconnexion">Deconnexion</a></li>
                        </ul>
                    </li>

                <?php } else { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Se Connecter</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=DoctolibLogin">Login</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=DoctolibRegister">S'inscrire</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=DoctolibDisconnect">deconnexion</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Innovations</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="router1.php?action=MVCAmelioration">Amélioration MVC</a></li>
                            <li><a class="dropdown-item" href="router1.php?action=DoctolibInnovation">Utilisation Originale</a></li>
                        </ul>
                    </li>


                <?php } ?>

            </ul>
        </div>
    </div>
</nav>

<!-- ----- fin fragmentDoctolibMenu -->
   