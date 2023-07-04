<!-- ----- début viewFormulaireListePraticien -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='viewFormulaireDispoPraticien'>
        <label for="id">id : </label> <select class="form-control" id='praticien' name='praticien' style="width: 200px">
            <?php foreach ($praticiens as $praticien): ?>
                <option value="<?php echo $praticien->getId(); ?>"><?php echo $praticien->getNom() . ' ' . $praticien->getPrenom(); ?></option>
            <?php endforeach; ?>

        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewFormulaireListePraticien -->