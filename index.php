<?php
if (isset($_GET['page'])) {
    if (strstr($_GET['page'], "secrets")) { echo "ERROR!\n"; }
    else {$homepage = file_get_contents(basename($_GET['page']));
        echo $homepage;
    }
}
else {
    readfile("index");
}
?>
