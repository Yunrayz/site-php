
<!-- ----- début viewInsert -->
 
<?php 
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='avisCreated'>
        <label for="id">prenom : </label><input type="text" name='prenom' size='15' value=''>
        <label for="id">nom : </label><input type="text" name='nom' size='15' value=''>
        <label for="id">commentaire : </label><input type="text" name='commentaire'  size ='100' value=''>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Laisser un avis</button>
    </form>
      <form role="form" method='get' action='router2.php'>
          <input type="hidden" name='action' value='avisReadAll'>
          <button class="btn btn-primary" type="submit">Voir les avis</button>
      </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



