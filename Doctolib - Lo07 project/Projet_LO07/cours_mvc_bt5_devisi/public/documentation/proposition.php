
<?php 
require ($root . 'app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . 'app/view/fragment/fragmentCaveMenu.html';
      include $root . 'app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

      <div class="panel panel-success">
          <div class="panel-heading">
              <h3 class="panel-title">Proposition 1</h3>
          </div>
          <div class="panel-body">
              Pour le rooter j'ai utilisé une fonction : methods_exist(). cette fonction permet de regarder si une méthode éxiste dans une classe. 
          </div>
      </div>
      <div class="panel panel-success">
          <div class="panel-heading">
              <h3 class="panel-title">Proposition 2</h3>
          </div>
          <div class="panel-body">
             Je n'ai pas de proposition 2
          </div>
      </div>
    <p/>
  </div>
  <?php include  $root . 'app/view/fragment/fragmentCaveFooter.html'; ?>
