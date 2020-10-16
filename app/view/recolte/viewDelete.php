
<!-- ----- début viewAllJoined -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">


    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <form role="form" method='post' action='router2.php?action=recolteDeleted'>
        <button class="btn btn-danger" type="submit">Supprimer</button>
        <br>
        <br>
        <table class = "table table-striped table-bordered">
          <thead>
            <tr>
              <th scope = "col">id producteur</th>
              <th scope = "col">id vin</th>
              <th scope = "col">quantité</th>
                <th scope = "col">Supprimer</th>

            </tr>
          </thead>
          <tbody>
              <?php
              // La liste des récoltes est dans une variable $results
              /*foreach ($results as $element) {
                  $prod = $element->getProducteurId();
                  $quant =  $element->getQuantite();
                  $vin = $element->getVinId();

                  echo ("<tr><td>$prod</td><td>$quant</td><td>$vin</td><td><input type='checkbox' name= '$prod' value='$vin'></td></tr>");
                  //printf("<tr><td>%d</td><td>%d</td><td>%d</td><td><input type='checkbox' name= '%d' value='%d'></td></tr>", $element->getProducteurId(), $element->getQuantite(), $element->getVinId(), $element->getProducteurId(), $element->getVinId());
              }*/

              while ($row = $statement->fetch()) {
                  echo ('<tr>');
                  printf("<td>%s</td>", $row[$statement->getColumnMeta(0)['name']]);
                  printf("<td>%s</td>", $row[$statement->getColumnMeta(1)['name']]);
                  printf("<td>%s</td>", $row[$statement->getColumnMeta(2)['name']]);
                  printf("<td><input type='checkbox' name= '%s' value='%s'></td>", $row[$statement->getColumnMeta(0)['name']], $row[$statement->getColumnMeta(1)['name']]);
                  echo ('</tr>');
              }


              ?>
        </tbody>
        </table>
    </form>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewAllJoined -->