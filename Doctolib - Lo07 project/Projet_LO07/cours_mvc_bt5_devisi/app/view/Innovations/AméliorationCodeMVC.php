<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <div>
            <h2>Amélioration du code MVC :</h2>
            <p>On pourrait améliorer la fonctionnalité du router. En effet, pour fonctionner, le router se base sur une fonction switch. Cependant, cela peut très vite devenir inconvénient car on doit à chaque fois rajouter les 
            différentes méthodes des différents controlleurs. 
            </p>
           
       
        </div>

        
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
