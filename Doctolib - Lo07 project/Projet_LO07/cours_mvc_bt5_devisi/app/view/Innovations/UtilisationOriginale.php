<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
<div class="container rounded">
  <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
  <div class="mt-4 p-5 text rounded">
    <h1>Utilisation originale et innovante des données contenues dans la base.</h1>
    <p>
      Après avoir identifié que les mots de passe stockés sous forme de texte en clair dans la base de données de notre application posent des préoccupations majeures en matière de respect du RGPD et de sécurité des données des utilisateurs, nous avons entrepris des recherches approfondies. Au cours de nos investigations, nous avons découvert une méthode pour résoudre ce problème ! Voici le code qui permet d'effectuer le hachage des mots de passe.
    <p>
      Comment cela fonctionne : 
Le processus de "hashage" des mots de passe est une technique utilisée pour sécuriser les mots de passe stockés dans une base de données. Le but principal est de rendre le mot de passe illisible et irréversible, même en cas d'accès non autorisé à la base de données.
     <br>
    <br>
    <p>Avant de hacher le mot de passe, on génére aléatoirement un sel (chaîne de caractères aléatoire ajoutée au mdp avant hachage) => hachage unique, même si mdp d'origine sont identiques. Le sel est ensuite stocké en clair dans la base de données.
    <br>
    <br>
    <p>Lorsqu'un utilisateur souhaite se connecter et fournit son mot de passe, le processus suivant se lance : le sel stocké dans la base de données est récupéré, combiné avec le mot de passe fourni et passé à l'algorithme de hachage. Le haché résultant est comparé au haché stocké dans la base de données. Si les deux hachés correspondent, le mot de passe est considéré comme valide.
    </p>
    <p>
      <h4><b>Warning!</b></h4>

      <br>
      Il faut peut-être changer la la structure de la base de données. En effet, la taille de mot de passe dans le BD peut ne pas correspondre à celle du hash.
    </p>
  
  </div>

</div>
 <?php
 include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
 ?>