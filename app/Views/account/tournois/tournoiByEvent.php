<table class="table">
  <thead>
 
    <tr>
      <th>Nom</th>
      <th>Genre</th>
      <th>Categorie</th>
      
      
    </tr>
  </thead>

  <tbody>
  <?php
  foreach ($tournois as $tournoi) :?>
    
    <tr>
      <th scope="row"><?=$tournoi->nom;?></th>
      <td><?=$tournoi->genre;?></td>
      <td><?=$tournoi->nom_categorie;?></td>
     
    </tr>

<?php endforeach ;?>
  </tbody>
</table>