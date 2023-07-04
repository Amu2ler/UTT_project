
<!-- ----- début viewAll -->
<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      
    <h1>Liste des Praticiens avec leur spécialité</h1>  
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">specialite</th>
       
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results  
          foreach ($results as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->personne_id, 
            $element->personne_nom, $element->personne_prenom, $element->personne_adresse, $element->label);
          }          
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  