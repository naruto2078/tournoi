<table class="table">
  <thead>
 
    <tr>
      <th>Nom</th>
      <th>Lieu</th>
      <th>Date</th>
      <th>Type de Jeu</th>
      <th>Nombres de tournois</th>
      
    </tr>
  </thead>

  <tbody>
  <?php
  var_dump($events);
  foreach ($events as $event) :?>
    
    <tr>
      <th scope="row"><a href="<?=$event->getUrl();?>"><?=$event->nom;?></a></th>
      <td><?=$event->lieu;?></td>
      <td><?=$event->date;?></td>
      <td><?=$event->type_de_jeu;?></td>
      <td><?=$event->nb_tournois;?></td>
    </tr>

<?php endforeach ;?>
  </tbody>
</table>