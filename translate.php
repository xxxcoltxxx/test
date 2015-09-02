<?php

require_once "include/include.php";

$word = "Тестовое задание";
try {
    $translate = new Translate();

    $eng = $translate->translate($word);
    echo array_pop($eng['text']) . PHP_EOL;
}
catch (Exception $e) {
    echo "ERROR #" . $e->getCode() . ": [" . $e->getMessage() . "]" . PHP_EOL;
}