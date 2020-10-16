
<!-- ----- début viewAllJoined -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    $nombre_col = $statement->columnCount();

    echo ("<table class='table table-striped table-bordered'>");
        echo ('<thead><tr>');
            for ($i=0; $i<$nombre_col; $i++ ) {
            printf('<th scope="col">%s</th>', $statement->getColumnMeta($i)['name']);
            }
            echo ('</tr></thead>');
        echo ("<tbody>");
        while ($row = $statement->fetch()) {
        echo ('<tr>');
            for ($i=0; $i<$nombre_col; $i++ ) {

            printf("<td>%s</td>", $row[$statement->getColumnMeta($i)['name']]);
            }
            echo ('</tr>');
        }
        echo ('</tbody>');
        echo ("</table>");
        ?>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewAllJoined -->