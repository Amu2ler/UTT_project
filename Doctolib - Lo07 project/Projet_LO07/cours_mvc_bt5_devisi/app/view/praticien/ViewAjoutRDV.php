<!-- ----- début viewAjoutDispo -->
<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>

<div class="container rounded">
    <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    <div class="card-body">
        <form role="form" method="GET" action="router1.php?action=CreatedRDVPraticien">
            <div class="form-group">
                <input type="hidden" name='action' value='CreatedRDVPraticien'>
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" min="
                    <?php echo date('Y-m-d'); ?>" size='75' required><br>

                <label for="nombre_rdv">Nombre de rendez-vous :</label>
                <input type="number" id="nbr_rdv" name="nbr_rdv" min="1" max="9" size='75' required><br>
            </div>
            <p />
            <button class="btn btn-primary" type="submit">Go</button>
        </form>
    </div>
</div>

<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>


<!-- ----- fin viewAjoutDispo -->