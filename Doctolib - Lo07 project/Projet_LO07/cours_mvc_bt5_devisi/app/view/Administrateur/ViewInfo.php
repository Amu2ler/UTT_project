
<!-- ----- début viewAll -->
<?php

require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>

    <h2>Liste des Spécialités</h2>  
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>

          <th scope = "col">id</th>
          <th scope = "col">label</th>
       
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results  
          foreach ($results_specialite as $element) {
            printf("<tr><td>%d</td><td>%s</td></tr>", 
            $element->getId(), $element->getLabel());
          }          
          ?>
      </tbody>
    </table>
    <br>
    <h2>Liste des Administrateurs</h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>

          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite</th>
       
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results  
          foreach ($results_administrateur as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>", 
            $element->getId(), $element->getNom(), $element->getPrenom(), $element->getAdresse(), $element->getLogin(), $element->getPassword(), $element->getStatut(), $element->getSpecialiteid());
          }          
          ?>
      </tbody>
    </table>
    <br>
    <h2>Liste des Praticiens</h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>

          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite</th>
       
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results  
          foreach ($results_praticien as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>", 
            $element->getId(), $element->getNom(), $element->getPrenom(), $element->getAdresse(), $element->getLogin(), $element->getPassword(), $element->getStatut(), $element->getSpecialiteid());
          }          
          ?>
      </tbody>
    </table>
    <br>
    <h2>Liste des Patients</h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>

          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite</th>
       
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results  
          foreach ($results_patient as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>", 
            $element->getId(), $element->getNom(), $element->getPrenom(), $element->getAdresse(), $element->getLogin(), $element->getPassword(), $element->getStatut(), $element->getSpecialiteid());
          }          
          ?>
      </tbody>
    </table>
    <br>
    <h2>Liste de tous les rdv</h2>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>

          <th scope = "col">id</th>
          <th scope = "col">patient_id</th>
          <th scope = "col">praticien_id</th>
          <th scope = "col">rdv_date</th>
       
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results  
          foreach ($resultats_rendezvous as $element) {
            printf("<tr><td>%d</td><td>%d</td><td>%d</td><td>%s</td></tr>", 
            $element->getId(), $element->getPatientid(), $element->getPraticienid(), $element->getrdv());
          }          
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  