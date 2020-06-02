<?php
include_once '../private/init.php';
if (!empty($errors))
{
    echo "<ul class = 'errors'>";

    foreach($errors as $err)
    {
        echo '<li>';
        echo $err;
        echo '</li>';
    }
    echo "</ul>";
}
