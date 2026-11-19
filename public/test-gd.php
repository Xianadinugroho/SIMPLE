<?php
if (extension_loaded('gd')) {
    echo "GD Extension LOADED<br>";
    echo "GD Version: " . gd_info()['GD Version'] . "<br>";
    echo "PNG Support: " . (gd_info()['PNG Support'] ? 'Yes' : 'No') . "<br>";
} else {
    echo "GD Extension NOT LOADED";
}
?>