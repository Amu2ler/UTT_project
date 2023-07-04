<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>

      <h1>Liste des Patients</h1>
    
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>

          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">Adresse</th>


        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des RDV est dans une variable $results
          foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", 
            $element->patient_nom, $element->patient_prenom, $element->patient_adresse);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAllRDVPatient -->