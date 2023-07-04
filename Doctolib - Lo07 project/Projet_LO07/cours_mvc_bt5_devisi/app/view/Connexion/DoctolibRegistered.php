
<!-- ----- début viewInserted -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le nouveau compte a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " .$results . "</li>");
     echo ("<li>nom= ".$_GET['nom'] . "</li>");
     echo ("<li>prenom = ".$_GET['prenom'] . "</li>");
     echo ("<li>label = ".$_GET['adresse'] . "</li>");
     echo ("<li>label = ".$_GET['login'] . "</li>");
     echo ("<li>label = ".$_GET['password'] . "</li>");
     echo ("<li>label = ".$_GET['statut'] . "</li>");
     echo ("<li>label = ".$_GET['specialiteid'] . "</li>");


     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du compte</h3>");
     echo ("<li>label = ".$_GET['nom'] . "</li>");
     echo ("<li>label = ".$_GET['prenom'] . "</li>");
     echo ("<li>label = ".$_GET['adresse'] . "</li>");
     echo ("<li>label = ".$_GET['login'] . "</li>");
     echo ("<li>label = ".$_GET['password'] . "</li>");
     echo ("<li>label = ".$_GET['statut'] . "</li>");
     echo ("<li>label = ".$_GET['specialiteid'] . "</li>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    