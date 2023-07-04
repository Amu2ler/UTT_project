<!-- ----- début viewFormulaireDispoPraticien -->

<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Rendez-vous disponibles</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results as $element) {
          printf(
            "<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
            $element->praticien_nom,
            $element->praticien_prenom,
            $element->getrdv()
          );
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
</body>




  <!-- ----- fin viewFormulaireDispoPraticien -->