<?php
# Автозагрузчик
function autoLoad($name)
{
    $file = PATH_CLASSES . "$name.php";

    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    else {
        return false;
    }
}