<?php 
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <form role='form' method='get' action='router1.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='DoctolibConnected'>

                <label for='login'>Login : </label><br>
                <input type='text' name='login' size='35'><br>
                <br>
                <label for='password'>Password : </label><br>
                <input type='text' name='password' size='35'><br>
            </div>
            <p>
            <br> 
            <button class='btn btn-success' type='submit'>Se connecter</button>
        </form>
        <p>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
