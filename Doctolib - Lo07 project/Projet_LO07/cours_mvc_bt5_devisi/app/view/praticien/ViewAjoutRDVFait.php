<!-- ----- début viewAjoutDispoFait-->
<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>

<div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    <?php
    if ($results > 0) {
        echo ("<h3>Les rendez-vous ont bien été ajouté </h3>");
        echo ("<ul>");
        foreach ($results as $res) {
            echo ("<li>idRdv = " . $res . "</li>");
            echo ("<ul>");
            echo ("<li>date = " . $_GET['date'] . "</li>");
            echo ("</ul>");
        }
        echo ("</ul>");
    } else {
        echo ("<h3>Problème d'insertion des rendez-vous</h3>");
    }

    echo ("</div>");
    ?>

<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
    <!-- ----- fin viewAjoutDispoFait-->
    
    