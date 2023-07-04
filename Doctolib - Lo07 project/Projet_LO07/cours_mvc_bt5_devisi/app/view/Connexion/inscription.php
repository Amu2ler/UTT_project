<?php 
require_once $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3 class='text-danger'>Formulaire d'inscription</h3>

        <form role='form' method='get' action='router1.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='RegisterCreated'>

                <label for='nom'>Nom : </label><br>
                <input type='text' name='nom' size='30'><br>
                <br>
                <label for='prenom'>Prenom : </label><br>
                <input type='text' name='prenom' size='35'><br>
                <br>
                <label for='adresse'>Adresse : </label><br>
                <input type='text' name='adresse' size='100'><br>
                <br>
                <label for='login'>Login : </label><br>
                <input type='text' name='login' size='35'><br>
                <br>
                <label for='password'>Mot de passe : </label><br>
                <input type='text' name='password' size='35'><br>
                <br>
                <label for='statut'>Sélectionnez votre rôle :</label>
                <select class='form-control' id='statut' name='statut' style='width: 400px'>
                    <option value="0">Administrateur</option>
                    <option value="1">Praticien</option>
                    <option value="2">Patient</option>
                </select>
                <br>
                <label for="specialiteid">Votre spécialité si vous êtes praticien</label>
                    <select name="specialiteid" id="specialiteid" class="form-control">
                        <option value="0">Je ne suis pas un praticien</option>
                        <option value="1">Médecin généraliste</option>
                        <option value="2">Infirmier</option>
                        <option value="3">Dentiste</option>
                        <option value="4">Sage-femme</option>
                        <option value="5">Ostéopathe</option>
                        <option value="6">Kinésithérapeute</option>
                    </select>
            </div>
            <p>
            <br> 
            <button class='btn btn-success' type='submit'>Créer un compte</button>
        </form>
        <p>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
