
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

      
    <h1>Liste de mes Disponibilités</h1>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">nom</th>
          <th scope = "col">Prenom</th>
          <th scope = "col"> Rendez-vous disponibles</th>
      
       
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results  
          foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", 
            $element->praticien_nom, $element->praticien_prenom, $element->getrdv());
          }          
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  