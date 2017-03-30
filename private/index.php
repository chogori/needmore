<?php
if (isset($_GET['page'])) {
    if (strstr($_GET['page'], "secrets")) { echo "ERROR!\n"; }
    if (strstr($_GET['page'], "about")) { readfile("about.html"); }
    else {$homepage =  highlight_file(basename($_GET['page']));
        echo $homepage;
    }
}
else {
    readfile("index.html");
}
?>
